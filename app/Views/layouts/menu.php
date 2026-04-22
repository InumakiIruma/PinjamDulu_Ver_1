<div id="sidebar" class="sidebar no-print">
    <div class="sidebar-wrapper py-4 px-3 d-flex flex-column h-100">
        <div class="brand-section mb-4 ps-2">
            <a class="text-decoration-none d-flex align-items-center" href="<?= base_url('/') ?>">
                <div class="brand-icon-box shadow-primary flex-shrink-0 me-2">
                    <i class="bi bi-tools text-white"></i>
                </div>
                <span class="brand-text text-dark">
                    <span class="fw-bold fs-5 text-primary">PinjamDulu</span><span class="fw-light fs-5">App</span>
                </span>
            </a>
        </div>

        <div class="px-2 mb-4">
            <div class="search-box-sidebar position-relative">
                <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted" style="font-size: 0.8rem;"></i>
                <input type="text" class="form-control form-control-sm border-0 bg-light ps-5 rounded-3" placeholder="Cari menu..." style="font-size: 0.85rem; padding: 10px 0 10px 40px;">
            </div>
        </div>

        <div class="nav-item list-unstyled mb-4">
            <a href="<?= base_url('/profile') ?>" class="text-decoration-none d-block profile-card-link">
                <div class="profile-card d-flex align-items-center p-3 rounded-4 shadow-sm border-0">
                    <div class="position-relative flex-shrink-0">
                        <img src="<?= base_url('uploads/users/' . (session()->get('foto') ?: 'default.png')) ?>"
                            class="avatar-img rounded-circle border border-2 border-white shadow-sm"
                            width="45" height="45" style="object-fit: cover;">
                        <span class="status-online-dot"></span>
                    </div>

                    <div class="ms-3 flex-grow-1 overflow-hidden">
                        <p class="mb-0 fw-bold text-dark small text-truncate">
                            <?= session()->get('nama') ?: 'Guest' ?>
                        </p>
                        <?php
                        $role = session()->get('role');
                        $badgeClass = ($role == 'admin') ? 'bg-primary' : (($role == 'petugas') ? 'bg-success' : 'bg-secondary');
                        ?>
                        <span class="badge <?= $badgeClass ?> bg-opacity-10 text-<?= str_replace('bg-', '', $badgeClass) ?> border-0 fw-bold" style="font-size: 0.65rem; padding: 4px 8px;">
                            <i class="bi <?= ($role == 'admin') ? 'bi-shield-lock' : (($role == 'petugas') ? 'bi-person-badge' : 'bi-person') ?> me-1"></i>
                            <?= strtoupper($role ?: 'GUEST') ?>
                        </span>
                    </div>
                    <i class="bi bi-chevron-right text-muted extra-small ms-1"></i>
                </div>
            </a>
        </div>

        <ul class="nav flex-column custom-nav">
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == '' || uri_string() == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('/') ?>">
                    <i class="bi bi-grid-1x2-fill me-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'notifikasi') ? 'active' : '' ?>" href="<?= base_url('notifikasi') ?>">
                    <div class="position-relative d-flex align-items-center">
                        <i class="bi bi-bell-fill me-3"></i>
                        <?php if (isset($totalNotif) && $totalNotif > 0) : ?>
                            <span class="notif-dot badge rounded-pill bg-danger border border-white">
                                <?= $totalNotif ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <span>Notifikasi</span>
                </a>
            </li>

            <div class="nav-divider">Transaksi</div>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'peminjaman') ? 'active' : '' ?>" href="<?= base_url('/peminjaman') ?>">
                    <i class="bi bi-cart-plus-fill me-3"></i>
                    <span>Pilih Alat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'peminjaman/history') ? 'active' : '' ?>" href="<?= base_url('/peminjaman/history') ?>">
                    <i class="bi bi-clock-history me-3"></i>
                    <span>Riwayat Saya</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('peminjaman/pengembalian') ?>" class="nav-link <?= (uri_string() == 'peminjaman/pengembalian') ? 'active' : '' ?>">
                    <i class="bi bi-arrow-return-left me-3"></i>
                    <span>Pengembalian</span>
                </a>
            </li>

            <?php if ($role == 'admin' || $role == 'petugas') : ?>
                <div class="nav-divider text-primary">Panel Operasional</div>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'peminjaman/permintaan') ? 'active' : '' ?>" href="<?= base_url('peminjaman/permintaan') ?>">
                        <i class="bi bi-envelope-paper-fill me-3"></i>
                        <span>Permintaan Pinjam</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'laporan') ? 'active' : '' ?>" href="<?= base_url('/laporan') ?>">
                        <i class="bi bi-file-earmark-bar-graph-fill me-3"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($role == 'admin') : ?>
                <div class="nav-divider">Data Master</div>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'alat') ? 'active' : '' ?>" href="<?= base_url('/alat') ?>">
                        <i class="bi bi-tools me-3"></i>
                        <span>Daftar Alat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'kategori') ? 'active' : '' ?>" href="<?= base_url('/kategori') ?>">
                        <i class="bi bi-tags-fill me-3"></i>
                        <span>Kategori Alat</span>
                    </a>
                </li>
                <div class="nav-divider">System Management</div>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'users') ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
                        <i class="bi bi-people-fill me-3"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'logs') ? 'active' : '' ?>" href="<?= base_url('/logs') ?>">
                        <i class="bi bi-journal-text me-3"></i>
                        <span>Log Aktivitas</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php
            $db = \Config\Database::connect();
            $namaUser = session()->get('nama');
            $role = session()->get('role'); // Ambil role dari session
            $currentPinjam = 0;

            if ($namaUser) {
                $builder = $db->table('peminjaman');

                // JIKA ADMIN: Hitung SEMUA yang statusnya belum kembali
                if ($role == 'admin') {
                    $currentPinjam = $builder->whereIn('status', ['dipinjam', 'pending'])
                        ->countAllResults();
                }
                // JIKA USER: Hanya hitung miliknya sendiri
                else {
                    $currentPinjam = $builder->where('nama_peminjam', $namaUser)
                        ->whereIn('status', ['dipinjam', 'pending'])
                        ->countAllResults();
                }
            }

            $maxAlat = 10;
            $persen = ($currentPinjam > 0) ? ($currentPinjam / $maxAlat) * 100 : 0;
            if ($persen > 100) $persen = 100;
            ?>

            <div class="sidebar-stats-card p-3 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-10">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small fw-bold text-primary" style="font-size: 0.75rem;">Status Pinjam</span>
                    <i class="bi bi-info-circle text-primary opacity-50" style="font-size: 0.75rem;"></i>
                </div>

                <div class="progress mb-2" style="height: 4px; background-color: rgba(67, 97, 238, 0.1);">
                    <div class="progress-bar bg-primary" style="width: <?= $persen ?>%"></div>
                </div>

                <small class="text-muted" style="font-size: 0.65rem;">
                    <b><?= $currentPinjam ?> alat</b> belum kembali
                </small>
            </div>`

            <div class="mt-auto pt-4">
                <hr class="mx-2 opacity-10">
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'help') ? 'active' : '' ?>" href="<?= base_url('/help') ?>">
                        <i class="bi bi-question-circle-fill me-3"></i>
                        <span>Pusat Bantuan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'settings') ? 'active' : '' ?>" href="<?= base_url('/settings') ?>">
                        <i class="bi bi-gear-fill me-3"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
                <?php if (session()->get('role') == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'backup') ? 'active' : '' ?>" href="<?= base_url('/backup') ?>">
                            <i class="bi bi-cloud-arrow-down-fill me-3"></i>
                            <span>Backup Database</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link logout-btn text-danger fw-bold" href="<?= base_url('/logout') ?>">
                        <i class="bi bi-box-arrow-right me-3"></i> Keluar Sistem
                    </a>
                </li>
            </div>
        </ul>
    </div>
</div>

<style>
    /* ORIGINAL STYLE PRESERVED 
       Penyatuan style baru tanpa merusak struktur asli
    */

    .sidebar-wrapper {
        background: #ffffff !important;
        min-height: 100vh;
        border-right: 1px solid #f1f5f9;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
    }

    .brand-section {
        padding: 1.5rem 1rem;
    }

    .brand-icon-box {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .brand-section:hover .brand-icon-box {
        transform: rotate(-5deg) scale(1.05);
    }

    .brand-text {
        font-size: 1.15rem;
        letter-spacing: -0.025em;
        color: #1e293b !important;
    }

    .profile-card-link {
        margin: 0 0.75rem;
        border-radius: 12px;
        transition: all 0.2s ease;
    }

    .profile-card {
        background: #f8fafc;
        border: 1px solid #f1f5f9 !important;
        padding: 0.75rem !important;
        transition: all 0.2s ease;
    }

    .profile-card:hover {
        background: #ffffff;
        border-color: #e2e8f0 !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05) !important;
        transform: translateY(-2px);
    }

    .avatar-img {
        border: 2px solid #fff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .status-online-dot {
        width: 12px;
        height: 12px;
        background: #22c55e;
        border: 2px solid #f8fafc;
        position: absolute;
        bottom: 0;
        right: 0;
        border-radius: 50%;
    }

    .custom-nav {
        padding: 0 0.75rem;
    }

    .custom-nav .nav-link {
        display: flex;
        align-items: center;
        padding: 0.7rem 1rem !important;
        margin-bottom: 0.25rem;
        color: #64748b;
        font-weight: 500;
        font-size: 0.9rem;
        border-radius: 10px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .custom-nav .nav-link:hover {
        background-color: #f1f5f9;
        color: #4361ee;
        transform: translateX(4px);
    }

    .custom-nav .nav-link i {
        font-size: 1.2rem;
        margin-right: 12px;
        color: #94a3b8;
        transition: color 0.2s ease;
    }

    .custom-nav .nav-link:hover i {
        color: #4361ee;
    }

    .custom-nav .nav-link.active {
        background: #4361ee !important;
        color: #ffffff !important;
        box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
    }

    .custom-nav .nav-link.active i {
        color: #ffffff !important;
    }

    .nav-divider {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #94a3b8;
        margin: 1.5rem 0 0.5rem 1rem;
        letter-spacing: 0.1em;
        opacity: 0.8;
    }

    .notif-dot {
        font-size: 0.6rem !important;
        padding: 0.25rem 0.4rem !important;
        background: #ef4444 !important;
        border: 2px solid #ffffff;
        top: -2px !important;
        left: 12px !important;
    }

    .logout-btn {
        margin: 0.5rem 0.75rem;
        border-radius: 10px;
        background: rgba(239, 68, 68, 0.05) !important;
        transition: all 0.2s ease;
    }

    .logout-btn:hover {
        background: #ef4444 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
    }

    /* ADDITIONAL STYLES FOR NEW FEATURES */
    .search-box-sidebar input {
        transition: all 0.2s ease;
    }

    .sidebar-stats-card {
        transition: all 0.3s ease;
    }

    .sidebar-wrapper::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    .mt-auto {
        margin-top: auto !important;
        padding-bottom: 1.5rem;
    }

    hr {
        margin: 1rem 0;
        border-color: #f1f5f9;
        opacity: 1;
    }
</style>