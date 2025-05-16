<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/assets/img/logo (2).png">

    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors(); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url('insert'); ?>" method="post">

                            <div class="login-logo text-center mb-4">
                                <img src="<?= base_url('public/assets/img/logo (2).png') ?>" alt="Logo" style="max-height: 70px;">
                            </div>

                            <h3 class="text-center mb-4">Create an Account</h3>

                            <div class="form-login mb-3">
                                <label for="fname">First Name</label>
                                <div class="form-addons">
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your first name" required>
                                    <img src="<?= base_url('public/assets/img/icons/users1.svg') ?>" alt="user icon">
                                </div>
                            </div>

                            <div class="form-login mb-3">
                                <label for="lname">Last Name</label>
                                <div class="form-addons">
                                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter your last name" required>
                                    <img src="<?= base_url('public/assets/img/icons/users1.svg') ?>" alt="user icon">
                                </div>
                            </div>

                            <div class="form-login mb-3">
                                <label for="email">Email</label>
                                <div class="form-addons">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
                                    <img src="<?= base_url('public/assets/img/icons/mail.svg') ?>" alt="mail icon">
                                </div>
                            </div>

                            <div class="form-login mb-3">
                                <label for="password">Password</label>
                                <div class="pass-group">
                                    <input type="password" id="password" name="password" class="pass-input form-control" placeholder="Enter your password" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>

                            <div class="form-login mb-4">
                                <input type="submit" class="btn btn-login w-100" value="Sign Up">
                            </div>

                            <div class="signinform text-center">
                                <h4>Already a user? <a href="<?= base_url() ?>" class="hover-a">Sign In</a></h4>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img d-flex" style="padding:20px;">

                    <img style="height:90vh" src="<?= base_url() ?>public/assets/img/login3.svg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>public/assets/js/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>public/assets/js/feather.min.js"></script>

    <script src="<?= base_url() ?>public/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>public/assets/js/script.js"></script>
</body>

</html>