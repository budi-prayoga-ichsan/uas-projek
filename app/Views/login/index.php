<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <br>
    <?php $success = session()->getFlashdata('success') ?>
    <?php if($success) :?>
        <p><?= $success ?></p>
    <?php endif; ?>
    <br>
    <a href="<?= site_url('login/register') ?>">Register</a>
    <form action="<?= site_url('login/authenticate') ?>" method="post">

        <label >nama</label><br>
        <input type="text" name="nama" placeholder="nama" value="<?= old('nama') ?>">
        <?= validation_show_error('nama') ?>
        
        <br><br>
        
        <label >password</label><br>
        <input type="password" name="password" placeholder="password" value="<?= old('password') ?>">
        <?= validation_show_error('password') ?><br>
        
        <button type="submit">Login</button>

    </form>


    
  
</body>
</html>