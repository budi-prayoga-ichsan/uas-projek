<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Hasil Rekomendasi Kost</h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th class="text-center" width="80">Ranking</th>
                            <th class="text-center" width="120">Foto</th>
                            <th>Nama Kost</th>
                            <th>Alamat</th>
                            <th class="text-center" width="170">Nilai Preferensi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if(!empty($hasil)): ?>

                        <?php foreach($hasil as $h): ?>

                        <tr>

                            <td class="text-center">
                                <?= $h['ranking']; ?>
                            </td>

                            <td class="text-center">

                                <img
                                    src="<?= base_url('uploads/' . $h['foto']) ?>"
                                    class="img-thumbnail"
                                    width="100"
                                    height="100">

                            </td>

                            <td>
                                <?= esc($h['nama_kost']); ?>
                            </td>

                            <td>
                                <?= esc($h['alamat']); ?>
                            </td>

                            <td class="text-center">
                                <?= number_format($h['nilai_preferensi'], 4); ?>
                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center">
                                Data tidak ditemukan.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="<?= site_url('/rekomendasi'); ?>" class="btn btn-secondary">
                    Kembali
                </a>
                <a href="<?= site_url('/rekomendasi') ?>" class="btn btn-primary">
                    Hitung Ulang
                </a>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>