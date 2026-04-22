<?php

if (!function_exists('get_jumlah_pinjam')) {
    function get_jumlah_pinjam()
    {
        $db = \Config\Database::connect();
        $userId = session()->get('id_user');

        if (!$userId) return 0;

        return $db->table('peminjaman')
            ->where('id_user', $userId)
            ->whereIn('status', ['Disetujui', 'Terlambat'])
            ->countAllResults();
    }
}
