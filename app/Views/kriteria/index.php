<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriteria Kost</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2 class="mb-4">Data Kriteria Kost</h2>

        <a href="<?= site_url('/dashboard') ?>" class="btn btn-secondary mb-3">
            Dashboard
        </a>

        <a href="<?= site_url('/kriteria/create') ?>" class="btn btn-primary mb-3">
            Tambah Kriteria
        </a>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('/kriteria') ?>" method="get">
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

                        <th>Kode</th>

                        <th>Nama</th>

                        <th>Atribut</th>

                        <th>Bobot</th>

                        <th width="180">Aksi</th>

                    </tr>
                </thead>

                <tbody>

                    <?php


                    $currentPage = $pager->getCurrentPage();
                    $perPager = 5;
                    $no = ($currentPage - 1) * $perPager + 1;



                    foreach ($kriteria as $k):

                    ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $k['kode']; ?></td>

                            <td><?= $k['nama_kriteria']; ?></td>

                            <td><?= $k['atribut']; ?></td>

                            <td><?= $k['bobot_default']; ?></td>

                            <td>

                                <a href="<?= site_url('kriteria/edit/' . $k['id_kriteria']) ?>"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="<?= site_url('kriteria/delete/' . $k['id_kriteria']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirma('Yakin Hapus?')">
                                    Hapus
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