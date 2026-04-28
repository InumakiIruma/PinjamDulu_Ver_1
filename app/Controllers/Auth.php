<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Jika sudah login, langsung lempar ke dashboard agar tidak login dua kali
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function prosesLogin()
    {
        $session = session();
        $usersModel = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $users = $usersModel->getUsersByUsername($username);

        if ($users) {
            // Verifikasi password
            if (password_verify($password, $users['password'])) {

                // Menyiapkan data session sesuai struktur tabel database Anda
                $sessionData = [
                    'id'        => $users['id'],
                    'nama'      => $users['nama'], // Pastikan di sidebar panggil session()->get('nama')
                    'email'     => $users['email'],
                    'username'  => $users['username'],
                    'role'      => $users['role'], // Isinya: 'admin', 'petugas', atau 'anggota'
                    'foto'      => $users['foto'],
                    'logged_in' => true
                ];

                $session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('salahpw', 'Password salah');
                return redirect()->to('/login')->withInput();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
