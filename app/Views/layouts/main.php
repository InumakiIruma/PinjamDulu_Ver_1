<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> EquipGoApp </title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary-blue: #4361ee;
            --soft-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: rgba(0, 0, 0, 0.05);
        }

        [data-theme="dark"] {
            --soft-bg: #0f172a;
            --card-bg: #1e293b;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--soft-bg);
            color: var(--text-main);
            margin: 0;
            overflow-x: hidden;
            transition: background-color 0.3s ease;
        }

        /* --- CONTENT AREA REFINEMENT --- */
        .content {
            padding: 2rem;
            min-height: calc(100vh - 70px);
            /* Kurangi tinggi navbar */
            animation: fadeIn 0.5s ease-out;
        }

        /* Responsive Logic untuk layar kecil */
        @media (max-width: 992px) {
            .content {
                padding: 1rem;
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

        /* Merapikan tampilan sweetalert agar sesuai tema */
        .swal2-popup {
            font-family: 'Inter', sans-serif !important;
            border-radius: 15px !important;
        }
    </style>
</head>

<body>
    <script>
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>

    <!-- Memanggil Menu Atas yang baru -->
    <?php include(APPPATH . 'Views/layouts/menu.php'); ?>

    <!-- Wrapper Utama sekarang hanya berisi Konten -->
    <main id="main-content" class="content container-fluid">
        <?= $this->renderSection('content') ?>
    </main>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 1. Logic Logout Tetap Dipertahankan (Sinkron dengan tombol di menu.php)
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

            // 2. Dark Mode Toggle (Jika tombol ada di menu.php)
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