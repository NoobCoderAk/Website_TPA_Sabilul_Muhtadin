<!-- app/Views/registration_form.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>

    <h2>Register</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green;">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="/registration" method="post">
        <?= csrf_field(); ?>

        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= old('username'); ?>" required>
            <?php if (isset($validation) && $validation->getError('username')): ?>
                <div style="color: red;">
                    <?= $validation->getError('username'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <?php if (isset($validation) && $validation->getError('password')): ?>
                <div style="color: red;">
                    <?= $validation->getError('password'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>

</body>

</html>