<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Blog Application</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/assets/img/logo (2).png">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/icons/ionic/ionicons.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Header -->
    <div class="main-wrapper">
        <div class="header">
            <?= $this->include("layout\widget\header.php") ?>
        </div>
    </div>
    <!-- Header End -->

    <!-- SideBar Start -->
    <?= $this->include("layout\widget\sidebar.php") ?>
    <!-- SideBar End -->

    <div class="page-wrapper">
        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/feather.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>public/assets/plugins/apexchart/chart-data.js"></script>
    <script src="<?= base_url() ?>public/assets/plugins/morris/raphael-min.js"></script>
    <script src="<?= base_url() ?>public/assets/plugins/morris/morris.min.js"></script>
    <script src="<?= base_url() ?>public/assets/plugins/morris/chart-data.js"></script>
    <script src="<?= base_url() ?>public/assets/js/script.js"></script>
</body>

</html>