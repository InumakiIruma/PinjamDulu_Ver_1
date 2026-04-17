<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h4 class="fw-bold text-dark"><i class="bi bi-cart-plus me-2 text-primary"></i>Pilih Alat untuk Dipinjam</h4>
            <p class="text-muted">Klik "Pinjam Alat" pada item yang ingin diproses.</p>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($alat as $a): ?>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                    <div class="bg-light d-flex align-items-center justify-content-center position-relative" style="height: 180px;">
                        <i class="bi bi-tools text-muted opacity-25" style="font-size: 4rem;"></i>
                        <?php if ($a['stok'] <= 0) : ?>
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                                <span class="badge bg-danger px-3 py-2 rounded-pill">Stok Habis</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-soft-primary text-primary border border-primary-subtle">
                                <?= $a['kategori']; ?>
                            </span>
                            <small class="<?= ($a['stok'] > 0) ? 'text-muted' : 'text-danger fw-bold' ?>">
                                Stok: <?= $a['stok']; ?>
                            </small>
                        </div>
                        <h5 class="card-title fw-bold mb-1 text-dark"><?= $a['nama_alat']; ?></h5>
                        <p class="card-text text-muted small mb-0">ID: #ALT-<?= str_pad($a['id'], 3, '0', STR_PAD_LEFT); ?></p>
                    </div>

                    <div class="card-footer bg-white border-0 pb-3">
                        <button class="btn btn-primary w-100 rounded-pill fw-bold py-2 shadow-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalPinjam"
                            onclick="setAlat('<?= $a['id']; ?>', '<?= $a['nama_alat']; ?>')"
                            <?= ($a['stok'] <= 0) ? 'disabled' : '' ?>>
                            <i class="bi bi-plus-circle me-1"></i> Pinjam Alat
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalPinjam" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold"><i class="bi bi-file-earmark-text me-2"></i>Formulir Peminjaman</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/peminjaman/proses') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_alat" id="id_alat">

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Alat yang Dipilih</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-box"></i></span>
                            <input type="text" id="nama_alat_display" class="form-control bg-light border-start-0 fw-bold" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Nama Peminjam</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-person"></i></span>
                            <input type="text" name="nama_peminjam" class="form-control border-start-0"
                                value="<?= session()->get('nama') ?>" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Estimasi Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control" value="<?= date('Y-m-d', strtotime('+3 days')) ?>" required>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-bold small text-muted text-uppercase">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="1" min="1" required>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-primary">
                        Konfirmasi Pinjam <i class="bi bi-arrow-right ms-1"></i>
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

<style>
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12) !important;
    }

    .bg-soft-primary {
        background-color: #f0f4ff;
    }

    .shadow-primary {
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.1);
    }

    .modal-content {
        overflow: hidden;
    }
</style>

<?= $this->endSection() ?>