<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> PinjamDuluApp </title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* =========================================
        MAIN LAYOUT PREMIUM REFINEMENT
        ========================================= */
        :root {
            --primary-blue: #4361ee;
            --soft-bg: #f8fafc;
            --sidebar-bg: #ffffff;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: rgba(0, 0, 0, 0.05);
            --sidebar-width: 280px;
            --input-bg: #ffffff;
        }

        [data-theme="dark"] {
            --soft-bg: #0f172a;
            --sidebar-bg: #1e293b;
            --card-bg: #1e293b;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.1);
            --input-bg: #334155;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--soft-bg);
            color: var(--text-main);
            margin: 0;
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* --- SIDEBAR REFINEMENT --- */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg) !important;
            position: fixed;
            /* Berubah jadi fixed agar bisa di-slide di HP */
            top: 0;
            left: 0;
            height: 100vh;
            border-right: 1px solid var(--border-color);
            z-index: 1050;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        /* --- CONTENT AREA --- */
        .content {
            flex-grow: 1;
            padding: 2rem;
            margin-left: var(--sidebar-width);
            /* Beri ruang untuk sidebar */
            min-height: 100vh;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out;
        }

        /* --- MOBILE NAVIGATION BAR (Muncul hanya di HP) --- */
        .mobile-nav {
            display: none;
            background-color: var(--sidebar-bg);
            padding: 10px 15px;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1040;
            align-items: center;
            justify-content: space-between;
        }

        /* Overlay saat sidebar terbuka di HP */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1045;
            backdrop-filter: blur(2px);
        }

        /* --- RESPONSIVE LOGIC --- */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                /* Sembunyikan sidebar ke kiri */
            }

            .sidebar.active {
                transform: translateX(0);
                /* Munculkan saat diklik */
            }

            .content {
                margin-left: 0;
                /* Konten penuhi layar di HP */
                padding: 1rem;
            }

            .mobile-nav {
                display: flex;
                /* Aktifkan nav atas di HP */
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        /* Dark Mode Clean-up */
        [data-theme="dark"] .sidebar,
        [data-theme="dark"] .mobile-nav {
            background-color: var(--sidebar-bg) !important;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <script>
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>

    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <div class="mobile-nav shadow-sm">
        <button class="btn border-0 p-0 text-primary" id="btnToggle">
            <i class="bi bi-list fs-1"></i>
        </button>
        <span class="fw-bold text-primary">PinjamDulu</span>
        <div class="theme-toggle-btn fs-4 text-primary" style="cursor: pointer;">
            <i class="bi bi-moon-stars"></i>
        </div>
    </div>

    <div id="sidebar" class="sidebar shadow-sm">
        <div class="d-lg-none p-3 text-end">
            <button class="btn-close" id="btnClose"></button>
        </div>
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- 1. LOGIKA RESPONSIVE MENU ---
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const btnToggle = document.getElementById('btnToggle');
            const btnClose = document.getElementById('btnClose');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            }

            if (btnToggle) btnToggle.addEventListener('click', toggleSidebar);
            if (btnClose) btnClose.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);

            // --- 2. LOGIKA LOGOUT (Sesuai Kode Anda) ---
            const logoutButtons = document.querySelectorAll('.logout-btn');
            logoutButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    Swal.fire({
                        title: 'Yakin ingin keluar?',
                        text: "Sesi Anda akan diakhiri sekarang.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4361ee',
                        confirmButtonText: 'Ya, Keluar!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) window.location.href = url;
                    });
                });
            });

            // --- 3. LOGIKA DARK MODE (Sesuai Kode Anda) ---
            const themeToggles = document.querySelectorAll('.theme-toggle-btn');
            themeToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            });
        });
    </script>
</body>

</html>