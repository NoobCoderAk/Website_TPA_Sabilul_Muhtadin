<?= $this->extend('admin/layout/template'); ?>
<?= $this->Section('contentView'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fa-table me-1 fw-bold">Artikel</h4>
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
                                        <?php foreach ($daftar_artikel as $artikel) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><img src="<?= base_url("Assets/Images/Artikel/" . $artikel->gambar) ?>" style="height:100px; width:100px;" alt=""></td>
                                                <td><?= $artikel->judul ?></td>
                                                <td style="max-width: 400px; ">
                                                    <p style="display:inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;"><?= $artikel->deskripsi ?></p>
                                                </td>
                                                <td><?= $artikel->author ?></td>
                                                <td><?= $artikel->tanggal_input ?></td>
                                                <td><?= $artikel->tanggal_edit ?></td>
                                                <td>
                                                    <button type=" button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $artikel->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $artikel->id ?>"><i class="fas fa-trash"></i>Hapus</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/artikel/'); ?>" method="post" enctype="multipart/form-data" id="tambahArtikel">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="judul_artikel">Judul </label>
                            <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" required>

                            <label for="deskripsi_artikel">Deskripsi</label>
                            <textarea class="form-control" placeholder="Tuliskan deskripsi artikel disini..." id="deskripsi_artikel" name="deskripsi_artikel" style="height: 100px" required></textarea>

                            <label for="author_artikel">Nama Penulis </label>
                            <input type="text" name="author_artikel" id="author_artikel" placeholder="Masukkan nama penulis disini..." class="form-control" required>

                            <label for="gambar_artikel">Gambar </label>
                            <input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control" required>
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
    <?php foreach ($daftar_artikel as $artikel) : ?>
        <div class="modal fade" id="editModal<?= $artikel->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artikel</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/artikel/' . $artikel->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="judul_artikel">Judul</label>
                                <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" value="<?= $artikel->judul ?>">

                                <label for="deskripsi_artikel">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi_artikel" name="deskripsi_artikel" style="height: 100px"> <?= $artikel->deskripsi ?> </textarea>

                                <label for="author_artikel">Nama Penulis </label>
                                <input type="text" name="author_artikel" id="author_artikel" class="form-control" value="<?= $artikel->author ?>">

                                <label for="gambar_artikel">Gambar </label>
                                <input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control" value="<?= $artikel->gambar ?>">
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
    <?php foreach ($daftar_artikel as $artikel) : ?>
        <div class="modal fade" id="hapusModal<?= $artikel->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus artikel</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/artikel/' . $artikel->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <p> Apakah anda yakin untuk menghapus Artikel <?= ' "', $artikel->judul, '" '  ?> ini ?</p>
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