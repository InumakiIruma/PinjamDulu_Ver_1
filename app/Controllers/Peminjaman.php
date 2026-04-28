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
            'title'      => 'Daftar Permintaan & Operasional',
            'peminjaman' => $this->peminjamanModel->select('peminjaman.*, alat.nama_alat')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->whereIn('peminjaman.status', ['pending', 'dipinjam'])
                ->orderBy('peminjaman.status', 'ASC')
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

    public function proses_kembali($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        $this->peminjamanModel->update($id, [
            'status'               => 'selesai',
            'tanggal_dikembalikan' => date('Y-m-d H:i:s')
        ]);

        $alat = $this->alatModel->find($peminjaman['id_alat']);
        $this->alatModel->update($peminjaman['id_alat'], ['stok' => $alat['stok'] + $peminjaman['jumlah']]);

        return redirect()->to('/peminjaman/pengembalian')->with('success', 'Alat telah dikembalikan.');
    }

    public function daftar_denda()
    {
        $dataDenda = $this->db->table('denda')
            ->select('denda.*, peminjaman.nama_peminjam, alat.nama_alat')
            ->join('peminjaman', 'peminjaman.id = denda.id_peminjaman')
            ->join('alat', 'alat.id = peminjaman.id_alat')
            ->where('denda.status_pembayaran', 'Belum Bayar')
            ->get()->getResultArray();

        $data = [
            'title' => 'Tagihan Denda',
            'denda' => $dataDenda
        ];
        return view('peminjaman/daftar_denda', $data);
    }

    public function bayar_denda($id)
    {
        $cekDenda = $this->db->table('denda')->where('id', $id)->get()->getRow();

        if ($cekDenda) {
            $this->db->table('denda')->where('id', $id)->update([
                'status_pembayaran' => 'Lunas'
            ]);

            return redirect()->to('/peminjaman/daftar_denda')->with('success', 'Pembayaran denda berhasil dikonfirmasi.');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    /**
     * PERBAIKAN UTAMA: Integrasi dengan tabel denda.sql
     */
    public function konfirmasi_kembali($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $kondisi = $this->request->getPost('kondisi_kembali');
        $catatan_input = $this->request->getPost('catatan') ?: '-';

        // 1. Hitung Denda Fisik
        $denda_fisik = 0;
        if ($kondisi == 'Rusak') {
            $denda_fisik = 50000;
        } elseif ($kondisi == 'Hilang') {
            $denda_fisik = 100000;
        }

        // 2. Hitung Denda Keterlambatan
        $denda_telat = 0;
        $tgl_kembali_seharusnya = strtotime($peminjaman['tgl_kembali']);
        $tgl_sekarang = strtotime(date('Y-m-d'));

        if ($tgl_sekarang > $tgl_kembali_seharusnya) {
            $selisih_detik = $tgl_sekarang - $tgl_kembali_seharusnya;
            $selisih_hari = floor($selisih_detik / (60 * 60 * 24));
            if ($selisih_hari > 0) {
                $denda_telat = $selisih_hari * 5000;
            }
        }

        $total_denda = $denda_fisik + $denda_telat;

        // 3. Update Tabel Peminjaman (Hanya kolom yang ada di DB peminjaman)
        $this->peminjamanModel->update($id, [
            'status'               => 'selesai',
            'tanggal_dikembalikan' => date('Y-m-d H:i:s')
        ]);

        // 4. INSERT KE TABEL DENDA (Sesuai denda.sql Anda)
        if ($total_denda > 0) {
            $this->db->table('denda')->insert([
                'id_peminjaman'     => $id,
                'jumlah_denda'      => $total_denda,
                'keterangan'        => "Denda: " . ($denda_telat > 0 ? "Telat Rp" . number_format($denda_telat) : "") . " ($kondisi). Catatan: $catatan_input",
                'status_pembayaran' => 'Belum Bayar',
                'tanggal_dibuat'    => date('Y-m-d H:i:s')
            ]);
        }

        // 5. Update Stok Alat
        if ($kondisi != 'Hilang') {
            $alat = $this->alatModel->find($peminjaman['id_alat']);
            if ($alat) {
                $this->alatModel->update($peminjaman['id_alat'], [
                    'stok' => $alat['stok'] + $peminjaman['jumlah']
                ]);
            }
        }

        return redirect()->to('/peminjaman/permintaan')->with('success', 'Berhasil! Denda tercatat: Rp ' . number_format($total_denda));
    }

    public function history()
    {
        $data = [
            'title'      => 'Riwayat Peminjaman',
            'peminjaman' => $this->peminjamanModel->select('peminjaman.*, alat.nama_alat, alat.kategori')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->where('peminjaman.status', 'selesai')
                ->orderBy('peminjaman.tanggal_dikembalikan', 'DESC')
                ->findAll()
        ];

        return view('peminjaman/history', $data);
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
