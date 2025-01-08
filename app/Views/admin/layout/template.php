<?php

use App\Controllers\Admin\Dashboard;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('admin'); ?>/css/admin_styles.css">


    <!-- library tinyTinyMCE cloud untuk textaerea custom -->

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="font-family: Arial, sans-serif;">

    <nav class="navbar navbar-dark bg-dark fixed-top w-100">
        <div class="container-fluid">
            <!-- Navbar Brand and Toggler -->
            <div class="d-flex align-items-center justify-content-between w-100">
                <div class="d-flex align-items-center ms-4">
                    <a class="navbar-brand" href="#">TPA Sabilul Muhtadin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div>
                    <button type="button"
                        class="btn"
                        data-bs-toggle="popover"
                        data-bs-html="true"
                        data-bs-placement="left"
                        data-bs-content='
                        <div class="text-center">
                            <img src="/Assets/Images/template/profile.png" alt="Sample Image" class="img-fluid rounded mb-2" style="width:20px !important; height:20px !important;">
                            <a href="<?= base_url('admin/edit-account') ?>" class="btn btn-link text-light fw-bold">Manajemen Akun</a>
                            <a href="<?= base_url('admin/logout') ?>" class="btn btn-danger w-50">Log Out</a> 
                        </div>'>
                        <img src="/Assets/Images/template/profile.png" alt="Sample Image" class="img-fluid rounded mb-2" style="width:50px; height:50px;">
                    </button>
                </div>
            </div>

            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">TPA Sabilul Muhtadin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Main Navigation Links -->
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                    </ul>

                    <!-- Pages Section -->
                    <div class="mt-4">
                        <h6 class="mb-3 text-secondary fw-bold">PAGES</h6>
                        <ul class="navbar-nav ms-2 justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?= base_url("Assets/Images/template/beranda-icon.png"); ?>" style="height:18px; width:18px; margin-right:8px;" alt="">Beranda</a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="<?= base_url('admin/fasilitas') ?>">Fasilitas</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin/review') ?>">Testimoni</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?= base_url("Assets/Images/template/publikasi-icon.png"); ?>" style="height:18px; width:18px; margin-right:8px;" alt="">Publikasi</a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="<?= base_url('admin/jadwal') ?>">Jadwal Kegiatan</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin/artikel') ?>">Kabar Terbaru</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin/prestasi') ?>">Prestasi TPA</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/pengajar') ?>"><img src="<?= base_url("Assets/Images/template/pengajar-icon.png"); ?>" style="height:18px; width:18px; margin-right:8px;" alt="">Tenaga Pengajar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/pertanyaan') ?>"><img src="<?= base_url("Assets/Images/template/faq-icon.png"); ?>" style="height:18px; width:18px; margin-right:8px;" alt="">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/kontak') ?>"><img src="<?= base_url("Assets/Images/template/kontak-icon.png"); ?>" style="height:18px; width:18px; margin-right:8px;" alt="">Hubungi Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/edit-account') ?>"><img src="<?= base_url("Assets/Images/template/profile.png"); ?>" style="height:20px; width:20px; margin-right:8px;" alt="">Manajemen Akun</a>
                            </li>
                            <li class="nav-item mt-3">

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div style="height: 100px;">

    </div>


    <!-- to render content page -->
    <?= $this->renderSection('contentView') ?>


    <!-- Bootstrap and JavaScript CDN -->
    <script src="https://kit.fontawesome.com/e5ef487ae9.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('Assets'); ?>/admin/js/datatables-simple-demo.js"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>


</body>

</html>