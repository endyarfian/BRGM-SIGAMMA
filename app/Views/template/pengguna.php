<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('dashboard/src/assets/img/favicon.ico') ?>" />
    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/light/loader.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/dark/loader.css') ?>" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('dashboard/layouts/collapsible-menu/loader.js') ?>"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Lexend:400,600,700" rel="stylesheet">
    <link href="<?= base_url('dashboard/src/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/light/plugins.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/layouts/collapsible-menu/css/dark/plugins.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/src/table/datatable/datatables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css') ?>">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES DATA TABLE-->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES DATA TABLE-->
    <link href="<?= base_url('dashboard/src/assets/css/light/scrollspyNav.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/light/components/carousel.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('dashboard/src/assets/css/light/components/modal.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('dashboard/src/assets/css/dark/scrollspyNav.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/dark/components/carousel.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('dashboard/src/assets/css/dark/components/modal.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES DATA TABLE-->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES SELECT BOX -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css') ?>">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES SELECT BOX-->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS FLATPCKR-->
    <link href="<?= base_url('dashboard/src/plugins/src/flatpickr/flatpickr.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('dashboard/src/plugins/src/noUiSlider/nouislider.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('dashboard/src/plugins/css/light/flatpickr/custom-flatpickr.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('dashboard/src/plugins/css/dark/flatpickr/custom-flatpickr.css') ?>" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS FLATPCKR-->

    <!--  BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ALERT  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/assets/css/light/elements/alert.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dashboard/src/assets/css/dark/elements/alert.css') ?>">
    <!--  END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ALERT  -->

    <!--  BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS SWEET-ALERT  -->
    <link rel="stylesheet" href="<?= base_url('dashboard/src/plugins/src/sweetalerts2/sweetalerts2.css') ?>">
    <link href="<?= base_url('dashboard/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    <!--  END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS SWEET-ALERT  -->
</head>

