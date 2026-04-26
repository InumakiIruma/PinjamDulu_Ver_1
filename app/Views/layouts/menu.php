<div id="sidebar-wrapper" class="sidebar-wrapper py-4 px-3 d-flex flex-column h-100">

    <div class="d-flex d-lg-none justify-content-between align-items-center p-3 border-bottom mb-3">
        <span class="fw-bold text-primary">Menu Navigasi</span>
        <button class="btn-close" id="btnClose"></button>
    </div>

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

    <div class="px-2 mb-4 search-box-container">
        <div class="search-box-sidebar position-relative">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted" style="font-size: 0.8rem;"></i>
            <input type="text" class="form-control form-control-sm border-0 bg-light ps-5 rounded-3" placeholder="Cari menu..." style="font-size: 0.85rem; padding: 10px 0 10px 40px;">
        </div>
    </div>

    <div class="px-2 mb-4 dropdown">
        <a href="#" class="text-decoration-none d-block profile-card-link dropdown-toggle" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="profile-card d-flex align-items-center p-3 rounded-4 shadow-sm border-0">
                <div class="position-relative flex-shrink-0">
                    <img src="<?= base_url('uploads/users/' . (session()->get('foto') ?: 'default.png')) ?>"
                        class="avatar-img rounded-circle border border-2 border-white shadow-sm"
                        width="45" height="45" style="object-fit: cover;">
                    <span class="status-online-dot"></span>
                </div>

                <div class="ms-3 flex-grow-1 overflow-hidden text-start profile-info">
                    <p class="mb-0 fw-bold text-dark small text-truncate">
                        <?= session()->get('nama') ?: 'Guest' ?>
                    </p>
                    <?php
                    $role = session()->get('role');
                    $badgeClass = ($role == 'admin') ? 'bg-primary' : (($role == 'petugas') ? 'bg-success' : 'bg-secondary');
                    ?>
                    <span class="badge <?= $badgeClass ?> bg-opacity-10 text-<?= str_replace('bg-', '', $badgeClass) ?> border-0 fw-bold" style="font-size: 0.65rem; padding: 4px 8px;">
                        <?= strtoupper($role ?: 'GUEST') ?>
                    </span>
                </div>
                <i class="bi bi-chevron-down text-muted extra-small ms-1 dropdown-icon"></i>
            </div>
        </a>

        <ul class="dropdown-menu shadow border-0 rounded-4 w-100 mt-2 py-2" aria-labelledby="dropdownProfile">
            <li><a class="dropdown-item py-2 px-3" href="<?= base_url('/profile') ?>"><i class="bi bi-person-gear me-2 text-primary"></i> Edit Profil</a></li>
            <li><a class="dropdown-item py-2 px-3" href="<?= base_url('/help') ?>"><i class="bi bi-question-circle me-2 text-success"></i> Pusat Bantuan</a></li>
            <li><a class="dropdown-item py-2 px-3" href="<?= base_url('/settings') ?>"><i class="bi bi-gear me-2 text-secondary"></i> Pengaturan</a></li>
            <li>
                <hr class="dropdown-divider opacity-50">
            </li>
            <li><a class="dropdown-item py-2 px-3 text-danger fw-bold logout-btn" href="<?= base_url('/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Keluar Sistem</a></li>
        </ul>
    </div>

    <ul class="nav flex-column custom-nav">
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '' || uri_string() == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('/') ?>">
                <i class="bi bi-grid-1x2-fill me-3"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>

        <?php
        $peminjamanModel = new \App\Models\PeminjamanModel();
        $jumlahTelat = $peminjamanModel->where('status', 'dipinjam')->where('tgl_kembali <', date('Y-m-d'))->countAllResults();
        $totalDisplayNotif = ($totalNotif ?? 0) + $jumlahTelat;
        ?>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'notifikasi') ? 'active' : '' ?>" href="<?= base_url('notifikasi') ?>">
                <div class="position-relative d-flex align-items-center">
                    <i class="bi bi-bell-fill me-3"></i>
                    <?php if ($totalDisplayNotif > 0) : ?>
                        <span class="notif-dot badge rounded-pill bg-danger border border-white"><?= $totalDisplayNotif ?></span>
                    <?php endif; ?>
                </div>
                <span class="nav-text">Notifikasi</span>
            </a>
        </li>

        <div class="nav-divider">Transaksi</div>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peminjaman') ? 'active' : '' ?>" href="<?= base_url('/peminjaman') ?>">
                <i class="bi bi-cart-plus-fill me-3"></i> <span class="nav-text">Pilih Alat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peminjaman/history') ? 'active' : '' ?>" href="<?= base_url('/peminjaman/history') ?>">
                <i class="bi bi-clock-history me-3"></i> <span class="nav-text">Riwayat Saya</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peminjaman/pengembalian') ? 'active' : '' ?>" href="<?= base_url('peminjaman/pengembalian') ?>">
                <i class="bi bi-arrow-return-left me-3"></i> <span class="nav-text">Form Pengembalian</span>
            </a>
        </li>

        <?php if ($role == 'admin' || $role == 'petugas') : ?>
            <div class="nav-divider">Panel Operasional</div>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'peminjaman/permintaan') ? 'active' : '' ?>" href="<?= base_url('peminjaman/permintaan') ?>">
                    <i class="bi bi-envelope-paper-fill me-3"></i> <span class="nav-text">Permintaan</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role == 'admin') : ?>
            <div class="nav-divider">Data Master</div>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'alat') ? 'active' : '' ?>" href="<?= base_url('/alat') ?>">
                    <i class="bi bi-tools me-3"></i> <span class="nav-text">Daftar Alat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'users') ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
                    <i class="bi bi-people-fill me-3"></i> <span class="nav-text">User Manager</span>
                </a>
            </li>
        <?php endif; ?>

        <?php
        $db = \Config\Database::connect();
        $namaUser = session()->get('nama');
        $currentPinjam = 0;
        if ($namaUser) {
            $builder = $db->table('peminjaman');
            if ($role == 'admin') {
                $currentPinjam = $builder->whereIn('status', ['dipinjam', 'pending'])->countAllResults();
            } else {
                $currentPinjam = $builder->where('nama_peminjam', $namaUser)->whereIn('status', ['dipinjam', 'pending'])->countAllResults();
            }
        }
        $maxAlat = 10;
        $persen = ($currentPinjam > 0) ? ($currentPinjam / $maxAlat) * 100 : 0;
        if ($persen > 100) $persen = 100;
        ?>

        <div class="sidebar-stats-card p-3 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-10 mt-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="small fw-bold text-primary" style="font-size: 0.75rem;">Status Pinjam</span>
            </div>
            <div class="progress mb-2" style="height: 4px; background-color: rgba(67, 97, 238, 0.1);">
                <div class="progress-bar bg-primary" style="width: <?= $persen ?>%"></div>
            </div>
            <small class="text-muted d-block" style="font-size: 0.65rem;">
                <b><?= $currentPinjam ?> alat</b> aktif
            </small>
        </div>
    </ul>
