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
                            Hubungi Kami
                        </div>
                        <div class="card-body">
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

                            <form
                                action="<?= base_url('admin/update/kontak/'); ?>"
                                method="post"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $kontak->id ?? ''; ?>">

                                <div class="mb-3">
                                    <!-- Email -->
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        placeholder="Masukkan Email disini..."
                                        class="form-control"
                                        value="<?= $kontak->email ?? ''; ?>">

                                    <!-- Phone -->
                                    <label for="phone">No. Telepon</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        placeholder="Masukkan No HP disini..."
                                        value="<?= $kontak->no_telp ?? ''; ?>">

                                    <!-- Jam Buka -->
                                    <label for="jam">Jam Buka</label>
                                    <input
                                        type="time"
                                        name="jam"
                                        id="jam"
                                        placeholder="Masukkan jam disini..."
                                        class="form-control"
                                        value="<?= $kontak->jam_buka ?? ''; ?>">

                                    <!-- Link Google Maps -->
                                    <label for="map">Link Lokasi Google Maps</label>
                                    <input
                                        type="text"
                                        name="map"
                                        id="map"
                                        placeholder="Masukkan link lokasi disini..."
                                        class="form-control"
                                        value="<?= $kontak->link_maps ?? ''; ?>">

                                    <!-- Link WhatsApp -->
                                    <label for="wa">Link WhatsApp</label>
                                    <input
                                        type="text"
                                        name="wa"
                                        id="wa"
                                        placeholder="Masukkan link WhatsApp disini..."
                                        class="form-control"
                                        value="<?= $kontak->link_wa ?? ''; ?>">

                                    <!-- Link WhatsApp -->
                                    <label for="wa">Alamat</label>
                                    <input
                                        type="text"
                                        name="alamat"
                                        id="alamat"
                                        placeholder="Masukkan detail alamat disini..."
                                        class="form-control"
                                        value="<?= $kontak->alamat ?? ''; ?>">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Perbarui Data</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>