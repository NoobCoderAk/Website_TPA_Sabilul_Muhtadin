<?= $this->extend('admin/layout/template'); ?>
<?= $this->Section('contentView'); ?>
<div id="layoutSidenav_content">
    <main>

        <!-- ================================================ jadwal iqro ========================================================================= -->
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Jadwal Iqro
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambahJadwalIqro">
                                <i class="fas fa-plus"></i>
                                Tambah
                            </button>

                            <?php if (session('success-jadwal-iqro')) : ?>
                                <div class="alert alert-success" role="alert" id="alert">
                                    <?= session('success-jadwal-iqro') ?>
                                </div>
                                <script>
                                    setTimeout(() => {
                                        const alertElement = document.getElementById('alert');
                                        if (alertElement) {
                                            alertElement.remove();
                                        }
                                    }, 2000); // 3000ms = 3 seconds
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Hari</th>
                                            <th>Tenaga Pengajar</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Jam</th>
                                            <th>Foto</th>
                                            <th>Tanggal Input</th>
                                            <th>Tanggal Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_jadwal_iqro as $jadwalIqro) :                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $jadwalIqro->hari ?></td>
                                                <!-- Fetching Teacher Name -->
                                                <td>
                                                    <?php
                                                    // Find the teacher by ID
                                                    $pengajar = array_filter($daftar_pengajar, function ($p) use ($jadwalIqro) {
                                                        return $p->id == $jadwalIqro->tenaga_pengajar_id;
                                                    });
                                                    // Display teacher name
                                                    echo !empty($pengajar) ? reset($pengajar)->nama : 'Unknown';
                                                    ?>
                                                </td>
                                                <!-- Fetching Subject Name -->
                                                <td>
                                                    <?php
                                                    // Find the subject by ID
                                                    $mapel = array_filter($daftar_mapel_iqro, function ($m) use ($jadwalIqro) {
                                                        return $m->id == $jadwalIqro->mata_pelajaran_id;
                                                    });
                                                    // Display subject name
                                                    echo !empty($mapel) ? reset($mapel)->nama_mata_pelajaran : 'Unknown';
                                                    ?>
                                                </td>
                                                <td><?= $jadwalIqro->jam ?></td>
                                                <td>
                                                    <?php
                                                    // Find the subject by ID
                                                    $pengajar = array_filter($daftar_pengajar, function ($p) use ($jadwalIqro) {
                                                        return $p->id == $jadwalIqro->tenaga_pengajar_id;
                                                    });
                                                    // Display teacher's image if available
                                                    if (!empty($pengajar)) {
                                                        $pengajar = reset($pengajar);
                                                        // Check if the image exists
                                                        if (!empty($pengajar->gambar)) {
                                                            // Display the image
                                                            echo '<img src="' . base_url('/Assets/Images/Pengajar/' . $pengajar->gambar) . '" alt="Teacher Image" width="50">';
                                                        } else {
                                                            echo 'No image available';
                                                        }
                                                    } else {
                                                        echo 'Teacher not found';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $jadwalIqro->tanggal_input ?></td>
                                                <td><?= $jadwalIqro->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editJadwalIqro<?= $jadwalIqro->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusJadwalIqro<?= $jadwalIqro->id ?>"><i class="fas fa-trash"></i>Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Responsive Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ================================================ jadwal alquran ========================================================================= -->
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Jadwal Al-Qur'an
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambahJadwalQuran">
                                <i class="fas fa-plus"></i>
                                Tambah
                            </button>

                            <?php if (session('success-jadwal-quran')) : ?>
                                <div class="alert alert-success" role="alert" id="alert">
                                    <?= session('success-jadwal-quran') ?>
                                </div>
                                <script>
                                    setTimeout(() => {
                                        const alertElement = document.getElementById('alert');
                                        if (alertElement) {
                                            alertElement.remove();
                                        }
                                    }, 2000); // 3000ms = 3 seconds
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Hari</th>
                                            <th>Tenaga Pengajar</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Jam</th>
                                            <th>Foto</th>
                                            <th>Tanggal Input</th>
                                            <th>Tanggal Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_jadwal_quran as $jadwalQuran) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $jadwalQuran->hari ?></td>
                                                <!-- Fetching Teacher Name -->
                                                <td>
                                                    <?php
                                                    // Find the teacher by ID
                                                    $pengajar = array_filter($daftar_pengajar, function ($p) use ($jadwalQuran) {
                                                        return $p->id == $jadwalQuran->tenaga_pengajar_id;
                                                    });
                                                    // Display teacher name
                                                    echo !empty($pengajar) ? reset($pengajar)->nama : 'Unknown';
                                                    ?>
                                                </td>
                                                <!-- Fetching Subject Name -->
                                                <td>
                                                    <?php
                                                    // Find the subject by ID
                                                    $mapel = array_filter($daftar_mapel_quran, function ($m) use ($jadwalQuran) {
                                                        return $m->id == $jadwalQuran->mata_pelajaran_id;
                                                    });
                                                    // Display subject name
                                                    echo !empty($mapel) ? reset($mapel)->nama_mata_pelajaran : 'Unknown';
                                                    ?>
                                                </td>
                                                <td><?= $jadwalQuran->jam ?></td>
                                                <td>
                                                    <?php
                                                    // Find the subject by ID
                                                    $pengajar = array_filter($daftar_pengajar, function ($p) use ($jadwalQuran) {
                                                        return $p->id == $jadwalQuran->tenaga_pengajar_id;
                                                    });
                                                    // Display teacher's image if available
                                                    if (!empty($pengajar)) {
                                                        $pengajar = reset($pengajar);
                                                        // Check if the image exists
                                                        if (!empty($pengajar->gambar)) {
                                                            // Display the image
                                                            echo '<img src="' . base_url('/Assets/Images/Pengajar/' . $pengajar->gambar) . '" alt="Teacher Image" width="50">';
                                                        } else {
                                                            echo 'No image available';
                                                        }
                                                    } else {
                                                        echo 'Teacher not found';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $jadwalQuran->tanggal_input ?></td>
                                                <td><?= $jadwalQuran->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editJadwalQuran<?= $jadwalQuran->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusJadwalQuran<?= $jadwalQuran->id ?>"><i class="fas fa-trash"></i>Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Responsive Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =============================== Mata Pelajaran Iqro ========================== -->

        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Mata Pelajaran Iqro
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambahMapelIqro">
                                <i class="fas fa-plus"></i>
                                Tambah
                            </button>

                            <?php if (session('success-mapel-iqro')) : ?>
                                <div class="alert alert-success" role="alert" id="alert">
                                    <?= session('success-mapel-iqro') ?>
                                </div>
                                <script>
                                    setTimeout(() => {
                                        const alertElement = document.getElementById('alert');
                                        if (alertElement) {
                                            alertElement.remove();
                                        }
                                    }, 2000); // 3000ms = 3 seconds
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mata Pelajaran</th>
                                            <th>Tanggal Input</th>
                                            <th>Tanggal Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_mapel_iqro as $mapelIqro) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $mapelIqro->nama_mata_pelajaran ?></td>
                                                <td><?= $mapelIqro->tanggal_input ?></td>
                                                <td><?= $mapelIqro->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editMapelIqro<?= $mapelIqro->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusMapelIqro<?= $mapelIqro->id ?>"><i class="fas fa-trash"></i>Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Responsive Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- =============================== Mata Pelajaran Quran ========================== -->

        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Mata Pelajaran Al-Qur'an
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambahMapelQuran">
                                <i class="fas fa-plus"></i>
                                Tambah
                            </button>

                            <?php if (session('success-mapel-quran')) : ?>
                                <div class="alert alert-success" role="alert" id="alert">
                                    <?= session('success-mapel-quran') ?>
                                </div>
                                <script>
                                    setTimeout(() => {
                                        const alertElement = document.getElementById('alert');
                                        if (alertElement) {
                                            alertElement.remove();
                                        }
                                    }, 2000); // 3000ms = 3 seconds
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mata Pelajaran</th>
                                            <th>Tanggal Input</th>
                                            <th>Tanggal Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_mapel_quran as $mapelQuran) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $mapelQuran->nama_mata_pelajaran ?></td>
                                                <td><?= $mapelQuran->tanggal_input ?></td>
                                                <td><?= $mapelQuran->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editMapelQuran<?= $mapelQuran->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusMapelQuran<?= $mapelQuran->id ?>"><i class="fas fa-trash"></i>Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Responsive Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <!-- ################################################## Modal ########################################################################## -->

    <!-- ---------------------------------- modal Jadwal iqro -------------------------------------- -->
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahJadwalIqro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/jadwalIqro'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Pilih Hari</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="monday" value="Senin" checked required>
                                <label class="form-check-label" for="monday">Senin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="tuesday" value="Selasa" required>
                                <label class="form-check-label" for="tuesday">Selasa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="wednesday" value="Rabu" required>
                                <label class="form-check-label" for="wednesday">Rabu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="thursday" value="Kamis" required>
                                <label class="form-check-label" for="thursday">Kamis</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="friday" value="Jum'at" required>
                                <label class="form-check-label" for="friday">Jum'at</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="saturday" value="Sabtu" required>
                                <label class="form-check-label" for="saturday">Sabtu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="sunday" value="Minggu" required>
                                <label class="form-check-label" for="sunday">Minggu</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pengajar" class="form-label">Pengajar</label>
                            <select class="form-select" id="pengajar" name="pengajar" required>
                                <option selected>Pilih Pengajar</option>
                                <?php foreach ($daftar_pengajar as $pengajar) : ?>
                                    <option value="<?= $pengajar->id ?>"><?= $pengajar->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mapel_iqro" class="form-label">Mata Pelajaran</label>
                            <select class="form-select" id="mapel_iqro" name="mapel_iqro">
                                <option selected>Pilih Mata Pelajaran</option>
                                <?php foreach ($daftar_mapel_iqro as $mapelIqro) : ?>
                                    <option value="<?= $mapelIqro->id ?>">
                                        <?= $mapelIqro->nama_mata_pelajaran ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tahum" class="form-label">Periode (Tahun)</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="20xx">
                            </div>
                            <div class="col-md-6">
                                <label for="waktu" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="waktu" name="waktu">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="sumbit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <?php foreach ($daftar_jadwal_iqro as $jadwalIqro) : ?>
        <div class="modal fade" id="editJadwalIqro<?= $jadwalIqro->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/jadwalIqro/' . $jadwalIqro->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label class="form-label">Pilih Hari</label>
                                <!-- Day selection radio buttons -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="monday" value="Senin" checked required>
                                    <label class="form-check-label" for="monday">Senin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="tuesday" value="Selasa" required>
                                    <label class="form-check-label" for="tuesday">Selasa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="wednesday" value="Rabu" required>
                                    <label class="form-check-label" for="wednesday">Rabu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="thursday" value="Kamis" required>
                                    <label class="form-check-label" for="thursday">Kamis</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="friday" value="Jum'at" required>
                                    <label class="form-check-label" for="friday">Jum'at</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="saturday" value="Sabtu" required>
                                    <label class="form-check-label" for="saturday">Sabtu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="sunday" value="Minggu" required>
                                    <label class="form-check-label" for="sunday">Minggu</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pengajar" class="form-label">Pengajar</label>
                                <select class="form-select" id="pengajar" name="pengajar" required>
                                    <option selected>Pilih Pengajar</option>
                                    <?php foreach ($daftar_pengajar as $pengajar) : ?>
                                        <option value="<?= $pengajar->id ?>" <?= $jadwalIqro->tenaga_pengajar_id == $pengajar->id ? 'selected' : '' ?>>
                                            <?= $pengajar->nama ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mapel_iqro" class="form-label">Mata Pelajaran</label>
                                <select class="form-select" id="mapel_iqro" name="mapel_iqro" required>
                                    <option selected>Pilih Mata Pelajaran</option>
                                    <?php foreach ($daftar_mapel_iqro as $mapelIqro) : ?>
                                        <option value="<?= $mapelIqro->id ?>" <?= $jadwalIqro->mata_pelajaran_id == $mapelIqro->id ? 'selected' : '' ?>>
                                            <?= $mapelIqro->nama_mata_pelajaran ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Periode (Tahun)</label>
                                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="20xx" value="<?= $jadwalIqro->periode ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="waktu" class="form-label">Jam</label>
                                    <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $jadwalIqro->jam ?>" required>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- Modal Hapus -->
    <?php foreach ($daftar_jadwal_iqro as $jadwalIqro) : ?>
        <div class="modal fade" id="hapusJadwalIqro<?= $jadwalIqro->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus jadwal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/jadwalIqro/' . $jadwalIqro->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <!-- <input type="hidden" name="_DELETE"> -->
                                <p> Apakah anda yakin untuk menghapus jadwal <?= ' "', $jadwalIqro->mata_pelajaran_id, '" '  ?> ini ?</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- ---------------------------------- modal Jadwal quran -------------------------------------- -->
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahJadwalQuran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/jadwalQuran'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Pilih Hari</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="monday" value="Senin" checked required>
                                <label class="form-check-label" for="monday">Senin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="tuesday" value="Selasa" required>
                                <label class="form-check-label" for="tuesday">Selasa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="wednesday" value="Rabu" required>
                                <label class="form-check-label" for="wednesday">Rabu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="thursday" value="Kamis" required>
                                <label class="form-check-label" for="thursday">Kamis</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="friday" value="Jum'at" required>
                                <label class="form-check-label" for="friday">Jum'at</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="saturday" value="Sabtu" required>
                                <label class="form-check-label" for="saturday">Sabtu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hari" id="sunday" value="Minggu" required>
                                <label class="form-check-label" for="sunday">Minggu</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pengajar" class="form-label">Pengajar</label>
                            <select class="form-select" id="pengajar" name="pengajar" required>
                                <option selected>Pilih Pengajar</option>
                                <?php foreach ($daftar_pengajar as $pengajar) : ?>
                                    <option value="<?= $pengajar->id ?>"><?= $pengajar->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mapel_iqro" class="form-label">Mata Pelajaran</label>
                            <select class="form-select" id="mapel_quran" name="mapel_quran">
                                <option selected>Pilih Mata Pelajaran</option>
                                <?php foreach ($daftar_mapel_quran as $mapelQuran) : ?>
                                    <option value="<?= $mapelQuran->id ?>">
                                        <?= $mapelQuran->nama_mata_pelajaran ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tahum" class="form-label">Periode (Tahun)</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="20xx/20xx">
                            </div>
                            <div class="col-md-6">
                                <label for="waktu" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="waktu" name="waktu">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="sumbit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <?php foreach ($daftar_jadwal_quran as $jadwalQuran) : ?>
        <div class="modal fade" id="editJadwalQuran<?= $jadwalQuran->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit jadwal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/jadwalQuran/' . $jadwalQuran->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label class="form-label">Pilih Hari</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="monday" value="Senin" checked required>
                                    <label class="form-check-label" for="monday">Senin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="tuesday" value="Selasa" required>
                                    <label class="form-check-label" for="tuesday">Selasa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="wednesday" value="Rabu" required>
                                    <label class="form-check-label" for="wednesday">Rabu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="thursday" value="Kamis" required>
                                    <label class="form-check-label" for="thursday">Kamis</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="friday" value="Jum'at" required>
                                    <label class="form-check-label" for="friday">Jum'at</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="saturday" value="Sabtu" required>
                                    <label class="form-check-label" for="saturday">Sabtu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari" id="sunday" value="Minggu" required>
                                    <label class="form-check-label" for="sunday">Minggu</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pengajar" class="form-label">Pengajar</label>
                                <select class="form-select" id="pengajar" name="pengajar" required>
                                    <option selected>Pilih Pengajar</option>
                                    <?php foreach ($daftar_pengajar as $pengajar) : ?>
                                        <option value="<?= $pengajar->id ?>" <?= $jadwalQuran->tenaga_pengajar_id == $pengajar->id ? 'selected' : '' ?>>
                                            <?= $pengajar->nama ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mapel_iqro" class="form-label">Mata Pelajaran</label>
                                <select class="form-select" id="mapel_iqro" name="mapel_iqro" required>
                                    <option selected>Pilih Mata Pelajaran</option>
                                    <?php foreach ($daftar_mapel_iqro as $mapelQuran) : ?>
                                        <option value="<?= $mapelQuran->id ?>" <?= $jadwalQuran->mata_pelajaran_id == $mapelQuran->id ? 'selected' : '' ?>>
                                            <?= $mapelQuran->nama_mata_pelajaran ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="tahum" class="form-label">Periode (Tahun)</label>
                                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="20xx/20xx" value="<?= $jadwalQuran->periode ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="waktu" class="form-label">Jam</label>
                                    <input type="time" class="form-control" id="waktu" name="waktu">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Hapus -->
    <?php foreach ($daftar_jadwal_quran as $jadwalQuran) : ?>
        <div class="modal fade" id="hapusJadwalQuran<?= $jadwalQuran->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus jadwal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/jadwalQuran/' . $jadwalQuran->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <!-- <input type="hidden" name="_DELETE"> -->
                                <p> Apakah anda yakin untuk menghapus jadwal <?= ' "', $jadwalQuran->mata_pelajaran_id, '" '  ?> ini ?</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>



    <!-- ---------------------------------- modal Mapel iqro -------------------------------------- -->
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahMapelIqro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mata Pelajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/mapelIqro'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_mapel_iqro">Nama Mata Pelajaran </label>
                            <input type="text" name="nama_mapel_iqro" id="nama_mapel_iqro" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="sumbit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <?php foreach ($daftar_mapel_iqro as $mapelIqro) : ?>
        <div class="modal fade" id="editMapelIqro<?= $mapelIqro->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mata pelajaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/mapelIqro/' . $mapelIqro->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama_mapel_iqro">Nama Mata Pelajaran </label>
                                <input type="text" name="nama_mapel_iqro" id="nama_mapel_iqro" class="form-control" value="<?= $mapelIqro->nama_mata_pelajaran ?>" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Hapus -->
    <?php foreach ($daftar_mapel_iqro as $mapelIqro) : ?>
        <div class="modal fade" id="hapusMapelIqro<?= $mapelIqro->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Mata Pelajaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/mapelIqro/' . $mapelIqro->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <!-- <input type="hidden" name="_DELETE"> -->
                                <p> Apakah anda yakin ? , mengahapus <?= ' "', $mapelIqro->nama_mata_pelajaran, '" '  ?> <strong>akan menghapus data yang berkaitan dengan data ini !!</strong></p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- ------------------ modal mapel alquran ------------------------------------- -->
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahMapelQuran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mata Pelajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/mapelQuran'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_mapel_quran">Nama Mata Pelajaran </label>
                            <input type="text" name="nama_mapel_quran" id="nama_mapel_quran" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="sumbit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <?php foreach ($daftar_mapel_quran as $mapelQuran) : ?>
        <div class="modal fade" id="editMapelQuran<?= $mapelQuran->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mata Pelajaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/mapelQuran/' . $mapelQuran->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama_mapel_quran">Nama Mata Pelajaran </label>
                                <input type="text" name="nama_mapel_quran" id="nama_mapel_quran" class="form-control" value="<?= $mapelQuran->nama_mata_pelajaran ?>" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Hapus -->
    <?php foreach ($daftar_mapel_quran as $mapelQuran) : ?>
        <div class="modal fade" id="hapusMapelQuran<?= $mapelQuran->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Mata Pelajaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/mapelQuran/' . $mapelQuran->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <!-- <input type="hidden" name="_DELETE"> -->
                                <p> Apakah anda yakin?, menghapus <?= ' "', $mapelQuran->nama_mata_pelajaran, '" '  ?> <strong>akan menghapus data yang berkaitan dengan data ini !!</strong> </p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary btn-sm">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?= $this->endSection(); ?>