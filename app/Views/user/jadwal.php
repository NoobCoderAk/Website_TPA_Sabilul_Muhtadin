<div class="col" style="min-height: 100vh;">
    <!-- Header Section -->
    <div class="bg-success text-white text-center py-4 mb-4" style="background-image: url('header-image.jpg'); background-size: cover;">
        <h1 class="display-4">Jadwal Kegiatan</h1>
    </div>
    <!-- Main Container -->
    <div id="iqro" class="shadow text-center my-4" style="margin: auto; width: 80%; padding: 2%;">
        <h2 style="color: #5a5abd; font-weight: bold;">Jadwal Pelajaran</h2>
        <h4 style="color: #5a5abd; font-weight: bold;">untuk IQRA</h4>

        <!-- Timetable Cards -->
        <div class="row mt-4">
            <!-- Monday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Senin</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_senin_iqro as $seninIqro) : ?>
                                <li><?= $seninIqro->nama_mata_pelajaran ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tuesday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Selasa</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_selasa_iqro as $seninIqro) : ?>
                                <li><?= $seninIqro->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Wednesday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Rabu</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_rabu_iqro as $seninIqro) : ?>
                                <li><?= $seninIqro->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Thursday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Kamis</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_kamis_iqro as $seninIqro) : ?>
                                <li><?= $seninIqro->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Saturday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Sabtu</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_sabtu_iqro as $seninIqro) : ?>
                                <li><?= $seninIqro->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sunday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Minggu</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_minggu_iqro as $seninIqro) : ?>
                                <li><?= $seninIqro->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Al-Quran Container -->
    <div id="alquran" class="shadow text-center my-4" style="margin: auto; width: 80%; padding: 2%;">
        <h2 style="color: #5a5abd; font-weight: bold;">Jadwal Pelajaran</h2>
        <h4 style="color: #5a5abd; font-weight: bold;">untuk Al-Qur'an</h4>

        <!-- Timetable Cards -->
        <div class="row mt-4">
            <!-- Monday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Senin</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_senin_quran as $seninQuran) : ?>
                                <li><?= $seninQuran->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tuesday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Selasa</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_selasa_quran as $selasaQuran) : ?>
                                <li><?= $selasaQuran->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Wednesday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Rabu</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_rabu_quran as $rabuQuran) : ?>
                                <li><?= $rabuQuran->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Thursday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Kamis</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_kamis_quran as $kamisQuran) : ?>
                                <li><?= $kamisQuran->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Saturday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Sabtu</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_sabtu_quran as $sabtuQuran) : ?>
                                <li><?= $sabtuQuran->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sunday -->
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Minggu</h5>
                        <ul class="text-start">
                            <?php foreach ($hari_minggu_quran as $mingguQuran) : ?>
                                <li><?= $mingguQuran->nama_mata_pelajaran; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>