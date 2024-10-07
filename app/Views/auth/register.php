<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tonggeret</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Register</h2>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/auth/registerUser') ?>" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Register</button>
                <p>Already have an account? <a href="<?= base_url('/auth/login') ?>">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
