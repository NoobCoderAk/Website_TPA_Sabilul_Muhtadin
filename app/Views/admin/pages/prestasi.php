<?= $this->extend('admin/layout/template'); ?>
<?= $this->Section('contentView'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fa-table me-1 fw-bold">Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                <i class="fas fa-plus"></i>
                                Tambah
                            </button>

                            <?php if (session('success')) : ?>
                                <div class="alert alert-success" role="alert" id="alert">
                                    <?= session('success') ?>
                                </div>
                                <script>
                                    setTimeout(() => {
                                        const alertElement = document.getElementById('alert');
                                        if (alertElement) {
                                            alertElement.remove();
                                        }
                                    }, 2000); // 1000ms = 1 seconds
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Nama Penulis</th>
                                            <th>tanggal_input</th>
                                            <th>tanggal_edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_prestasi as $prestasi) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><img src="<?= base_url("Assets/Images/Prestasi/" . $prestasi->gambar) ?>" style="height:100px; width:100px;" alt=""></td>
                                                <td><?= $prestasi->judul ?></td>
                                                <td style="max-width: 400px;">
                                                    <p style="display:inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                                        <?= $prestasi->deskripsi ?>
                                                    </p>
                                                </td>
                                                <td><?= $prestasi->author ?></td>
                                                <td><?= $prestasi->tanggal_input ?></td>
                                                <td><?= $prestasi->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $prestasi->id ?>"><img src="<?= base_url("Assets/Images/template/delete_icon.png"); ?>" style="height:28px; width:24px;" alt=""></button>
                                                    <button type="button" class="btn btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $prestasi->id ?>"><img src="<?= base_url("Assets/Images/template/edit_icon.png"); ?>" style="height:28px; width:24px;" alt=""></button>
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


    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Prestasi</h1>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/prestasi/'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="judul_prestasi">Judul </label>
                            <input type="text" name="judul_prestasi" id="judul_prestasi" class="form-control" required>

                            <label for="deskripsi_prestasi">Deskripsi</label>
                            <textarea class="form-control" placeholder="Tuliskan deskripsi prestasi disini..." id="deskripsi_prestasi" name="deskripsi_prestasi" style="height: 100px" required></textarea>

                            <label for="author_prestasi">Nama Penulis </label>
                            <input type="text" name="author_prestasi" id="author_prestasi" placeholder="Masukkan nama penulis disini..." class="form-control" required>

                            <label for="gambar_prestasi">Gambar </label>
                            <input type="file" name="gambar_prestasi" id="gambar_prestasi" class="form-control" required>
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
    <?php foreach ($daftar_prestasi as $prestasi) : ?>
        <div class="modal fade" id="editModal<?= $prestasi->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Prestasi</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/prestasi/' . $prestasi->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="judul_prestasi">Judul</label>
                                <input type="text" name="judul_prestasi" id="judul_prestasi" class="form-control" value="<?= $prestasi->judul ?>">

                                <label for="deskripsi_prestasi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi_prestasi" name="deskripsi_prestasi" style="height: 100px" required> <?= $prestasi->deskripsi ?> </textarea>

                                <label for="author_prestasi">Nama Penulis </label>
                                <input type="text" name="author_prestasi" id="author_prestasi" class="form-control" value="<?= $prestasi->author ?>">

                                <label for="gambar_prestasi">Gambar </label>
                                <input type="file" name="gambar_prestasi" id="gambar_prestasi" class="form-control" value="<?= $prestasi->gambar ?>">
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
    <?php foreach ($daftar_prestasi as $prestasi) : ?>
        <div class="modal fade" id="hapusModal<?= $prestasi->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Prestasi</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/hapus/prestasi/' . $prestasi->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <!-- <input type="hidden" name="_DELETE"> -->
                                <p> Apakah anda yakin untuk menghapus Prestasi <?= ' "', $prestasi->judul, '" '  ?> ini ?</p>
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