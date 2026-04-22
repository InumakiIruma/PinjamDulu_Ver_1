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
            // Logika berdasarkan kolom status di tabel alat
            'totalTersedia'     => $alatModel->where('status', 'Tersedia')->countAllResults(),
            'totalDipinjam'     => $alatModel->where('status', 'Dipinjam')->countAllResults(),
            // Logika keterlambatan
            'totalTerlambat'    => $pinjamModel->where('tgl_kembali <', date('Y-m-d'))
                ->where('status', 'Dipinjam')
                ->countAllResults(),

            // Mengambil 5 transaksi terbaru dengan JOIN agar nama alat muncul
            'permintaanTerbaru' => $pinjamModel->select('peminjaman.*, alat.nama_alat')
                ->join('alat', 'alat.id = peminjaman.id_alat')
                ->orderBy('peminjaman.id', 'DESC')
                ->limit(5)
                ->findAll()
        ];

        // 5. Kirim data ke view dashboard dengan menggabungkan data global dari BaseController
        // array_merge($this->data, $data) memastikan widget sidebar mendapatkan angka real-time
        return view('layouts/dashboard', array_merge($this->data, $data));
    }
}
