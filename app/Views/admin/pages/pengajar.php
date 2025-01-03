<?= $this->extend('admin/layout/template'); ?>
<?= $this->Section('contentView'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                        <h4 class="fa-table me-1 fw-bold">Tenaga Pengajar</h4>
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
                                    }, 2000);
                                </script>
                            <?php endif; ?>

                            <!-- Responsive Table -->
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Gambar</th>
                                            <th>Pengalaman</th>
                                            <th>Tanggal Input</th>
                                            <th>Tanggal Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_pengajar as $pengajar) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pengajar->nama ?></td>
                                                <td><?= $pengajar->jabatan ?></td>
                                                <td><img src="<?= base_url("Assets/Images/Pengajar/" . $pengajar->gambar) ?>" style="height:100px; width:100px;" alt=""></td>
                                                <td><?= $pengajar->pengalaman ?></td>
                                                <td><?= $pengajar->tanggal_input ?></td>
                                                <td><?= $pengajar->tanggal_edit ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $pengajar->id ?>"><i class="fas fa-edit"></i>Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $pengajar->id ?>"><i class="fas fa-trash"></i>Hapus</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengajar</h1>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/add/pengajar/'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_pengajar">Nama </label>
                            <input type="text" name="nama_pengajar" id="nama_pengajar" class="form-control" required>
                            <label for="jabatan_pengajar">Jabatan </label>
                            <input type="text" name="jabatan_pengajar" id="jabatan_pengajar" class="form-control" required>
                            <label for="gambar_pengajar">Gambar </label>
                            <input type="file" name="gambar_pengajar" id="gambar_pengajar" class="form-control" required>
                            <label for="pengalaman_pengajar">Pengalaman </label>
                            <input type="text" name="pengalaman_pengajar" id="pengalaman_pengajar" class="form-control" required>
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
    <?php foreach ($daftar_pengajar as $pengajar) : ?>
        <div class="modal fade" id="editModal<?= $pengajar->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tenaga Pengajar</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit/pengajar/' . $pengajar->id); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama_pengajar">Nama</label>
                                <input type="text" name="nama_pengajar" id="nama_pengajar" class="form-control" value="<?= $pengajar->nama ?>">
                                <label for="jabatan_pengajar">Jabatan</label>
                                <input type="text" name="jabatan_pengajar" id="jabatan_pengajar" class="form-control" value="<?= $pengajar->jabatan ?>">
                                <label for="gambar_artikel">Gambar </label>
                                <input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control" value="<?= $pengajar->gambar ?>">
                                <label for="pengalaman_pengajar">Pengalaman</label>
                                <input type="text" name="pengalaman_pengajar" id="pengalaman_pengajar" class="form-control" value="<?= $pengajar->pengalaman ?>">
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
    <?php foreach ($daftar_pengajar as $pengajar) : ?>
        <div class="modal fade" id="hapusModal<?= $pengajar->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Tenaga Pengajar</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/delete/pengajar/' . $pengajar->id); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="mb-3">
                                <p> Apakah anda yakin ? mengahpus <?= ' "', $pengajar->nama, '" '  ?> <strong>akan menghapus data yang berkaitan dengan data ini !!</strong></p>
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