<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
</head>
<body>

    <h2>Sistem Film</h2>

    <hr>

    <?= $this->renderSection('content'); ?>

    <hr>

    <footer>
        Copyright <?= date('Y'); ?>
    </footer>

</body>
</html>