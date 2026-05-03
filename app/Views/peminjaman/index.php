<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    /* CSS CUSTOM UNTUK TAMPILAN MODERN & FRESH */
    .katalog-wrapper {
        padding: 40px 0;
        background-color: #fcfcfc;
        min-height: 100vh;
    }

    /* Card Styling */
    .custom-card-alat {
        border: none !important;
        border-radius: 24px !important;
        background: #ffffff !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.04) !important;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
        overflow: hidden;
        position: relative;
    }

    .custom-card-alat:hover {
        transform: translateY(-12px) !important;
        box-shadow: 0 20px 45px rgba(67, 97, 238, 0.12) !important;
    }

    /* Image/Icon Placeholder */
    .img-area {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%) !important;
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 12px;
        border-radius: 20px;
        color: white;
    }

    /* Badge & Text */
    .category-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        color: white;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stok-status {
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Button Styling */
    .btn-action {
        border-radius: 14px !important;
        padding: 12px !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: 0.3s;
    }

    .btn-primary-custom {
        background-color: #4361ee !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3) !important;
    }

    .btn-primary-custom:hover:not(:disabled) {
        background-color: #3046c5 !important;
        transform: scale(1.02);
    }

    /* Modal Styling */
    .modal-content-premium {
        border: none !important;
        border-radius: 30px !important;
    }

    .info-box-peminjaman {
        background-color: #f1f4ff;
        border: 2px dashed #4361ee;
        border-radius: 20px;
        padding: 20px;
    }
</style>

<div class="katalog-wrapper">
    <div class="container">
        <!-- Header Section -->
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold text-dark mb-2">Katalog Alat</h1>
                <p class="text-muted">Pilih dan gunakan alat terbaik untuk project kamu.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-inline-flex align-items-center bg-white border px-4 py-2 rounded-pill shadow-sm">
                    <div class="bg-primary rounded-circle me-2" style="width: 10px; height: 10px;"></div>
                    <span class="fw-bold text-dark"><?= count($alat) ?> Alat Tersedia</span>
                </div>
            </div>
        </div>

        <!-- Alert -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success border-0 shadow-lg rounded-4 mb-4 p-3 animate__animated animate__fadeIn">
                <div class="d-flex align-items-center">
                    <i class="bi bi-stars fs-4 me-2"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Grid Alat -->
        <div class="row g-4">
            <?php foreach ($alat as $a): ?>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card custom-card-alat h-100">
                        <!-- Top Visual -->
                        <div class="img-area position-relative">
                            <i class="bi bi-box-seam display-5"></i>
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="category-badge"><?= $a['kategori'] ?></span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="card-body pt-2 px-4 pb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted small">ID #<?= $a['id'] ?></span>
                                <span class="stok-status <?= ($a['stok'] > 0) ? 'text-success' : 'text-danger' ?>">
                                    <i class="bi bi-circle-fill me-1" style="font-size: 8px;"></i>
                                    <?= ($a['stok'] > 0) ? 'Stok: ' . $a['stok'] : 'Out of Stock' ?>
                                </span>
                            </div>

                            <h5 class="fw-bold text-dark mb-4" style="min-height: 3rem; line-height: 1.4;"><?= $a['nama_alat'] ?></h5>

                            <button class="btn btn-primary-custom btn-action w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#modalPinjam"
                                onclick="setAlat('<?= $a['id'] ?>', '<?= $a['nama_alat'] ?>')"
                                <?= ($a['stok'] <= 0) ? 'disabled' : '' ?>>
                                <i class="bi bi-plus-lg me-2"></i> Pinjam Alat
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal Peminjaman -->
<div class="modal fade" id="modalPinjam" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-premium shadow-2xl">
            <div class="modal-header border-0 pt-4 px-4">
                <h4 class="fw-bold text-dark mb-0">Detail Peminjaman</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('/peminjaman/proses') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_alat" id="id_alat">

                    <div class="info-box-peminjaman text-center mb-4">
                        <small class="text-uppercase fw-bold text-muted mb-2 d-block">Barang Dipilih</small>
                        <input type="text" id="nama_alat_display" class="form-control-plaintext text-center fw-bold text-primary fs-4 p-0" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap Peminjam</label>
                        <input type="text" name="nama_peminjam" class="form-control form-control-lg rounded-4 bg-light border-0"
                            value="<?= session()->get('nama') ?>" placeholder="Masukkan nama..." required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control rounded-4 border-0 bg-light"
                                value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small text-muted text-uppercase">Batas Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control rounded-4 border-0 bg-light"
                                value="<?= date('Y-m-d', strtotime('+3 days')) ?>" required>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-bold">Kuantitas</label>
                        <input type="number" name="jumlah" class="form-control form-control-lg rounded-4 bg-light border-0"
                            value="1" min="1" style="width: 120px;" required>
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="submit" class="btn btn-primary-custom btn-action w-100 py-3 fs-6">
                        Konfirmasi & Proses <i class="bi bi-chevron-right ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function setAlat(id, nama) {
        document.getElementById('id_alat').value = id;
        document.getElementById('nama_alat_display').value = nama;
    }
</script>

<?= $this->endSection() ?>