</div>

<script>
    document.getElementById('closeSidebar')?.addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('sidebarOverlay').classList.remove('active');
    });
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarCollapse'); // Tombol di Navbar
        const content = document.getElementById('main-content'); // Sesuaikan dengan ID kontainer konten Anda

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');

                // Opsional: Jika Anda ingin konten utama melebar saat sidebar ciut
                if (content) {
                    content.classList.toggle('sidebar-collapsed');
                }

                // Simpan status di LocalStorage agar saat refresh halaman tetap collapsed/normal
                const isCollapsed = sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebarStatus', isCollapsed ? 'collapsed' : 'normal');
            });
        }

        // Cek status saat halaman dimuat
        if (localStorage.getItem('sidebarStatus') === 'collapsed') {
            sidebar.classList.add('collapsed');
            if (content) content.classList.add('sidebar-collapsed');
        }
    });
</script>

<style>
    /* Sidebar Default State */
    #sidebar {
        width: 280px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow-x: hidden;
    }

    /* Sidebar Collapsed State (Saat diciutkan) */
    #sidebar.collapsed {
        width: 85px;
    }

    /* Sembunyikan teks saat collapsed */
    #sidebar.collapsed .brand-text,
    #sidebar.collapsed .search-box-sidebar,
    #sidebar.collapsed .profile-card .ms-3,
    #sidebar.collapsed .profile-card .bi-chevron-down,
    #sidebar.collapsed .nav-link span,
    #sidebar.collapsed .nav-divider,
    #sidebar.collapsed .sidebar-stats-card {
        display: none !important;
    }

    /* Pusatkan ikon saat collapsed */
    #sidebar.collapsed .nav-link {
        justify-content: center;
        padding: 0.7rem 0 !important;
    }

    #sidebar.collapsed .nav-link i {
        margin-right: 0 !important;
        font-size: 1.4rem;
    }

    #sidebar.collapsed .brand-section {
        padding: 1.5rem 0.5rem;
        justify-content: center;
        display: flex;
    }

    #sidebar.collapsed .profile-card {
        padding: 0.75rem 0.5rem !important;
        justify-content: center;
    }

    #main-content {
        transition: all 0.3s ease;
        margin-left: 0;
        /* Sesuaikan dengan layout Anda */
    }

    /* Jika Anda menggunakan layout fixed sidebar */
    @media (min-width: 992px) {
        .sidebar-collapsed+.main-content {
            margin-left: 85px !important;
        }

        /* Saat sidebar normal */
        .nav-text {
            display: inline-block;
            transition: opacity 0.2s ease;
        }

        /* Saat sidebar DICIUTKAN (.collapsed) */
        #sidebar.collapsed .nav-text,
        #sidebar.collapsed .nav-divider,
        #sidebar.collapsed .brand-text,
        #sidebar.collapsed .sidebar-stats-card,
        #sidebar.collapsed .profile-info,
        #sidebar.collapsed .dropdown-icon,
        #sidebar.collapsed .search-box-sidebar {
            display: none !important;
            /* Hilangkan teks dan elemen pendukung */
        }

        #sidebar.collapsed .nav-link {
            justify-content: center;
            /* Ikon jadi di tengah */
            padding: 0.8rem 0 !important;
        }

        #sidebar.collapsed .nav-link i {
            margin-right: 0 !important;
            /* Hilangkan jarak kanan ikon */
            font-size: 1.3rem;
            /* Perbesar sedikit ikon agar terlihat proporsional */
        }

        #sidebar.collapsed .brand-section {
            justify-content: center;
            padding-left: 0 !important;
        }
    }

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

    /* Menghilangkan panah bawaan bootstrap pada profile card */
    .profile-card-link::after {
        display: none !important;
    }

    /* Animasi halus untuk dropdown menu */
    .dropdown-menu {
        animation: slideUp 0.3s ease;
        border: 1px solid #f1f5f9 !important;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item {
        font-size: 0.85rem;
        transition: all 0.2s;
    }

    .dropdown-item:hover {
        background-color: #f8fafc;
        transform: translateX(5px);
    }
</style>