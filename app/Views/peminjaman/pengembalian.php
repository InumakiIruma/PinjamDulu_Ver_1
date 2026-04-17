<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #121212;
        color: #e0e0e0;
    }

    .card {
        background-color: #1e1e1e;
        border: 1px solid #2d2d2d;
        border-radius: 15px;
    }

    .table {
        color: #e0e0e0;
    }

    .table-light {
        background-color: #252525 !important;
        color: #bb86fc !important;
        border-bottom: 2px solid #2d2d2d;
    }

    .text-purple {
        color: #bb86fc;
    }

    /* Penyesuaian alert agar kontras di dark mode */
    .alert-success {
        background-color: #1b5e20;
        color: #d4edda;
        border: none;
    }
</style>

<div class="container mt-4">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <h4 class="fw-bold text-white">
                <i class="bi bi-arrow-return-left text-purple me-2"></i>
                Form Pengembalian Alat
            </h4>
            <p class="text-muted">Silakan pilih alat yang ingin dikembalikan. Daftar di bawah adalah alat dengan status <b>Dipinjam</b>.</p>
            <hr style="border-color: #2d2d2d;">
        </div>
    </div>

    <div class="card shadow-lg border-0 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Peminjam</th>
                            <th>Alat</th>
                            <th class="text-center">Jumlah</th>
                            <th>Tgl Pinjam</th>
                            <th class="text-center pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($peminjaman)) : ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-box2-heart fs-1 d-block mb-3 opacity-25"></i>
                                    <span>Tidak ada pinjaman aktif saat ini.</span>
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php $no = 1;
                            foreach ($peminjaman as $row) : ?>
                                <tr style="border-bottom: 1px solid #2d2d2d;">
                                    <td class="ps-4 text-muted"><?= $no++ ?></td>
                                    <td class="fw-bold text-white"><?= $row['nama_peminjam'] ?? '-' ?></td>
                                    <td>
                                        <div class="fw-bold text-purple"><?= $row['nama_alat'] ?></div>
                                        <small class="text-muted">ID Pinjam: #<?= $row['id'] ?></small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill border border-secondary text-muted px-3">
                                            <?= $row['jumlah'] ?> Unit
                                        </span>
                                    </td>
                                    <td class="text-muted small"><?= date('d M Y', strtotime($row['tgl_pinjam'])) ?></td>
                                    <td class="text-center pe-4">
                                        <button type="button"
                                            class="btn btn-outline-success btn-sm rounded-pill px-4"
                                            onclick="konfirmasiKembali('<?= base_url('peminjaman/kembalikan/' . $row['id']) ?>')">
                                            <i class="bi bi-check2-circle me-1"></i> Kembalikan
                                        </button>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function konfirmasiKembali(url) {
        Swal.fire({
            title: 'Konfirmasi Pengembalian',
            text: "Apakah Anda yakin ingin mengembalikan alat ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#bb86fc',
            cancelButtonColor: '#2d2d2d',
            confirmButtonText: 'Ya, Kembalikan',
            cancelButtonText: 'Batal',
            background: '#1e1e1e',
            color: '#fff',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
</script>

<?= $this->endSection() ?>