<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-header bg-primary text-white p-3">
            <h5 class="mb-0">Tambah Alat Baru</h5>
        </div>
        <div class="card-body p-4">
            <form action="<?= base_url('alat/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Nama Alat</label>
                    <input type="text" name="nama_alat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="1" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Alat (Optional)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Simpan Alat</button>
                    <a href="<?= base_url('peminjaman') ?>" class="btn btn-light px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>