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
                        <div class="login-logo">
                            <img src="<?= base_url() ?>public/assets/img/logo (2).png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h3> <?php if (session()->getFlashdata('msg')) : ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                <?php endif; ?>
                            </h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <form action="<?= base_url('login_action'); ?>" method="post">
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="email" name="email" placeholder="Enter your email address" value="<?= set_value('email') ?>">
                                    <img src="<?= base_url() ?>public/assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input" placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4><a href="forget_password" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>
                            <div class="form-login">
                                <input type="submit" name="submit" class="btn btn-login" value="Sign In">
                                <!-- <a class="btn btn-login" type="submit" name="submit">Sign In</a> -->
                            </div>
                        </form>
                        <div class="signinform text-center">
                            <h4>Don’t have an account? <a href="<?= base_url('signup') ?>" class="hover-a">Sign Up</a></h4>
                        </div>
                        <!-- <div class="form-setlogin">
                            <h4>Or sign up with</h4>
                        </div> -->
                        <!-- <div class="form-sociallink">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="<?= base_url() ?>public/assets/img/icons/google.png" class="me-2" alt="google">
                                        Sign Up using Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="<?= base_url() ?>public/assets/img/icons/facebook.png" class="me-2" alt="google">
                                        Sign Up using Facebook
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>

                <div class="login-img" style="padding:20px;">
                    <img style="height:90vh" src="<?= base_url() ?>public/assets/img/login3.svg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>assets/js/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/js/script.js"></script>
</body>

</html>