<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="<?= site_url('/dashboard') ?>">Dashboard</a><br><br>
    <a href="<?= site_url('kost/kategori/create') ?>">Tambah Kategori Kost</a><br>
    <br>
    <?php if(session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <table border="1px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $currentPage = $pager->getCurrentPage();
            $perPager = 5;
            $no = ($currentPage - 1) * $perPager + 1
            ?>
            <?php foreach ($kategoriKost as $kategoriK): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kategoriK['nama_kategori'] ?></td>
                    <td>
                        <a href="<?= site_url('kost/kategori/edit/' . $kategoriK['id_kategori']) ?>">Edit</a> |
                        <a href="<?= site_url('kost/kategori/delete/' . $kategoriK['id_kategori']) ?>" onclick="return confirm('Yakin Hapus?')">Delete</a> 
                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <?= $pager->links() ?>
</body>

</html>