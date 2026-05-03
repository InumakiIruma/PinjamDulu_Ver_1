<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    :root {
        --primary-indigo: #6366f1;
        --secondary-violet: #8b5cf6;
        --surface-card: rgba(255, 255, 255, 0.85);
        --text-heading: #0f172a;
        --text-body: #64748b;
    }

    body {
        background: radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.05) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.05) 0px, transparent 50%),
            #f8fafc;
        color: var(--text-body);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Glass Effect Card */
    .glass-card {
        background: var(--surface-card);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 24px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
    }

    /* Stats Card Detail */
    .stat-card {
        border: none;
        position: relative;
        overflow: hidden;
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        background: var(--primary-indigo);
        filter: blur(80px);
        opacity: 0.1;
        top: -20px;
        right: -20px;
    }

    /* Table Design */
    .table-modern {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-modern thead th {
        background: transparent;
        color: var(--text-heading);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        border: none;
        padding: 15px 20px;
    }

    .table-modern tbody tr {
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease;
    }

    .table-modern tbody tr:hover {
        transform: scale(1.005);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
    }

    .table-modern td {
        padding: 18px 20px;
        border: none;
    }

    .table-modern td:first-child {
        border-radius: 16px 0 0 16px;
    }

    .table-modern td:last-child {
        border-radius: 0 16px 16px 0;
    }

    /* Button Gradient */
    .btn-gradient {
        background: linear-gradient(135deg, var(--primary-indigo), var(--secondary-violet));
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 24px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.25);
    }

    .btn-gradient:hover {
        opacity: 0.9;
        color: white;
        transform: translateY(-1px);
    }

    /* Custom Badge */
    .badge-status {
        padding: 8px 14px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
    }
</style>

