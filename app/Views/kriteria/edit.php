<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria</title>
</head>
<body>

<form action="<?= site_url('kriteria/update') ?>" method="post">

    <input type="hidden"
           name="id_kriteria"
           value="<?= $kriteria['id_kriteria']; ?>">

    <label>Kode</label><br>
    <input
        type="text"
        name="kode"
        value="<?= $kriteria['kode']; ?>">
    <?= validation_show_error('kode') ?>

    <br><br>

    <label>Nama Kriteria</label><br>
    <select name="nama_kriteria">

        <option value="">-- Pilih Kriteria --</option>

        <option value="Harga"
            <?= $kriteria['nama_kriteria'] == 'Harga' ? 'selected' : '' ?>>
            Harga
        </option>

        <option value="Jarak"
            <?= $kriteria['nama_kriteria'] == 'Jarak' ? 'selected' : '' ?>>
            Jarak
        </option>

        <option value="Fasilitas"
            <?= $kriteria['nama_kriteria'] == 'Fasilitas' ? 'selected' : '' ?>>
            Fasilitas
        </option>

        <option value="Keamanan"
            <?= $kriteria['nama_kriteria'] == 'Keamanan' ? 'selected' : '' ?>>
            Keamanan
        </option>

        <option value="Wifi"
            <?= $kriteria['nama_kriteria'] == 'Wifi' ? 'selected' : '' ?>>
            Wifi
        </option>

        <option value="Ukuran Kamar"
            <?= $kriteria['nama_kriteria'] == 'Ukuran Kamar' ? 'selected' : '' ?>>
            Ukuran Kamar
        </option>

    </select>
    <?= validation_show_error('nama_kriteria') ?>

    <br><br>

    <label>Atribut</label><br>

    <select name="atribut">

        <option value="">-- Pilih Atribut --</option>

        <option value="Benefit"
            <?= $kriteria['atribut'] == 'Benefit' ? 'selected' : '' ?>>
            Benefit
        </option>

        <option value="Cost"
            <?= $kriteria['atribut'] == 'Cost' ? 'selected' : '' ?>>
            Cost
        </option>

    </select>

    <?= validation_show_error('atribut') ?>

    <br><br>

    <label>Bobot Default</label><br>

    <input
        type="number"
        step="0.01"
        name="bobot_default"
        value="<?= $kriteria['bobot_default']; ?>">

    <?= validation_show_error('bobot_default') ?>

    <br><br>

    <button type="submit">Update</button>

</form>

</body>
</html>