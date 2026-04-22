<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Notifikasi</h4>
            <p class="text-muted small mb-0">Kelola pesan dan pemberitahuan sistem Anda</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('notifikasi/readAll') ?>" class="btn btn-light btn-sm rounded-3 border shadow-sm px-3">
                <i class="bi bi-check2-all me-1 text-primary"></i> Tandai Semua Dibaca
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php if (empty($notif)) : ?>
                <div class="card border-0 shadow-sm rounded-4 py-5">
                    <div class="card-body text-center">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-bell-slash fs-1 text-muted"></i>
                        </div>
                        <h5 class="fw-bold">Tidak ada notifikasi</h5>
                        <p class="text-muted">Kotak masuk Anda bersih untuk saat ini.</p>
                    </div>
                </div>
            <?php else : ?>
                <div class="notification-container">
                    <?php foreach ($notif as $n) : ?>
                        <div class="card border-0 shadow-sm rounded-4 mb-3 notification-card <?= $n['is_read'] == 0 ? 'unread' : '' ?>">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="icon-box rounded-circle d-flex align-items-center justify-content-center <?= $n['is_read'] == 0 ? 'bg-primary text-white' : 'bg-light text-muted' ?>" style="width: 45px; height: 45px;">
                                            <i class="bi <?= $n['is_read'] == 0 ? 'bi-bell-fill' : 'bi-bell' ?>"></i>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <p class="mb-1 text-dark <?= $n['is_read'] == 0 ? 'fw-bold' : '' ?>">
                                                    <?= $n['pesan'] ?>
                                                </p>
                                                <div class="d-flex align-items-center gap-3">
                                                    <span class="text-muted extra-small">
                                                        <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($n['created_at'])) ?>
                                                    </span>
                                                    <span class="text-muted extra-small">
                                                        <i class="bi bi-clock me-1"></i> <?= date('H:i', strtotime($n['created_at'])) ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="dropdown">
                                                <button class="btn btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-3">
                                                    <?php if ($n['is_read'] == 0) : ?>
                                                        <li>
                                                            <a class="dropdown-item small" href="<?= base_url('notifikasi/read/' . $n['id']) ?>">
                                                                <i class="bi bi-check2 me-2"></i>Tandai dibaca
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a class="dropdown-item small text-danger btn-hapus" href="<?= base_url('notifikasi/hapus/' . $n['id']) ?>">
                                                            <i class="bi bi-trash me-2"></i>Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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
    .notification-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent !important;
    }

    .notification-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05) !important;
    }

    .notification-card.unread {
        background-color: #f8faff;
        border-left: 4px solid #4361ee !important;
    }

    .extra-small {
        font-size: 0.75rem;
    }

    .icon-box {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .unread .icon-box {
        box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
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
                    title: 'Hapus Notifikasi?',
                    text: "Tindakan ini tidak dapat dibatalkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4361ee',
                    cancelButtonColor: '#f1f1f1',
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