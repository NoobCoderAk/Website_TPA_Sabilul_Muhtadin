<?= $this->extend('admin/layout/template'); ?>
<!-- initialize section as contentView -->
<?= $this->Section('contentView'); ?>
<div class="container-fluid" style="margin-top: 60px;">
    <div class="row justify-content-center">
        <!-- Main Content -->
        <div class="col-md-9 col-sm-12 ">
            <header class="text-center py-4 bg-light">
                <h1>Selamat Datang</h1>
                <p>TPA Sabilul Muhtadin</p>
            </header>
            <!-- Dashboard Cards -->
            <div class="card-container row text-center my-4">
                <h5 class="text-start text-light p-1">Dashboard</h5>
                <div class="row justify-content-evenly">
                    <div class="dash-card card">
                        <div class="card-body row">
                            <div class="card-text-container col">
                                <h5 class="row">Tenaga Pengajar</h5>
                                <p class="row"><?= $countPengajar; ?></p>
                            </div>
                            <div class="card-img-container col">
                                <img class="card-img" src="/Assets/Images/template/dash-pengajar.png" alt="icon" />
                            </div>
                        </div>
                    </div>
                    <div class="dash-card card">
                        <div class="card-body row">
                            <div class="card-text-container col">
                                <h5 class="row">Artikel</h5>
                                <p class="row"><?= $countArtikel; ?></p>
                            </div>
                            <div class="card-img-container col">
                                <img class="card-img" src="/Assets/Images/template/dash-artikel.png" alt="icon" />
                            </div>
                        </div>
                    </div>
                    <div class="dash-card card">
                        <div class="card-body row">
                            <div class="card-text-container col">
                                <h5 class="row">Fasilitas</h5>
                                <p class="row"><?= $countFasilitas; ?></p>
                            </div>
                            <div class="card-img-container col">
                                <img class="card-img" src="/Assets/Images/template/dash-fasilitas.png" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>