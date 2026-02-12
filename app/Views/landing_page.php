<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    <style>
:root {
    --primary: #0f172a;
    --primary-soft: #1e293b;
    --accent: #22c55e;
    --accent-dark: #16a34a;
    --soft-bg: #f8fafc;
    --text-dark: #0f172a;
}

body {
    font-family: 'Kanit', sans-serif;
    color: var(--text-dark);
    background: #ffffff;
    scroll-behavior: smooth;
}

h1, h2, h3 {
    font-weight: 600;
    letter-spacing: -0.5px;
}

/* ================= NAVBAR ================= */
.navbar {
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(10px);
    padding: 20px 0;
}

.navbar-brand {
    font-weight: 600;
    font-size: 1.3rem;
}

.nav-link {
    color: #cbd5e1 !important;
    margin-left: 15px;
    transition: 0.3s;
}

.nav-link:hover {
    color: white !important;
}

/* ================= HERO ================= */
.hero {
    background: radial-gradient(circle at top right, #1e293b, #0f172a);
    color: white;
    padding: 150px 0 130px 0;
}

.hero h1 {
    font-size: 3rem;
    font-weight: 700;
}

.hero p {
    font-size: 1.1rem;
    color: #cbd5e1;
}

.btn-accent {
    background: var(--accent);
    color: white;
    padding: 14px 32px;
    border-radius: 50px;
    font-weight: 500;
    border: none;
    transition: all 0.3s ease;
}

.btn-accent:hover {
    background: var(--accent-dark);
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(34,197,94,0.3);
}

/* ================= SECTION ================= */
section {
    padding: 100px 0;
}

.section-light {
    background: var(--soft-bg);
}

/* ================= FASILITAS ================= */
.facility-box {
    background: white;
    padding: 30px 20px;
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
}

.facility-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
}

/* ================= MODERN FACILITY ================= */
.facility-modern {
    background: white;
    padding: 40px 25px;
    border-radius: 24px;
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
    height: 100%;
}

.facility-modern i {
    font-size: 32px;
    color: var(--accent);
    margin-bottom: 20px;
}

.facility-modern h5 {
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.facility-modern p {
    font-size: 0.95rem;
    color: #64748b;
    margin-bottom: 0;
}

.facility-modern:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.06);
}


/* ================= ROOM CARD ================= */
.room-card {
    border-radius: 24px;
    padding: 45px 35px;
    background: white;
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
}

.room-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.08);
}

.room-title {
    font-size: 1.7rem;
    font-weight: 600;
}

/* ================= TESTIMONIAL ================= */
blockquote {
    background: white;
    padding: 25px;
    border-radius: 16px;
    border-left: 4px solid var(--accent);
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

/* ================= MAP SECTION ================= */
.map-section {
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: white;
}

/* ================= FOOTER ================= */
footer {
    background: #0f172a;
    color: #94a3b8;
    font-size: 0.9rem;
}
</style>


</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><?= $contact['nama'] ?></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#fasilitas">Fasilitas</a></li>
                <li class="nav-item"><a class="nav-link" href="#kamar">Kamar</a></li>
                <li class="nav-item">
                    <a class="btn btn-accent ms-3"
                       href="https://wa.me/<?= $contact['phone'] ?>" target="_BLANK">
                       Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero text-center">
    <div class="container">
        <h1>Kost Premium & Nyaman di Semarang Barat</h1>
        <p class="mt-4">
            Hunian modern dengan fasilitas lengkap, lokasi strategis, 
            dan suasana tenang untuk mahasiswa & profesional muda.
        </p>
        <div class="mt-5">
            <a href="#kamar" class="btn btn-accent">
                Lihat Ketersediaan Kamar
            </a>
        </div>
    </div>
</section>


<!-- FASILITAS -->
<section id="fasilitas" class="section-light">
    <div class="container text-center">
        <h2 class="mb-5">Fasilitas Unggulan</h2>

        <div class="row g-4 justify-content-center">

            <div class="col-md-4 col-lg-3">
                <div class="facility-modern">
                    <i class="bi bi-wifi"></i>
                    <h5>WiFi Cepat</h5>
                    <p>Koneksi stabil untuk kerja & streaming</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="facility-modern">
                    <i class="bi bi-droplet"></i>
                    <h5>Kamar Mandi Dalam</h5>
                    <p>Privasi & kenyamanan maksimal</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="facility-modern">
                    <i class="bi bi-snow"></i>
                    <h5>AC</h5>
                    <p>Udara sejuk setiap saat</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="facility-modern">
                    <i class="bi bi-cup-hot"></i>
                    <h5>Dapur Bersama</h5>
                    <p>Area masak bersih & nyaman</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="facility-modern">
                    <i class="bi bi-cup-straw"></i>
                    <h5>Air Minum</h5>
                    <p>Tersedia air galon isi ulang</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="facility-modern">
                    <i class="bi bi-fire"></i>
                    <h5>Gas Dapur</h5>
                    <p>Siap pakai kapan saja</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- KAMAR -->
<section class="bg-light py-5" id="kamar">
    <div class="container">
        <h2 class="text-center mb-5">Pilihan Kamar</h2>
        <div class="row justify-content-center">
            <?php foreach($rooms as $r): ?>
                <!-- CARD -->
                <div class="col-md-5 mb-4">
                    <div class="card room-card h-100">
                        <div class="card-body text-center bg-white">
                            <h3 class="room-title"><?= $r['room_type'] ?></h3> 
                            <h4 class="text-muted mt-3"><?= number_to_currency($r['price'], 'IDR', 'id_IDR', 0) ?> / Bulan</h4>
                            <hr>
                            <a href="https://wa.me/<?= $contact['phone'] ?>?text=<?= urlencode($r['wa_template']) ?>" target="_BLANK" 
                            class="btn btn-accent mt-4">
                                Pesan Sekarang (WA)
                            </a> 
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center">Apa Kata Mereka?</h2>
        <div class="row mt-4">
            <?php foreach($testimonials as $t): ?>
                <div class="col-md-4 mb-4">
                    <blockquote class="blockquote h-100 p-3 shadow-sm border-start border-primary border-4">
                        <div class="mb-2 text-warning">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $t['stars']): ?>
                                    ★ <?php else: ?>
                                    <span class="text-muted">☆</span> <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        
                        <p class="fst-italic" style="font-size: 0.9rem;">"<?= $t['content'] ?>"</p>
                        <footer class="blockquote-footer bg-white mt-2"><strong><?= $t['name'] ?></strong></footer>
                    </blockquote>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">Galeri Alpha Kost</h2>
        <div class="row">
            <?php foreach($galleries as $g): ?>
                <div class="col-md-3 col-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="/uploads/gallery/<?= $g['image_path'] ?>" class="card-img-top rounded" alt="<?= $g['caption'] ?>" style="height: 200px; object-fit: cover;">
                        <?php if($g['caption']): ?>
                            <div class="card-body p-2"><small class="text-muted"><?= $g['caption'] ?></small></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="map-section text-center py-5">
    <div class="container">
        <h2>Lokasi Kami</h2>
        <p><?= $contact['address'] ?></p> 
        <div class="ratio ratio-21x9 mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31681.141438492876!2d110.37978151675416!3d-6.992470990925188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b92273d7aed%3A0xb795acb96f85caed!2sAlpha%20Kost!5e0!3m2!1sid!2sid!4v1770464468378!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe> 
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center py-4">
    <div class="container">
        <p class="mb-0">
            © <?= date('Y') ?> <?= $contact['nama'] ?> • 
            Hubungi <?= $contact['phone'] ?> (<?= $contact['owner'] ?>)
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

