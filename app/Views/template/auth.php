<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SIGAMMA | Authentikasi</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('dashboard/src/assets/img/favicon.ico'); ?>" />
    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/light/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/dark/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('dashboard/layouts/collapsible-menu/loader.js'); ?>"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Lexend:400,600,700" rel="stylesheet">
    <link href="<?= base_url('dashboard/src/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/light/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/light/authentication/auth-boxed.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/dark/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/dark/authentication/auth-boxed.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->


</head>

<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <?= $this->renderSection('content'); ?>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('dashboard/src/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>

</html>