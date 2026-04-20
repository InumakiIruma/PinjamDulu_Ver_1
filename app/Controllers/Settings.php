<?php

namespace App\Controllers;

class Settings extends BaseController
{
    public function index()
    {
        // Anda bisa mengambil data dari tabel 'settings' di database jika ada
        $data = [
            'title' => 'Pengaturan Sistem',
            'app_name' => 'PinjamDulu App'
        ];

        return view('settings/index', $data);
    }
}
