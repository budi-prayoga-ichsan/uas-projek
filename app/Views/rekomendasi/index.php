<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Kost</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Cari Rekomendasi Kost</h4>
                    </div>

                    <div class="card-body">

                        <form action="<?= site_url('rekomendasi/proses') ?>" method="post">

                            <?php foreach ($kriteria as $k): ?>

                                <div class="mb-3">

                                    <label class="form-label">
                                        <?= $k['nama_kriteria']; ?>
                                    </label>

                                    <select name="bobot[<?= $k['id_kriteria']; ?>]" class="form-select">

                                        <option value="">-- Pilih Bobot --</option>

                                        <option value="1">1 - Sangat Tidak Penting</option>

                                        <option value="2">2 - Tidak Penting</option>

                                        <option value="3">3 - Cukup Penting</option>

                                        <option value="4">4 - Penting</option>

                                        <option value="5">5 - Sangat Penting</option>

                                    </select>

                                </div>

                            <?php endforeach; ?>

                            <button type="submit" class="btn btn-primary">
                                Cari Rekomendasi
                            </button>

                            <a href="<?= site_url('/dashboard') ?>" class="btn btn-secondary">
                                Kembali
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
