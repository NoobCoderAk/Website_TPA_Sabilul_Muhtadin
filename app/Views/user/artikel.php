<div class="col" style="min-height: 100vh;">
    <!-- Header Section -->
    <div class="bg-success text-white text-center py-4 mb-4" style="background-image: url('header-image.jpg'); background-size: cover;">
        <h1 class="display-4">Kabar Terbaru</h1>
    </div>
    <!-- Latest News Section -->
    <section id="news-page">
        <div class="news-page-header">
            <h2>Kabar Terbaru</h2>
        </div>
        <div class="news-page-inner row">
            <div class="news-page-container d-flex shadow-md">
                <?php foreach ($artikel as $data): ?>
                    <div class="news-page-card card col-lg-3  col-12">
                        <img src="<?= base_url('/Assets/Images/Artikel/' . $data->gambar); ?>" class="card-img-top news-page-card-img" alt="Image of Quranic study session">
                        <div class="card-body news-page-card-body">
                            <h5 class="card-title"><?= htmlspecialchars($data->judul); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($data->deskripsi); ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= date('l, d F Y', strtotime($data->tanggal_edit)); ?></small></p>
                            <a class="btn btn-card text-light shadow-md" onclick="loadArticleDetail(<?= $data->id ?>)" data-bs-toggle="modal" data-bs-target="#articleDetailModal">Baca Selengkapnya</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination justify-content-center">
            <?= $pager->links('default', 'pagination') ?>
        </div>
        <!-- end Pagination -->
    </section>
    <!-- End of Latest News Section -->
</div>

<!-- Article Detail Modal -->
<?php foreach ($artikel as $data): ?>
    <div class="modal fade" id="articleDetailModal" tabindex="-1" aria-labelledby="articleDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="articleDetailModalLabel">Detail Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="articleDetailContent">
                    <!-- Article content will load here dynamically -->
                    <div class="container">
                        <div class="row bg-white shadow-sm rounded p-3" style="max-width: 900px; margin: auto;">
                            <!-- Image Section -->
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img id="articleDetailGambar"
                                    src="<?= base_url('/Assets/Images/Artikel/' . htmlspecialchars($data->gambar)); ?>"
                                    alt="Santri Image"
                                    class="img-fluid rounded"
                                    style="max-height: 200px; width: 100%; object-fit: cover;">
                            </div>
                            <!-- Content Section -->
                            <div class="col-md-8">
                                <h5 class="fw-bold text-uppercase" style="color: #333;" id="articleDetailTitle">
                                    <?= htmlspecialchars($data->judul); ?>
                                </h5>
                                <p style="font-size: 14px; line-height: 1.6; color: #555;" id="articleDetailDesc">
                                    <?= nl2br(htmlspecialchars($data->deskripsi)); ?>
                                </p>
                                <div class="row text-muted small mt-2">
                                    <div class="col text-end">
                                        <p>
                                            <span id="articleDetailDate"><?= date('l, d F Y', strtotime($data->tanggal_edit)); ?></span> Oleh
                                            <span id="articleDetailAuthor"><?= htmlspecialchars($data->author); ?></span>
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