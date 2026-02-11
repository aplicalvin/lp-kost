<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section { background: #f8f9fa; padding: 60px 0; }
        .room-card { transition: transform 0.3s; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .room-card:hover { transform: translateY(-10px); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><?= $contact['nama'] ?></a> 
    </div>
</nav>

<section class="hero-section text-center">
    <div class="container">
        <h1>Selamat Datang di <?= $contact['nama'] ?></h1> 
        <p class="lead">Hunian nyaman untuk Laki-laki dan Perempuan di Semarang Barat.</p> 
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h2>Fasilitas Utama</h2>
        <div class="row mt-4">
            <div class="col-md-4">🌐 Wifi</div> 
            <div class="col-md-4">❄️ AC & KM Dalam</div> 
            <div class="col-md-4">🍳 Dapur & Gas Bersama</div> 
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Pilihan Kamar</h2>
        <div class="row justify-content-center">
            <?php foreach($rooms as $r): ?>
            <div class="col-md-5 mb-4">
                <div class="card room-card h-100">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $r['room_type'] ?></h3> 
                        <h4 class="text-primary"><?= number_to_currency($r['price'], 'IDR', 'id_IDR', 0) ?> / Bulan</h4>
                        <hr>
                        <a href="https://wa.me/<?= $contact['phone'] ?>?text=<?= urlencode($r['wa_template']) ?>" 
                           class="btn btn-success btn-lg">
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
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"<?= $t['content'] ?>"</p>
                    <footer class="blockquote-footer"><?= $t['name'] ?></footer>
                </blockquote>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5 bg-dark text-white text-center">
    <div class="container">
        <h2>Lokasi Kami</h2>
        <p><?= $contact['address'] ?></p> [cite: 3]
        <div class="ratio ratio-21x9 mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31681.141438492876!2d110.37978151675416!3d-6.992470990925188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b92273d7aed%3A0xb795acb96f85caed!2sAlpha%20Kost!5e0!3m2!1sid!2sid!4v1770464468378!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe> [cite: 1, 2]
        </div>
    </div>
</section>

<footer class="text-center py-3">
    <p>&copy; 2024 <?= $contact['nama'] ?> - Hubungi: <?= $contact['phone'] ?> (<?= $contact['owner'] ?>)</p> [cite: 1, 3]
</footer>

</body>
</html>