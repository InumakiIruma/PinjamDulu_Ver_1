<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4 px-4">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-lg rounded-4 mb-4" role="alert" style="background: rgba(25, 135, 84, 0.9); color: white;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h3 class="fw-extrabold text-dark mb-1" style="letter-spacing: -1px;">Dashboard Pengelola</h3>
            <p class="text-muted mb-0">Selamat datang kembali, <span class="text-primary fw-bold">Admin</span>. Inilah ringkasan operasional <b class="text-dark">PinjamDulu</b>App hari ini.</p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <div class="badge bg-white shadow-sm text-dark p-2 px-3 rounded-pill border">
                <i class="bi bi-calendar3 me-2 text-primary"></i> <?= date('d F Y') ?>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card h-100" style="background: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%); color: white;">
                <div class="card-body position-relative">
                    <div class="card-icon-overlay"><i class="bi bi-box-seam"></i></div>
                    <h6 class="text-white-50 small text-uppercase fw-bold">Total Alat</h6>
                    <h2 class="display-6 fw-bold mb-0"><?= $totalAlat ?></h2>
                    <p class="small mb-0 mt-2 opacity-75">Unit terdaftar di sistem</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card h-100" style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); color: white;">
                <div class="card-body position-relative">
                    <div class="card-icon-overlay"><i class="bi bi-check-lg"></i></div>
                    <h6 class="text-white-50 small text-uppercase fw-bold">Tersedia</h6>
                    <h2 class="display-6 fw-bold mb-0"><?= $totalTersedia ?></h2>
                    <p class="small mb-0 mt-2 opacity-75">Siap untuk dipinjamkan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card h-100" style="background: linear-gradient(135deg, #f1c40f 0%, #f39c12 100%); color: #4b3e00;">
                <div class="card-body position-relative">
                    <div class="card-icon-overlay"><i class="bi bi-clock-history"></i></div>
                    <h6 class="opacity-50 small text-uppercase fw-bold">Sedang Dipinjam</h6>
                    <h2 class="display-6 fw-bold mb-0"><?= $totalDipinjam ?></h2>
                    <p class="small mb-0 mt-2 opacity-75">Menunggu pengembalian</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card h-100" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white;">
                <div class="card-body position-relative">
                    <div class="card-icon-overlay"><i class="bi bi-exclamation-triangle"></i></div>
                    <h6 class="text-white-50 small text-uppercase fw-bold">Terlambat</h6>
                    <h2 class="display-6 fw-bold mb-0 text-white"><?= $totalTerlambat ?></h2>
                    <p class="small mb-0 mt-2 opacity-75">Melebihi batas waktu</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-4 px-4 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0"><i class="bi bi-lightning-fill text-primary me-2"></i>Aktivitas Terbaru</h5>
                    <a href="<?= base_url('/peminjaman/history') ?>" class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-primary small">LIHAT SEMUA</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr style="font-size: 0.75rem; letter-spacing: 1px;">
                                    <th class="ps-4 text-muted text-uppercase">PEMINJAM</th>
                                    <th class="text-muted text-uppercase">ALAT</th>
                                    <th class="text-muted text-uppercase">TGL PINJAM</th>
                                    <th class="text-muted text-uppercase">STATUS</th>
                                    <th class="text-center text-muted text-uppercase">DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($permintaanTerbaru)) : ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-2 d-block mb-2 opacity-25"></i>
                                            Belum ada transaksi saat ini.
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($permintaanTerbaru as $p) : ?>
                                        <tr>
                                            <td class="ps-4 py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle me-2 bg-primary-subtle text-primary fw-bold small">
                                                        <?= strtoupper(substr($p['nama_peminjam'], 0, 1)) ?>
                                                    </div>
                                                    <span class="fw-bold text-dark"><?= $p['nama_peminjam'] ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-medium text-secondary text-truncate" style="max-width: 150px;"><?= $p['nama_alat'] ?></div>
                                            </td>
                                            <td class="text-muted small">
                                                <i class="bi bi-calendar-event me-1"></i> <?= date('d/m/Y', strtotime($p['tgl_pinjam'])) ?>
                                            </td>
                                            <td>
                                                <?php if ($p['status'] == 'pending') : ?>
                                                    <span class="badge rounded-pill bg-info-subtle text-info border border-info px-3">Menunggu Approval</span>
                                                <?php elseif ($p['status'] == 'dipinjam') : ?>
                                                    <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning px-3">Sedang Dipakai</span>
                                                <?php else : ?>
                                                    <span class="badge rounded-pill bg-success-subtle text-success border border-success px-3">Selesai</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center pe-4">
                                                <a href="<?= base_url('/peminjaman/detail/' . $p['id']) ?>" class="btn btn-sm btn-outline-primary rounded-circle" title="Detail"><i class="bi bi-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4 p-2 bg-white">
                <div class="card-body">
                    <h6 class="fw-bold text-dark mb-4"><i class="bi bi-rocket-takeoff-fill text-primary me-2"></i>Aksi Cepat</h6>
                    <div class="d-grid gap-3">
                        <button type="button" class="btn btn-primary py-3 rounded-4 shadow-primary border-0 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#modalTambahAlat">
                            <i class="bi bi-plus-circle-fill fs-5 me-2"></i> <b>Tambah Alat Baru</b>
                        </button>
                        <a href="<?= base_url('/peminjaman') ?>" class="btn btn-outline-dark py-3 rounded-4 d-flex align-items-center justify-content-center border-2">
                            <i class="bi bi-cart-plus-fill fs-5 me-2"></i> <b>Buat Pinjaman Baru</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 bg-dark overflow-hidden position-relative">
                <div class="card-body p-4 text-white">
                    <div class="position-absolute bottom-0 end-0 p-3 opacity-10">
                        <i class="bi bi-shield-lock display-1"></i>
                    </div>
                    <h6 class="fw-bold mb-3"><i class="bi bi-info-circle me-2 text-info"></i>Status Sistem</h6>
                    <hr class="border-secondary opacity-25">
                    <div class="d-flex align-items-start mb-3">
                        <div class="p-2 bg-success bg-opacity-25 rounded-3 me-3 text-success border border-success border-opacity-25">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold small">Auto Stock Active</p>
                            <p class="text-white-50 extra-small mb-0">Sinkronisasi stok real-time.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="p-2 bg-info bg-opacity-25 rounded-3 me-3 text-info border border-info border-opacity-25">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold small">Validation Active</p>
                            <p class="text-white-50 extra-small mb-0">Proteksi peminjaman stok kosong.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #4361ee;
    }

    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .card-icon-overlay {
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 5rem;
        opacity: 0.15;
        transform: rotate(15deg);
        pointer-events: none;
    }

    .shadow-primary {
        box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
    }

    .avatar-circle {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .extra-small {
        font-size: 0.7rem;
    }

    .bg-light {
        background-color: #f8fafc !important;
    }

    .modal-content {
        border-radius: 24px;
        overflow: hidden;
    }

    .modal-header {
        padding: 1.5rem;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 10px 15px;
        border: 1.5px solid #eef2f6;
    }

    .form-control:focus {
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        border-color: var(--primary-color);
    }
</style>

<div class="modal fade" id="modalTambahAlat" tabindex="-1" aria-labelledby="modalTambahAlatLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg overflow-hidden">
            <div class="modal-header text-white border-0 py-4" style="background: linear-gradient(to right, #4361ee, #4cc9f0);">
                <h5 class="modal-title fw-bold" id="modalTambahAlatLabel"><i class="bi bi-box-seam me-2"></i>Tambah Inventaris Alat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('/alat/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body p-4">

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small text-uppercase">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" placeholder="Contoh: Kamera Sony A6400" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small text-uppercase">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Kamera">Kamera</option>
                            <option value="Pertukangan">Pertukangan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark small text-uppercase">Stok Awal</label>
                            <input type="number" name="stok" class="form-control" value="1" min="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark small text-uppercase">Status Awal</label>
                            <select name="status" class="form-select">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Perbaikan">Perbaikan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-bold text-dark small text-uppercase">Foto Alat</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-image text-primary"></i></span>
                            <input type="file" name="foto" id="inputFotoDashboard" class="form-control border-start-0" accept="image/*">
                        </div>
                        <div id="previewArea" class="mt-3 d-none text-center bg-light p-3 rounded-3 border border-dashed">
                            <p class="small text-muted mb-2">Preview Foto:</p>
                            <img id="imgPreviewDashboard" src="#" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                        </div>
                        <small class="text-muted d-block mt-2">Format: JPG, JPEG, PNG (Maks. 2MB)</small>
                    </div>

                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-primary">Simpan Alat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('inputFotoDashboard').onchange = evt => {
        const [file] = document.getElementById('inputFotoDashboard').files;
        const previewArea = document.getElementById('previewArea');
        const imgPreview = document.getElementById('imgPreviewDashboard');

        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            previewArea.classList.remove('d-none');
        } else {
            previewArea.classList.add('d-none');
        }
    }
</script>

<style>
    .border-dashed {
        border-style: dashed !important;
    }

    .shadow-primary {
        box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
    }
</style>

<?= $this->endSection() ?>