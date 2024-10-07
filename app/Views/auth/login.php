<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tonggeret</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Login</h2>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/auth/loginUser') ?>" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>Don't have an account? <a href="<?= base_url('/auth/register') ?>">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
