<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <form action="<?= site_url('login/registerStore') ?>" method="post">

        <label >nama</label><br>
        <input type="text" name="nama" placeholder="nama" value="<?= old('nama') ?>">
        <?= validation_show_error('nama') ?>
        
        <br><br>
        
        <label >email</label><br>
        <input type="email" name="email" placeholder="email" value="<?= old('email') ?>">
        <?= validation_show_error('email') ?>
        <br><br>
        
        <label >password</label><br>
        <input type="password" name="password" placeholder="password" value="<?= old('password') ?>">
        <?= validation_show_error('password') ?>
        <br><br>
        
        <label >konfirmasi password</label><br>
        <input type="password" name="password_confirmation" placeholder="password confirm" value="<?= old('password_confirmation') ?>">
        <?= validation_show_error('password_confirmation') ?>
        <br><br>

        <button type="submit">Login</button>

    </form>


    
  
</body>
</html>