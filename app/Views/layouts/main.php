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
            --sidebar-width: 280px;
        }

        body {
            /* Menggunakan font system yang lebih modern dan bersih */
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: var(--soft-bg);
            color: #1e293b;
            margin: 0;
            overflow-x: hidden;
            /* Mencegah scroll horizontal yang tidak perlu */
        }

        /* 1. Sidebar Container */
        .sidebar {
            width: var(--sidebar-width);
            min-width: var(--sidebar-width);
            background-color: #ffffff;
            position: sticky;
            /* Sidebar tetap di tempat saat konten di-scroll */
            top: 0;
            height: 100vh;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            z-index: 1000;
            transition: all 0.3s ease;

            /* FITUR SCROLL: Menambahkan scroll jika menu terlalu panjang */
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* 2. Main Content Area */
        .content {
            flex-grow: 1;
            padding: 2rem;
            /* Ruang napas yang lebih lega */
            background-color: var(--soft-bg);
            min-width: 0;
            /* Penting untuk mencegah overflow pada flex child */
            animation: fadeIn 0.5s ease-out;
            /* Animasi halus saat pindah halaman */
        }

        /* 3. Custom SweetAlert2 Refinement */
        .swal2-popup {
            border-radius: 24px !important;
            padding: 2rem !important;
            font-family: 'Inter', sans-serif !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1) !important;
        }

        .swal2-title {
            font-weight: 700 !important;
            color: #1e293b !important;
        }

        .swal2-confirm {
            border-radius: 12px !important;
            font-weight: 600 !important;
            padding: 12px 30px !important;
        }

        .swal2-cancel {
            border-radius: 12px !important;
            font-weight: 600 !important;
            padding: 12px 30px !important;
        }

        /* 4. Scrollbar Refinement untuk seluruh halaman */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--soft-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }

        /* Khusus scrollbar sidebar agar lebih minimalis */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        /* 5. Page Transition Animation */
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

        /* Responsivitas Dasar */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                /* Sidebar mengecil di tablet */
                min-width: 80px;
            }

            .content {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div id="sidebar" class="sidebar">
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mencari semua element dengan class logout-btn
            const logoutButtons = document.querySelectorAll('.logout-btn');

            logoutButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Stop link agar tidak langsung pindah halaman
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
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>