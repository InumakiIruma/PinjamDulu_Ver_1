<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PinjamDuluApp</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        }

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #fff;
        }

        .login-wrapper {
            display: flex;
            height: 100vh;
        }

        /* SISI KIRI: Visual/Banner */
        .login-side-banner {
            flex: 1.2;
            background: var(--primary-gradient);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 40px;
            overflow: hidden;
        }

        /* Dekorasi Lingkaran di Background Banner */
        .login-side-banner::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            left: -100px;
        }

        .banner-content {
            position: relative;
            z-index: 10;
            max-width: 450px;
        }

        .banner-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.2);
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            backdrop-filter: blur(10px);
        }

        /* SISI KANAN: Form */
        .login-side-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #ffffff;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        /* Styling Input Tanpa Box (Minimalist Underline) */
        .input-box-custom {
            margin-bottom: 25px;
            position: relative;
        }

        .input-box-custom label {
            display: block;
            font-weight: 700;
            color: #1e293b;
            font-size: 0.85rem;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .input-box-custom input {
            width: 100%;
            border: none;
            border-bottom: 2px solid #e2e8f0;
            padding: 12px 0px;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
            background: transparent;
        }

        .input-box-custom input:focus {
            border-color: #4361ee;
        }

        /* Tombol Modern */
        .btn-main {
            background: #1e293b;
            color: white;
            border: none;
            width: 100%;
            padding: 16px;
            border-radius: 12px;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-main:hover {
            background: #4361ee;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
        }

        .btn-ghost {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #64748b;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 20px;
            padding: 12px;
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-ghost:hover {
            background: #f8fafc;
            color: #1e293b;
        }

        @media (max-width: 992px) {
            .login-side-banner {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-side-banner">
            <div class="banner-content">
                <div class="banner-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h1 class="display-4 fw-bold">PinjamDulu App</h1>
                <p class="lead opacity-75">Kelola peminjaman alat dengan lebih cepat, transparan, dan terorganisir dalam satu platform.</p>
            </div>
        </div>

        <div class="login-side-form">
            <div class="form-container">
                <div class="mb-5">
                    <h2 class="fw-bold text-dark">Sign In</h2>
                    <p class="text-muted">Masukkan kredensial Anda untuk melanjutkan.</p>
                </div>

                <?php if (session()->getFlashdata('error') || session()->getFlashdata('salahpw')): ?>
                    <div class="alert alert-danger border-0 small rounded-3 mb-4">
                        <i class="bi bi-shield-exclamation me-2"></i>
                        <?= session()->getFlashdata('error') ?: session()->getFlashdata('salahpw') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/proses-login') ?>" method="post">
                    <div class="input-box-custom">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Masukkan username..." required>
                    </div>

                    <div class="input-box-custom">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn-main">Masuk ke Dashboard</button>
                </form>

                <div class="mt-4">
                    <div class="text-center mb-3">
                        <span class="text-muted small">Belum terdaftar?</span>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="<?= base_url('users/create') ?>" class="btn-ghost m-0">
                            <i class="bi bi-person-plus me-1"></i> Buat Akun Sekarang
                        </a>
                        <div class="text-center mt-2">
                            <a href="<?= base_url('restore') ?>" class="text-danger text-decoration-none small fw-bold">
                                <i class="bi bi-database-fill-gear me-1"></i> System Restore Database
                            </a>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>