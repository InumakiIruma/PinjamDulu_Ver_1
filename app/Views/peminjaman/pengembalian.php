<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #f4f7fa;
        color: #334155;
        min-height: 100vh;
    }

    .page-header {
        background: #ffffff;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        border-left: 6px solid #4361ee;
    }

    .custom-card {
        background: #ffffff;
        border-radius: 24px;
        border: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .table thead th {
        background-color: #f8fafc;
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .btn-kembali {
        background-color: #4361ee;
        color: white;
        font-weight: 600;
        border: none;
        padding: 0.6rem 1.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px 0 rgba(67, 97, 238, 0.3);
    }

    .btn-kembali:hover {
        background-color: #3730a3;
        transform: translateY(-2px);
        color: white;
    }

    .alert-success-custom {
        background-color: #d1fae5;
        color: #065f46;
        border: none;
        border-left: 5px solid #10b981;
        border-radius: 12px;
    }
</style>

<div class="container py-4">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success-custom alert-dismissible fade show mb-4 shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <h6 class="alert-heading mb-1 fw-bold">Berhasil!</h6>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="page-header">
        <h3 class="fw-bold text-dark mb-1">Pengembalian Alat</h3>
        <p class="text-muted mb-0 small">Daftar alat yang wajib dikembalikan oleh peminjam.</p>
    </div>

    <div class="custom-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Informasi Alat</th>
                        <th>Peminjam</th>
                        <th class="text-center">Deadline</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peminjaman)) : ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">Tidak ada peminjaman aktif yang perlu dikembalikan.</td>
                        </tr>
                    <?php else : ?>
                        <?php $no = 1;
                        foreach ($peminjaman as $row) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?= $row['nama_alat'] ?></div>
                                    <small class="text-muted">ID: #<?= $row['id'] ?></small>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark"><?= $row['nama_peminjam'] ?></div>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $is_late = strtotime($row['tgl_kembali']) < time();
                                    ?>
                                    <span class="badge <?= $is_late ? 'bg-danger-subtle text-danger' : 'bg-light text-dark' ?> px-3">
                                        <?= date('d M Y', strtotime($row['tgl_kembali'])) ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border rounded-pill px-3"><?= $row['jumlah'] ?> Unit</span>
                                </td>
                                <td class="text-center">
                                    <button type="button"
                                        class="btn btn-kembali btn-sm rounded-pill shadow-sm"
                                        onclick="konfirmasiKembali('<?= base_url('peminjaman/proses_kembali/' . $row['id']) ?>')">
                                        <i class="bi bi-arrow-counterclockwise me-1"></i> Kembalikan
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function konfirmasiKembali(url) {
        Swal.fire({
            title: 'Proses Pengembalian?',
            text: "Pastikan kondisi alat dalam keadaan baik. Denda akan otomatis muncul jika terlambat.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4361ee',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Kembalikan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

<?= $this->endSection() ?>