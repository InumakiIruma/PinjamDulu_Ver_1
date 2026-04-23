<?php

namespace App\Controllers;

use App\Models\AlatModel;

class Alat extends BaseController
{
    protected $alatModel; // Tambahkan ini agar bisa dipanggil dengan $this->alatModel

    public function __construct()
    {
        // Inisialisasi model di constructor agar bisa dipakai di semua fungsi
        $this->alatModel = new AlatModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Alat - Maldin17App',
            'alat'  => $this->alatModel->findAll()
        ];

        return view('alat/index', $data);
    }

    public function tambah()
    {
        return view('alat/tambah_alat');
    }

    public function simpan()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = null;

        // Validasi dan Upload Foto
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {

            // Pastikan folder public/uploads/alat ada, jika tidak, buat otomatis
            if (!is_dir(FCPATH . 'uploads/alat')) {
                mkdir(FCPATH . 'uploads/alat', 0777, true);
            }

            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'uploads/alat', $namaFoto);
        }

        $data = [
            'nama_alat' => $this->request->getPost('nama_alat'),
            'kategori'  => $this->request->getPost('kategori'),
            'stok'      => $this->request->getPost('stok'),
            'status'    => $this->request->getPost('status') ?? 'Tersedia', // Tambahkan status default
            'foto'      => $namaFoto
        ];

        // Sekarang $this->alatModel sudah bisa digunakan
        $this->alatModel->insert($data);

        return redirect()->back()->with('success', 'Alat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Alat - Maldin17App',
            'alat'  => $this->alatModel->find($id)
        ];

        if (!$data['alat']) {
            return redirect()->to('/alat')->with('error', 'Data alat tidak ditemukan.');
        }

        return view('alat/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_alat' => $this->request->getPost('nama_alat'),
            'kategori'  => $this->request->getPost('kategori'),
            'stok'      => $this->request->getPost('stok'),
            'status'    => $this->request->getPost('status'),
        ];

        // Cek jika ada upload foto baru saat edit
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'uploads/alat', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $this->alatModel->update($id, $data);

        return redirect()->to('/dashboard')->with('success', 'Data alat berhasil diperbarui.');
    }
    public function delete($id)
    {
        // 1. Cari data alat untuk mendapatkan nama file foto
        $alat = $this->alatModel->find($id);

        if ($alat) {
            // 2. Hapus file foto fisik jika ada
            if (!empty($alat['foto'])) {
                $pathFile = FCPATH . 'uploads/alat/' . $alat['foto'];
                if (file_exists($pathFile)) {
                    unlink($pathFile); // Menghapus file dari folder
                }
            }

            // 3. Hapus data dari database
            $this->alatModel->delete($id);

            return redirect()->to('/alat')->with('success', 'Alat berhasil dihapus permanen.');
        }

        return redirect()->to('/alat')->with('error', 'Alat tidak ditemukan.');
    }
}
