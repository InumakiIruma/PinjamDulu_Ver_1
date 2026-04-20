<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        /* Variabel untuk Dark Mode */
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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: var(--soft-bg);
            color: var(--text-main);
            margin: 0;
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* --- SIDEBAR REFINEMENT (Sapu Bersih Putih) --- */
        .sidebar {
            width: var(--sidebar-width);
            min-width: var(--sidebar-width);
            background-color: var(--sidebar-bg) !important;
            position: sticky;
            top: 0;
            height: 100vh;
            border-right: 1px solid var(--border-color);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        /* Paksa elemen di dalam sidebar yang punya class bg-white atau border putih jadi gelap */
        [data-theme="dark"] .sidebar,
        [data-theme="dark"] .sidebar div,
        [data-theme="dark"] .sidebar .bg-white,
        [data-theme="dark"] .sidebar .list-group-item,
        [data-theme="dark"] .sidebar .rounded-3 {
            background-color: var(--sidebar-bg) !important;
            color: var(--text-main) !important;
            border-color: var(--border-color) !important;
        }

        /* Mengatasi inline-style background putih yang sering ada di profil user */
        [data-theme="dark"] .sidebar [style*="background-color: white"],
        [data-theme="dark"] .sidebar [style*="background-color: #fff"],
        [data-theme="dark"] .sidebar [style*="background-color:#ffffff"] {
            background-color: var(--sidebar-bg) !important;
        }

        [data-theme="dark"] .sidebar a {
            color: var(--text-main) !important;
        }

        /* --- CONTENT & CARDS --- */
        .content {
            flex-grow: 1;
            padding: 2rem;
            background-color: var(--soft-bg);
            min-width: 0;
            animation: fadeIn 0.5s ease-out;
            transition: background-color 0.3s ease;
        }

        /* Sapu bersih semua card dan bg-white di area content */
        [data-theme="dark"] .card,
        [data-theme="dark"] .bg-white,
        [data-theme="dark"] .login-card {
            background-color: var(--card-bg) !important;
            border-color: var(--border-color) !important;
            color: var(--text-main) !important;
        }

        /* Form Controls Adjustment */
        .form-control,
        .form-select {
            background-color: var(--input-bg) !important;
            border-color: var(--border-color) !important;
            color: var(--text-main) !important;
        }

        /* Menyesuaikan semua jenis teks */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .fw-bold,
        b,
        strong,
        span,
        label {
            color: inherit;
            /* Ikuti warna parent kecuali ditentukan lain */
        }

        [data-theme="dark"] h1,
        [data-theme="dark"] h2,
        [data-theme="dark"] h3,
        [data-theme="dark"] h4,
        [data-theme="dark"] h5,
        [data-theme="dark"] h6,
        [data-theme="dark"] .fw-bold,
        [data-theme="dark"] b,
        [data-theme="dark"] strong {
            color: var(--text-main) !important;
        }

        .text-muted {
            color: var(--text-muted) !important;
        }

        /* --- SWEETALERT2 DARK --- */
        [data-theme="dark"] .swal2-popup {
            background: #1e293b !important;
            color: #f1f5f9 !important;
        }

        /* --- SCROLLBAR --- */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--soft-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        [data-theme="dark"] ::-webkit-scrollbar-thumb {
            background: #334155;
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

        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                min-width: 80px;
            }

            .content {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <script>
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>

    <div id="sidebar" class="sidebar">
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. LOGIKA LOGOUT
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
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Keluar!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) window.location.href = url;
                    });
                });
            });

            // 2. LOGIKA DARK MODE
            const themeToggle = document.querySelector('.theme-toggle-btn');
            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            }
        });
    </script>
</body>

</html>