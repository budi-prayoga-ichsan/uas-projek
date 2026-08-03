<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar Kost</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0">Edit Kamar Kost</h4>
                    </div>

                    <div class="card-body">

                        <form action="<?= site_url('kost/kamar/update') ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_kost" value="<?= $kost['id_kost'] ?>">

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="id_kategori" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>

                                    <?php foreach ($kategori as $k): ?>
                                        <option
                                            value="<?= $k['id_kategori']; ?>"
                                            <?= $k['id_kategori'] == $kost['id_kategori'] ? 'selected' : '' ?>>
                                            <?= $k['nama_kategori']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('id_kategori') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Kost</label>
                                <input type="text"
                                    name="nama_kost"
                                    class="form-control"
                                    value="<?= $kost['nama_kost'] ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('nama_kost') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat"
                                    rows="4"
                                    class="form-control"><?= $kost['alamat'] ?></textarea>

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('alamat') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga Sewa per Bulan</label>
                                <input type="number"
                                    step="any"
                                    name="harga"
                                    class="form-control"
                                    value="<?= $kost['harga'] ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('harga') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jarak (Meter)</label>
                                <input type="number"
                                    step="any"
                                    name="jarak"
                                    class="form-control"
                                    value="<?= $kost['jarak'] ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('jarak') ?>
                                </div>
                            </div>

                            <?php
                            $fasilitas = explode(',', $kost['fasilitas']);
                            ?>

                            <div class="mb-3">
                                <label class="form-label">Fasilitas</label>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="fasilitas[]"
                                        value="Kasur"
                                        id="kasur"
                                        <?= in_array('Kasur', $fasilitas) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="kasur">Kasur</label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="fasilitas[]"
                                        value="Lemari"
                                        id="lemari"
                                        <?= in_array('Lemari', $fasilitas) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="lemari">Lemari</label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="fasilitas[]"
                                        value="AC"
                                        id="ac"
                                        <?= in_array('AC', $fasilitas) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="ac">AC</label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="fasilitas[]"
                                        value="Wifi"
                                        id="wifi"
                                        <?= in_array('Wifi', $fasilitas) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="wifi">Wifi</label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="fasilitas[]"
                                        value="Kamar mandi Dalam"
                                        id="kmd"
                                        <?= in_array('Kamar mandi Dalam', $fasilitas) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="kmd">Kamar mandi Dalam</label>
                                </div>

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('fasilitas') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keamanan</label>

                                <select name="keamanan" class="form-select">

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

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('keamanan') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Wifi</label>

                                <select name="wifi" class="form-select">

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

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('wifi') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ukuran Kamar</label>

                                <select name="ukuran_kamar" class="form-select">

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

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('ukuran_kamar') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>

                                <select name="status" class="form-select">

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

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('status') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto</label>

                                <input type="file" name="foto" class="form-control">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('foto') ?>
                                </div>

                                <input type="hidden" name="foto_lama" value="<?= $kost['foto'] ?>">
                            </div>

                            <?php if (!empty($kost['foto'])): ?>
                                <div class="mb-3">
                                    <label class="form-label">Foto Saat Ini</label><br>
                                    <img src="<?= base_url('uploads/' . $kost['foto']) ?>"
                                         class="img-thumbnail"
                                         width="150"
                                         alt="Foto Kost">
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <a href="<?= site_url('/kost/kamar') ?>" class="btn btn-secondary">
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
