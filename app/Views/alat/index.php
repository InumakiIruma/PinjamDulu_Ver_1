<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Daftar Inventaris Alat</h4>
            <p class="text-muted small mb-0">Kelola dan pantau seluruh aset alat dalam satu tabel.</p>
        </div>
        <a href="<?= base_url('alat/tambah') ?>" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Alat
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div><?= session()->getFlashdata('success') ?></div>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted border-0">No</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted border-0">Nama Alat</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted border-0">Kategori</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted border-0">Stok</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted border-0">Status</th>
                            <th class="pe-4 py-3 text-uppercase small fw-bold text-muted border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($alat as $item): ?>
                            <?php
                            // Logika Badge Warna Soft
                            $status = strtolower($item['status']);
                            $badgeClass = 'bg-secondary';
                            if ($status == 'tersedia') $badgeClass = 'bg-success';
                            if ($status == 'dipinjam') $badgeClass = 'bg-primary';
                            if ($status == 'rusak' || $status == 'perbaikan') $badgeClass = 'bg-danger';
                            ?>
                            <tr>
                                <td class="ps-4 fw-medium text-muted"><?= $no++; ?></td>
                                <td>
                                    <span class="fw-bold text-dark"><?= $item['nama_alat']; ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-normal px-2 py-1">
                                        <?= $item['kategori']; ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-archive me-2 text-muted"></i>
                                        <?= $item['stok']; ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge <?= $badgeClass ?> bg-opacity-10 text-<?= str_replace('bg-', '', explode(' ', $badgeClass)[0]) ?> border-0 px-3 py-2">
                                        <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>
                                        <?= ucfirst($item['status']); ?>
                                    </span>
                                </td>
                                <td class="pe-4 text-center">
                                    <a href="<?= base_url('alat/edit/' . $item['id']); ?>" class="btn btn-light btn-sm rounded-pill px-3 border shadow-sm">
                                        <i class="bi bi-pencil-square text-primary me-1"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling agar baris tabel lebih cantik saat hover */
    .table-hover tbody tr:hover {
        background-color: #f8fafc !important;
        transition: 0.2s;
    }

    .table thead th {
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }
</style>

<?= $this->endSection() ?>