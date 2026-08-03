<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">Edit Kriteria</h4>
                </div>

                <div class="card-body">

                    <form action="<?= site_url('kriteria/update') ?>" method="post">

                        <input type="hidden"
                               name="id_kriteria"
                               value="<?= $kriteria['id_kriteria']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input
                                type="text"
                                name="kode"
                                class="form-control"
                                value="<?= $kriteria['kode']; ?>">

                            <div class="text-danger mt-1">
                                <?= validation_show_error('kode') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Kriteria</label>

                            <select name="nama_kriteria" class="form-select">

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

                            <div class="text-danger mt-1">
                                <?= validation_show_error('nama_kriteria') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Atribut</label>

                            <select name="atribut" class="form-select">

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

                            <div class="text-danger mt-1">
                                <?= validation_show_error('atribut') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bobot Default</label>

                            <input
                                type="number"
                                step="0.01"
                                name="bobot_default"
                                class="form-control"
                                value="<?= $kriteria['bobot_default']; ?>">

                            <div class="text-danger mt-1">
                                <?= validation_show_error('bobot_default') ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a href="<?= site_url('/kriteria') ?>" class="btn btn-secondary">
                            Batal
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
