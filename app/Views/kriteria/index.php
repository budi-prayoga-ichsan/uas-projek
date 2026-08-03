<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriteria Kost</title>
</head>

<body>
    <a href="<?= site_url('/dashboard') ?>">Dashbord</a>
    <br>
    <a href="<?= site_url('/kriteria/create') ?>">Tambah Kriteria</a>
    <br><br>
    <?php if (session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <table border="1">

        <tr>

            <th>No</th>

            <th>Kode</th>

            <th>Nama</th>

            <th>Atribut</th>

            <th>Bobot</th>

            <th>Aksi</th>

        </tr>

        <?php

        $no = 1;

        foreach ($kriteria as $k):

        ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $k['kode']; ?></td>

                <td><?= $k['nama_kriteria']; ?></td>

                <td><?= $k['atribut']; ?></td>

                <td><?= $k['bobot_default']; ?></td>

                <td>

                    <a href="<?= site_url('kriteria/edit/' . $k['id_kriteria']) ?>">
                        Edit
                    </a> |

                    <a href="<?= site_url('kriteria/delete/' . $k['id_kriteria']) ?>" onclick="return confirma('Yakin Hapus?')">
                        Hapus
                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

    <?= $pager->links(); ?>

</body>

</html>