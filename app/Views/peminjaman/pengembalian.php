<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #f4f7fa;
        color: #334155;
        min-height: 100vh;
    }

    /* Header Section */
    .page-header {
        background: #ffffff;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        border-left: 6px solid #4361ee;
    }

    /* Modern Card */
    .custom-card {
        background: #ffffff;
        border-radius: 24px;
        border: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    /* Table Styling */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #f8fafc;
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f1f5f9 !important;
    }

    .table td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }

    /* Item Info */
    .item-box {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .icon-shape {
        width: 42px;
        height: 42px;
        background: #eef2ff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4361ee;
        font-size: 1.1rem;
    }

    /* Badges & Buttons */
    .badge-unit {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #d1fae5;
        font-weight: 600;
        padding: 0.5rem 1rem;
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
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
    }

    /* Alert Styling */
    .alert-custom {
        background: #ffffff;
        border-left: 5px solid #10b981;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        color: #065f46;
    }
</style>

<div class="container py-4">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-custom alert-dismissible fade show mb-4 shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div>
                    <strong class="d-block">Berhasil!</strong>
                    <span class="small"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold text-dark mb-1">Pengembalian Alat</h3>
            <p class="text-muted mb-0 small">Daftar alat yang sedang dipinjam dan perlu dikembalikan.</p>
        </div>
        <div class="d-none d-md-block">
            <i class="bi bi-arrow-return-left display-6 text-light"></i>
        </div>
    </div>

    <div class="custom-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Informasi Alat</th>
                        <th>Peminjam</th>
                        <th class="text-center">Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peminjaman)) : ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="py-4">
                                    <i class="bi bi-clipboard-check display-4 text-muted opacity-25 mb-3 d-block"></i>
                                    <h5 class="text-muted fw-normal">Tidak ada tanggungan peminjaman alat.</h5>
                                </div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php $no = 1;
                        foreach ($peminjaman as $row) : ?>
                            <tr>
                                <td class="text-center text-muted fw-bold"><?= $no++ ?></td>
                                <td>
                                    <div class="item-box">
                                        <div class="icon-shape shadow-sm">
                                            <i class="bi bi-box-seam"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0"><?= $row['nama_alat'] ?></div>
                                            <span class="text-muted small">ID: #<?= $row['id'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark"><?= $row['nama_peminjam'] ?? 'User' ?></div>
                                    <small class="text-muted">Peminjam Aktif</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-unit rounded-pill">
                                        <?= $row['jumlah'] ?> Unit
                                    </span>
                                </td>
                                <td>
                                    <div class="small fw-medium text-secondary">
                                        <i class="bi bi-calendar-event me-1"></i> <?= date('d M Y', strtotime($row['tgl_pinjam'])) ?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button type="button"
                                        class="btn btn-kembali btn-sm rounded-pill shadow-sm"
                                        onclick="konfirmasiKembali('<?= base_url('peminjaman/kembalikan/' . $row['id']) ?>')">
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
            title: 'Kembalikan Alat?',
            text: "Pastikan alat sudah diperiksa dan dalam kondisi baik.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4361ee',
            cancelButtonColor: '#f1f5f9',
            confirmButtonText: 'Ya, Kembalikan',
            cancelButtonText: 'Batal',
            heightAuto: false,
            customClass: {
                popup: 'rounded-4',
                confirmButton: 'btn btn-primary px-4',
                cancelButton: 'btn btn-light text-dark px-4'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
</script>

<?= $this->endSection() ?>