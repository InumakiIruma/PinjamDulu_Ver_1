<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold"><i class="bi bi-pencil-square text-primary me-2"></i> Edit Data Alat</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('alat/update/' . $alat['id']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Alat</label>
                            <input type="text" name="nama_alat" class="form-control rounded-3" value="<?= $alat['nama_alat'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Stok</label>
                            <input type="number" name="stok" class="form-control rounded-3" value="<?= $alat['stok'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Status Kondisi</label>
                            <select name="status" class="form-select rounded-3 shadow-none" required>
                                <option value="tersedia" <?= ($alat['status'] == 'tersedia') ? 'selected' : '' ?>>
                                    Tersedia
                                </option>
                                <option value="dipinjam" <?= ($alat['status'] == 'dipinjam') ? 'selected' : '' ?>>
                                    Sedang Dipinjam
                                </option>
                                <option value="perbaikan" <?= ($alat['status'] == 'perbaikan') ? 'selected' : '' ?>>
                                    Perbaikan (Maintenance)
                                </option>
                                <option value="rusak" <?= ($alat['status'] == 'rusak') ? 'selected' : '' ?>>
                                    Rusak / Tidak Layak
                                </option>
                            </select>
                            <div class="mt-2 d-flex align-items-center text-muted">
                                <i class="bi bi-info-circle-fill me-2" style="font-size: 0.85rem;"></i>
                                <small style="font-size: 0.75rem;">
                                    Status memengaruhi visibilitas alat di daftar peminjaman user.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('/alat') ?>" class="btn btn-light rounded-pill px-4">
                                <i class="bi bi-x-lg me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>