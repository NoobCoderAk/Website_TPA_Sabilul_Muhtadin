<div class="col" style="min-height: 100vh;">
    <!-- Header Section -->
    <div class="bg-success text-white text-center py-4" style="background-image: url('header-image.jpg'); background-size: cover;">
        <h1 class="display-4">FAQ</h1>
    </div>

    <!-- Main FAQ Section -->
    <div class="container my-5 text-center">
        <h2 style="color: #6c757d;">Kumpulan Pertanyaan</h2>
        <p style="color: #9c9c9c;">silahkan cari topik yang anda bingungkan</p>
    </div>

    <!-- FAQ Cards -->
    <div class="container mb-5">
        <div class="row">
            <?php foreach ($pertanyaan as $data): ?>
                <!-- Card-->
                <div class="col-md-4 mb-4">
                    <div class="border rounded p-4 text-center" style="height: 100%; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <div class="mb-3">
                            <span class="rounded-circle bg-warning d-inline-block p-2" style="color: #fff;">?</span>
                        </div>
                        <h5><?= $data->pertanyaan; ?></h5>
                        <p><?= $data->jawaban; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <!-- Pagination -->
        <div class="pagination justify-content-center">
            <?= $pager->links('default', 'pagination') ?>
        </div>
        <!-- end Pagination -->
    </div>
</div>