<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height:100vh;">
            <div class="col-md-6 col-lg-5">

                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h3 class="mb-0">Register</h3>
                    </div>

                    <div class="card-body">

                        <form action="<?= site_url('login/registerStore') ?>" method="post">

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
                                <label class="form-label">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Email"
                                    value="<?= old('email') ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('email') ?>
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

                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Konfirmasi Password"
                                    value="<?= old('password_confirmation') ?>">

                                <div class="text-danger mt-1">
                                    <?= validation_show_error('password_confirmation') ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Register
                            </button>

                            <div class="text-center mt-3">
                                <a href="<?= site_url('login') ?>" class="btn btn-outline-secondary">
                                    Kembali ke Login
                                </a>
                            </div>

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
