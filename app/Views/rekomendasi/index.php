<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Kost</title>
</head>
<body>

    <h2>Cari Rekomendasi Kost</h2>

    <form action="<?= site_url('rekomendasi/proses') ?>" method="post">

        <?php foreach ($kriteria as $k): ?>

            <label><?= $k['nama_kriteria']; ?></label><br>

            <select name="bobot[<?= $k['id_kriteria']; ?>]">

                <option value="">-- Pilih Bobot --</option>

                <option value="1">1 - Sangat Tidak Penting</option>

                <option value="2">2 - Tidak Penting</option>

                <option value="3">3 - Cukup Penting</option>

                <option value="4">4 - Penting</option>

                <option value="5">5 - Sangat Penting</option>

            </select>

            <br><br>

        <?php endforeach; ?>

        <button type="submit">
            Cari Rekomendasi
        </button>

    </form>

</body>
</html>