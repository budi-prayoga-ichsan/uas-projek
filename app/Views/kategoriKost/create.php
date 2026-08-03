<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Kategori</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Kategori Kost</h4>
                    </div>

                    <div class="card-body">

                        <form action="<?= site_url('kost/kategori/store') ?>" method="post">

                            <div class="mb-3">
                                <label class="form-label">Kategori Kost</label>
                                <input type="text"
                                       name="nama_kategori"
                                       class="form-control"
                                       value="<?= old('nama_kategori') ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('nama_kategori') ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <a href="<?= site_url('kost/kategori') ?>" class="btn btn-secondary">
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