<div class="container-fluid py-5 px-lg-5">

    <!-- Header Section -->
    <div class="row mb-5 align-items-center">
        <div class="col-lg-6">
            <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-bold">DASHBOARD OVERVIEW</span>
            <h1 class="text-heading fw-bold display-5 mb-1" style="letter-spacing: -2px;">Manage Assets.</h1>
            <p class="mb-0 text-muted">Selamat datang, <b><?= session()->get('nama') ?></b>. Pantau semua aset dalam satu layar.</p>
        </div>
        <div class="col-lg-6 text-lg-end mt-4 mt-lg-0">
            <div class="d-inline-flex bg-white p-2 rounded-4 shadow-sm border">
                <div class="px-3 border-end">
                    <small class="d-block text-muted">Date Today</small>
                    <span class="fw-bold text-dark"><?= date('d M, Y') ?></span>
                </div>
                <div class="px-3">
                    <small class="d-block text-muted">System Status</small>
                    <span class="text-success fw-bold"><i class="bi bi-circle-fill small me-1"></i> Operational</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="glass-card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted small fw-bold">TOTAL ASSETS</h6>
                        <h2 class="text-heading fw-bold mb-0"><?= $totalAlat ?></h2>
                    </div>
                    <div class="p-3 bg-primary-subtle rounded-4 text-primary">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted small fw-bold">AVAILABLE</h6>
                        <h2 class="text-success fw-bold mb-0"><?= $totalTersedia ?></h2>
                    </div>
                    <div class="p-3 bg-success-subtle rounded-4 text-success">
                        <i class="bi bi-check2-circle fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted small fw-bold">ON LOAN</h6>
                        <h2 class="text-heading fw-bold mb-0"><?= $totalDipinjam ?></h2>
                    </div>
                    <div class="p-3 bg-indigo-subtle rounded-4 text-indigo" style="background: #e0e7ff; color: #4338ca;">
                        <i class="bi bi-arrow-left-right fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted small fw-bold">OVERDUE</h6>
                        <h2 class="text-danger fw-bold mb-0"><?= $totalTerlambat ?></h2>
                    </div>
                    <div class="p-3 bg-danger-subtle rounded-4 text-danger">
                        <i class="bi bi-exclamation-octagon fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Table Section -->
        <div class="col-xl-8">
            <div class="glass-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-heading fw-bold mb-0">Recent Activity</h5>
                    <a href="<?= base_url('/peminjaman/history') ?>" class="btn btn-light btn-sm rounded-3 fw-bold">View Reports</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-modern align-middle">
                        <thead>
                            <tr>
                                <th>BORROWER</th>
                                <th>ASSET NAME</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($permintaanTerbaru)) : ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5">No transaction found.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($permintaanTerbaru as $p) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($p['nama_peminjam']) ?>&background=random" class="rounded-circle me-3" width="38">
                                                <span class="fw-bold text-heading"><?= $p['nama_peminjam'] ?></span>
                                            </div>
                                        </td>
                                        <td><span class="fw-medium"><?= $p['nama_alat'] ?></span></td>
                                        <td><small class="text-muted"><?= date('d/m/Y', strtotime($p['tgl_pinjam'])) ?></small></td>
                                        <td>
                                            <?php if ($p['status'] == 'pending'): ?>
                                                <span class="badge-status bg-warning-subtle text-warning">Waiting</span>
                                            <?php elseif ($p['status'] == 'dipinjam'): ?>
                                                <span class="badge-status bg-primary-subtle text-primary">Active</span>
                                            <?php else: ?>
                                                <span class="badge-status bg-success-subtle text-success">Finished</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('/peminjaman/detail/' . $p['id']) ?>" class="btn btn-light btn-sm rounded-3"><i class="bi bi-chevron-right"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Action Sidebar -->
        <div class="col-xl-4">
            <div class="glass-card p-4 mb-4">
                <h5 class="text-heading fw-bold mb-4">Control Center</h5>
                <div class="d-grid gap-3">
                    <?php if (session()->get('role') == 'admin') : ?>
                        <button class="btn btn-gradient py-3" data-bs-toggle="modal" data-bs-target="#modalTambahAlat">
                            <i class="bi bi-plus-lg me-2"></i> Register New Asset
                        </button>
                    <?php endif; ?>
                    <a href="<?= base_url('/peminjaman') ?>" class="btn btn-light py-3 border fw-bold rounded-4">
                        <i class="bi bi-qr-code-scan me-2"></i> Create New Loan
                    </a>
                </div>
            </div>

            <!-- Promotion / Info Card -->
            <div class="glass-card p-4 bg-primary text-white border-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #4338ca, #6366f1) !important;">
                <div class="position-relative z-1">
                    <h6 class="fw-bold mb-2">Automated Inventory</h6>
                    <p class="small opacity-75 mb-0">Sistem secara otomatis akan mengunci stok saat permintaan peminjaman masuk.</p>
                </div>
                <i class="bi bi-cpu position-absolute" style="font-size: 100px; right: -20px; bottom: -20px; opacity: 0.1;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Modal Glass Style -->
<div class="modal fade" id="modalTambahAlat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card border-0 p-3">
            <div class="modal-header border-0">
                <h5 class="fw-bold text-heading">New Asset Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('/alat/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Input Nama Alat -->
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_alat" class="form-control border-0 bg-light rounded-4" id="na" placeholder="Name" required>
                        <label for="na">Asset Name</label>
                    </div>

                    <!-- Row Kategori & Stok -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="kategori" class="form-select border-0 bg-light rounded-4">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Kamera">Kamera</option>
                                </select>
                                <label>Category</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="stok" class="form-control border-0 bg-light rounded-4" value="1">
                                <label>Quantity</label>
                            </div>
                        </div>
                    </div>

                    <!-- Input Foto Baru -->
                    <div class="mb-2">
                        <label class="small text-muted fw-bold mb-2 ms-2">ASSET PHOTO</label>
                        <div class="p-3 bg-light rounded-4 text-center" style="border: 2px dashed #dee2e6;">
                            <input type="file" name="foto" class="form-control form-control-sm border-0 bg-transparent" accept="image/*">
                            <small class="text-muted d-block mt-1">Format: JPG, PNG (Max 2MB)</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-gradient w-100 py-3 mt-2">Save Asset Information</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>