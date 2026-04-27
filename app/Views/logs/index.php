<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-0">
                <i class="bi bi-journal-text text-primary me-2"></i> Log Aktivitas
            </h4>
            <p class="text-muted small mb-0">Riwayat perubahan data dan aktivitas pengguna di sistem secara real-time.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-light btn-sm rounded-pill px-3 border shadow-sm">
                <i class="bi bi-download me-1"></i> Ekspor PDF
            </button>
            <button type="button" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm" onclick="confirmClearLogs()">
                <i class="bi bi-trash-fill me-1"></i> Bersihkan Semua Log
            </button>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Waktu</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted">User</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted">Aksi</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted">Keterangan</th>
                            <th class="pe-4 border-0 text-uppercase small fw-bold text-muted">IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($logs)) : ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox d-block mb-2 fs-2 opacity-50"></i>
                                    <p class="mb-0">Belum ada catatan aktivitas yang tersimpan.</p>
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($logs as $log) : ?>
                                <?php
                                $aksi = strtolower($log['aksi']);
                                $badgeClass = 'bg-secondary';
                                if (strpos($aksi, 'tambah') !== false || strpos($aksi, 'create') !== false) $badgeClass = 'bg-success';
                                if (strpos($aksi, 'edit') !== false || strpos($aksi, 'update') !== false) $badgeClass = 'bg-warning text-dark';
                                if (strpos($aksi, 'hapus') !== false || strpos($aksi, 'delete') !== false) $badgeClass = 'bg-danger';
                                if (strpos($aksi, 'login') !== false) $badgeClass = 'bg-info text-dark';
                                ?>
                                <tr>
                                    <td class="ps-4 small">
                                        <div class="fw-bold"><?= date('d M Y', strtotime($log['created_at'])) ?></div>
                                        <div class="text-muted" style="font-size: 0.7rem;"><?= date('H:i:s', strtotime($log['created_at'])) ?> WIB</div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-2 bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                                <i class="bi bi-person text-primary" style="font-size: 0.85rem;"></i>
                                            </div>
                                            <span class="fw-medium small"><?= $log['nama_user'] ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge <?= $badgeClass ?> bg-opacity-10 text-<?= str_replace('bg-', '', explode(' ', $badgeClass)[0]) ?> border-0 fw-bold px-2 py-1" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                                            <?= strtoupper($log['aksi']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <p class="mb-0 small text-truncate" style="max-width: 250px;" title="<?= $log['keterangan'] ?>">
                                            <?= $log['keterangan'] ?>
                                        </p>
                                    </td>
                                    <td class="pe-4">
                                        <code class="small bg-light px-2 py-1 rounded text-muted" style="font-size: 0.75rem;">
                                            <?= $log['ip_address'] ?>
                                        </code>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table thead th {
        font-size: 0.7rem;
        letter-spacing: 0.05em;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc !important;
    }

    .badge {
        text-transform: uppercase;
    }
</style>

<script>
    function confirmClearLogs() {
        Swal.fire({
            title: 'Bersihkan Log?',
            text: "Semua riwayat aktivitas akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="bi bi-trash-fill"></i> Ya, Bersihkan!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-danger px-4',
                cancelButton: 'btn btn-light px-4'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Sesuaikan URL ini dengan rute di Routes.php Anda
                window.location.href = "<?= base_url('logs/clear') ?>";
            }
        })
    }

    // Munculkan notifikasi jika ada flashdata 'success' dari controller
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= session()->getFlashdata('error') ?>',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        <?php endif; ?>
    });
</script>

<?= $this->endSection() ?>