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
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="font-family: Arial, sans-serif;">

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <div class="row w-100 m-auto">
                <div class="col col-4 ">
                    <a class="navbar-brand" href="#">TPA Sabilul Muhtadin</a>
                    <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">TPA Sabilul Muhtadin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <h6 class="mb-3" style="color:grey; font-weight:bold;">PAGES</h6>
                        <ul class="navbar-nav ms-2  justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Beranda
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="<?= base_url('admin/fasilitas') ?>">Fasilitas</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin/review') ?>">Testimoni</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Publikasi
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="<?= base_url('admin/jadwal') ?>">Jadwal Kegiatan</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin/artikel') ?>">Kabar Terbaru</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin/prestasi') ?>">Prestasi TPA</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/pengajar') ?>">Tenaga Pengajar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/pertanyaan') ?>">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/kontak') ?>">Hubungi Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Manajemen Akun</a>
                            </li>

                            <button type="submit" onclick="location.href = '<?= base_url() ?>/admin/logout';" class="btn btn-danger" style="text-align: center; max-width:80px;">Log out</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div style="height: 80px;">

    </div>


    <!-- to render content page -->
    <?= $this->renderSection('contentView') ?>

    <!-- Bootstrap and JavaScript CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('Assets'); ?>/admin/js/datatables-simple-demo.js"></script>


</body>

</html>