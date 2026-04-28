<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id';

    // FIX: Menyesuaikan dengan struktur database peminjaman.sql Anda
    protected $allowedFields = [
        'id_alat',
        'id_user', // Pastikan kolom ini sudah Anda tambahkan di DB (Cara 1 sebelumnya)
        'nama_peminjam',
        'tgl_pinjam',
        'tgl_kembali',
        'tanggal_dikembalikan',
        'jumlah',
        'status',
        'kondisi_kembali', // Kolom ini ada di peminjaman.sql Anda
        'catatan_checking', // Kolom ini ada di peminjaman.sql Anda
        'admin_konfirmasi'  // Kolom ini ada di peminjaman.sql Anda
        // Kolom 'denda' dan 'status_denda' TIDAK dimasukkan karena sudah pindah ke tabel denda
    ];

    public function getPeminjamanLimit($limit)
    {
        return $this->db->table('peminjaman')
            ->select('peminjaman.*, alat.nama_alat')
            ->join('alat', 'alat.id = peminjaman.id_alat', 'left')
            ->orderBy('peminjaman.id', 'DESC')
            ->get($limit)
            ->getResultArray();
    }

    public function konfirmasi($id)
    {
        $alatModel = new \App\Models\AlatModel();
        $dataPinjam = $this->find($id);

        if (!$dataPinjam) {
            return false;
        }

        $alat = $alatModel->find($dataPinjam['id_alat']);

        // Menambahkan pengecekan jumlah agar tidak error jika null
        $jumlahPinjam = $dataPinjam['jumlah'] ?? 0;

        if (!$alat || $alat['stok'] < $jumlahPinjam) {
            return false;
        }

        $this->update($id, [
            'status' => 'dipinjam',
            'tgl_pinjam' => date('Y-m-d H:i:s')
        ]);

        $stokBaru = $alat['stok'] - $jumlahPinjam;
        $alatModel->update($dataPinjam['id_alat'], ['stok' => $stokBaru]);

        return true;
    }

    public function getLaporan()
    {
        return $this->select('peminjaman.*, alat.nama_alat, alat.kategori')
            ->join('alat', 'alat.id = peminjaman.id_alat')
            ->orderBy('peminjaman.tgl_pinjam', 'DESC')
            ->findAll();
    }
    public function getHistoryByUser($id_user)
    {
        return $this->select('peminjaman.*, alat.nama_alat, alat.kategori')
            ->join('alat', 'alat.id = peminjaman.id_alat')
            ->where('peminjaman.id_user', $id_user) // Filter berdasarkan user yang login
            ->orderBy('peminjaman.id', 'DESC')
            ->findAll();
    }
}
