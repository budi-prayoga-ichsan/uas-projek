<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kost</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2 class="mb-4">Data Kamar Kost</h2>

        <?php $success = session()->getFlashdata('success') ?>
        <?php if ($success) : ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <a href="<?= site_url('/dashboard') ?>" class="btn btn-secondary">
                Dashboard
            </a>

            <a href="<?= site_url('/kost/kamar/create') ?>" class="btn btn-primary">
                Tambah Kamar Kost
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Kost</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Jarak</th>
                        <th>Fasilitas</th>
                        <th>Keamanan</th>
                        <th>Wifi</th>
                        <th>Ukuran Kamar</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;
                    foreach ($kost as $k) :
                    ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama_kost']; ?></td>
                            <td><?= $k['nama_kategori']; ?></td>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['harga']; ?></td>
                            <td><?= $k['jarak']; ?></td>
                            <td><?= $k['fasilitas']; ?></td>
                            <td><?= $k['keamanan']; ?></td>
                            <td><?= $k['wifi']; ?></td>
                            <td><?= $k['ukuran_kamar']; ?></td>
                            <td>
                                <span class="badge bg-success">
                                    <?= $k['status']; ?>
                                </span>
                            </td>
                            <td>
                                <img src="<?= base_url('uploads/'. $k['foto']) ?>"
                                     alt="Kost mawar"
                                     class="img-thumbnail"
                                     width="100">
                            </td>

                            <td>
                                <a href="<?= site_url('/kost/kamar/edit/'. $k['id_kost']) ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="<?= site_url('/kost/kamar/delete/'. $k['id_kost']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin')">
                                    Delete
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            <?= $pager->links(); ?>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kost</title>
</head>

<body>
    <?php $success = session()->getFlashdata('success') ?>
    <?php if ($success) : ?>
        <p><?= $success ?></p>
    <?php endif; ?> <br><br>
    <a href="<?= site_url('/dashboard') ?>">Dashboard</a><br><br>
    <a href="<?= site_url('/kost/kamar/create') ?>">Tambah Kamar Kost</a><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Kost</th>
            <th>Kategori</th>
            <th>Alamat</th>
            <th>Harga</th>
            <th>Jarak</th>
            <th>Fasilitas</th>
            <th>Keamanan</th>
            <th>Wifi</th>
            <th>Ukuran Kamar</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($kost as $k) :
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $k['nama_kost']; ?></td>
                <td><?= $k['nama_kategori']; ?></td>
                <td><?= $k['alamat']; ?></td>
                <td><?= $k['harga']; ?></td>
                <td><?= $k['jarak']; ?></td>
                <td><?= $k['fasilitas']; ?></td>
                <td><?= $k['keamanan']; ?></td>
                <td><?= $k['wifi']; ?></td>
                <td><?= $k['ukuran_kamar']; ?></td>
                <td><?= $k['status']; ?></td>
                <td>
                    <img src="<?= base_url('uploads/'. $k['foto']) ?>" alt="Kost mawar">
                </td>

                <td>
                    <a href="<?= site_url('/kost/kamar/edit/'. $k['id_kost']) ?>">Edit</a> |
                    <a href="<?= site_url('/kost/kamar/delete/'. $k['id_kost']) ?>" onclick="return confirm('Yakin')">Delete</a> 
                </td>
            </tr>


        <?php endforeach; ?>

    </table>

    <?= $pager->links(); ?>
</body>

</html>
