<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
// Gunakan BaseController agar session dan request tersedia
class Denda extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('denda');
        $builder->select('denda.*, peminjaman.nama_peminjam, alat.nama_alat');

        // Pastikan ini JOIN ke tabel peminjaman dan alat agar nama muncul
        $builder->join('peminjaman', 'peminjaman.id = denda.id_peminjaman');
        $builder->join('alat', 'alat.id = peminjaman.id_alat');

        $builder->orderBy('denda.tanggal_dibuat', 'DESC');
        $query = $builder->get();

        $data = [
            'title' => 'Daftar Denda',
            'denda' => $query->getResultArray()
        ];

        return view('admin/denda/index', $data);
    }
    public function lunas($id)
    {
        $db = \Config\Database::connect();

        // Update status di tabel denda
        $db->table('denda')->where('id', $id)->update([
            'status_pembayaran' => 'Lunas'
        ]);

        return redirect()->back()->with('success', 'Pembayaran denda telah dikonfirmasi lunas.');
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();
        $db->table('denda')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data denda berhasil dihapus.');
    }
}
