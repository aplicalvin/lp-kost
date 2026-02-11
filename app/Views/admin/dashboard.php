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
                            [cite_start]<td><?= $r['room_type'] ?> [cite: 1]</td>
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
                [cite_start]<li><strong>Nama:</strong> Alpha Kost [cite: 1]</li>
                [cite_start]<li><strong>Owner:</strong> Pak Raji (+62 877-3835-0820) [cite: 3]</li>
                <li><strong>Alamat:</strong> Jl. [cite_start]Simongan No.41, Semarang [cite: 3]</li>
            </ul>
            <p class="text-muted small">*Untuk mengubah data alamat/kontak, silakan edit melalui file Controller/View utama.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>