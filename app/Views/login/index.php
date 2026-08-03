<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height:100vh;">
            <div class="col-md-5">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Login</h3>
                    </div>

                    <div class="card-body">

                        <?php $success = session()->getFlashdata('success') ?>
                        <?php if($success) :?>
                            <div class="alert alert-success">
                                <?= $success ?>
                            </div>
                        <?php endif; ?>

                        <div class="text-end mb-3">
                            <a href="<?= site_url('login/register') ?>" class="btn btn-outline-primary btn-sm">
                                Register
                            </a>
                        </div>

                        <form action="<?= site_url('login/authenticate') ?>" method="post">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    placeholder="Nama"
                                    value="<?= old('nama') ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('nama') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Password"
                                    value="<?= old('password') ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('password') ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>

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
