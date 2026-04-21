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

        // 3. Catat aktivitas ke Log (Contoh: Mencatat akses dashboard)
        // Ini akan muncul di halaman Log Aktivitas kamu
        panggil_log('AKSES DASHBOARD', 'User membuka halaman Dashboard utama');

        // 4. Siapkan data (Mempertahankan variabel asli kamu)
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

        // 5. Kirim data ke view dashboard
        return view('layouts/dashboard', $data);
    }
}
