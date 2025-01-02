<?= $this->extend('admin/layout/template'); ?>
<?= $this->Section('contentView'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Review
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
                                    }, 2000); // 3000ms = 3 seconds
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Testimoni</th>
                                            <th>Periode</th>
                                            <th>Tanggal Input</th>
                                            <th>Tanggal Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_review as $review) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $review->nama ?></td>
                                                <td><?= $review->deskripsi ?></td>
                                                <td><?= $review->angkatan ?></td>
                                                <td><?= $review->tanggal_input ?></td>
                                                <td><?= $review->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $review->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $review->id ?>"><i class="fas fa-trash"></i>Hapus</button>
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
                <div class="modal-header  bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Review</h1>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/review/'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_review">Nama </label>
                            <input type="text" name="nama_review" id="nama_review" class="form-control" required>
                            <label for="deskripsi_review">Deskripsi </label>
                            <input type="text" name="deskripsi_review" id="deskripsi_review" class="form-control" required>
                            <label for="angkatan_review">Angkatan </label>
                            <input type="text" name="angkatan_review" id="angkatan_review" class="form-control" required>
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
    <?php foreach ($daftar_review as $review) : ?>
        <div class="modal fade" id="editModal<?= $review->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Review</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/review/' . $review->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama_review">Nama</label>
                                <input type="text" name="nama_review" id="nama_review" class="form-control" value="<?= $review->nama ?>" required>
                                <label for="deskripsi_review">Deskripsi</label>
                                <input type="text" name="deskripsi_review" id="deskripsi_review" class="form-control" value="<?= $review->deskripsi ?>" required>
                                <label for="angkatan_review">Angkatan</label>
                                <input type="text" name="angkatan_review" id="angkatan_review" class="form-control" value="<?= $review->angkatan ?>" required>
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
    <?php foreach ($daftar_review as $review) : ?>
        <div class="modal fade" id="hapusModal<?= $review->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header  bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Review</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/review/' . $review->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <!-- <input type="hidden" name="_DELETE"> -->
                                <p> Apakah anda yakin untuk menghapus Review <?= ' "', $review->nama, '" '  ?> ini ?</p>
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