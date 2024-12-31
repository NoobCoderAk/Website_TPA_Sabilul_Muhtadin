<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style=" margin: 0; padding: 0; height: 100vh; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
    <div class="d-flex flex-row shadow rounded overflow-hidden" style=" width:100%; height: 100%;">
        <!-- Left Panel -->
        <div class="d-flex flex-column align-items-center justify-content-center w-50" style="background-color: #ffffff; flex: 1;">
            <img src="https://via.placeholder.com/150" alt="Logo" style="max-width: 150px; margin-bottom: 20px;" />
            <h1 style="font-family: 'Brush Script MT', cursive; font-size: 2.5rem; text-align: center; margin: 0;">Bismillah</h1>
            <p style="font-size: 1.2rem; font-weight: 600; text-align: center;">Selamat Datang<br>TPQ Sabilul Muhtadin</p>
        </div>

        <!-- Right Panel -->
        <div class="d-flex flex-column justify-content-center text-white w-50" style="background-color: #2b3b4c; flex: 1; padding: 0% 0% 0% 20%;">
            <h3 class="mb-3" style="font-size: 1.8rem;">Masuk</h3>
            <p class="mb-4">Silahkan Login Dengan Akun yang telah disediakan</p>
            <form action="<?= base_url('login'); ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" required style="border-radius: 25px; max-width:500px;">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required style="border-radius: 25px; max-width:500px;">
                </div>
                <button type="submit" class="btn btn-light" style="border-radius: 25px; padding: 1% 2% 1% 2%; font-weight: 600; max-width:120px;">Masuk</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>