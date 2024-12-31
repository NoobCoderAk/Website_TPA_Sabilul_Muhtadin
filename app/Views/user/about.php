<div class="col" style="min-height: 100vh;">
    <!-- Header Section -->
    <div class="bg-success text-white text-center py-4 mb-4" style="background-image: url('header-image.jpg'); background-size: cover;">
        <h1 class="display-4">Tentang Kami</h1>
    </div>
    <!-- Deskripsi Section with Image and Text -->
    <section id="aboutJumbotron" class="mb-5 shadow-sm">
        <div class="aboutJumbotron-container row d-flex flex-wrap h-100">
            <div class="aboutJumbotron-img-container col-12 col-md-6 bg-success d-flex justify-content-center align-items-center p-0">
                <img src="/Assets/Images/dummy/ngaji-1.png" class="aboutJumbotron-img img-fluid w-100">
            </div>

            <div class="aboutJumbotron-desc-container col-12 col-md-6 d-flex justify-content-center align-items-center p-4">
                <div class="aboutJumbotron-desc">
                    <h5 class="text-dark">Tentang Kami</h5>
                    <h2 class="text-dark">TPA Sabilul Muhtadin</h2>
                    <p class="text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, fugit cum. Impedit, soluta? Esse natus, reiciendis ex quibusdam, veniam nulla quos hic alias libero odit incidunt eius corrupti porro iure! Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores numquam quisquam adipisci modi soluta minus, cumque, rerum quo fugiat consequatur harum aut! Pariatur explicabo laborum, sapiente nihil expedita totam omnis.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Deskripsi Section -->

    <!-- Visi-misi -->
    <section id="aboutVisiMisi" class="mb-5 p-5 shadow">
        <div class="aboutVisiMisi-visi mb-4">
            <h2 class="text-success">Visi</h2>
            <p>Santri yang cerdas dan berakhlakul karimah (CERAH)</p>
        </div>

        <div class="aboutVisiMisi-misi mb-4">
            <h2 class="text-success">Misi</h2>
            <ol>
                <li>Memberikan lingkungan belajar yang islami</li>
                <li>Menyelenggarakan kegiatan belajar Al-Qur'an</li>
                <li>Meningkatkan kompetensi santri dan pendidik dibidang pelajaran agama</li>
            </ol>
        </div>

        <div class="aboutVisiMisi-tujuan mb-4">
            <h2 class="text-success">Tujuan</h2>
            <ol>
                <li>Mampu membaca Al-Qur'an dengan baik sesuai dengan kaidah Ilmu Tajwid.</li>
                <li>Mampu mengembangkan potensi peserta didik (santri) ke arah pembinaan sikap, pengetahuan dan keterampilan agama.</li>
                <li>Mempersiapkan peserta didik (santri) agar mampu mengembangkan sikap dan keterampilan keagamaan yang telah dimilikinya melalui program pendidikan lanjutan</li>
            </ol>
        </div>

        <div class="aboutVisiMisi-mutu mb-4">
            <h2 class="text-success">Sasaran Mutu</h2>
            <ol>
                <li>Santri memahami dan mempraktekkan bacaan Al-Qur'an dengan Ilmu Tajwid</li>
                <li>Santri dan pendidik Berakhlakul Karimah</li>
                <li>Pendidik yang Profesional dibidang agama</li>
            </ol>
        </div>
    </section>
    <!-- End of Visi-Misi  -->

    <!-- Tenaga Pengajar -->
    <section id="aboutTenagaPengajar">
        <div class="aboutTenagaPengajar-header">
            <h2>Tenaga Pegajar</h2>
        </div>
        <div class="aboutTenagaPengajar-inner row ">
            <div class="aboutTenagaPengajar-container">
                <?php foreach ($pengajar as $data): ?>
                    <div class="news-page-card card col-lg-3  col-12">
                        <img src="<?= base_url('/Assets/Images/Pengajar/' . $data->gambar); ?>" class="card-img-top news-page-card-img" alt="Image of Quranic study session">
                        <div class="card-body news-page-card-body">
                            <p class="card-text"><?= $data->jabatan; ?></p>
                            <h5 class="card-title"><?= $data->nama; ?></h5> <br>
                            <p class="card-text">Lama Mengajar:</p>
                            <p class="card-text"><?= $data->pengalaman; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= date('d F Y', strtotime($data->tanggal_input)); ?></small></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- End of Tenaga Pengajar -->
</div>