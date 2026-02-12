<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Alpha Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7f6; display: flex; align-items: center; height: 100vh; }
        .login-card { width: 100%; max-width: 400px; margin: auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="text-center mb-4">Admin Login</h3>
                
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger small"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form action="/login/process" method="post">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
                <div class="text-center mt-3">
                    <a href="/" class="small text-muted text-decoration-none">← Kembali ke Landing Page</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>