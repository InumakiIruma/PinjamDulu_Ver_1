<div class="sidebar-wrapper py-4 px-3">
    <div class="brand-section mb-4 ps-2">
        <a class="text-decoration-none d-flex align-items-center" href="<?= base_url('/') ?>">
            <div class="brand-icon-box shadow-primary flex-shrink-0 me-2">
                <i class="bi bi-tools text-white"></i>
            </div>
            <span class="brand-text text-dark text-truncate">
                <span class="fw-bold fs-5">PinjamDulu</span>App
            </span>
        </a>
    </div>

    <div class="nav-item list-unstyled mb-4">
        <a href="<?= base_url('/profile') ?>" class="text-decoration-none d-block profile-card-link shadow-sm">
            <div class="profile-card d-flex align-items-center p-2 rounded-4">
                <div class="position-relative flex-shrink-0">
                    <img src="<?= base_url('uploads/users/' . (session()->get('foto') ?: 'default.png')) ?>"
                        class="avatar-img rounded-circle border border-2 border-white shadow-sm"
                        width="42" height="42" style="object-fit: cover;">
                    <span class="status-online-dot"></span>
                </div>

                <div class="ms-2 flex-grow-1 overflow-hidden" style="min-width: 0;">
                    <p class="mb-0 fw-bold text-dark small text-truncate" title="<?= session()->get('nama') ?>">
                        <?= session()->get('nama') ?: 'Guest' ?>
                    </p>
                    <?php
                    $role = session()->get('role');
                    $badgeColor = ($role == 'admin') ? 'role-admin' : (($role == 'petugas') ? 'role-staff' : 'role-user');
                    ?>
                    <div class="d-flex">
                        <span class="role-label <?= $badgeColor ?> text-truncate">
                            <i class="bi <?= ($role == 'admin') ? 'bi-shield-lock' : (($role == 'petugas') ? 'bi-person-badge' : 'bi-person') ?> me-1"></i>
                            <?= strtoupper($role ?: 'GUEST') ?>
                        </span>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-muted small flex-shrink-0 ms-1"></i>
            </div>
        </a>
    </div>

    <ul class="nav flex-column custom-nav">
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '' || uri_string() == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('/') ?>">
                <i class="bi bi-grid-1x2-fill flex-shrink-0 me-3"></i>
                <span class="text-truncate">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'notifikasi') ? 'active' : '' ?>" href="<?= base_url('notifikasi') ?>">
                <div class="position-relative me-3 d-flex align-items-center">
                    <i class="bi bi-bell-fill"></i>
                    <?php if (isset($totalNotif) && $totalNotif > 0) : ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem; padding: 0.25em 0.5em;">
                            <?= $totalNotif ?>
                        </span>
                    <?php endif; ?>
                </div>
                <span class="text-truncate">Notifikasi</span>
            </a>
        </li>

        <div class="nav-divider">Transaksi</div>
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peminjaman') ? 'active' : '' ?>" href="<?= base_url('/peminjaman') ?>">
                <i class="bi bi-cart-plus-fill flex-shrink-0 me-3"></i>
                <span class="text-truncate">Pilih Alat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peminjaman/history') ? 'active' : '' ?>" href="<?= base_url('/peminjaman/history') ?>">
                <i class="bi bi-clock-history flex-shrink-0 me-3"></i>
                <span class="text-truncate">Riwayat Saya</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('peminjaman/pengembalian') ?>" class="nav-link <?= (uri_string() == 'peminjaman/pengembalian') ? 'active' : '' ?>">
                <i class="bi bi-arrow-return-left flex-shrink-0 me-3"></i>
                <span class="text-truncate">Pengembalian</span>
            </a>
        </li>

        <?php if ($role == 'admin' || $role == 'petugas') : ?>
            <div class="nav-divider text-primary">Panel Operasional</div>

            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'peminjaman/permintaan') ? 'active' : '' ?>" href="<?= base_url('peminjaman/permintaan') ?>">
                    <i class="bi bi-envelope-paper-fill flex-shrink-0 me-3"></i>
                    <span class="text-truncate">Permintaan Pinjam</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'laporan') ? 'active' : '' ?>" href="<?= base_url('/laporan') ?>">
                    <i class="bi bi-file-earmark-bar-graph-fill flex-shrink-0 me-3"></i>
                    <span class="text-truncate">Laporan</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role == 'admin') : ?>
            <div class="nav-divider">Data Master</div>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'alat') ? 'active' : '' ?>" href="<?= base_url('/alat') ?>">
                    <i class="bi bi-tools flex-shrink-0 me-3"></i>
                    <span class="text-truncate">Daftar Alat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'kategori') ? 'active' : '' ?>" href="<?= base_url('/kategori') ?>">
                    <i class="bi bi-tags-fill flex-shrink-0 me-3"></i>
                    <span class="text-truncate">Kategori Alat</span>
                </a>
            </li>

            <div class="nav-divider">User Management</div>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'users') ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
                    <i class="bi bi-people-fill flex-shrink-0 me-3"></i>
                    <span class="text-truncate">Manajemen User</span>
                </a>
            </li>
        <?php endif; ?>

        <hr class="my-4 mx-2 opacity-25">

        <li class="nav-item mb-4">
            <a class="nav-link logout-btn text-danger fw-bold" href="<?= base_url('/logout') ?>">
                <i class="bi bi-box-arrow-right me-3"></i> Keluar Sistem
            </a>
        </li>
    </ul>
</div>

<style>
    .sidebar-wrapper {
        background-color: #ffffff !important;
        min-height: 100vh;
        overflow-x: hidden;
        border-right: 1px solid #f1f5f9;
        font-family: 'Inter', sans-serif;
    }

    .custom-nav .nav-link i {
        font-size: 1.15rem;
        width: 20px;
        text-align: center;
    }

    .brand-icon-box {
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, #4361ee, #4cc9f0);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }

    .shadow-primary { box-shadow: 0 4px 12px rgba(67, 97, 238, 0.4); }

    .profile-card {
        background: #f8fafc;
        border: 1px solid #eef2f6;
        transition: all 0.3s ease;
    }

    .role-label {
        font-size: 8px;
        font-weight: 800;
        padding: 2px 6px;
        border-radius: 5px;
        text-transform: uppercase;
    }

    .role-admin { background: #e0e7ff; color: #4361ee; }
    .role-staff { background: #dcfce7; color: #16a34a; }
    .role-user { background: #f1f5f9; color: #64748b; }

    .custom-nav .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        margin-bottom: 4px;
        color: #64748b;
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .custom-nav .nav-link:hover {
        background: #f8fafc;
        color: #4361ee;
    }

    .custom-nav .nav-link.active {
        background: #4361ee;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
    }

    .nav-divider {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        color: #94a3b8;
        margin: 20px 0 10px 15px;
        letter-spacing: 0.5px;
    }
</style>