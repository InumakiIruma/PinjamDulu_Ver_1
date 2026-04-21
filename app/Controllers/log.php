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
}
