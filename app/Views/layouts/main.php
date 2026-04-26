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
        :root {
            --primary-blue: #4361ee;
            --soft-bg: #f8fafc;
            --sidebar-bg: #ffffff;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: rgba(0, 0, 0, 0.05);
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 85px;
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
            transition: background-color 0.3s ease;
        }

        /* --- WRAPPER UTAMA --- */
        .main-wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            min-height: 100vh;
        }

        /* --- SIDEBAR REFINEMENT --- */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg) !important;
            /* Ubah ke sticky agar tetap ikut scroll tapi dalam flow flex */
            position: sticky;
            top: 0;
            height: 100vh;
            border-right: 1px solid var(--border-color);
            z-index: 1050;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            flex-shrink: 0;
            /* Mencegah sidebar gepeng */
        }

        /* --- CONTENT AREA --- */
        .content {
            flex-grow: 1;
            /* Mengambil sisa ruang */
            min-width: 0;
            /* Penting agar konten di dalam flex tidak overflow */
            padding: 2rem;
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeIn 0.5s ease-out;
        }

        /* LOGIKA COLLAPSE DESKTOP */
        #sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        /* --- MOBILE NAVIGATION BAR --- */
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
            .main-wrapper {
                flex-direction: column;
                /* Stack vertikal di mobile */
            }

            .sidebar {
                position: fixed;
                /* Kembali ke fixed untuk efek slide-in mobile */
                transform: translateX(-100%);
                width: var(--sidebar-width) !important;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                padding: 1rem;
                width: 100%;
            }

            .mobile-nav {
                display: flex;
            }

            .sidebar-overlay.active {
                display: block;
            }
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

    <div class="main-wrapper">
        <div id="sidebar" class="sidebar shadow-sm">
            <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
        </div>

        <div id="main-content" class="content">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const btnToggleMobile = document.getElementById('btnToggle');

            // 1. Sinkronisasi status collapse Desktop
            if (localStorage.getItem('sidebarStatus') === 'collapsed' && window.innerWidth >= 992) {
                sidebar.classList.add('collapsed');
            }

            // 2. Logic Toggle Mobile
            function toggleSidebarMobile() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            }

            if (btnToggleMobile) btnToggleMobile.addEventListener('click', toggleSidebarMobile);
            if (overlay) overlay.addEventListener('click', toggleSidebarMobile);

            // 3. Logic Logout dengan SweetAlert2
            document.addEventListener('click', function(e) {
                const logoutBtn = e.target.closest('.logout-btn');
                if (logoutBtn) {
                    e.preventDefault();
                    const url = logoutBtn.getAttribute('href');
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
                }
            });

            // 4. Logic Dark Mode
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