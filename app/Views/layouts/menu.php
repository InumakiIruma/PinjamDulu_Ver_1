<!-- Wrapper diubah menjadi Top Navigation -->
<nav id="sidebar-wrapper" class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-2 px-3 sticky-top">
    <div class="container-fluid">

        <!-- Brand Section -->
        <a class="navbar-brand d-flex align-items-center me-4" href="<?= base_url('/') ?>">
            <div class="brand-icon-box shadow-primary flex-shrink-0 me-2" style="width: 35px; height: 35px; background: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-tools text-white" style="font-size: 1rem;"></i>
            </div>
            <span class="brand-text text-dark">
                <span class="fw-bold fs-5 text-primary">EquipGo</span><span class="fw-light fs-5">App</span>
            </span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 custom-nav align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link px-3 <?= (uri_string() == '' || uri_string() == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('/') ?>">
                        <i class="bi bi-grid-1x2-fill me-2"></i>Dashboard
                    </a>
                </li>

                <!-- PHP Logic Tetap Terjaga -->
                <?php
                $peminjamanModel = new \App\Models\PeminjamanModel();
                $jumlahTelat = $peminjamanModel->where('status', 'dipinjam')->where('tgl_kembali <', date('Y-m-d'))->countAllResults();
                $totalDisplayNotif = ($totalNotif ?? 0) + $jumlahTelat;
                ?>

                <li class="nav-item">
                    <a class="nav-link px-3 <?= (uri_string() == 'notifikasi') ? 'active' : '' ?>" href="<?= base_url('notifikasi') ?>">
                        <div class="position-relative d-inline-block me-2">
                            <i class="bi bi-bell-fill"></i>
                            <?php if ($totalDisplayNotif > 0) : ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem; padding: 0.35em 0.5em;">
                                    <?= $totalDisplayNotif ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        Notifikasi
                    </a>
                </li>

                <!-- Dropdown Transaksi -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="navTransaksi" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-cart-plus-fill me-2"></i>Transaksi
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm">
                        <li><a class="dropdown-item" href="<?= base_url('/peminjaman') ?>">Pilih Alat</a></li>
                        <?php if (session()->get('role') == 'admin' || session()->get('role') == 'petugas') : ?>
                            <li><a class="dropdown-item" href="<?= base_url('/peminjaman/history') ?>">Riwayat Peminjaman</a></li>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'anggota') : ?>
                            <li><a class="dropdown-item" href="<?= base_url('peminjaman/my_history') ?>">Riwayat Pinjam Saya</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="<?= base_url('peminjaman/pengembalian') ?>">Form Pengembalian</a></li>
                    </ul>
                </li>

                <!-- Role Based Menus -->
                <?php if (session()->get('role') == 'admin' || session()->get('role') == 'petugas') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" id="navAdmin" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-shield-lock-fill me-2"></i>Admin
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="<?= base_url('peminjaman/permintaan') ?>">Permintaan</a></li>
                            <?php if (session()->get('role') == 'admin') : ?>
                                <li><a class="dropdown-item" href="<?= base_url('denda') ?>">Data Denda</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('/alat') ?>">Daftar Alat</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/users') ?>">User Manager</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/logs') ?>">Activity Log</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Stats & Profile (Right Side) -->
            <div class="d-flex align-items-center ms-lg-3 gap-3">

                <!-- Stats Progress (Ringkas) -->
                <?php
                $db = \Config\Database::connect();
                $namaUser = session()->get('nama');
                $role = session()->get('role');
                $currentPinjam = 0;
                if ($namaUser) {
                    $builder = $db->table('peminjaman');
                    if ($role == 'admin') {
                        $currentPinjam = $builder->whereIn('status', ['dipinjam', 'pending'])->countAllResults();
                    } else {
                        $currentPinjam = $builder->where('nama_peminjam', $namaUser)->whereIn('status', ['dipinjam', 'pending'])->countAllResults();
                    }
                }
                $persen = ($currentPinjam > 0) ? ($currentPinjam / 10) * 100 : 0;
                ?>
                <div class="d-none d-xl-block" style="width: 100px;">
                    <div class="d-flex justify-content-between mb-1" style="font-size: 0.65rem;">
                        <span class="fw-bold">Pinjam</span>
                        <span><?= $currentPinjam ?>/10</span>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar" style="width: <?= $persen ?>%"></div>
                    </div>
                </div>

                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userMenu" data-bs-toggle="dropdown">
                        <img src="<?= base_url('uploads/users/' . (session()->get('foto') ?: 'default.png')) ?>" class="rounded-circle border" width="35" height="35" style="object-fit: cover;">
                        <div class="ms-2 d-none d-sm-block">
                            <p class="mb-0 fw-bold text-dark small" style="line-height: 1;"><?= session()->get('nama') ?: 'User' ?></p>
                            <small class="text-muted" style="font-size: 0.6rem;"><?= strtoupper(session()->get('role') ?: 'user') ?></small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2">
                        <li><a class="dropdown-item small" href="<?= base_url('/profile') ?>"><i class="bi bi-person me-2"></i> Profil</a></li>
                        <li><a class="dropdown-item small text-danger fw-bold" href="<?= base_url('/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Styling Navbar Baru */
    #sidebar-wrapper {
        font-family: 'Inter', sans-serif;
        z-index: 1030;
    }

    .nav-link {
        color: #64748b !important;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s;
        border-radius: 8px;
    }

    .nav-link:hover {
        color: #4361ee !important;
        background: rgba(67, 97, 238, 0.05);
    }

    .nav-link.active {
        color: #4361ee !important;
        font-weight: 700;
        background: rgba(67, 97, 238, 0.1);
    }

    .dropdown-menu {
        font-size: 0.85rem;
        border-radius: 12px;
        padding: 0.5rem;
    }

    .dropdown-item {
        padding: 0.6rem 1rem;
        border-radius: 8px;
        transition: transform 0.2s;
    }

    .dropdown-item:hover {
        background-color: #f8fafc;
        transform: translateX(3px);
        color: #4361ee;
    }

    /* Hilangkan panah default bootstrap jika mengganggu */
    .nav-link.dropdown-toggle::after {
        vertical-align: middle;
        margin-left: 0.5rem;
    }

    /* CSS Sidebar lama yang tidak perlu (lebar dsb) bisa dihapus di sini agar tidak konflik */
</style>

<script>
    /* Script diperingkas karena tidak perlu fungsi collapse sidebar samping lagi */
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Navbar Loaded Successfully");
    });
</script>