<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4 pb-5">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark mb-1">Manajemen Inventaris</h3>
            <p class="text-muted mb-0">Total terdapat <?= count($alat); ?> aset alat terdaftar.</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <button type="button" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambahAlat">
                <i class="bi bi-plus-lg me-2"></i>Tambah Alat Baru
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-muted small fw-bold border-0">ALAT</th>
                            <th class="py-3 text-muted small fw-bold border-0">KATEGORI</th>
                            <th class="py-3 text-muted small fw-bold border-0">STOK</th>
                            <th class="py-3 text-muted small fw-bold border-0">STATUS</th>
                            <th class="py-3 text-muted small fw-bold border-0 text-end pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alat as $item): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-3 bg-light d-flex align-items-center justify-content-center overflow-hidden me-3" style="width: 50px; height: 50px;">
                                            <?php if (!empty($item['foto']) && file_exists(FCPATH . 'uploads/alat/' . $item['foto'])) : ?>
                                                <img src="<?= base_url('uploads/alat/' . $item['foto']) ?>" class="w-100 h-100" style="object-fit: cover;">
                                            <?php else : ?>
                                                <i class="bi bi-image text-muted opacity-50"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark"><?= $item['nama_alat']; ?></div>
                                            <small class="text-muted">ID: #ALT-<?= str_pad($item['id'], 3, '0', STR_PAD_LEFT); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-primary border-0 px-2 py-1 fw-medium">
                                        <?= $item['kategori']; ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold <?= $item['stok'] > 0 ? 'text-dark' : 'text-danger' ?>">
                                        <?= $item['stok']; ?> <span class="fw-normal text-muted small">Unit</span>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $status = strtolower($item['status']);
                                    $bg = 'bg-secondary';
                                    if ($status == 'tersedia') $bg = 'bg-success';
                                    if ($status == 'perbaikan') $bg = 'bg-warning text-dark';
                                    ?>
                                    <span class="badge <?= $bg ?> bg-opacity-10 text-<?= str_replace('bg-', '', explode(' ', $bg)[0]) ?> px-3 py-2 rounded-pill" style="font-size: 0.75rem;">
                                        ● <?= ucfirst($item['status']); ?>
                                    </span>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="btn-group shadow-sm rounded-pill overflow-hidden border">
                                        <a href="<?= base_url('alat/edit/' . $item['id']); ?>" class="btn btn-white btn-sm px-3 border-0" title="Edit">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                        <button type="button" class="btn btn-white btn-sm px-3 border-0 border-start"
                                            onclick="konfirmasiHapus('<?= base_url('alat/delete/' . $item['id']); ?>')" title="Hapus">
                                            <i class="bi bi-trash3 text-danger"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function konfirmasiHapus(url) {
        if (confirm("Apakah Anda yakin ingin menghapus alat ini? Data yang dihapus tidak bisa dikembalikan.")) {
            window.location.href = url;
        }
    }
</script>

<style>
    .btn-white {
        background: #fff;
    }

    .btn-white:hover {
        background: #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(67, 97, 238, 0.02) !important;
    }
</style>

<?= $this->endSection() ?>