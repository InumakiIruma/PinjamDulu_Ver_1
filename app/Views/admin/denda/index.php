<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold"><i class="bi bi-cash-stack text-danger me-2"></i> Daftar Denda</h4>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success border-0 shadow-sm"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Peminjam</th>
                        <th>Alat</th>
                        <th>Jumlah Denda</th>
                        <th>Keterangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($denda)) : ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">Tidak ada data denda saat ini.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($denda as $d) : ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold"><?= $d['nama_peminjam'] ?></div>
                                    <small class="text-muted"><?= date('d M Y', strtotime($d['tanggal_dibuat'])) ?></small>
                                </td>
                                <td><?= $d['nama_alat'] ?></td>
                                <td class="text-danger fw-bold">Rp <?= number_format($d['jumlah_denda'], 0, ',', '.') ?></td>
                                <td><small><?= $d['keterangan'] ?></small></td>
                                <td class="text-center">
                                    <?php if ($d['status_pembayaran'] == 'Belum Bayar') : ?>
                                        <span class="badge bg-light-danger text-danger border border-danger px-3">Belum Bayar</span>
                                    <?php else : ?>
                                        <span class="badge bg-success px-3">Lunas</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($d['status_pembayaran'] == 'Belum Bayar') : ?>
                                        <a href="<?= base_url('denda/lunas/' . $d['id']) ?>" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                            Tandai Lunas
                                        </a>
                                    <?php else : ?>
                                        <button class="btn btn-sm btn-light rounded-pill px-3" disabled>Selesai</button>
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

<?= $this->endSection() ?>