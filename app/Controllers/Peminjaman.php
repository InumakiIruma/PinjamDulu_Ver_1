<?php

namespace App\Controllers;

use App\Models\AlatModel;
use App\Models\PeminjamanModel;

class Peminjaman extends BaseController
{
    protected $alatModel;
    protected $peminjamanModel;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->alatModel = new AlatModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    private function simpanNotif($id_user, $pesan)
    {
        $this->db->table('notifikasi')->insert([
            'id_user'    => $id_user,
            'pesan'      => $pesan,
            'is_read'    => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function index()
    {
        $data = [
            'title' => 'Pilih Alat untuk Dipinjam',
            'alat'  => $this->alatModel->where('stok >', 0)->findAll()
        ];
        return view('peminjaman/pilih_alat', $data);
    }

    public function proses()
    {
        $id_alat = $this->request->getPost('id_alat');
        $jumlah  = (int) ($this->request->getPost('jumlah') ?: 1);
        $nama    = $this->request->getPost('nama_peminjam');

        $alat = $this->alatModel->find($id_alat);

        if (!$alat || $alat['stok'] <= 0) {
            return redirect()->back()->with('error', 'Maaf, stok alat ini sudah habis.');
        }

        if ($alat['stok'] < $jumlah) {
            return redirect()->back()->with('error', 'Jumlah pinjam melebihi stok yang tersedia.');
        }

        $id_user_peminjam = session()->get('id') ?? session()->get('id_user');

        $dataSimpan = [
            'id_alat'       => $id_alat,
            'id_user'       => $id_user_peminjam,
            'nama_peminjam' => $nama,
            'tgl_pinjam'    => $this->request->getPost('tgl_pinjam'),
            'tgl_kembali'   => $this->request->getPost('tgl_kembali'),
            'jumlah'        => $jumlah,
            'status'        => 'pending'
        ];

        if ($this->peminjamanModel->save($dataSimpan)) {
            $adminList = $this->db->table('users')->where('role', 'admin')->get()->getResultArray();
            foreach ($adminList as $admin) {
                $this->simpanNotif($admin['id'], "Permintaan Baru: $nama ingin meminjam " . $alat['nama_alat']);
            }
            return redirect()->to('/peminjaman')->with('success', 'Peminjaman diajukan.');
        }

        return redirect()->back()->with('error', 'Gagal mengajukan peminjaman.');
    }

    public function permintaan()
    {
        $data = [
            'title'      => 'Daftar Permintaan Pinjam',
            'peminjaman' => $this->peminjamanModel->select('peminjaman.*, alat.nama_alat')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->where('peminjaman.status', 'pending')
                ->findAll()
        ];
        return view('peminjaman/permintaan', $data);
    }

    public function konfirmasi($id)
    {
        $this->db->transStart();
        $dataPinjam = $this->peminjamanModel->find($id);

        if (!$dataPinjam || strtolower($dataPinjam['status']) !== 'pending') {
            return redirect()->back()->with('error', 'Data tidak valid.');
        }

        $alat = $this->alatModel->find($dataPinjam['id_alat']);

        if ($alat['stok'] >= $dataPinjam['jumlah']) {
            $this->peminjamanModel->update($id, [
                'status'     => 'dipinjam',
                'tgl_pinjam' => date('Y-m-d H:i:s')
            ]);

            $this->alatModel->update($dataPinjam['id_alat'], ['stok' => $alat['stok'] - $dataPinjam['jumlah']]);

            if (!empty($dataPinjam['id_user'])) {
                $this->simpanNotif($dataPinjam['id_user'], "Peminjaman " . $alat['nama_alat'] . " DISETUJUI.");
            }

            $this->db->transComplete();
            return redirect()->to('/peminjaman/permintaan')->with('success', 'Disetujui.');
        }

        return redirect()->back()->with('error', 'Stok tidak mencukupi.');
    }

    public function pengembalian()
    {
        $data = [
            'title'      => 'Pengembalian Alat',
            'peminjaman' => $this->peminjamanModel->select('peminjaman.*, alat.nama_alat')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->where('peminjaman.status', 'dipinjam')
                ->findAll()
        ];
        return view('peminjaman/pengembalian', $data);
    }

    /**
     * FIX: Fungsi tunggal untuk proses pengembalian + Hitung Denda
     */
    public function proses_kembali($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        // Ambil tanggal saja (Y-m-d) tanpa jam
        $tgl_harus_kembali = date('Y-m-d', strtotime($peminjaman['tgl_kembali']));
        $tgl_sekarang      = date('Y-m-d');

        $denda = 0;
        $status_denda = 'lunas';

        // Perbandingan: Jika hari ini melewati deadline
        if ($tgl_sekarang > $tgl_harus_kembali) {
            $awal  = new \DateTime($tgl_harus_kembali);
            $akhir = new \DateTime($tgl_sekarang);
            $diff  = $awal->diff($akhir);

            $selisih_hari = $diff->days;

            if ($selisih_hari > 0) {
                $denda = $selisih_hari * 5000; // Rp 5.000 per hari
                $status_denda = 'belum_bayar';
            }
        }

        // UPDATE DATABASE
        $this->peminjamanModel->update($id, [
            'status'               => 'selesai',
            'tanggal_dikembalikan' => date('Y-m-d H:i:s'),
            'denda'                => $denda,
            'status_denda'         => $status_denda
        ]);

        // Kembalikan Stok Alat
        $alat = $this->alatModel->find($peminjaman['id_alat']);
        $this->alatModel->update($peminjaman['id_alat'], ['stok' => $alat['stok'] + $peminjaman['jumlah']]);

        return redirect()->to('/peminjaman/pengembalian')->with('success', 'Alat kembali. Denda: Rp ' . number_format($denda));
    }
    public function daftar_denda()
    {
        $data = [
            'title' => 'Tagihan Denda',
            // Filter: Hanya yang dendanya di atas 0 DAN statusnya belum_bayar
            'denda' => $this->peminjamanModel->select('peminjaman.*, alat.nama_alat')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->where('peminjaman.denda >', 0)
                ->where('peminjaman.status_denda', 'belum_bayar')
                ->findAll()
        ];
        return view('peminjaman/daftar_denda', $data);
    }

    public function detail($id)
    {
        $data['peminjaman'] = $this->peminjamanModel->select('peminjaman.*, alat.nama_alat, alat.kategori')
            ->join('alat', 'alat.id = peminjaman.id_alat')
            ->where('peminjaman.id', $id)
            ->first();

        if (!$data['peminjaman']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['title'] = "Detail Peminjaman";
        return view('peminjaman/detail', $data);
    }

    public function tolak($id)
    {
        $dataPinjam = $this->peminjamanModel->find($id);

        if ($dataPinjam && $dataPinjam['status'] == 'pending') {
            if (!empty($dataPinjam['id_user'])) {
                $this->simpanNotif($dataPinjam['id_user'], "Maaf, permintaan pinjam alat DITOLAK.");
            }
            $this->peminjamanModel->delete($id);
            return redirect()->to('/peminjaman/permintaan')->with('success', 'Permintaan telah ditolak.');
        }
        return redirect()->back()->with('error', 'Gagal memproses.');
    }
}
