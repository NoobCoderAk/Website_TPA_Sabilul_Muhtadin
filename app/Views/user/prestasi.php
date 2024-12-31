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
                            <h5 class="card-title"><?= $data->judul; ?></h5>
                            <p class="card-text"><?= $data->deskripsi; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= date('d F Y', strtotime($data->tanggal_input)); ?></small></p>
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
                                <img id="prestasiDetailGambar" src="<?= base_url('/Assets/Images/Prestasi/' . $data->gambar); ?>" class="card-img-top news-page-card-img" alt="...">
                                <h5 id="prestasiDetailTitle"><?= $data->judul; ?></h5>
                                <p id="prestasiDetailDesc"><?= $data->deskripsi; ?></p>
                                <p id="prestasiDetailAuthor"><?= $data->author; ?></p>
                                <p id="prestasiDetailDate"><?= date('d F Y', strtotime($data->tanggal_input)); ?></p>
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