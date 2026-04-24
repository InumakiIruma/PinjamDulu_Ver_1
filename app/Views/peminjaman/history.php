<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #f4f7fa;
    }

    /* Sembunyikan elemen yang tidak perlu saat dicetak */
    @media print {

        .sidebar-wrapper,
        .btn-print,
        .btn-detail,
        .page-header p,
        .navbar,
        .footer {
            display: none !important;
        }

        .container {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
        }

        .table {
            width: 100% !important;
            border: 1px solid #000 !important;
        }

        .page-header h4 {
            text-align: center;
            margin-bottom: 20px;
        }
    }

    .page-header {
        background: #ffffff;
        padding: 1.5rem 2rem;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border-left: 6px solid #4361ee;
    }

    .btn-print {
        background-color: #ffffff;
        color: #334155;
        border: 1px solid #e2e8f0;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-print:hover {
        background-color: #f8fafc;
        border-color: #4361ee;
        color: #4361ee;
    }

    .custom-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04);
    }

    .table thead th {
        background-color: #f8fafc;
        color: #64748b;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1.25rem 1rem;
    }

    .badge-status {
        font-size: 0.75rem;
        padding: 0.5rem 1rem;
        font-weight: 600;
    }

    .text-denda {
        color: #ef4444;
        font-weight: 700;
    }
</style>

<div class="container mt-4 pb-5">
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">
                <i class="bi bi-clock-history me-2 text-primary"></i>Riwayat Transaksi
            </h4>
            <p class="text-muted small mb-0">Daftar riwayat peminjaman alat dan status denda Anda.</p>
        </div>
        <div>
            <button onclick="window.print()" class="btn btn-print rounded-pill px-4 shadow-sm">
                <i class="bi bi-printer me-2"></i> Cetak Riwayat
            </button>
        </div>
    </div>

    <div class="card custom-card border-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 text-center" width="5%">No</th>
                        <th>Peminjam</th>
                        <th>Alat & Kategori</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Denda</th>
                        <th>Tgl Pinjam</th>
                        <th class="pe-4 text-center btn-detail">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peminjaman)) : ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3 opacity-25"></i>
                                Belum ada riwayat transaksi.
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php $no = 1;
                        foreach ($peminjaman as $row) : ?>
                            <tr>
                                <td class="ps-4 text-center text-muted fw-bold"><?= $no++ ?></td>
                                <td class="fw-bold text-dark"><?= $row['nama_peminjam'] ?></td>
                                <td>
                                    <div class="fw-medium"><?= $row['nama_alat'] ?></div>
                                    <small class="text-muted"><?= $row['kategori'] ?> (<?= $row['jumlah'] ?> Unit)</small>
                                </td>
                                <td class="text-center">
                                    <?php if ($row['status'] == 'pending') : ?>
                                        <span class="badge badge-status bg-warning text-dark rounded-pill">Menunggu</span>
                                    <?php elseif ($row['status'] == 'dipinjam') : ?>
                                        <span class="badge badge-status bg-primary rounded-pill">Dipinjam</span>
                                    <?php else : ?>
                                        <span class="badge badge-status bg-success rounded-pill">Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if (isset($row['denda']) && $row['denda'] > 0) : ?>
                                        <div class="text-denda small">Rp <?= number_format($row['denda'], 0, ',', '.') ?></div>
                                        <span class="badge bg-<?= ($row['status_denda'] == 'lunas') ? 'success' : 'danger' ?> px-2 py-1" style="font-size: 0.65rem;">
                                            <?= strtoupper($row['status_denda']) ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="small text-secondary">
                                    <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($row['tgl_pinjam'])) ?>
                                </td>
                                <td class="pe-4 text-center btn-detail">
                                    <a href="<?= base_url('peminjaman/detail/' . $row['id']) ?>" class="btn btn-light btn-sm rounded-pill border shadow-sm px-3">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>