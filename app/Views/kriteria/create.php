<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kriteria</title>
</head>
<body>

<form action="<?= site_url('kriteria/store') ?>" method="post">

    <label>Kode</label><br>
    <input type="text" name="kode" value="<?= old('kode') ?>">
    <?= validation_show_error('kode') ?>

    <br><br>

    <label>Nama Kriteria</label><br>
    <select name="nama_kriteria">
        <option value="">-- Pilih Kriteria --</option>
        <option value="Harga">Harga</option>
        <option value="Jarak">Jarak</option>
        <option value="Fasilitas">Fasilitas</option>
        <option value="Keamanan">Keamanan</option>
        <option value="Wifi">Wifi</option>
        <option value="Ukuran Kamar">Ukuran Kamar</option>
    </select>
    <?= validation_show_error('nama_kriteria') ?>

    <br><br>

    <label>Atribut</label><br>
    <select name="atribut">
        <option value="">-- Pilih Atribut --</option>
        <option value="Benefit">Benefit</option>
        <option value="Cost">Cost</option>
    </select>
    <?= validation_show_error('atribut') ?>

    <br><br>

    <label>Bobot Default</label><br>
    <input type="number" step="0.01" name="bobot_default" value="<?= old('bobot_default') ?>">
    <?= validation_show_error('bobot_default') ?>

    <br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>