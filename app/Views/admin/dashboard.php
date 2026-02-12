<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: #f4f6f9;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .card {
            border: none;
            border-radius: 14px;
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f1f1;
            font-weight: 600;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn {
            border-radius: 8px;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <span class="navbar-brand fw-semibold">
            <i class="bi bi-building"></i> Alpha Kost Admin
        </span>
        <a href="/" class="btn btn-light btn-sm" target="_blank">
            <i class="bi bi-box-arrow-up-right"></i> Landing Page
        </a>
    </div>
</nav>

<div class="container" style="max-width:1100px;">

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Kelola Harga -->
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <i class="bi bi-cash-coin me-2"></i>Kelola Harga Kamar
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Tipe Kamar</th>
                            <th width="180">Harga (Rp)</th>
                            <th>Template Pesan WA</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $r) : ?>
                        <tr>
                            <form action="/admin/updateRoom/<?= $r['id'] ?>" method="post">
                                <td class="fw-semibold"><?= $r['room_type'] ?></td>
                                <td>
                                    <input type="number" name="price" 
                                        class="form-control form-control-sm" 
                                        value="<?= (int)$r['price'] ?>">
                                </td>
                                <td>
                                    <input type="text" name="wa_template" 
                                        class="form-control form-control-sm" 
                                        value="<?= $r['wa_template'] ?>">
                                </td>
                                <td>
                                    <button type="submit" 
                                        class="btn btn-success btn-sm w-100">
                                        <i class="bi bi-check-lg"></i> Simpan
                                    </button>
                                </td>
                            </form>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Profil Kost -->
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <i class="bi bi-house-door me-2"></i>Manajemen Profil Kost
        </div>
        <div class="card-body">
            <form action="/admin/updateSettings" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat Kost</label>
                        <input type="text" name="settings[address]" 
                            class="form-control" value="<?= $address ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No HP Pak Raji (Format: 628...)</label>
                        <input type="text" name="settings[phone]" 
                            class="form-control" value="<?= $phone ?>">
                    </div>
                </div>

                <button class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Profil
                </button>
            </form>
        </div>
    </div>

    <!-- Informasi Kost -->
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <i class="bi bi-info-circle me-2"></i>Informasi Kost
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Nama:</strong> Alpha Kost
                </li>
                <li class="list-group-item">
                    <strong>Owner:</strong> Pak Raji (+62 877-3835-0820)
                </li>
                <li class="list-group-item">
                    <strong>Alamat:</strong> Jl. Simongan No.41, Semarang
                </li>
            </ul>
        </div>
    </div>

    <!-- Keamanan -->
    <div class="card shadow-sm border-0">
        <div class="card-header text-danger">
            <i class="bi bi-shield-lock me-2"></i>Keamanan Akun
        </div>
        <div class="card-body">
            <form action="/admin/updatePassword" method="post" class="row g-3">
                <div class="col-md-6">
                    <input type="password" name="new_password" 
                        class="form-control" placeholder="Password Baru">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger w-100">
                        <i class="bi bi-key"></i> Ubah Password
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
