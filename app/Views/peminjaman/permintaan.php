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
                        <th class="ps-4" style="width: 25%;">Peminjam</th>
                        <th style="width: 20%;">Alat</th>
                        <th class="text-center" style="width: 10%;">Jumlah</th>
                        <th class="text-center" style="width: 15%;">Status</th>
                        <th class="text-center" style="width: 30%;">Aksi Operasional</th>
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
                                    <div class="fw-bold text-dark"><?= $row['nama_peminjam'] ?></div>
                                    <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($row['tgl_pinjam'])) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-medium">
                                        <i class="bi bi-tools me-1 text-primary"></i> <?= $row['nama_alat'] ?>
                                    </span>
                                </td>
                                <td class="text-center fw-bold"><?= $row['jumlah'] ?></td>
                                <td class="text-center">
                                    <?php if ($row['status'] == 'pending') : ?>
                                        <span class="badge bg-warning bg-opacity-10 text-warning border-warning border-opacity-25 px-3">Menunggu</span>
                                    <?php elseif ($row['status'] == 'dipinjam') : ?>
                                        <span class="badge bg-info bg-opacity-10 text-info border-info border-opacity-25 px-3">Dipinjam</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <?php if ($row['status'] == 'pending') : ?>
                                            <a href="<?= base_url('peminjaman/konfirmasi/' . $row['id']) ?>" class="btn btn-primary btn-sm rounded-pill px-3 btn-konfirmasi">
                                                <i class="bi bi-check-lg"></i> Setujui
                                            </a>
                                            <a href="<?= base_url('peminjaman/tolak/' . $row['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 btn-tolak">
                                                <i class="bi bi-x-lg"></i> Tolak
                                            </a>

                                        <?php elseif ($row['status'] == 'dipinjam') : ?>
                                            <button type="button" class="btn btn-success btn-sm rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#checkBarang<?= $row['id'] ?>">
                                                <i class="bi bi-box-arrow-in-left me-1"></i> Check & Kembali
                                            </button>

                                            <div class="modal fade" id="checkBarang<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 shadow">
                                                        <div class="modal-header bg-success text-white">
                                                            <h5 class="modal-title"><i class="bi bi-shield-check me-2"></i>Konfirmasi Pengembalian</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="<?= base_url('peminjaman/konfirmasi_kembali/' . $row['id']) ?>" method="POST">
                                                            <?= csrf_field(); ?>
                                                            <div class="modal-body text-start">
                                                                <div class="alert alert-info py-2 small">
                                                                    Menerima kembali <b><?= $row['jumlah'] ?> <?= $row['nama_alat'] ?></b> dari <b><?= $row['nama_peminjam'] ?></b>.
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold small text-uppercase">Kondisi Alat Saat Ini</label>
                                                                    <select name="kondisi_kembali" class="form-select border-2" required>
                                                                        <option value="Baik">✅ Baik (Stok akan bertambah)</option>
                                                                        <option value="Rusak">⚠️ Rusak (Masuk Perbaikan)</option>
                                                                        <option value="Hilang">❌ Hilang (Stok tetap)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-0">
                                                                    <label class="form-label fw-bold small text-uppercase">Catatan Checking</label>
                                                                    <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: Barang lengkap, kondisi bersih..."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer bg-light border-0">
                                                                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-success rounded-pill px-4">Simpan & Selesai</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
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