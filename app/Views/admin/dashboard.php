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

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <style>
        body {
            background: #f4f6f9;
            font-family: "Google Sans", sans-serif;
        }

        /* Navbar Modern */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        /* Card Modern */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            transition: all 0.2s ease;
            background: #fff;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f1f1;
            font-weight: 600;
            padding: 1rem 1.25rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn {
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4e73df, #224abe);
            border: none;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .section-spacing {
            margin-bottom: 2.5rem;
        }

        /* Responsive Table Mobile */
        @media (max-width: 768px) {
            table thead {
                display: none;
            }

            table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #eee;
                border-radius: 12px;
                padding: 1rem;
                background: #fff;
            }

            table td {
                display: block;
                width: 100%;
                border: none;
                padding: 0.5rem 0;
            }

            table td::before {
                content: attr(data-label);
                font-weight: 600;
                display: block;
                margin-bottom: 4px;
                color: #6c757d;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm mb-4 py-4">
    <div class="container-fluid px-3 px-lg-5">
        <span class="navbar-brand fw-semibold">
            Kost Admin
        </span>
        <div class="d-flex gap-2">
            <a href="/" class="btn btn-light btn-sm" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> Landing Page
            </a>
            <a href="/logout" class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container-fluid px-3 px-lg-5">
    <div class="row g-4">

        <!-- LEFT MAIN CONTENT -->
        <div class="col-12 col-xl-8">

            <!-- Flash Message -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm section-spacing">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Kelola Daftar Kamar -->
            <div class="d-flex justify-content-between align-items-center mb-3 section-spacing">
                <strong>Kelola Daftar Kamar</strong>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                    + Tambah Kamar Baru
                </button>
            </div>

            <div class="row g-4 section-spacing">
                <?php foreach ($rooms as $r) : ?>
                <div class="col-md-6 col-lg-4">
                    <form action="/admin/updateRoom/<?= $r['id'] ?>" method="post">
                        <div class="card shadow-sm border rounded-4 p-4 h-100">
                            <!-- Tipe Kamar + Harga -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tipe Kamar</label>
                                <input type="text" name="room_type" class="form-control" value="<?= $r['room_type'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Harga (Rp)</label>
                                <input type="text" name="price" class="form-control rupiah" 
                                    value="<?= number_format((int)$r['price'], 0, ',', '.') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Pesan WA</label>
                                <!-- <input type="text" name="wa_template" class="form-control" value="<?= $r['wa_template'] ?>" required> -->
                                    <textarea name="wa_template" class="form-control" rows="3" required><?= $r['wa_template'] ?></textarea>
                            </div>

                            <!-- Aksi -->
                            <div class="d-flex gap-2 flex-wrap mt-3">
                                <button type="submit" class="btn btn-success btn-sm flex-grow-1">
                                    Simpan
                                </button>
                                <a href="/admin/deleteRoom/<?= $r['id'] ?>" 
                                class="btn btn-danger btn-sm flex-grow-1"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?')">
                                Hapus
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>


            <!-- Modals Tambah Kamar -->
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

            <!-- Testimoni -->
            <div class="card section-spacing">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Kelola Testimoni & Porto</strong>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTestiModal">+ Tambah Testimoni</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm align-middle" style="border-collapse: separate; border-spacing: 0 0.75rem;">
                            <thead class="table-light">
                                <tr>
                                    <th style="padding: 8px 8px;">Nama</th>
                                    <th style="padding: 8px 8px;">Isi Testimoni</th>
                                    <th style="padding: 8px 8px;">Bintang</th>
                                    <th style="padding: 8px 8px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($testimonials as $t) : ?>
                                <tr style="">
                                    <td style="padding: 8px 8px;"><?= $t['name'] ?></td>
                                    <td style="padding: 8px 8px;"><small><?= $t['content'] ?></small></td>
                                    <td style="padding: 8px 8px;"><?= $t['stars'] ?> ⭐</td>
                                    <td style="padding: 8px 8px;">
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
            </div>

            <!-- Modal Testimoni -->
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

            <!-- Galeri -->
            <div class="card section-spacing">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Galeri Foto Kost</strong>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGalleryModal">+ Tambah Foto</button>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <?php foreach ($galleries as $g) : ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                            <img src="/uploads/gallery/<?= $g['image_path'] ?>" class="img-thumbnail mb-1" style="height: 100px; width: 100%; object-fit: cover;">
                            <a href="/admin/deleteGallery/<?= $g['id'] ?>" class="btn btn-danger btn-sm w-100" onclick="return confirm('Hapus foto ini?')">Hapus</a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Modal Galeri -->
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

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="col-12 col-xl-4">

            <!-- Profil Kost -->
            <div class="card section-spacing">
                <div class="card-header bg-white"><strong>Manajemen Profil & Kontak Kost</strong></div>
                <div class="card-body">
                    <form action="/admin/updateSettings" method="post">
                        <div class="row g-3">
                            <div class="col-12 mb-3">
                                <label class="form-label">Nama Kost</label>
                                <input type="text" name="settings[kost_name]" class="form-control" value="<?= $kost_name ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Nama Owner/Pengelola</label>
                                <input type="text" name="settings[owner_name]" class="form-control" value="<?= $owner_name ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Nomor WhatsApp</label>
                                <input type="text" name="settings[phone]" class="form-control" value="<?= $phone ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <input type="text" name="settings[address]" class="form-control" value="<?= $address ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 w-100">Simpan Perubahan Profil</button>
                    </form>
                </div>
            </div>

            <!-- Informasi Kost -->
            <div class="card section-spacing">
                <div class="card-header"><i class="bi bi-info-circle me-2"></i>Informasi Kost</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nama:</strong> <?= $kost_name ?></li>
                        <li class="list-group-item"><strong>Owner:</strong> <?= $owner_name ?> (<?= $phone ?>)</li>
                        <li class="list-group-item"><strong>Alamat:</strong> <?= $address ?></li>
                    </ul>
                </div>
            </div>

            <!-- Keamanan -->
            <div class="card section-spacing text-danger">
                <div class="card-header">
                    <i class="bi bi-shield-lock me-2"></i>Keamanan Akun
                </div>
                <div class="card-body">
                    <form action="/admin/updatePassword" method="post" class="row g-3">
                        <div class="col-12 mb-2">
                            <input type="password" name="new_password" class="form-control" placeholder="Password Baru">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-danger w-100">
                                <i class="bi bi-key"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

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
