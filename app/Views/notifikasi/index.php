<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container py-5">
    <!-- Floating Header -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between p-4 bg-white shadow-sm rounded-5 border border-light">
                <div class="ps-2">
                    <h3 class="fw-bold text-dark mb-0">Pusat Pesan</h3>
                    <small class="text-muted fw-medium"><?= count($notif) ?> Pemberitahuan tersimpan</small>
                </div>
                <div class="pe-2">
                    <a href="<?= base_url('notifikasi/readAll') ?>" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                        <i class="bi bi-done-all me-1"></i> Baca Semua
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php if (empty($notif)) : ?>
                <div class="text-center py-5">
                    <div class="soft-circle mx-auto mb-4">
                        <i class="bi bi-chat-left-dots text-muted fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Belum ada pesan</h5>
                    <p class="text-muted">Semua laporan sistem Anda akan muncul di sini.</p>
                </div>
            <?php else : ?>
                <div class="notif-feed">
                    <?php foreach ($notif as $n) : ?>
                        <div class="soft-card mb-4 <?= $n['is_read'] == 0 ? 'border-primary-left' : '' ?>">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="notif-avatar <?= $n['is_read'] == 0 ? 'bg-primary text-white' : 'bg-light text-muted border' ?>">
                                            <i class="bi <?= $n['is_read'] == 0 ? 'bi-lightning-fill' : 'bi-envelope-open' ?>"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <p class="mb-0 fs-6 text-dark <?= $n['is_read'] == 0 ? 'fw-bold' : 'fw-medium' ?>" style="line-height: 1.4;">
                                                <?= $n['pesan'] ?>
                                            </p>
                                            <div class="dropdown">
                                                <button class="btn btn-soft-light btn-sm" type="button" data-bs-toggle="dropdown">
                                                    <i class="bi bi-three-dots"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2">
                                                    <?php if ($n['is_read'] == 0) : ?>
                                                        <li>
                                                            <a class="dropdown-item rounded-3 mb-1" href="<?= base_url('notifikasi/read/' . $n['id']) ?>">
                                                                <i class="bi bi-eye me-2"></i>Tandai dibaca
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a class="dropdown-item rounded-3 text-danger btn-hapus" href="<?= base_url('notifikasi/hapus/' . $n['id']) ?>">
                                                            <i class="bi bi-trash3 me-2"></i>Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="badge bg-light text-muted rounded-pill px-3 py-2 fw-normal" style="font-size: 0.7rem;">
                                                <i class="bi bi-clock me-1"></i> <?= date('d M, H:i', strtotime($n['created_at'])) ?>
                                            </span>
                                            <?php if ($n['is_read'] == 0) : ?>
                                                <span class="pulse-dot"></span>
                                                <small class="text-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">Baru</small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8fafc;
    }

    /* Soft UI Card Design */
    .soft-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.03);
        border-radius: 28px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
    }

    .soft-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.1);
    }

    .border-primary-left {
        border-left: 5px solid #0d6efd !important;
    }

    /* Notif Avatar */
    .notif-avatar {
        width: 50px;
        height: 50px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    /* Pulse Decoration */
    .pulse-dot {
        width: 8px;
        height: 8px;
        background: #0d6efd;
        border-radius: 50%;
        box-shadow: 0 0 0 rgba(13, 110, 253, 0.4);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(13, 110, 253, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);
        }
    }

    /* Helper Styles */
    .soft-circle {
        width: 90px;
        height: 90px;
        background: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: inset 5px 5px 10px #f1f1f1, inset -5px -5px 10px #ffffff, 5px 5px 15px rgba(0, 0, 0, 0.02);
    }

    .btn-soft-light {
        background: #f8fafc;
        border-radius: 12px;
        color: #64748b;
        border: none;
    }

    .btn-soft-light:hover {
        background: #f1f5f9;
        color: #1e293b;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hapusButtons = document.querySelectorAll('.btn-hapus');
        hapusButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                Swal.fire({
                    title: 'Hapus Pesan?',
                    text: "Notifikasi ini akan dihapus permanen.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#f1f5f9',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'rounded-pill px-4',
                        cancelButton: 'rounded-pill px-4 text-dark'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>

<?= $this->endSection() ?>