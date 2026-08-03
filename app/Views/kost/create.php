<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar Kost</title>
</head>
<body>
    <form action="<?= site_url('kost/kamar/store') ?>" method="post" enctype="multipart/form-data">

    <label >Kategori</label><br>
    <select name="id_kategori">
        <option value="">-- Pilih Kategori --</option>

        <?php foreach($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori'] ?></option>
        <?php endforeach;?>
    </select>
    <?= validation_show_error('id_kategori') ?>
    
    <br><br>


    <label >Nama Kost</label><br>
    <input type="text" name="nama_kost" value="<?= old('nama_kost') ?>">
    <?= validation_show_error('nama_kost') ?>
    <br><br>
    
    
    <label >Alamat</label><br>
    <textarea name="alamat" rows="4" cols="30" ><?= old('alamat') ?></textarea>
    <?= validation_show_error('alamat') ?>
    <br><br>
    
    
    <label >Harga Sewa per Bulan</label><br>
    <input type="number" step="any" name="harga" value="<?= old('harga') ?>">
    <?= validation_show_error('harga') ?>
    <br><br>
    
    
    <label >Jarak</label><br>
    <input type="number" step="any" name="jarak" value="<?= old('jarak') ?>">
    <?= validation_show_error('jarak') ?>
    <br><br>


    <label >Fasilitas</label><br>
    <input type="checkbox" name="fasilitas[]" value="Kasur">Kasur <br>
    <input type="checkbox" name="fasilitas[]" value="Lemari">Lemari <br>
    <input type="checkbox" name="fasilitas[]" value="AC">AC <br>
    <input type="checkbox" name="fasilitas[]" value="Wifi">Wifi <br>
    <input type="checkbox" name="fasilitas[]" value="Kamar mandi Dalam">Kamar mandi Dalam 
    <?= validation_show_error('fasilitas') ?>
    
    <br><br>
    
    
    <label >Keamanan</label><br>

    <select name="keamanan">
        <option value="">-- Pilih Keamanan --</option>
        <option value="1">1 - Sangat Kurang</option>
        <option value="2">2 - Kurang</option>
        <option value="3">3 - Cukup</option>
        <option value="4">4 - Baik</option>
        <option value="5">5 - Sangat Baik</option>
    </select>
    <?= validation_show_error('keamanan') ?>
    <br><br>

    
    <label >Wifi</label><br>
    <select name="wifi">
        <option value="">-- Pilih Wifi --</option>
        <option value="Ya">Ya</option>
        <option value="Tidak">Tidak</option>
    </select>
    <?= validation_show_error('wifi') ?>
    <br><br>
    
    
    <label>Ukuran Kamar</label><br>
    <select name="ukuran_kamar">
        <option value="">-- Pilih Ukuran --</option>
        <option value="2x3">2 x 3</option>
        <option value="3x3">3 x 3</option>
        <option value="3x4">3 x 4</option>
        <option value="4x4">4 x 4</option>
    </select> 
    <?= validation_show_error('ukuran_kamar') ?>
    
    <br><br>


    <label >Status</label>
    <select name="status">
        <option value="">-- Pilih Status --</option>
        <option value="Tersedia">Tersedia</option>
        <option value="Penuh">Penuh</option>
    </select>
    <?= validation_show_error('status') ?>
    <br><br>

    <label >Foto</label>
    <input type="file" name="foto" value="<?= old('foto') ?>">
    <?= validation_show_error('foto') ?>

    <br><br>

    <button type="submit">Simpan</button>
    </form>
</body>
</html>