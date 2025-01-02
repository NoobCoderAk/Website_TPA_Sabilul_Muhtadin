<div class="col" style="min-height: 100vh;">

    <!-- Jumbotron Section -->
    <section id="heroJumbotron" class="shadow-sm">
        <div class=" jumbotron slide" style="background: none; padding: 0;">
            <div class="jumbotron-inner container">
                <div class="jumbotron-item row align-items-center">
                    <!-- Text Column -->
                    <div class="col-md-6 col-12 c-desc-container">
                        <h4>Selamat Datang,</h4>
                        <h1>TPA Sabilul Muhtadin</h1>
                        <p class="c-desc">
                            TPA Sabilul Muhtadin didirikan pada 17 Juli 1991 oleh K.H. Achmad Sjaichu, atas dasar pemikiran dan cita-cita beliau untuk melahirkan generasi Muslim Qur’ani sejak usia dini. Materi pelajaran yang diberikan mengacu pada Kurikulum BKPAKSI (Badan Koordinasi Pendidikan Al-Qur’an dan Keluarga Sakinah Indonesia) Kementerian Agama RI.
                        </p>
                        <div class="row mt-4 justify-content-center justify-content-md-start">
                            <a href="<?= base_url() ?>/about" class="btn btn-outline-success shadow-md" style="text-align: center; font-weight: bold;">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                    <!-- Image Column -->
                    <div class="col-md-6 col-12 mt-4 mt-md-0">
                        <img src="/Assets/Images/dummy/ngaji-1.png" class="d-block c-img" alt="TPA Sabilul Muhtadin Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Jumbotron Section -->

    <!-- Kabar Terbaru -->
    <section id="news">
        <div class="news-header">
            <h2>Kabar Terbaru</h2>
        </div>
        <div class="news-inner row ">
            <div class="news-container d-flex flex-wrap shadow-md justify-content-between">
                <?php
                // Get the last 3 items from $artikel
                $latest_articles = array_slice(array_reverse($artikel), 0, 3);

                foreach ($latest_articles as $data):
                ?>
                    <div class="news-card card col-12 col-md-5 col-lg-3 m-2">
                        <img src="<?= base_url('/Assets/Images/Artikel/' . htmlspecialchars($data->gambar)); ?>" class="card-img-top news-page-card-img" alt="...">
                        <div class="card-body news-card-body">
                            <h5 class="card-title"><?= htmlspecialchars($data->judul); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($data->deskripsi); ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= date('l, d F Y', strtotime($data->tanggal_edit)); ?></small></p>
                            <a class="btn btn-card text-light shadow-md" onclick="loadArticleDetail(<?= $data->id ?>)" data-bs-toggle="modal" data-bs-target="#articleDetailModal">Baca Selengkapnya</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php foreach ($artikel as $data): ?>
                <!-- Article Detail Modal -->
                <div class="modal fade" id="articleDetailModal" tabindex="-1" aria-labelledby="articleDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="articleDetailModalLabel">Detail Artikel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="articleDetailContent">
                                <div class="container">
                                    <div class="row bg-white shadow-sm rounded p-3" style="max-width: 900px; margin: auto;">
                                        <!-- Image Section -->
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <img id="articleDetailGambar"
                                                src="<?= base_url('/Assets/Images/Artikel/' . htmlspecialchars($data->gambar)); ?>"
                                                alt="Artikel Image"
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
        </div>
        <div class="row justify-content-center mt-4">
            <a href="<?= base_url() ?>/artikel" class="news-more-button btn text-light shadow-md"> Berita Selengkapnya </a>
        </div>
    </section>
    <!-- End of Kabar Terbaru -->

    <!-- Fasilitas Terbaru -->
    <section id="fasilitas">
        <div class="fasilitas-container">
            <div class="fasilitas-header">
                <h2>Fasilitas</h2>
            </div>
            <div class="fasilitas-inner row ">
                <div class="fasilitas-card-container">
                    <?php foreach ($fasilitas as $data): ?>
                        <div class="fasilitas-card card shadow-md m-2 col-12">
                            <img src="<?= base_url('/Assets/Images/Fasilitas/' . $data->gambar); ?>" alt="" class="fasilitas-card-img">
                            <div class="centered ">
                                <p class="mt-2"><?= $data->judul; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Fasilitas Terbaru -->

    <!-- Prestasi Santri -->
    <section id="prestasi">
        <div class="prestasi-header">
            <h2>Prestasi Santri</h2>
        </div>
        <div class="prestasi-container">
            <?php
            // Get the last 3 items from $artikel
            $latest_prestasi = array_slice(array_reverse($prestasi), 0, 3);

            foreach ($latest_prestasi as $data): ?>
                <div class="card prestasi-card shadow-sm ">
                    <div class="row g-0">
                        <div class="col-12 col-md-6 prestasi-img-container">
                            <img src="<?= base_url('/Assets/Images/Prestasi/' . $data->gambar); ?>" alt="" class="prestasi-img img-fluid">
                        </div>
                        <div class="col-12 col-md-6 prestasi-desc-container">
                            <h5 class="card-title"><?= $data->judul; ?></h5>
                            <p class="card-text"><?= $data->deskripsi; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= date('d F Y', strtotime($data->tanggal_input)); ?></small></p>
                            <a class="btn btn-card text-light shadow-md" onclick="loadPrestasiDetail(<?= $data->id ?>)" data-bs-toggle="modal" data-bs-target="#prestasiDetailModal">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach ($prestasi as $data): ?>
                <!-- Prestasi Detail Modal -->
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
                                                alt="Artikel Image"
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
        <div class="row justify-content-center mt-4">
            <a class="prestasi-more-button btn text-light shadow-md" href="<?= base_url() ?>/prestasi"> Prestasi Lainnya </a>
        </div>
    </section>
    <!-- End of Prestasi Santri -->

    <!-- Review Terbaru -->
    <section id="review">
        <div class="review-container col">
            <div class="row review-header ">
                <h2>Kenapa Harus</h2>
                <h2 style="font-weight: bold;">TPA Sabilul Muhtadin</h2>
            </div>
            <div class="row review-inner ">
                <div class="review-card-container">
                    <?php foreach ($review as $data): ?>
                        <div class="review-card card shadow-md">
                            <img src="<?= base_url('/Assets/Images/template/review-bg.png'); ?>" alt="" class="review-card-img">
                            <div class="centered-review ">
                                <p class="mt-2"><?= $data->nama; ?></p>
                                <p class="mt-2"><?= $data->deskripsi; ?></p>
                                <p class="mt-2"><?= $data->angkatan; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Review -->
</div>