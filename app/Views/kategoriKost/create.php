<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Kategori</title>
</head>
<body>
    <h1>Tambah Kategori Kost</h1>

    <form action="<?= site_url('kost/kategori/store') ?>" method="post">
        <label >Kategori kost</label><br>
        <input type="text" name="nama_kategori" value="<?= old('nama_kategori') ?>"><br>
        <?= validation_show_error('nama_kategori') ?><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>