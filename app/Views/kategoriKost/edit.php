<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
</head>
<body>
    <form action="<?= site_url('/kost/kategori/update') ?>" method="post">

    <label >Nama Kategori</label><br>
    <input type="hidden" name="id_kategori" value="<?= $kategoriKost['id_kategori'] ?>">

    <input type="text" name="nama_kategori" value="<?= $kategoriKost['nama_kategori'] ?>">
    <?= validation_show_error('nama_kategori') ?>

    <br>

    <button type="submit">Simpan</button>
    </form>

</body>
</html>