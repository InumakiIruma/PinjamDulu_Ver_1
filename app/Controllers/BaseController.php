<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\PeminjamanModel;

abstract class BaseController extends Controller
{
    protected $data = [];
    protected $session;
    // Tambahkan properti helpers di sini agar otomatis di-load oleh CI4
    protected $helpers = ['form', 'url', 'log', 'custom'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // 1. Load helpers dulu
        parent::initController($request, $response, $logger);

        // 2. Inisialisasi Session
        $this->session = \Config\Services::session();
        $userId = $this->session->get('id_user');

        // 3. Hitung Data Global
        $jumlahDipinjam = 0;
        if ($userId) {
            $pinjamModel = new PeminjamanModel();
            $jumlahDipinjam = $pinjamModel->where('id_user', $userId)
                ->whereIn('status', ['Disetujui', 'Terlambat'])
                ->countAllResults();
        }

        // 4. Masukkan ke $this->data
        $this->data['globalJumlahPinjam'] = $jumlahDipinjam;

        // Trik: Simpan ke Config agar bisa dipanggil via helper di View mana saja
        config('App')->globalJumlahPinjam = $jumlahDipinjam;
    }
}
