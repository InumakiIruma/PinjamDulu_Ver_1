<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogModel;

class Log extends BaseController
{
    public function index()
    {
        $model = new LogModel();

        // Mengambil data log dan join ke tabel users untuk ambil nama penggunanya
        $data['logs'] = $model->select('logs.*, users.nama as nama_user')
            ->join('users', 'users.id = logs.user_id', 'left')
            ->orderBy('logs.created_at', 'DESC')
            ->findAll();

        return view('logs/index', $data);
    }
    public function clear()
    {
        $db = \Config\Database::connect();
        $db->table('logs')->truncate(); // Menghapus semua data dan mereset Auto Increment

        return redirect()->to(base_url('logs'))->with('success', 'Semua log aktivitas telah dibersihkan.');
    }
}