<body class="layout-boxed alt-menu">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">

            <a href="javascript:void(0);" class="sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>

            <div class="search-animated toggle-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Cari...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x search-close">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                </form>
                <span class="badge badge-secondary">Ctrl + /</span>
            </div>

            <ul class="navbar-item flex-row ms-lg-auto ms-0">
                <li class="nav-item theme-toggle-item">
                    <a href="javascript:void(0);" class="nav-link theme-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                            <path d="M17 4a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2"></path>
                            <path d="M19 11h2m-1 -1v2"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </a>
                </li>
                <li class="nav-item dropdown notification-dropdown">
                    <a href="<?= base_url('/peta-interaktif'); ?>" class="nav-link dropdown-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20.972 11.291a9 9 0 1 0 -8.322 9.686"></path>
                            <path d="M3.6 9h16.8"></path>
                            <path d="M3.6 15h8.9"></path>
                            <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                            <path d="M12.5 3a16.986 16.986 0 0 1 2.578 9.018"></path>
                            <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"></path>
                            <path d="M19 18v.01"></path>
                        </svg>
                    </a>
                </li>
                <?php if (in_groups(['developer', 'web-master', 'super-admin', 'gambut-admin', 'mangrove-admin'])) : ?>
                    <li class="nav-item dropdown notification-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="manajemendatabase" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                <path d="M4 6v6c0 1.657 3.582 3 8 3c.21 0 .42 -.003 .626 -.01"></path>
                                <path d="M20 11.5v-5.5"></path>
                                <path d="M4 12v6c0 1.657 3.582 3 8 3"></path>
                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M19.001 15.5v1.5"></path>
                                <path d="M19.001 21v1.5"></path>
                                <path d="M22.032 17.25l-1.299 .75"></path>
                                <path d="M17.27 20l-1.3 .75"></path>
                                <path d="M15.97 17.25l1.3 .75"></path>
                                <path d="M20.733 20l1.3 .75"></path>
                            </svg>
                        </a>

                        <div class="dropdown-menu position-absolute" aria-labelledby="manajemendatabase">
                            <div class="drodpown-title message">
                                <h6 class="d-flex justify-content-between"><span class="align-self-center"><strong>MANAJEMEN DATA</strong></span></h6>
                            </div>
                            <?php if (in_groups(['developer', 'web-master'])) : ?>
                                <div class="notification-scroll">
                                    <a href="<?= base_url('/admin/pengguna'); ?>" class="dropdown-item">
                                        <div class="media gambut">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                            </svg>
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6 class="">DATA PENGGUNA</h6>
                                                    <p>Sunting data pengguna</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?= base_url('/admin/peran'); ?>" class="dropdown-item">
                                        <div class="media mangrove">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 21h-5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10c.564 0 1.074 .234 1.437 .61"></path>
                                                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                                <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                <path d="M19.001 15.5v1.5"></path>
                                                <path d="M19.001 21v1.5"></path>
                                                <path d="M22.032 17.25l-1.299 .75"></path>
                                                <path d="M17.27 20l-1.3 .75"></path>
                                                <path d="M15.97 17.25l1.3 .75"></path>
                                                <path d="M20.733 20l1.3 .75"></path>
                                            </svg>
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6 class="">PERAN & PERIZINAN</h6>
                                                    <p>Sunting peran & perizinan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="notification-scroll">
                                <a href="<?= base_url('/admin-dashboard'); ?>" class="dropdown-item">
                                    <div class="media gambut">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                            <path d="M4 6v6c0 1.657 3.582 3 8 3c.478 0 .947 -.016 1.402 -.046"></path>
                                            <path d="M20 12v-6"></path>
                                            <path d="M4 12v6c0 1.526 3.04 2.786 6.972 2.975"></path>
                                            <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                        </svg>
                                        <div class="media-body">
                                            <div class="data-info">
                                                <h6 class="">DATABASE CONSOLE</h6>
                                                <p>Sunting database</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?= base_url('/gambut'); ?>" class="dropdown-item">
                                    <div class="media mangrove">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                            <path d="M4 6v6c0 1.657 3.582 3 8 3m8 -3.5v-5.5"></path>
                                            <path d="M4 12v6c0 1.657 3.582 3 8 3"></path>
                                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                            <path d="M20.2 20.2l1.8 1.8"></path>
                                        </svg>
                                        <div class="media-body">
                                            <div class="data-info">
                                                <h6 class="">DATABASE VIEWER</h6>
                                                <p>Pratinjau database</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="<?= base_url('dashboard/src/assets/img/default-img.gif') ?>" class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="media-body">
                                    <h5><?= user()->username; ?></h5>
                                    <?php if (logged_in()) : ?>
                                        <?php $roles = user()->getRoles(); ?>
                                        <?php if (!empty($roles)) : ?>
                                            <p style="color:#F07C15">
                                                <?php if (in_array('developer', $roles)) : ?>
                                                    Developer
                                                <?php endif; ?>
                                                <?php if (in_array('web-master', $roles)) : ?>
                                                    Web Master
                                                <?php endif; ?>
                                                <?php if (in_array('super-admin', $roles)) : ?>
                                                    Super Admin
                                                <?php endif; ?>
                                                <?php if (in_array('gambut-admin', $roles)) : ?>
                                                    Gambut Admin
                                                <?php endif; ?>
                                                <?php if (in_array('mangrove-admin', $roles)) : ?>
                                                    Mangrove Admin
                                                <?php endif; ?>
                                                <?php if (in_array('user', $roles)) : ?>
                                                    User
                                                <?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <p><?= user()->email; ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="/forgot">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> <span>Atur Password</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> <span>Keluar</span>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <?= $this->renderSection('content'); ?>


    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">SIGAMMA BRGM APP <br>Ver. 2.0.0 (pre-alpha).</p>
        </div>
        <div class="footer-section f-section-2">
            <p style="text-align:right"> Copyright © <span class="dynamic-year"><?php echo date("Y"); ?>, </span> <a style="color: #F07C15;" target="_blank" href="https://endyarfian.github.io/">ENDYARFIAN</a> X <a style="color: #5E9338;" target="_blank" href="https://brgm.go.id">BRGM</a>. <br>Constructed with Trust and Bloods.
            </p>
        </div>
    </div>
    <!--  END FOOTER  -->
    </div>
    <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('dashboard/src/plugins/src/global/vendors.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/mousetrap/mousetrap.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/layouts/collapsible-menu/app.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/assets/js/custom.js') ?> "></script>
    <script src="<?= base_url('dashboard/src/assets/js/input-validation.js') ?> "></script>
    <script src="<?= base_url('dashboard/src/plugins/src/highlight/highlight.pack.js') ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS SWEET-ALERT-->
    <script src="<?= base_url('dashboard/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/sweetalerts2/custom-sweetalert.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS SWEET-ALERT-->
    <!-- NOTIF  -->
    <script>
        <?php
        if (session()->getFlashdata('info')) {
        ?>
            swal.fire({
                icon: '<?= session()->getFlashdata('info'); ?>',
                title: '<?= session()->getFlashdata('judul'); ?>',
                text: '<?= session()->getFlashdata('pesan'); ?>',
                type: '<?= session()->getFlashdata('info'); ?>',
            })

        <?php
        }
        ?>
    </script>
    <!-- END NOTIF  -->


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS DATA TABLE-->
    <script src="<?= base_url('dashboard/src/plugins/src/table/datatable/datatables.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/table/datatable/button-ext/jszip.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/table/datatable/button-ext/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/table/datatable/custom_miscellaneous.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS DATA TABLE-->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS MODAL-->
    <script src="<?= base_url('dashboard/src/assets/js/scrollspyNav.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS MODAL-->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS SELECT BOX-->
    <script src="<?= base_url('dashboard/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS SELECT BOX-->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS FLATPICKR-->
    <script src="<?= base_url('dashboard/src/assets/js/scrollspyNav.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/flatpickr/flatpickr.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/flatpickr/custom-flatpickr.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS FLATPICKR-->

</body>

</html>