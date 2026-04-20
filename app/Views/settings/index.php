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
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <button class="btn btn-outline-primary rounded-pill px-4"><i class="bi bi-download me-2"></i>Export Excel</button>
                            <button class="btn btn-primary rounded-pill px-4"><i class="bi bi-cloud-upload me-2"></i>Backup SQL</button>
                        </div>
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
    .list-group-item.active {
        background-color: #4361ee !important;
        border-color: #4361ee !important;
    }

    .list-group-item {
        color: #64748b;
        font-size: 0.95rem;
        transition: 0.2s;
    }

    .list-group-item:hover:not(.active) {
        background-color: #f8fafc;
        color: #4361ee;
        padding-left: 1.5rem !important;
    }
</style>

<?= $this->endSection() ?>