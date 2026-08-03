<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori Kost</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">

        <h2 class="mb-4">Data Kategori Kost</h2>

        <a href="<?= site_url('/dashboard') ?>" class="btn btn-secondary mb-3">
            Dashboard
        </a>

        <a href="<?= site_url('kost/kategori/create') ?>" class="btn btn-primary mb-3">
            Tambah Kategori Kost
        </a>


        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('/kost/kategori') ?>" method="get">
            <input
                type="text"
                class="form-control"
                placeholder="Cari nama mahasiswa..."
                name="keyword"
                value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
            <button class="btn btn-outline-primary" type="submit">
                Cari
            </button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Kategori</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $currentPage = $pager->getCurrentPage();
                    $perPager = 5;
                    $no = ($currentPage - 1) * $perPager + 1;
                    ?>

                    <?php foreach ($kategoriKost as $kategoriK): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kategoriK['nama_kategori'] ?></td>
                            <td>
                                <a href="<?= site_url('kost/kategori/edit/' . $kategoriK['id_kategori']) ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="<?= site_url('kost/kategori/delete/' . $kategoriK['id_kategori']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin Hapus?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <?= $pager->links('default', 'bootstrap_pagination') ?>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>