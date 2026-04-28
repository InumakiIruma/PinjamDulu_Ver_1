<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h4 class="fw-bold mb-4"><i class="bi bi-clock-history text-warning me-2"></i> Operasional Peminjaman</h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger border-0 shadow-sm rounded-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Peminjam</th>
                        <th>Alat</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Status Saat Ini</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peminjaman)) : ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Tidak ada permintaan atau peminjaman aktif.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($peminjaman as $row) : ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold"><?= $row['nama_peminjam'] ?></div>
                                    <small class="text-muted"><?= $row['tgl_pinjam'] ?></small>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?= $row['nama_alat'] ?></span></td>
                                <td class="text-center"><?= $row['jumlah'] ?></td>
                                <td class="text-center">
                                    <?php if ($row['status'] == 'pending') : ?>
                                        <a href="<?= base_url('peminjaman/konfirmasi/' . $row['id']) ?>" class="btn btn-primary btn-sm rounded-pill px-3 me-1 btn-konfirmasi">
                                            <i class="bi bi-check-lg"></i> Setujui
                                        </a>
                                        <a href="<?= base_url('peminjaman/tolak/' . $row['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 btn-tolak">
                                            <i class="bi bi-x-lg"></i> Tolak
                                        </a>

                                    <?php elseif ($row['status'] == 'dipinjam') : ?>
                                        <button type="button" class="btn btn-success btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#checkBarang<?= $row['id'] ?>">
                                            <i class="bi bi-box-arrow-in-left"></i> Check & Kembali
                                        </button>

                                        <div class="modal fade" id="checkBarang<?= $row['id'] ?>" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title">Konfirmasi Pengembalian</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="<?= base_url('peminjaman/konfirmasi_kembali/' . $row['id']) ?>" method="POST">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body text-start">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold">Kondisi Alat Saat Ini</label>
                                                                <select name="kondisi_kembali" class="form-select" required>
                                                                    <option value="Baik">✅ Baik (Stok akan bertambah)</option>
                                                                    <option value="Rusak">⚠️ Rusak (Masuk Perbaikan)</option>
                                                                    <option value="Hilang">❌ Hilang (Stok tetap)</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-0">
                                                                <label class="form-label fw-bold">Catatan Checking</label>
                                                                <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: Barang lengkap atau ada baret..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success w-100 rounded-pill">Konfirmasi Pengembalian Selesai</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- SweetAlert Konfirmasi ---
        const konfirmasiButtons = document.querySelectorAll('.btn-konfirmasi');
        konfirmasiButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                Swal.fire({
                    title: 'Setujui Peminjaman?',
                    text: "Stok alat akan otomatis berkurang setelah disetujui.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4361ee',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, Setujui!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

        // --- SweetAlert Tolak ---
        const tolakButtons = document.querySelectorAll('.btn-tolak');
        tolakButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                Swal.fire({
                    title: 'Tolak Permintaan?',
                    text: "Data permintaan ini akan dihapus dari daftar.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, Tolak!',
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

<?= $this->endSection() ?>