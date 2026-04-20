<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    :root {
        --glass-bg: rgba(255, 255, 255, 0.95);
        --accent-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
    }

    [data-theme="dark"] {
        --glass-bg: rgba(30, 41, 59, 0.95);
    }

    .profile-container {
        max-width: 900px;
        margin: auto;
    }

    /* Card Styling */
    .main-profile-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border: 1px solid var(--border-color) !important;
        border-radius: 24px !important;
        overflow: hidden;
    }

    /* Hero Banner Section */
    .profile-banner {
        height: 160px;
        background: var(--accent-gradient);
        position: relative;
    }

    .profile-banner::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50%;
        background: linear-gradient(to top, var(--glass-bg), transparent);
    }

    /* Avatar Styling */
    .avatar-outer {
        position: relative;
        margin-top: -80px;
        z-index: 10;
        margin-bottom: 20px;
    }

    .avatar-inner {
        width: 150px;
        height: 150px;
        border: 6px solid var(--glass-bg);
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        background: #eee;
    }

    .avatar-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .avatar-outer:hover img {
        transform: scale(1.1);
    }

    .upload-badge {
        position: absolute;
        bottom: 10px;
        right: calc(50% - 70px);
        background: #fff;
        color: var(--primary-blue);
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        border: none;
        transition: all 0.3s ease;
        z-index: 11;
    }

    .upload-badge:hover {
        background: var(--primary-blue);
        color: #fff;
        transform: translateY(-3px);
    }

    /* Form Styling */
    .form-label-custom {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
        margin-bottom: 8px;
        display: block;
    }

    .input-box-custom {
        background: rgba(0, 0, 0, 0.02);
        border: 1px solid var(--border-color);
        padding: 14px 20px;
        border-radius: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .input-box-custom {
        background: rgba(255, 255, 255, 0.03);
    }

    .input-box-custom:focus {
        background: transparent;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }

    /* Button Styling */
    .btn-save-custom {
        background: var(--accent-gradient);
        color: white;
        border: none;
        padding: 14px 40px;
        border-radius: 14px;
        font-weight: 700;
        box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        transition: all 0.3s ease;
    }

    .btn-save-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 25px rgba(67, 97, 238, 0.4);
        color: white;
    }

    .section-divider {
        height: 1px;
        background: var(--border-color);
        margin: 40px 0;
        position: relative;
    }

    .section-divider span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: var(--glass-bg);
        padding: 0 20px;
        color: var(--text-muted);
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
</style>

<div class="container py-5">
    <div class="profile-container">
        <div class="card main-profile-card border-0 shadow-lg">
            <div class="profile-banner"></div>

            <div class="card-body p-0">
                <form action="<?= base_url('/profile/update') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="file" name="foto" id="foto" class="d-none" accept="image/*">

                    <div class="text-center px-4">
                        <div class="avatar-outer">
                            <div class="avatar-inner">
                                <?php
                                $fotoSekarang = (isset($user['foto']) && $user['foto'] != '') ? $user['foto'] : session()->get('foto');
                                if (!$fotoSekarang) $fotoSekarang = 'default.png';
                                ?>
                                <img id="previewImg" src="<?= base_url('uploads/users/' . $fotoSekarang) ?>">
                            </div>
                            <label for="foto" class="upload-badge">
                                <i class="bi bi-camera-fill fs-5"></i>
                            </label>
                        </div>
                        <h3 class="fw-800 mb-1"><?= esc($user['nama'] ?? session()->get('nama')) ?></h3>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                            <i class="bi bi-shield-check me-1"></i> <?= strtoupper(session()->get('role') ?? 'GUEST') ?>
                        </span>
                    </div>

                    <div class="p-4 p-md-5">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success border-0 rounded-4 shadow-sm d-flex align-items-center p-3 mb-4">
                                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                                <div><strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?></div>
                            </div>
                        <?php endif; ?>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label-custom">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control input-box-custom shadow-none"
                                    value="<?= esc($user['nama'] ?? session()->get('nama')) ?>" placeholder="Masukkan nama..." required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">Alamat Email</label>
                                <input type="email" name="email" class="form-control input-box-custom shadow-none"
                                    value="<?= esc($user['email'] ?? session()->get('email')) ?>" placeholder="nama@email.com" required>
                            </div>
                        </div>

                        <div class="section-divider">
                            <span>Keamanan</span>
                        </div>

                        <div class="col-12">
                            <label class="form-label-custom">Password Baru</label>
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control input-box-custom shadow-none"
                                    placeholder="••••••••">
                                <i class="bi bi-lock position-absolute top-50 end-0 translate-middle-y me-4 text-muted"></i>
                            </div>
                            <p class="small text-muted mt-3">
                                <i class="bi bi-info-circle me-1"></i> Kosongkan jika Anda tidak ingin mengganti password lama Anda.
                            </p>
                        </div>

                        <div class="mt-5 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                            <a href="<?= base_url('/') ?>" class="btn btn-link text-decoration-none text-muted fw-bold">
                                <i class="bi bi-arrow-left me-2"></i> Batal & Kembali
                            </a>
                            <button type="submit" class="btn btn-save-custom w-100 w-md-auto">
                                Simpan Perubahan <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            const preview = document.getElementById('previewImg');
            preview.src = URL.createObjectURL(file);
            preview.style.transform = 'scale(1.1)';
            setTimeout(() => {
                preview.style.transform = 'scale(1)';
            }, 500);
        }
    }
</script>

<?= $this->endSection() ?>