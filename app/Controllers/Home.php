<?php

namespace App\Controllers;

use App\Models\AlatModel;
use App\Models\PeminjamanModel;

class Home extends BaseController
{
    public function index(): string
    {
        // 1. Panggil Helper Log agar fungsi panggil_log() bisa digunakan
        helper('log');

        // 2. Inisialisasi Model
        $alatModel = new AlatModel();
        $pinjamModel = new PeminjamanModel();

        // 3. Catat aktivitas ke Log
        panggil_log('AKSES DASHBOARD', 'User membuka halaman Dashboard utama');

        // 4. Siapkan data lokal untuk halaman Dashboard
        $data = [
            'title'             => 'Dashboard Pengelola',
            'totalAlat'         => $alatModel->countAll(),

            // Logika berdasarkan kolom status di tabel alat (Pastikan sesuai ENUM di DB: 'Tersedia')
            'totalTersedia'     => $alatModel->where('status', 'Tersedia')->countAllResults(),

            // PERBAIKAN: Hitung dari tabel peminjaman dengan status 'dipinjam' (huruf kecil sesuai DB)
            'totalDipinjam'     => $pinjamModel->where('status', 'dipinjam')->countAllResults(),

            // PERBAIKAN: Logika keterlambatan (Status 'dipinjam' huruf kecil sesuai ENUM di DB)
            'totalTerlambat'    => $pinjamModel->where('tgl_kembali <', date('Y-m-d'))
                ->where('status', 'dipinjam')
                ->countAllResults(),

            // Mengambil 5 transaksi terbaru dengan JOIN agar nama alat muncul
            'permintaanTerbaru' => $pinjamModel->select('peminjaman.*, alat.nama_alat')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->orderBy('peminjaman.id', 'DESC')
                ->limit(5)
                ->findAll()
        ];

        // 5. Kirim data ke view dashboard dengan menggabungkan data global dari BaseController
        return view('layouts/dashboard', array_merge($this->data, $data));
    }
}
