<div class="col" style="min-height: 100vh;">
    <!-- Header Section -->
    <div class="bg-success text-white text-center py-4 mb-4" style="background-image: url('header-image.jpg'); background-size: cover;">
        <h1 class="display-4">Hubungi Kami</h1>
    </div>
    <div class="container mt-6">
        <!-- Contact Information -->
        <?php foreach ($kontak as $data): ?>
            <div class="row text-center mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card p-3 shadow d-flex align-items-center" style="border-radius: 10px; min-height: 120px;">
                        <div class="d-flex align-items-center w-100">
                            <!-- Image Section -->
                            <div class="me-3">
                                <img src="https://img.icons8.com/color/48/gmail.png" alt="Email Icon" style="width: 48px; height: 48px;">
                            </div>
                            <!-- Text Section -->
                            <div style="text-align:left;">
                                <p class="mb-1" style="font-weight: bold;">Alamat Email</p>
                                <p class="mb-0" style="font-size: 14px;"><?= $data->email; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card p-3 shadow d-flex align-items-center" style="border-radius: 10px; min-height: 120px;">
                        <div class="d-flex align-items-center w-100">
                            <!-- Image Section -->
                            <div class="me-3">
                                <img src="https://img.icons8.com/color/48/phone.png" alt="Phone Icon" style="width: 48px; height: 48px;">
                            </div>
                            <!-- Text Section -->
                            <div style="text-align:left;">
                                <p class="mb-1" style="font-weight: bold;">No Telepon</p>
                                <p class="mb-0" style="font-size: 14px;"><?= $data->no_telp; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card p-3 shadow d-flex align-items-center" style="border-radius: 10px; min-height: 120px;">
                        <div class="d-flex align-items-center w-100">
                            <!-- Image Section -->
                            <div class="me-3">
                                <img src="https://img.icons8.com/color/48/clock.png" alt="Open Hours Icon" style="width: 48px; height: 48px;">
                            </div>
                            <!-- Text Section -->
                            <div style="text-align:left;">
                                <p class="mb-1" style="font-weight: bold;">Jam Buka</p>
                                <p class="mb-0" style="font-size: 14px;"><?= $data->jam_buka; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card p-3 shadow d-flex align-items-center" style="border-radius: 10px; min-height: 120px;">
                        <div class="d-flex align-items-center w-100">
                            <!-- Image Section -->
                            <div class="me-3">
                                <img src="https://img.icons8.com/color/48/marker.png" alt="Location Icon" style="width: 48px; height: 48px;">
                            </div>
                            <!-- Text Section -->
                            <div style="text-align:left;">
                                <p class="mb-1" style="font-weight: bold;">Lokasi</p>
                                <p class="mb-0" style="font-size: 14px;"><?= $data->alamat; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Map Section -->
        <div class="row mb-4">
            <div class="col-8">
                <div class="card shadow" style="border-radius: 10px; overflow: hidden;">
                    <iframe
                        src="<?= $data->link_maps; ?>"
                        width="100%"
                        height="600"
                        style="border: 0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="col-4">
                <div class="card p-3 shadow text-start" style="border-radius: 10px;">
                    <h5 style="font-weight: bold;">Sosial Media</h5>
                    <a href="#" class="d-block mb-2" style="text-decoration: none; color: #E4405F;">
                        <img src="https://img.icons8.com/color/48/instagram-new.png" alt="Instagram Icon" style="width: 32px; height: 32px;">
                        @TPQ Sabilul Muhtadin
                    </a>
                    <a href="#" class="d-block" style="text-decoration: none; color: #3b5998;">
                        <img src="https://img.icons8.com/color/48/facebook-new.png" alt="Facebook Icon" style="width: 32px; height: 32px;">
                        TPQ Sabilul Muhtadin
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>