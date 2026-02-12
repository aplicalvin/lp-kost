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
        <div>
            <a href="/" class="btn btn-light btn-sm" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> Landing Page
            </a>
            <a href="/logout" class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> logout
            </a>
        </div>

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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <strong>Kelola Daftar Kamar</strong>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRoomModal">
            + Tambah Kamar Baru
        </button>
    </div>

    <table class="table table-hover border">
        <thead class="table-light">
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
                    <td>
                        <input type="text" name="room_type" class="form-control" value="<?= $r['room_type'] ?>" required>
                    </td>
                    <td>
                        <input type="text" name="price" class="form-control rupiah" 
                            value="<?= number_format((int)$r['price'], 0, ',', '.') ?>" required>
                    </td>
                    <td>
                        <input type="text" name="wa_template" class="form-control" value="<?= $r['wa_template'] ?>" required>
                    </td>
                    <td class="d-flex gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        
                        <a href="/admin/deleteRoom/<?= $r['id'] ?>" 
                        class="btn btn-danger btn-sm" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?')">
                        Hapus
                        </a>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/admin/storeRoom" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kamar Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama/Tipe Kamar</label>
                        <input type="text" name="room_type" class="form-control" placeholder="Contoh: Luxury Room" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga per Bulan</label>
                        <input type="number" name="price" class="form-control" placeholder="1500000" required>
                    </div>
                    <div class="mb-3">
                        <label>Template Pesan WhatsApp</label>
                        <textarea name="wa_template" class="form-control" rows="3" required>Halo Pak Raji, saya ingin memesan kamar ini...</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Kamar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Profil Kost -->


    <div class="card mb-4 shadow-sm">
    <div class="card-header bg-white"><strong>Manajemen Profil & Kontak Kost</strong></div>
    <div class="card-body">
        <form action="/admin/updateSettings" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kost</label>
                    <input type="text" name="settings[kost_name]" class="form-control" value="<?= $kost_name ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Owner/Pengelola</label>
                    <input type="text" name="settings[owner_name]" class="form-control" value="<?= $owner_name ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor WhatsApp (Contoh: 6287738350820)</label>
                    <input type="text" name="settings[phone]" class="form-control" value="<?= $phone ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <input type="text" name="settings[address]" class="form-control" value="<?= $address ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan Profil</button>
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
                    <strong>Nama:</strong> <?= $kost_name ?>
                </li>
                <li class="list-group-item">
                    <strong>Owner:</strong> <?= $owner_name ?> (<?= $phone ?>)
                </li>
                <li class="list-group-item">
                    <strong>Alamat:</strong> <?= $address ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Kelola Testimoni & Porto</strong>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTestiModal">+ Tambah Testimoni</button>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Isi Testimoni</th>
                    <th>Bintang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($testimonials as $t) : ?>
                <tr>
                    <td><?= $t['name'] ?></td>
                    <td><small><?= $t['content'] ?></small></td>
                    <td><?= $t['stars'] ?> ⭐</td>
                    <td>
                        <a href="/admin/deleteTestimonial/<?= $t['id'] ?>" 
                           class="btn btn-outline-danger btn-sm" 
                           onclick="return confirm('Hapus testimoni ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    <!-- TESTIMONIAL -->
    <div class="modal fade" id="addTestiModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="/admin/storeTestimonial" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Testimoni Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Penghuni</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Rating (1-5)</label>
                        <input type="number" name="stars" class="form-control" min="1" max="5" value="5" required>
                    </div>
                    <div class="mb-3">
                        <label>Isi Ulasan</label>
                        <textarea name="content" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- GALLERY -->
    <div class="card mb-4 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between">
        <strong>Galeri Foto Kost</strong>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGalleryModal">+ Tambah Foto</button>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($galleries as $g) : ?>
                <div class="col-md-2 mb-3 text-center">
                    <img src="/uploads/gallery/<?= $g['image_path'] ?>" class="img-thumbnail mb-1" style="height: 100px; width: 100%; object-fit: cover;">
                    <a href="/admin/deleteGallery/<?= $g['id'] ?>" class="btn btn-danger btn-sm w-100" onclick="return confirm('Hapus foto ini?')">Hapus</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="addGalleryModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="/admin/storeGallery" method="post" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Unggah Foto Baru</h5></div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Pilih Foto</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label>Keterangan (Opsional)</label>
                    <input type="text" name="caption" class="form-control">
                </div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary">Unggah</button></div>
        </form>
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const rupiahInputs = document.querySelectorAll(".rupiah");

    rupiahInputs.forEach(function(input) {

        input.addEventListener("input", function(e) {
            let value = this.value.replace(/\D/g, "");
            this.value = formatRupiah(value);
        });

        // Format saat pertama kali load
        input.value = formatRupiah(input.value.replace(/\D/g, ""));
    });

    function formatRupiah(angka) {
        if (!angka) return "";
        return angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
});
</script>

</body>
</html>
