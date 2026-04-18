<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid py-4 px-lg-5">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-file-earmark-bar-graph-fill text-primary me-2"></i>Laporan Bulanan
            </h4>
            <p class="text-muted small mb-0">Analisis data peminjaman alat per periode aktif.</p>
        </div>
        <button onclick="window.print()" class="btn btn-dark shadow-sm d-print-none px-4 rounded-pill">
            <i class="bi bi-printer-fill me-2"></i>Cetak Laporan
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4 d-print-none bg-white">
        <div class="card-body p-4">
            <form action="<?= base_url('/laporan') ?>" method="get" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label small fw-bold text-secondary">Pilih Bulan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar-event text-primary"></i></span>
                        <select name="bulan" class="form-select bg-light border-start-0 ps-0">
                            <?php
                            $nama_bulan = [
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember'
                            ];
                            foreach ($nama_bulan as $key => $val) : ?>
                                <option value="<?= $key ?>" <?= ($bulan == $key) ? 'selected' : '' ?>><?= $val ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-secondary">Tahun</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar-check text-primary"></i></span>
                        <input type="number" name="tahun" class="form-control bg-light border-start-0 ps-0" value="<?= $tahun ?>" min="2020" max="2099">
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                        <i class="bi bi-filter me-2"></i>Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="text-center py-5 d-none d-print-block">
                <h3 class="fw-bold mb-1">LAPORAN PEMINJAMAN ALAT</h3>
                <p class="text-muted">Periode: <?= $nama_bulan[$bulan] . ' ' . $tahun ?></p>
                <div style="border-bottom: 2px solid #eee; width: 50%; margin: 20px auto;"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 border-0 text-secondary small fw-bold">NO</th>
                            <th class="py-3 border-0 text-secondary small fw-bold">TANGGAL PINJAM</th>
                            <th class="py-3 border-0 text-secondary small fw-bold">PEMINJAM</th>
                            <th class="py-3 border-0 text-secondary small fw-bold">ALAT</th>
                            <th class="py-3 border-0 text-secondary small fw-bold text-center">STATUS</th>
                            <th class="py-3 border-0 text-secondary small fw-bold">TANGGAL KEMBALI</th>
                            <th class="py-3 border-0 text-secondary small fw-bold text-center d-print-none">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($laporan)) : ?>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25 mb-3 d-block mx-auto">
                                    <span class="text-muted fw-light italic">Belum ada rekaman data untuk periode ini.</span>
                                </td>
                            </tr>
                            <?php else : $no = 1;
                            foreach ($laporan as $row) :
                                $wa_text = "Laporan Peminjaman Alat:%0A- Nama: " . $row['nama_peminjam'] . "%0A- Alat: " . $row['nama_alat'] . "%0A- Status: " . $row['status'];
                            ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-muted"><?= $no++ ?></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark fw-bold" style="font-size: 0.9rem;"><?= date('d M Y', strtotime($row['tgl_pinjam'])) ?></span>
                                            <small class="text-muted" style="font-size: 0.75rem;"><?= date('H:i', strtotime($row['tgl_pinjam'])) ?> WIB</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2 rounded-circle bg-primary-soft text-primary d-flex align-items-center justify-content-center fw-bold" style="width:32px; height:32px; font-size: 12px;">
                                                <?= strtoupper(substr($row['nama_peminjam'], 0, 1)) ?>
                                            </div>
                                            <span class="text-dark fw-medium"><?= $row['nama_peminjam'] ?></span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border fw-normal p-2 px-3 rounded-pill"><?= $row['nama_alat'] ?></span></td>
                                    <td class="text-center">
                                        <?php if ($row['status'] == 'Kembali' || $row['status'] == 'selesai'): ?>
                                            <span class="badge rounded-pill bg-success-soft text-success px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> <?= $row['status'] ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="badge rounded-pill bg-warning-soft text-warning px-3 py-2">
                                                <i class="bi bi-clock-history me-1"></i> <?= $row['status'] ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-dark fw-medium">
                                        <?= ($row['tgl_kembali']) ? '<i class="bi bi-calendar-check text-success me-1"></i>' . date('d/m/Y', strtotime($row['tgl_kembali'])) : '<span class="text-muted opacity-50">--/--/----</span>' ?>
                                    </td>
                                    <td class="d-print-none text-center">
                                        <div class="btn-group p-1 bg-light rounded-pill border">
                                            <a href="https://api.whatsapp.com/send?text=<?= $wa_text ?>" target="_blank" class="btn btn-link btn-sm text-success p-1 mx-1" title="WhatsApp">
                                                <i class="bi bi-whatsapp fs-5"></i>
                                            </a>
                                            <button onclick="copyShareLink('<?= $row['nama_peminjam'] ?>', '<?= $row['nama_alat'] ?>')" class="btn btn-link btn-sm text-danger p-1 mx-1 border-start" title="Copy Teks">
                                                <i class="bi bi-instagram fs-5"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Modern Colors */
    .bg-primary-soft {
        background-color: rgba(13, 110, 253, 0.1);
    }

    .bg-success-soft {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .bg-warning-soft {
        background-color: #fff8e1;
        color: #f57f17;
    }

    body {
        background-color: #f8f9fa;
        font-family: 'Inter', sans-serif;
    }

    /* Table Styling */
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.02);
        transition: all 0.2s ease;
    }

    .table thead th {
        letter-spacing: 0.5px;
    }

    .card {
        border: none;
    }

    .rounded-4 {
        border-radius: 1rem !important;
    }

    /* Print Optimization */
    @media print {
        body {
            background: white !important;
        }

        .d-print-none,
        .btn,
        .card-body form {
            display: none !important;
        }

        .container-fluid {
            padding: 0 !important;
        }

        .card {
            box-shadow: none !important;
        }

        .table thead {
            background-color: #000 !important;
            color: #fff !important;
            -webkit-print-color-adjust: exact;
        }
    }

    /* Interactive Elements */
    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #0b5ed7);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }
</style>

<script>
    function copyShareLink(peminjam, alat) {
        const textToCopy = `Halo! Laporan Peminjaman: ${peminjam} telah meminjam ${alat}. Silakan cek detailnya di sistem kami.`;

        navigator.clipboard.writeText(textToCopy).then(() => {
            Swal.fire({
                icon: 'success',
                title: 'Teks Berhasil Disalin',
                text: 'Silakan tempel (paste) di Instagram atau Media Sosial lainnya.',
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                position: 'top-end'
            });
        }).catch(err => {
            // Fallback jika clipboard API gagal
            const temp = document.createElement("input");
            temp.value = textToCopy;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand("copy");
            document.body.removeChild(temp);
            alert('Teks disalin!');
        });
    }
</script>

<?= $this->endSection() ?>