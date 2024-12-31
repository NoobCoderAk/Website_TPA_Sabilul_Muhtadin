<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/user/user_styles.css">
    <link rel="icon" href="<?= base_url() ?>/Assets/Images/logo_tpq.png" type="image/png">
</head>

<body>
    <!-- Navbar -->
    <section id="navbar">
        <nav class="navbar fixed-top shadow-lg navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid container-nav">
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <img src="/Assets/Images/logo_tpq.png" alt="Logo" width="40" height="48" class="d-inline-block">
                        </div>
                        <div class="col">
                            <p class="m-0 mt-md-2" style="font-size: 12px; font-weight: normal; margin-left: -6px !important;">
                                Taman Pendidikan Al-Qur'an
                            </p>
                            <h6 class="mb-0 md-2 text-center bg">Sabilul Muhtadin</h6>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link active" href="<?= base_url() ?>">BERANDA</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PUBLIKASI
                            </a>
                            <ul class="dropdown-menu bg-custom">
                                <li><a class="dropdown-item" href="<?= base_url() ?>/jadwal">JADWAL KEGIATAN</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>/artikel">KABAR TERBARU</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>/prestasi">PRESTASI TPA</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>/about">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>/pertanyaan">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <button type="submit" onclick="location.href = '<?= base_url() ?>/kontak';" class="btn btn-primary" style="text-align: center;">Hubungi Kami</button>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>
    </section>
    <!-- End of Navbar -->