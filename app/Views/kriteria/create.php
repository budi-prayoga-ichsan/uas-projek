<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kriteria</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Kriteria</h4>
                </div>

                <div class="card-body">

                    <form action="<?= site_url('kriteria/store') ?>" method="post">

                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text"
                                   name="kode"
                                   class="form-control"
                                   value="<?= old('kode') ?>">
                            <div class="text-danger mt-1">
                                <?= validation_show_error('kode') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Kriteria</label>
                            <select name="nama_kriteria" class="form-select">
                                <option value="">-- Pilih Kriteria --</option>
                                <option value="Harga">Harga</option>
                                <option value="Jarak">Jarak</option>
                                <option value="Fasilitas">Fasilitas</option>
                                <option value="Keamanan">Keamanan</option>
                                <option value="Wifi">Wifi</option>
                                <option value="Ukuran Kamar">Ukuran Kamar</option>
                            </select>
                            <div class="text-danger mt-1">
                                <?= validation_show_error('nama_kriteria') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Atribut</label>
                            <select name="atribut" class="form-select">
                                <option value="">-- Pilih Atribut --</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                            <div class="text-danger mt-1">
                                <?= validation_show_error('atribut') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bobot Default</label>
                            <input type="number"
                                   step="0.01"
                                   name="bobot_default"
                                   class="form-control"
                                   value="<?= old('bobot_default') ?>">
                            <div class="text-danger mt-1">
                                <?= validation_show_error('bobot_default') ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="<?= site_url('/kriteria') ?>" class="btn btn-secondary">
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
