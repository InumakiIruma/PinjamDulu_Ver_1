<?php

namespace App\Controllers;

use App\Models\UserModel; // Sesuaikan dengan nama file Model User Anda
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function register()
    {
        $emailSvc = \Config\Services::email();
        $verificationCode = bin2hex(random_bytes(3)); // Menghasilkan 6 karakter unik

        // Mengambil data dari form input
        $data = [
            'nama'              => $this->request->getPost('nama'),
            'email'             => $this->request->getPost('email'),
            'username'          => $this->request->getPost('username'),
            'password'          => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'              => 'anggota', // Default role sesuai database Anda
            'status'            => 'nonaktif', // Belum aktif sebelum verifikasi
            'verification_code' => $verificationCode,
            'is_verified'       => 0
        ];

        $userModel = new UserModel();

        if ($userModel->insert($data)) {
            // Konfigurasi Email
            $emailSvc->setTo($data['email']);
            $emailSvc->setSubject('Kode Verifikasi PinjamDulu');
            $emailSvc->setMessage("Halo {$data['nama']}, kode verifikasi Anda adalah: <b>$verificationCode</b>");

            if ($emailSvc->send()) {
                // Simpan email di session sementara untuk keperluan verifikasi
                session()->setFlashdata('email_verifikasi', $data['email']);
                return redirect()->to('/auth/verify_page')->with('success', 'Pendaftaran berhasil! Silakan cek email Anda untuk kode verifikasi.');
            } else {
                // Jika gagal kirim email, tampilkan log error
                echo $emailSvc->printDebugger(['headers']);
            }
        } else {
            // Jika gagal insert ke database
            return redirect()->back()->withInput()->with('error', 'Gagal melakukan pendaftaran.');
        }
    }

    public function verify_page()
    {
        // Menampilkan halaman form input kode verifikasi
        return view('auth/verify_page');
    }
}
