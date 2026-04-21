<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Halo, ada yang bisa kami bantu?</h2>
                <p class="text-muted">Temukan panduan penggunaan sistem PinjamDuluApp di bawah ini.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="avatar-sm bg-primary bg-opacity-10 text-primary rounded-3 p-3 d-inline-block mb-3">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <h5 class="fw-bold">Manajemen Alat</h5>
                            <p class="text-muted small">Cara menambah, mengedit, dan memantau status ketersediaan alat atau barang.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="avatar-sm bg-success bg-opacity-10 text-success rounded-3 p-3 d-inline-block mb-3">
                                <i class="bi bi-arrow-left-right fs-4"></i>
                            </div>
                            <h5 class="fw-bold">Peminjaman & Kembali</h5>
                            <p class="text-muted small">Prosedur melakukan input peminjaman dan cara melakukan proses pengembalian alat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Pertanyaan Sering Diajukan (FAQ)</h5>
                            <div class="accordion accordion-flush" id="faqAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-bold small shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            Bagaimana jika alat yang dipinjam rusak?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted small">
                                            Admin dapat mengubah status alat tersebut menjadi "Rusak" melalui menu Edit Alat agar tidak dapat dipinjam kembali.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="text-muted small">Masih bingung? Hubungi Tim IT di <span class="text-primary fw-bold">support@pinjamdulu.com</span></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>