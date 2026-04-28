<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <div class="page-header mb-4">
        <h3 class="fw-bold">Tagihan Denda</h3>
        <p class="text-muted">Daftar peminjam yang memiliki tanggungan denda fisik atau keterlambatan.</p>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Peminjam</th>
                        <th>Alat</th>
                        <th>Keterangan</th>
                        <th>Total Denda</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($denda)) : ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada tunggakan denda.</td>
                        </tr>
                        <?php else : foreach ($denda as $d) : ?>
                            <tr>
                                <td><strong><?= $d['nama_peminjam'] ?></strong></td>
                                <td><?= $d['nama_alat'] ?></td>
                                <td><small class="text-muted"><?= $d['keterangan'] ?></small></td>
                                <td><span class="text-danger fw-bold">Rp <?= number_format($d['jumlah_denda'], 0, ',', '.') ?></span></td>
                                <td class="text-center">
                                    <a href="<?= base_url('peminjaman/bayar_denda/' . $d['id']) ?>"
                                        class="btn btn-success btn-sm rounded-pill px-3"
                                        onclick="return confirm('Konfirmasi pelunasan denda?')">
                                        <i class="bi bi-cash-stack me-1"></i> Tandai Lunas
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