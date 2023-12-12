<!DOCTYPE html>
<html lang="en">

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

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= base_url('dashboard/src/plugins/src/leaflet/leaflet.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/plugins/src/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('dashboard/src/assets/css/light/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/dark/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/light/dashboard/dash_2.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/dark/dashboard/dash_2.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('dashboard/src/assets/css/light/scrollspyNav.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('dashboard/src/assets/css/dark/scrollspyNav.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

    <style>
        .leaflet-map {
            border-radius: 8px;
            height: 330px;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

        .leaflet-map {
            border-radius: 8px;
        }
    </style>

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
                                            <p style="color:#e03838">
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
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="<?= base_url('/gambut'); ?>">
                                <img src="<?= base_url('dashboard/src/assets/img/logo.svg') ?>" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="<?= base_url('/gambut'); ?>" class="nav-link"> SIGAMMA </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <!-- dashboard -->
                    <li class="menu active">
                        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="dashboard" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/gambut'); ?>"> Gambut </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/mangrove'); ?>"> Mangrove </a>
                            </li>
                            <li class="active">
                                <a href="/peta-interaktif"> Peta Interaktif </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /dashboard -->

                    <!-- GAMBUT -->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span><strong>DATABASE GAMBUT</strong></span>
                        </div>
                    </li>
                    <!-- administratif gambut -->
                    <li class="menu">
                        <a href="#administratif-g" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                                    <path d="M13 7l0 .01"></path>
                                    <path d="M17 7l0 .01"></path>
                                    <path d="M17 11l0 .01"></path>
                                    <path d="M17 15l0 .01"></path>
                                </svg>
                                <span>Administratif</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="administratif-g" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/gambut/administrasi'); ?>"> Data Administrasi </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/gambut/kelembagaan'); ?>"> Data Kelembagaan </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/gambut/kawasan'); ?>"> Data Kawasan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /data administratif gambut -->
                    <li class="menu">
                        <a href="<?= base_url('/gambut/tindakan'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-autofit-content" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4l-3 3l3 3"></path>
                                    <path d="M18 4l3 3l-3 3"></path>
                                    <path d="M4 14m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M10 7h-7"></path>
                                    <path d="M21 7h-7"></path>
                                </svg>
                                <span>Arahan Tindakan</span>
                            </div>
                        </a>
                    </li>
                    <!-- /dokumen tindakan -->
                    <!-- dokumen kegiatan -->
                    <li class="menu">
                        <a href="<?= base_url('/gambut/rencana'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M16 3l0 4"></path>
                                    <path d="M8 3l0 4"></path>
                                    <path d="M4 11l16 0"></path>
                                    <path d="M8 15h2v2h-2z"></path>
                                </svg>
                                <span>Perencanaan Keg.</span>
                            </div>
                        </a>
                    </li>
                    <!-- /dokumen kegiatan -->

                    <!-- pembiayaan gambut -->
                    <li class="menu">
                        <a href="#pembiayaangambut" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <circle cx="8" cy="21" r="2"></circle>
                                    <circle cx="20" cy="21" r="2"></circle>
                                    <path d="M5.67 6H23l-1.68 8.39a2 2 0 0 1-2 1.61H8.75a2 2 0 0 1-2-1.74L5.23 2.74A2 2 0 0 0 3.25 1H1"></path>
                                </svg>
                                <span>Pembiayaan</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pembiayaangambut" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/gambut/pembiayaan'); ?>"> Pembiayaan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/#'); ?>"> menu susulan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /pembiayaan gambut -->

                    <!-- pelaksanaan gambut -->
                    <li class="menu">
                        <a href="#pelaksanaangambut" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tractor" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M7 15l0 .01"></path>
                                    <path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M10.5 17l6.5 0"></path>
                                    <path d="M20 15.2v-4.2a1 1 0 0 0 -1 -1h-6l-2 -5h-6v6.5"></path>
                                    <path d="M18 5h-1a1 1 0 0 0 -1 1v4"></path>
                                </svg>
                                <span>Pelaksanaan</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pelaksanaangambut" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/gambut/pelaksanaan'); ?>"> Pelaksanaan</a>
                            </li>
                            <li>
                                <a href="/#"> menu susulan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /pelaksanaan gambut -->

                    <!-- monev gambut -->
                    <li class="menu">
                        <a href="#monevgambut" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                </svg>
                                <span>Monitoring & Eval.</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="monevgambut" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/gambut/monitoring'); ?>"> Monitoring</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/gambut/evaluasi'); ?>"> Evaluasi </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /monev gambut -->
                    <!-- /GAMBUT -->

                    <!-- MANGROVE -->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span><strong>DATABASE MANGROVE</strong></span>
                        </div>
                    </li>
                    <!-- administratif mangrove -->
                    <li class="menu">
                        <a href="#administratif-m" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                                    <path d="M13 7l0 .01"></path>
                                    <path d="M17 7l0 .01"></path>
                                    <path d="M17 11l0 .01"></path>
                                    <path d="M17 15l0 .01"></path>
                                </svg>
                                <span>Administratif</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="administratif-m" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/mangrove/administrasi'); ?>"> Data Administrasi </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/mangrove/kelembagaan'); ?>"> Data Kelembagaan </a>
                            </li>
                            <li>
                                <a href="/das"> Data DAS </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /data administratif mangrove -->

                    <!-- dokumen kegiatan -->
                    <li class="menu">
                        <a href="<?= base_url('/mangrove/dokumen'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span>Dokumen Kegiatan</span>
                            </div>
                        </a>
                    </li>
                    <!-- /dokumen kegiatan -->

                    <!-- kegiatan dan tindakan mangrove -->
                    <li class="menu">
                        <a href="#kegiatantindakan-m" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0v9a5 5 0 0 1 -7 0a5 5 0 0 0 -7 0v-9z"></path>
                                    <path d="M5 21v-7"></path>
                                </svg>
                                <span>Keg. & Tindakan</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="kegiatantindakan-m" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/mangrove/kegiatan'); ?>"> Bentuk Kegiatan </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/mangrove/tindakan'); ?>"> Arahan Tindakan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /kegiatan dan tindakan mangrove -->

                    <!-- perencanaan mangrove -->
                    <li class="menu">
                        <a href="#perencanaanmangrove" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span>Perencanaan</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="perencanaanmangrove" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/mangrove/perencanaan'); ?>"> Perencanaan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/mangrove/survey'); ?>"> Survey </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /perencanaan mangrove -->

                    <!-- pembiayaan mangrove -->
                    <li class="menu">
                        <a href="#pembiayaanmangrove" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <circle cx="8" cy="21" r="2"></circle>
                                    <circle cx="20" cy="21" r="2"></circle>
                                    <path d="M5.67 6H23l-1.68 8.39a2 2 0 0 1-2 1.61H8.75a2 2 0 0 1-2-1.74L5.23 2.74A2 2 0 0 0 3.25 1H1"></path>
                                </svg>
                                <span>Pembiayaan</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pembiayaanmangrove" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/mangrove/pembiayaan'); ?>"> Pembiayaan</a>
                            </li>
                            <li>
                                <a href="/#"> menu susulan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /pembiayaan mangrove -->

                    <!-- pelaksanaan mangrove -->
                    <li class="menu">
                        <a href="#pelaksanaanmangrove" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tractor" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M7 15l0 .01"></path>
                                    <path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M10.5 17l6.5 0"></path>
                                    <path d="M20 15.2v-4.2a1 1 0 0 0 -1 -1h-6l-2 -5h-6v6.5"></path>
                                    <path d="M18 5h-1a1 1 0 0 0 -1 1v4"></path>
                                </svg>
                                <span>Pelaksanaan</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pelaksanaanmangrove" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/mangrove/pelaksanaan'); ?>"> Pelaksanaan</a>
                            </li>
                            <li>
                                <a href="/#"> menu susulan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /pelaksanaan mangrove -->

                    <!-- monev mangrove -->
                    <li class="menu">
                        <a href="#monevmangrove" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                </svg>
                                <span>Monitoring & Eval.</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="monevmangrove" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/mangrove/monitoring'); ?>"> Monitoring</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/mangrove/evaluasi'); ?>"> Evaluasi </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /monev mangrove -->
                    <!-- /MANGROVE -->

                    <!-- PUSAT BANTUAN -->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>PUSAT BANTUAN</span></div>
                    </li>

                    <li class="menu">
                        <a href="#informasi" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z"></path>
                                    <path d="M19 16h-12a2 2 0 0 0 -2 2"></path>
                                    <path d="M9 8h6"></path>
                                </svg>
                                <span>Informasi</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="informasi" data-bs-parent="#accordionExample">
                            <li>
                                <a href="<?= base_url('/dokumentasi'); ?>"> Dokumentasi </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/fungsi'); ?>"> Fungsi & Penggunaan </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/struktur-data'); ?>"> Struktur Data </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="<?= base_url('/faq'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-question" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 9h8"></path>
                                    <path d="M8 13h6"></path>
                                    <path d="M14 18h-1l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"></path>
                                    <path d="M19 22v.01"></path>
                                    <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
                                </svg>
                                <span>FAQ</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="<?= base_url('/pengembangan'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-source-code" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14.5 4h2.5a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-5"></path>
                                    <path d="M6 5l-2 2l2 2"></path>
                                    <path d="M10 9l2 -2l-2 -2"></path>
                                </svg>
                                <span>Pengembangan</span>
                            </div>
                        </a>
                    </li>
                    <!-- /PUSAT BANTUAN -->
                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        <!-- SELAMAT DATANG -->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-three">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div>
                                            <div class="inv-title">
                                                <h5 class=""><?= $allkhg['nama']; ?></h5>
                                            </div>
                                            <div class="inv-balance-info">
                                                <p class="inv-balance">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plant-2" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M2 9a10 10 0 1 0 20 0"></path>
                                                        <path d="M12 19a10 10 0 0 1 10 -10"></path>
                                                        <path d="M2 9a10 10 0 0 1 10 10"></path>
                                                        <path d="M12 4a9.7 9.7 0 0 1 2.99 7.5"></path>
                                                        <path d="M9.01 11.5a9.7 9.7 0 0 1 2.99 -7.5"></path>
                                                    </svg>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-six">
                                <div class="widget-heading">
                                    <h6 class="">Data Kawasan</h6>
                                    <div class="task-action">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="statistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-chart" style="margin-bottom: 16px;">
                                    <div class="w-chart-section">
                                        <div class="w-detail" style="margin-top: -25px;">
                                            <p class="w-title">Kode KHG</p>
                                            <p class="w-stats" style="font-size: 15px;"><?= $allkhg['kodekhg']; ?></p>
                                        </div>
                                    </div>
                                    <div class="w-chart-section">
                                        <div class="w-detail" style="margin-top: -25px;">
                                            <p class="w-title">Jumlah Sub-KHG</p>
                                            <p class="w-stats" style="font-size: 15px;"><?= $countsubkhg; ?></p>
                                        </div>
                                    </div>
                                    <div class="w-chart-section">
                                        <div class="w-detail" style="margin-top: -25px;">
                                            <p class="w-title">Jumlah HRU</p>
                                            <p class="w-stats" style="font-size: 15px;"><?= $counthru; ?></p>
                                        </div>
                                    </div>
                                    <div class="w-chart-section">
                                        <div class="w-detail" style="margin-top: -25px;">
                                            <p class="w-title">Luas</p>
                                            <p class="w-stats" style="font-size: 15px;"><?= $allkhg['luas']; ?> Hektar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">CITRA SATELIT KAWASAN</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg style="margin-top: 5px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-satellite" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3.707 6.293l2.586 -2.586a1 1 0 0 1 1.414 0l5.586 5.586a1 1 0 0 1 0 1.414l-2.586 2.586a1 1 0 0 1 -1.414 0l-5.586 -5.586a1 1 0 0 1 0 -1.414z" />
                                                        <path d="M6 10l-3 3l3 3l3 -3" />
                                                        <path d="M10 6l3 -3l3 3l-3 3" />
                                                        <path d="M12 12l1.5 1.5" />
                                                        <path d="M14.5 17a2.5 2.5 0 0 0 2.5 -2.5" />
                                                        <path d="M15 21a6 6 0 0 0 6 -6" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="map" class="leaflet-map"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-three">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">SASARAN RESTORASI BERDASARKAN TAHUN</h5>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="intervensi"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /SELAMAT DATANG -->
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">DATA PERENCANAAN</h5>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="perencanaan" class=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">DATA PELAKSANAAN</h5>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="perencanaan" class=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-three">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">RENCANA TINDAKAN REWETTING (Unit)</h5>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="rewetting"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-three">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">RENCANA TINDAKAN REVEGETASI (Ha)</h5>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="revegetasi" class=""></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-three">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">RENCANA TINDAKAN REVITALISASI</h5>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="revitalisasi" class=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  END CONTENT AREA  -->

        </div>
    </div>
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('dashboard/src/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/mousetrap/mousetrap.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/layouts/collapsible-menu/app.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/highlight/highlight.pack.js') ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('dashboard/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?= base_url('dashboard/src/assets/js/scrollspyNav.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/leaflet/us-states.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/leaflet/leaflet.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="<?= base_url('dashboard/src/plugins/src/leaflet/jquery-3.5.1.js') ?>"></script>
    <script src="<?= base_url('dashboard/src/plugins/src/leaflet/basemap-providers.js') ?>"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    <script>
        var data = <?= json_encode($khg) ?>;
        var map = L.map('map', {
            center: [-7.318437, 111.40],
            zoom: 13,
            scrollWhellZoom: false,
            zoomControl: false,
        });

        function style(feature) {
            return {
                weight: 1,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.1,
                fillColor: 'black'
            };
        }

        map.scrollWheelZoom.disable();

        geojson = L.geoJson(data, {
            style: style,
        }).addTo(map);

        var tiles = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/{variant}/MapServer/tile/{z}/{y}/{x}', {
            variant: 'World_Imagery',
            // tileSize: 512,
            // zoomOffset: -1,
            attribution: 'Tiles: Esri | Data : BRGM RI'
        }).addTo(map);


        geojson.eachLayer(function(layer) {
            if (layer.feature.properties.KODE_KHG === "<?= $allkhg['kodekhg']; ?>") {
                map.fitBounds(layer.getBounds());
            }
        });
    </script>
    <script>
        window.addEventListener("load", function() {
            try {

                getcorkThemeObject = localStorage.getItem("theme");
                getParseObject = JSON.parse(getcorkThemeObject)
                ParsedObject = getParseObject;

                if (ParsedObject.settings.layout.darkMode) {

                    var Theme = 'dark';

                    Apex.tooltip = {
                        theme: Theme
                    }
                    // SASARAN
                    var intervensi = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 350,
                            type: 'bar',
                            toolbar: {
                                show: false,
                            }
                        },
                        colors: ['#5E9338', '#FFC94D', '#F07C15', ],
                        plotOptions: {
                            bar: {
                                horizontal: true,
                                columnWidth: '55%',
                                endingShape: 'rounded',
                                borderRadius: 5,

                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '14px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 8
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: <?= json_encode($targetseri); ?>,
                        xaxis: {
                            categories: <?= json_encode($targetkategori); ?>,
                        },

                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: Theme,
                                type: 'vertical',
                                shadeIntensity: 0.3,
                                inverseColors: false,
                                opacityFrom: 1,
                                opacityTo: 0.8,
                                stops: [0, 100]
                            }
                        },
                        tooltip: {
                            marker: {
                                show: false,
                            },
                            theme: Theme,
                            y: {
                                formatter: function(val) {
                                    return val
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 767,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 0,
                                        columnWidth: "50%"
                                    }
                                }
                            }
                        }, ]
                    }
                    // SASARAN
                    // REWETTING 
                    var R1data = <?php echo $R1data; ?>;
                    console.log(R1data);
                    var rewetting = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 300,
                            type: 'area',
                            zoom: {
                                enabled: false
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338', '#FFC94D', '#e03838'],
                        dataLabels: {
                            enabled: true
                        },
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 5
                            }, {
                                seriesIndex: 2,
                                dataPointIndex: 11,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 4
                            }]
                        },

                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3,
                            lineCap: 'round'
                        },
                        series: R1data.series,
                        labels: R1data.labels,
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true,
                                }
                            },
                            padding: {
                                top: -20,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            offsetY: -10,
                            fontSize: '10px',
                            fontFamily: 'Lexend, sans-serif',
                            markers: {
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                onClick: undefined,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 20
                            }

                        },
                        tooltip: {
                            theme: Theme,
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .19,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                legend: {
                                    offsetY: -50,
                                },
                            },
                        }]
                    }
                    // REWETTING
                    // REVEGETASI
                    var R2data = <?php echo $R2data; ?>;
                    console.log(R2data);
                    var revegetasi = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 300,
                            type: 'area',
                            zoom: {
                                enabled: false
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338', '#FFC94D', '#e03838'],
                        dataLabels: {
                            enabled: true
                        },
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 5
                            }, {
                                seriesIndex: 2,
                                dataPointIndex: 11,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 4
                            }]
                        },

                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3,
                            lineCap: 'round'
                        },
                        series: R2data.series,
                        labels: R2data.labels,
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true,
                                }
                            },
                            padding: {
                                top: -20,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            offsetY: -10,
                            fontSize: '10px',
                            fontFamily: 'Lexend, sans-serif',
                            markers: {
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                onClick: undefined,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 20
                            }

                        },
                        tooltip: {
                            theme: Theme,
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .19,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                legend: {
                                    offsetY: -50,
                                },
                            },
                        }]
                    }
                    // REVEGETASI
                    // REVITALISASI
                    var R3data = <?php echo $R3data; ?>;
                    console.log(R3data);
                    var revitalisasi = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 300,
                            type: 'area',
                            zoom: {
                                enabled: false
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338'],
                        dataLabels: {
                            enabled: true
                        },
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 5
                            }, {
                                seriesIndex: 2,
                                dataPointIndex: 11,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 4
                            }]
                        },

                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3,
                            lineCap: 'round'
                        },
                        series: R3data.series,
                        labels: R3data.labels,
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true,
                                }
                            },
                            padding: {
                                top: -50,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            offsetY: -10,
                            fontSize: '10px',
                            fontFamily: 'Lexend, sans-serif',
                            markers: {
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                onClick: undefined,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 20
                            }

                        },
                        tooltip: {
                            theme: Theme,
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .19,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                legend: {
                                    offsetY: -50,
                                },
                            },
                        }]
                    }
                    // REVITALISASI
                    // Data perencanaan
                    var perencanaandata = <?php echo $perencanaandata; ?>;
                    console.log(perencanaandata);
                    var perencanaan = {
                        chart: {
                            height: 200,
                            type: 'line',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            curve: 'straight',
                            width: 5,
                            lineCap: 'round'
                        },
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: -15,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.05
                            },
                            padding: {
                                top: -20,
                                right: 0,
                                bottom: 0,
                                left: 0
                            },
                        },
                        series: perencanaandata.series,
                        labels: perencanaandata.labels,
                    };
                } else {

                    var Theme = 'dark';

                    Apex.tooltip = {
                        theme: Theme
                    }
                    // SASARAN
                    var intervensi = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 350,
                            type: 'bar',
                            toolbar: {
                                show: false,
                            }
                        },
                        colors: ['#5E9338', '#FFC94D', '#F07C15', ],
                        plotOptions: {
                            bar: {
                                horizontal: true,
                                columnWidth: '55%',
                                endingShape: 'rounded',
                                borderRadius: 5,

                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '14px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 8
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: <?= json_encode($targetseri); ?>,
                        xaxis: {
                            categories: <?= json_encode($targetkategori); ?>,
                        },

                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: Theme,
                                type: 'vertical',
                                shadeIntensity: 0.3,
                                inverseColors: false,
                                opacityFrom: 1,
                                opacityTo: 0.8,
                                stops: [0, 100]
                            }
                        },
                        tooltip: {
                            marker: {
                                show: false,
                            },
                            theme: Theme,
                            y: {
                                formatter: function(val) {
                                    return val
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 767,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 0,
                                        columnWidth: "50%"
                                    }
                                }
                            }
                        }, ]
                    }
                    // SASARAN
                    // REWETTING 
                    var R1data = <?php echo $R1data; ?>;
                    console.log(R1data);
                    var rewetting = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 300,
                            type: 'area',
                            zoom: {
                                enabled: false
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338', '#FFC94D', '#e03838'],
                        dataLabels: {
                            enabled: true
                        },
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 5
                            }, {
                                seriesIndex: 2,
                                dataPointIndex: 11,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 4
                            }]
                        },

                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3,
                            lineCap: 'round'
                        },
                        series: R1data.series,
                        labels: R1data.labels,
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true,
                                }
                            },
                            padding: {
                                top: -20,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            offsetY: -10,
                            fontSize: '10px',
                            fontFamily: 'Lexend, sans-serif',
                            markers: {
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                onClick: undefined,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 20
                            }

                        },
                        tooltip: {
                            theme: Theme,
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .19,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                legend: {
                                    offsetY: -50,
                                },
                            },
                        }]
                    }
                    // REWETTING
                    // REVEGETASI
                    var R2data = <?php echo $R2data; ?>;
                    console.log(R2data);
                    var revegetasi = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 300,
                            type: 'area',
                            zoom: {
                                enabled: false
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338', '#FFC94D', '#e03838'],
                        dataLabels: {
                            enabled: true
                        },
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 5
                            }, {
                                seriesIndex: 2,
                                dataPointIndex: 11,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 4
                            }]
                        },

                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3,
                            lineCap: 'round'
                        },
                        series: R2data.series,
                        labels: R2data.labels,
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true,
                                }
                            },
                            padding: {
                                top: -20,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            offsetY: -10,
                            fontSize: '10px',
                            fontFamily: 'Lexend, sans-serif',
                            markers: {
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                onClick: undefined,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 20
                            }

                        },
                        tooltip: {
                            theme: Theme,
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .19,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                legend: {
                                    offsetY: -50,
                                },
                            },
                        }]
                    }
                    // REVEGETASI
                    // REVITALISASI
                    var R3data = <?php echo $R3data; ?>;
                    console.log(R3data);
                    var revitalisasi = {
                        chart: {
                            fontFamily: 'Lexend, sans-serif',
                            height: 300,
                            type: 'area',
                            zoom: {
                                enabled: false
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338'],
                        dataLabels: {
                            enabled: true
                        },
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 5
                            }, {
                                seriesIndex: 2,
                                dataPointIndex: 11,
                                fillColor: '#000',
                                strokeColor: '#000',
                                size: 4
                            }]
                        },

                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3,
                            lineCap: 'round'
                        },
                        series: R3data.series,
                        labels: R3data.labels,
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true,
                                }
                            },
                            padding: {
                                top: -50,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            offsetY: -10,
                            fontSize: '10px',
                            fontFamily: 'Lexend, sans-serif',
                            markers: {
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                onClick: undefined,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 20
                            }

                        },
                        tooltip: {
                            theme: Theme,
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .19,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                legend: {
                                    offsetY: -50,
                                },
                            },
                        }]
                    }
                    // REVITALISASI
                    // Data perencanaan
                    var perencanaandata = <?php echo $perencanaandata; ?>;
                    console.log(perencanaandata);
                    var perencanaan = {
                        chart: {
                            height: 200,
                            type: 'line',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#5E9338'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            curve: 'straight',
                            width: 5,
                            lineCap: 'round'
                        },
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-xaxis-title',
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value, index) {
                                    return (value)
                                },
                                offsetX: -15,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    fontFamily: 'Lexend, sans-serif',
                                    cssClass: 'apexcharts-yaxis-title',
                                },
                            }
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.05
                            },
                            padding: {
                                top: -20,
                                right: 0,
                                bottom: 0,
                                left: 5
                            },
                        },
                        series: perencanaandata.series,
                        labels: perencanaandata.labels,
                    };
                }

                var render_intervensi = new ApexCharts(
                    document.querySelector("#intervensi"),
                    intervensi
                );
                render_intervensi.render();

                var render_rewetting = new ApexCharts(
                    document.querySelector("#rewetting"),
                    rewetting
                );
                render_rewetting.render();

                var render_revegetasi = new ApexCharts(
                    document.querySelector("#revegetasi"),
                    revegetasi
                );
                render_revegetasi.render();

                var render_revitalisasi = new ApexCharts(
                    document.querySelector("#revitalisasi"),
                    revitalisasi
                );
                render_revitalisasi.render();

                var render_perencanaan = new ApexCharts(
                    document.querySelector("#perencanaan"),
                    perencanaan
                );
                render_perencanaan.render();

                const ps = new PerfectScrollbar(document.querySelector('.mt-container'));

                document.querySelector('.theme-toggle').addEventListener('click', function() {

                    getcorkThemeObject = localStorage.getItem("theme");
                    getParseObject = JSON.parse(getcorkThemeObject)
                    ParsedObject = getParseObject;

                    if (ParsedObject.settings.layout.darkMode) {

                        render_intervensi.updateOptions({
                            grid: {
                                borderColor: '#191e3a',
                            },
                        })

                    } else {

                        render_intervensi.updateOptions({
                            grid: {
                                borderColor: '#e0e6ed',
                            },
                        })


                    }

                })


            } catch (e) {
                // statements
                console.log(e);
            }

        })
    </script>
    <script>

    </script>
</body>

</html>