<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinjamDuluApp | Tambah User</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        }

        body {
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Inter', sans-serif;
        }

        /* Dekorasi Background */
        .bg-decoration {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bg-circle {
            position: absolute;
            width: 400px;
            height: 400px;
            background: var(--primary-gradient);
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
        }

        .card-register {
            max-width: 550px;
            margin: 30px auto;
            border: none;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .card-header-custom {
            background: var(--primary-gradient);
            color: white;
            padding: 40px 30px;
            border-radius: 24px 24px 0 0;
            text-align: center;
            position: relative;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 2rem;
            backdrop-filter: blur(5px);
        }

        .form-label {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control,
        .form-select {
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
            background: #fff;
        }

        .btn-save {
            background: #1e293b;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 15px;
            font-weight: 700;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-save:hover {
            background: #4361ee;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
            color: white;
        }

        .login-link {
            color: #64748b;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #4361ee;
        }

        /* Styling input file agar lebih rapi */
        input[type="file"]::file-selector-button {
            background: #f1f5f9;
            border: none;
            padding: 5px 15px;
            border-radius: 8px;
            margin-right: 15px;
            color: #475569;
            font-weight: 600;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="bg-decoration">
        <div class="bg-circle" style="top: -10%; right: -5%;"></div>
        <div class="bg-circle" style="bottom: -10%; left: -5%;"></div>
    </div>

    <div class="container">
        <div class="card card-register shadow-xl">
            <div class="card-header-custom">
                <div class="icon-box">
                    <i class="bi bi-person-plus"></i>
                </div>
                <h3 class="mb-1 fw-bold">Daftar Akun Baru</h3>
                <p class="mb-0 opacity-75 small">Bergabunglah dengan ekosistem PinjamDulu</p>
            </div>

            <div class="card-body p-4 p-md-5">

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger border-0 rounded-4 mb-4 d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-3 fs-4"></i>
                        <div>
                            <small class="fw-bold d-block">Terjadi Kesalahan</small>
                            <span class="small"><?= session()->getFlashdata('error') ?></span>
                        </div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" value="<?= old('nama') ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="<?= old('email') ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="ID Unik" value="<?= old('username') ?>" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Level Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="" disabled selected>Pilih hak akses...</option>
                            <option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Administrator</option>
                            <option value="petugas" <?= old('role') == 'petugas' ? 'selected' : '' ?>>Petugas Lapangan</option>
                            <option value="anggota" <?= old('role') == 'anggota' ? 'selected' : '' ?>>Anggota / User</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <div class="form-text mt-2" style="font-size: 0.7rem;">
                            <i class="bi bi-info-circle me-1"></i> JPG/PNG, Maksimal ukuran file 2MB.
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-save shadow-sm">
                            Buat Akun Sekarang <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                        <a href="<?= base_url('login') ?>" class="text-center login-link text-decoration-none small">
                            Sudah memiliki akun? <span class="text-primary fw-bold">Silakan Login</span>
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>