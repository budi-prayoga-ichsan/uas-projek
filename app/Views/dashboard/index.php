<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Dashboard</h3>
            </div>

            <div class="card-body">
                <p class="fs-5">
                    Selamat datang, <strong><?= session()->get('nama')?></strong>
                </p>

                <a href="<?= site_url('logout') ?>" class="btn btn-danger">
                    Logout
                </a>

                <hr>

                <div class="d-grid gap-3">
                    <a href="<?= site_url('kost/kategori') ?>" class="btn btn-outline-primary">
                        Kost Kategori
                    </a>

                    <a href="<?= site_url('/kost/kamar') ?>" class="btn btn-outline-success">
                        Kamar Kost
                    </a>

                    <a href="<?= site_url('/kriteria') ?>" class="btn btn-outline-warning">
                        Kriteria Kost
                    </a>

                    <a href="<?= site_url('/rekomendasi') ?>" class="btn btn-outline-info">
                        Rekomendasi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
