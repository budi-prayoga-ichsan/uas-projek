<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar Kost</title>
</head>

<body>
    <form action="<?= site_url('kost/kamar/update') ?>" method="post" enctype="multipart/form-data">

        <input type="hidden"  name="id_kost" value="<?= $kost['id_kost'] ?>">

        <label>Kategori</label><br>
        <select name="id_kategori">
            <option value="">-- Pilih Kategori --</option>

            <?php foreach ($kategori as $k): ?>
                <option
                    value="<?= $k['id_kategori']; ?>"
                    <?= $k['id_kategori'] == $kost['id_kategori'] ? 'selected' : '' ?>>
                    <?= $k['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= validation_show_error('id_kategori') ?>

        <br><br>


        <label>Nama Kost</label><br>
        <input type="text" name="nama_kost" value="<?= $kost['nama_kost'] ?>">
        <?= validation_show_error('nama_kost') ?>
        <br><br>


        <label>Alamat</label><br>
        <textarea name="alamat" rows="4" cols="30"><?= $kost['alamat'] ?></textarea>
        <?= validation_show_error('alamat') ?>
        <br><br>


        <label>Harga Sewa per Bulan</label><br>
        <input type="number" step="any" name="harga" value="<?= $kost['harga'] ?>">
        <?= validation_show_error('harga') ?>
        <br><br>


        <label>Jarak</label><br>
        <input type="number" step="any" name="jarak" value="<?= $kost['jarak'] ?>">
        <?= validation_show_error('jarak') ?>
        <br><br>

        <?php
        $fasilitas = explode(',', $kost['fasilitas']);
        ?>
        <label>Fasilitas</label><br>

        <input
            type="checkbox"
            name="fasilitas[]"
            value="Kasur"
            <?= in_array('Kasur', $fasilitas) ? 'checked' : '' ?>>
        Kasur <br>

        <input
            type="checkbox"
            name="fasilitas[]"
            value="Lemari"
            <?= in_array('Lemari', $fasilitas) ? 'checked' : '' ?>>
        Lemari <br>

        <input
            type="checkbox"
            name="fasilitas[]"
            value="AC"
            <?= in_array('AC', $fasilitas) ? 'checked' : '' ?>>
        AC <br>

        <input
            type="checkbox"
            name="fasilitas[]"
            value="Wifi"
            <?= in_array('Wifi', $fasilitas) ? 'checked' : '' ?>>
        Wifi <br>

        <input
            type="checkbox"
            name="fasilitas[]"
            value="Kamar mandi Dalam"
            <?= in_array('Kamar mandi Dalam', $fasilitas) ? 'checked' : '' ?>>
        Kamar mandi Dalam
        <?= validation_show_error('fasilitas') ?>

        <br><br>


        <label>Keamanan</label><br>

        <select name="keamanan">

            <option value="">-- Pilih Keamanan --</option>

            <option value="1" <?= $kost['keamanan'] == 1 ? 'selected' : '' ?>>
                1 - Sangat Kurang
            </option>

            <option value="2" <?= $kost['keamanan'] == 2 ? 'selected' : '' ?>>
                2 - Kurang
            </option>

            <option value="3" <?= $kost['keamanan'] == 3 ? 'selected' : '' ?>>
                3 - Cukup
            </option>

            <option value="4" <?= $kost['keamanan'] == 4 ? 'selected' : '' ?>>
                4 - Baik
            </option>

            <option value="5" <?= $kost['keamanan'] == 5 ? 'selected' : '' ?>>
                5 - Sangat Baik
            </option>

        </select>
        <?= validation_show_error('keamanan') ?>
        <br><br>


        <label>Wifi</label><br>
        <select name="wifi">

            <option value="">-- Pilih Wifi --</option>

            <option value="Ya"
                <?= $kost['wifi'] == 'Ya' ? 'selected' : '' ?>>
                Ya
            </option>

            <option value="Tidak"
                <?= $kost['wifi'] == 'Tidak' ? 'selected' : '' ?>>
                Tidak
            </option>

        </select>
        <?= validation_show_error('wifi') ?>
        <br><br>


        <label>Ukuran Kamar</label><br>
        <select name="ukuran_kamar">

            <option value="">-- Pilih Ukuran --</option>

            <option value="2x3"
                <?= $kost['ukuran_kamar'] == '2x3' ? 'selected' : '' ?>>
                2 x 3
            </option>

            <option value="3x3"
                <?= $kost['ukuran_kamar'] == '3x3' ? 'selected' : '' ?>>
                3 x 3
            </option>

            <option value="3x4"
                <?= $kost['ukuran_kamar'] == '3x4' ? 'selected' : '' ?>>
                3 x 4
            </option>

            <option value="4x4"
                <?= $kost['ukuran_kamar'] == '4x4' ? 'selected' : '' ?>>
                4 x 4
            </option>

        </select>
        <?= validation_show_error('ukuran_kamar') ?>

        <br><br>


        <label>Status</label>
        <select name="status">

            <option value="">-- Pilih Status --</option>

            <option value="Tersedia"
                <?= $kost['status'] == 'Tersedia' ? 'selected' : '' ?>>
                Tersedia
            </option>

            <option value="Penuh"
                <?= $kost['status'] == 'Penuh' ? 'selected' : '' ?>>
                Penuh
            </option>

        </select>
        <?= validation_show_error('status') ?>
        <br><br>

        <label>Foto</label>
        <input type="file" name="foto">
        <?= validation_show_error('foto') ?>

        <input type="hidden" name="foto_lama" value="<?= $kost['foto'] ?>">

        <br><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>