<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="list-group list-group-flush" id="settings-tabs">
                    <a href="#umum" class="list-group-item list-group-item-action active border-0 p-3" data-bs-toggle="list">
                        <i class="bi bi-cpu me-2"></i> Umum
                    </a>
                    <a href="#notifikasi" class="list-group-item list-group-item-action border-0 p-3" data-bs-toggle="list">
                        <i class="bi bi-bell me-2"></i> Notifikasi
                    </a>
                    <a href="#kategori-custom" class="list-group-item list-group-item-action border-0 p-3" data-bs-toggle="list">
                        <i class="bi bi-tags me-2"></i> Atur Kategori Alat
                    </a>
                    <a href="#maintenance" class="list-group-item list-group-item-action border-0 p-3" data-bs-toggle="list">
                        <i class="bi bi-tools me-2"></i> Jadwal Maintenance
                    </a>
                    <a href="#backup" class="list-group-item list-group-item-action border-0 p-3" data-bs-toggle="list">
                        <i class="bi bi-cloud-arrow-down me-2"></i> Backup & Database
                    </a>
                    <a href="#log-aktivitas" class="list-group-item list-group-item-action border-0 p-3" data-bs-toggle="list">
                        <i class="bi bi-journal-text me-2"></i> Log Aktivitas
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="tab-content">

                <div class="tab-pane fade show active" id="umum">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Pengaturan Umum</h5>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Aplikasi</label>
                            <input type="text" class="form-control rounded-3" value="PinjamDulu App">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Mode Tampilan</label>
                            <select class="form-select rounded-3" id="themeSelector">
                                <option value="light">Terang (Default)</option>
                                <option value="dark">Gelap</option>
                            </select>
                        </div>
                        <button id="btnSimpanUmum" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
                    </div>
                </div>

                <div class="tab-pane fade" id="notifikasi">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Pusat Notifikasi</h5>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" checked id="notifPeminjaman">
                            <label class="form-check-label" for="notifPeminjaman">Notifikasi Peminjaman Baru</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" checked id="notifTerlambat">
                            <label class="form-check-label" for="notifTerlambat">Peringatan Keterlambatan</label>
                        </div>
                        <button class="btn btn-primary rounded-pill px-4">Simpan</button>
                    </div>
                </div>

                <div class="tab-pane fade" id="kategori-custom">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Preferensi Kategori</h5>
                        <p class="text-muted small">Atur bagaimana kategori alat ditampilkan di halaman utama.</p>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="showEmpty" checked>
                            <label class="form-check-label" for="showEmpty">Tampilkan kategori meskipun stok kosong</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Urutan Default Alat</label>
                            <select class="form-select rounded-3">
                                <option>Berdasarkan Abjad (A-Z)</option>
                                <option>Terbaru Ditambahkan</option>
                                <option>Paling Sering Dipinjam</option>
                            </select>
                        </div>
                        <button class="btn btn-primary rounded-pill px-4">Simpan</button>
                    </div>
                </div>

                <div class="tab-pane fade" id="maintenance">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Maintenance & Perbaikan</h5>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Durasi Pengecekan Alat Rutin</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="30">
                                <span class="input-group-text">Hari sekali</span>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="autoMaintenance">
                            <label class="form-check-label" for="autoMaintenance">Kunci alat otomatis jika melewati jadwal servis</label>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="backup">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center py-5">
                        <i class="bi bi-database-fill-gear text-primary display-4 mb-3"></i>
                        <h5 class="fw-bold">Pencadangan Data</h5>
                        <p class="text-muted px-lg-5">Amankan data transaksi, user, dan daftar alat Anda secara berkala untuk menghindari kehilangan data.</p>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <li class="nav-item px-2 mt-2">
                                <a class="nav-link <?= (uri_string() == 'backup') ? 'active' : '' ?> rounded-3 shadow-sm"
                                    href="<?= base_url('/backup') ?>"
                                    style="<?= (uri_string() == 'backup') ? '' : 'background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #dee2e6;' ?>">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded-2 me-3 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                            <i class="bi bi-cloud-arrow-down-fill text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold" style="font-size: 0.85rem;">Backup Database</span>
                                            <small class="text-muted" style="font-size: 0.65rem;">Amankan data sistem</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <hr class="my-4">
                        <div class="text-start">
                            <h6 class="fw-bold">Riwayat Backup Terakhir</h6>
                            <p class="small text-muted">20 April 2026 - 09:00 WIB (Oleh Admin)</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="log-aktivitas">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Log Aktivitas Sistem</h5>
                        <div class="table-responsive">
                            <table class="table table-sm small table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Waktu</th>
                                        <th>User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10:15</td>
                                        <td>Admin</td>
                                        <td>Menambahkan alat: "Kamera DSLR Canon"</td>
                                    </tr>
                                    <tr>
                                        <td>09:30</td>
                                        <td>Petugas</td>
                                        <td>Menyetujui peminjaman ID #TRX99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-light btn-sm w-100 mt-2">Lihat Semua Log</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* CSS asli Anda tetap terjaga */
    body {
        background-color: #f8fafc;
    }

    .container.py-4 {
        max-width: 1140px;
    }

    #settings-tabs {
        background: #ffffff;
    }

    .list-group-item {
        color: #64748b;
        font-weight: 500;
        font-size: 0.9rem;
        border: none !important;
        margin: 4px 8px;
        border-radius: 10px !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
    }

    .list-group-item:hover:not(.active) {
        background-color: #f1f5f9 !important;
        color: #4361ee;
        transform: translateX(5px);
    }

    .list-group-item.active {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%) !important;
        color: #ffffff !important;
        box-shadow: 0 8px 15px rgba(67, 97, 238, 0.25);
    }

    .list-group-item i {
        font-size: 1.1rem;
        opacity: 0.8;
    }

    .tab-content .card {
        border: 1px solid rgba(226, 232, 240, 0.6);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.02) !important;
    }

    .tab-content h5 {
        color: #1e293b;
        letter-spacing: -0.025em;
        position: relative;
        padding-bottom: 10px;
    }

    .tab-content h5::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: #4361ee;
        border-radius: 10px;
    }

    .form-control,
    .form-select {
        border: 1.5px solid #e2e8f0;
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
        color: #334155;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        background-color: #ffffff;
    }

    .form-label {
        color: #475569;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-check-input:checked {
        background-color: #4361ee;
        border-color: #4361ee;
    }

    .btn-primary {
        background: #4361ee;
        border: none;
        font-weight: 600;
        padding: 0.6rem 1.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(67, 97, 238, 0.2);
    }

    .btn-primary:hover {
        background: #3730a3;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
    }

    .btn-outline-primary {
        border: 1.5px solid #4361ee;
        color: #4361ee;
        font-weight: 600;
    }

    .table thead th {
        background-color: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 0.05em;
        padding: 12px;
    }

    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
    }

    .display-4.bi-database-fill-gear {
        filter: drop-shadow(0 10px 15px rgba(67, 97, 238, 0.2));
        animation: rotateIcon 10s linear infinite;
    }

    @keyframes rotateIcon {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .rounded-4 {
        border-radius: 1.2rem !important;
    }

    .text-muted {
        color: #94a3b8 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeSelector = document.getElementById('themeSelector');
        const btnSimpan = document.getElementById('btnSimpanUmum');

        // 1. Ambil tema yang tersimpan di localStorage
        const currentTheme = localStorage.getItem('theme') || 'light';

        // 2. Set dropdown agar sesuai dengan tema saat ini
        if (themeSelector) {
            themeSelector.value = currentTheme;
        }

        // 3. Aksi saat tombol "Simpan Perubahan" diklik
        if (btnSimpan) {
            btnSimpan.addEventListener('click', function() {
                const selectedTheme = themeSelector.value;

                // Simpan pilihan ke memori browser
                localStorage.setItem('theme', selectedTheme);

                // Ubah tema di tag <html> secara instan
                document.documentElement.setAttribute('data-theme', selectedTheme);

                // Berikan notifikasi sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Pengaturan Disimpan',
                    text: `Tampilan aplikasi sekarang dalam mode ${selectedTheme === 'dark' ? 'Gelap' : 'Terang'}.`,
                    showConfirmButton: false,
                    timer: 1500,
                    borderRadius: '20px'
                });
            });
        }
    });
</script>

<?= $this->endSection() ?>