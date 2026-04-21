<?php

function panggil_log($aksi, $keterangan)
{
    $logModel = new \App\Models\LogModel();

    // Ambil user_id dari session (sesuaikan dengan key session login kamu)
    $userId = session()->get('id_user') ?: session()->get('id');

    $logModel->save([
        'user_id'    => $userId,
        'aksi'       => $aksi,
        'keterangan' => $keterangan,
        'ip_address' => service('request')->getIPAddress(),
        'created_at' => date('Y-m-d H:i:s')
    ]);
}
