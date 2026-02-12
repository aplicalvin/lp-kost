<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
        <span class="navbar-brand">Alpha Kost Admin</span>
        <a href="/" class="btn btn-outline-light btn-sm" target="_blank">Lihat Landing Page</a>
    </div>
</nav>

<div class="container">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-white"><strong>Kelola Harga Kamar</strong></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipe Kamar</th>
                        <th>Harga (Rp)</th>
                        <th>Pesan WA</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rooms as $r) : ?>
                    <tr>
                        <form action="/admin/updateRoom/<?= $r['id'] ?>" method="post">
                            <td><?= $r['room_type'] ?> </td>
                            <td>
                                <input type="number" name="price" class="form-control" value="<?= (int)$r['price'] ?>">
                            </td>
                            <td>
                                <input type="text" name="wa_template" class="form-control" value="<?= $r['wa_template'] ?>">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </td>
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white"><strong>Informasi Kost</strong></div>
        <div class="card-body">
            <ul>
                <li><strong>Nama:</strong> Alpha Kost </li>
                <li><strong>Owner:</strong> Pak Raji (+62 877-3835-0820)</li>
                <li><strong>Alamat:</strong> Jl. Simongan No.41, Semarang</li>
            </ul>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
    <div class="card-header"><strong>Manajemen Profil Kost</strong></div>
    <div class="card-body">
        <form action="/admin/updateSettings" method="post">
            <div class="mb-3">
                <label>Alamat Kost</label>
                <input type="text" name="settings[address]" class="form-control" value="<?= $address ?>"> 
            </div>
            <div class="mb-3">
                <label>No HP Pak Raji (Format: 628...)</label>
                <input type="text" name="settings[phone]" class="form-control" value="<?= $phone ?>"> 
            </div>
            <button class="btn btn-primary">Update Profil</button>
        </form>
    </div>
</div>

<div class="card shadow-sm border-danger">
    <div class="card-header bg-danger text-white"><strong>Keamanan Akun</strong></div>
    <div class="card-body">
        <form action="/admin/updatePassword" method="post">
            <input type="password" name="new_password" class="form-control mb-2" placeholder="Password Baru">
            <button class="btn btn-danger">Ubah Password</button>
        </form>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>