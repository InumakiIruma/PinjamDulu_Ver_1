<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h4 class="fw-bold mb-4">Riwayat Peminjaman Saya</h4>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Alat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Status</th>
                        <th>Info Denda</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peminjaman)) : ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Anda belum pernah meminjam alat.</td>
                        </tr>
                        <?php else : foreach ($peminjaman as $row) : ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold"><?= $row['nama_alat'] ?></div>
                                    <small class="text-muted">Jumlah: <?= $row['jumlah'] ?></small>
                                </td>
                                <td><?= date('d/m/Y', strtotime($row['tgl_pinjam'])) ?></td>
                                <td>
                                    <?php if ($row['status'] == 'pending') : ?>
                                        <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                                    <?php elseif ($row['status'] == 'dipinjam') : ?>
                                        <span class="badge bg-primary">Sedang Dipinjam</span>
                                    <?php else : ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['jumlah_denda'] > 0) : ?>
                                        <div class="text-danger fw-bold">Rp <?= number_format($row['jumlah_denda']) ?></div>
                                        <small class="badge <?= $row['status_pembayaran'] == 'Lunas' ? 'bg-success' : 'bg-danger' ?>">
                                            <?= $row['status_pembayaran'] ?>
                                        </small>
                                    <?php else : ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('peminjaman/detail/' . $row['id']) ?>" class="btn btn-light btn-sm rounded-pill border">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>