<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <p>Selamat datang, <?= session()->get('nama')?></p>
    <a href="<?= site_url('logout') ?>">Logout</a>

    <br><br>
    <a href="<?= site_url('kost/kategori') ?>">Kost Kategori</a>

    <br><br>
    <a href="<?= site_url('/kost/kamar') ?>">Kamar Kost</a>

    <br><br>
    <a href="<?= site_url('/kriteria') ?>">Kriteria Kost</a>

    <br><br>
    <a href="<?= site_url('/rekomendasi') ?>">Rekomendasi</a>
</body>
</html>