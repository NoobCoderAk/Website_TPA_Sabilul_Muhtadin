<div class="col" style="min-height: 100vh;">
    <!-- Header Section -->
    <div class="bg-success text-white text-center py-4 mb-4" style="background-image: url('header-image.jpg'); background-size: cover;">
        <h1 class="display-4">Prestasi</h1>
    </div>
    <!-- Prestasi Santri -->
    <section id="prestasi-page">
        <div class="prestasi-page-header">
            <h2>Prestasi Santri</h2>
        </div>
        <div class="prestasi-page-container">
            <?php foreach ($prestasi as $data): ?>
                <div class="card prestasi-page-card shadow-md">
                    <div class="row g-0">
                        <div class="col-12 col-md-6 prestasi-page-img-container">
                            <img src="<?= base_url('/Assets/Images/Prestasi/' . $data->gambar); ?>" alt="" class="prestasi-page-img img-fluid">
                        </div>
                        <div class="col-12 col-md-6 prestasi-page-desc-container">
                            <h5 class="card-title"><?= htmlspecialchars($data->judul); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($data->deskripsi); ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= date('l, d F Y', strtotime($data->tanggal_edit)); ?></small></p>
                            <a class="btn btn-card text-light shadow-md" onclick="loadPrestasiDetail(<?= $data->id ?>)" data-bs-toggle="modal" data-bs-target="#prestasiDetailModal">Baca Selengkapnya</a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Prestasi Detail Modal -->
            <?php foreach ($prestasi as $data): ?>
                <div class="modal fade" id="prestasiDetailModal" tabindex="-1" aria-labelledby="prestasiDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="prestasiDetailModalLabel">Detail Prestasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="prestasiDetailContent">
                                <!-- prestasi content will load here dynamically -->
                                <div class="container">
                                    <div class="row bg-white shadow-sm rounded p-3" style="max-width: 900px; margin: auto;">
                                        <!-- Image Section -->
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <img id="prestasiDetailGambar"
                                                src="<?= base_url('/Assets/Images/Prestasi/' . htmlspecialchars($data->gambar)); ?>"
                                                alt="Prestasi Image"
                                                class="img-fluid rounded"
                                                style="max-height: 200px; width: 100%; object-fit: cover;">
                                        </div>
                                        <!-- Content Section -->
                                        <div class="col-md-8">
                                            <h5 class="fw-bold text-uppercase" style="color: #333;" id="prestasiDetailTitle">
                                                <?= htmlspecialchars($data->judul); ?>
                                            </h5>
                                            <p style="font-size: 14px; line-height: 1.6; color: #555;" id="prestasiDetailDesc">
                                                <?= nl2br(htmlspecialchars($data->deskripsi)); ?>
                                            </p>
                                            <div class="row text-muted small mt-2">
                                                <div class="col text-end">
                                                    <p>
                                                        <span id="prestasiDetailDate"><?= date('l, d F Y', strtotime($data->tanggal_edit)); ?></span> Oleh
                                                        <span id="prestasiDetailAuthor"><?= htmlspecialchars($data->author); ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <div class="pagination justify-content-center">
            <?= $pager->links('default', 'pagination') ?>
        </div>
        <!-- end Pagination -->
    </section>
    <!-- End of Prestasi Santri -->
</div>