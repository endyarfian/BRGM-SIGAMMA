<?= $this->extend('template/dashboard'); ?>
<?= $this->section('content'); ?>

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sidebar-closed" id="container">

    <div class="overlay"></div>
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
                    <a href="<?= base_url('/admin-dashboard'); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Admin Dashboard</span>
                        </div>
                    </a>
                </li>
                <!-- /dashboard -->
                <?php if (in_groups(['developer', 'web-master'])) : ?>
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>MANAJEMEN PENGGUNA</span></div>
                    </li>

                    <!-- pengguna -->
                    <li class="menu">
                        <a href="<?= base_url('/admin/pengguna'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Pengguna</span>
                            </div>
                        </a>
                    </li>
                    <!-- /pengguna -->
                    <!-- peran dan perizinan -->
                    <li class="menu">
                        <a href="<?= base_url('/admin/peran'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-cog" width="22" height="22" viewBox="0 0 22 22" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <span>Peran & Perizinan</span>
                            </div>
                        </a>
                    </li>
                    <!-- /peran dan perizinan -->
                <?php endif; ?>
                <?php if (in_groups(['developer', 'super-admin', 'gambut-admin', 'web-master'])) : ?>
                    <!-- GAMBUT -->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span><strong>CONSOLE DATA GAMBUT</strong></span>
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
                                <a href="<?= base_url('/admin/gambut/administrasi'); ?>"> Data Administrasi </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/gambut/kawasan'); ?>"> Data Kawasan </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /data administratif gambut -->
                    <!-- dokumen tindakan -->
                    <li class="menu ">
                        <a href="<?= base_url('/admin/gambut/tindakan'); ?>" aria-expanded="false" class="dropdown-toggle">
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
                        <a href="<?= base_url('/admin/gambut/rencana'); ?>" aria-expanded="false" class="dropdown-toggle">
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
                                <a href="<?= base_url('/admin/gambut/pembiayaan'); ?>"> Pembiayaan</a>
                            </li>
                            <li>
                                <a href="/#"> menu susulan </a>
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
                                <a href="<?= base_url('/admin/gambut/pelaksanaan'); ?>"> Pelaksanaan</a>
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
                                <a href="<?= base_url('/admin/gambut/monitoring'); ?>"> Monitoring</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/gambut/evaluasi'); ?>"> Evaluasi </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /monev gambut -->
                    <!-- /GAMBUT -->
                <?php endif; ?>
                <?php if (in_groups(['developer', 'super-admin', 'mangrove-admin', 'web-master'])) : ?>
                    <!-- MANGROVE -->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span><strong>CONSOLE DATA MANGROVE</strong></span>
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
                                <a href="<?= base_url('/admin/mangrove/administrasi'); ?>"> Data Administrasi </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/mangrove/kelembagaan'); ?>"> Data Kelembagaan </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/mangrove/das'); ?>"> Data DAS </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /data administratif mangrove -->

                    <!-- dokumen kegiatan -->
                    <li class="menu">
                        <a href="<?= base_url('/admin/mangrove/dokumen'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M16 3l0 4"></path>
                                    <path d="M8 3l0 4"></path>
                                    <path d="M4 11l16 0"></path>
                                    <path d="M8 15h2v2h-2z"></path>
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
                                <a href="<?= base_url('/admin/mangrove/kegiatan'); ?>"> Bentuk Kegiatan </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/mangrove/tindakan'); ?>"> Arahan Tindakan </a>
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
                                <a href="<?= base_url('/admin/mangrove/perencanaan'); ?>"> Perencanaan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/mangrove/survey'); ?>"> Survey </a>
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
                                <a href="<?= base_url('/admin/mangrove/pembiayaan'); ?>"> Pembiayaan</a>
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
                                <a href="<?= base_url('/admin/mangrove/pelaksanaan'); ?>"> Pelaksanaan</a>
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
                                <a href="<?= base_url('/admin/mangrove/monitoring'); ?>"> Monitoring</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/mangrove/evaluasi'); ?>"> Evaluasi </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /monev mangrove -->
                    <!-- /MANGROVE -->
                <?php endif; ?>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-header">
                                    <div class="w-info">
                                        <h6 class="value">SELAMAT DATANG!</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);">cuma pemanis :)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="w-info">
                                        <p class="value">
                                            <span>Hai,</span> <?= user()->fullname; ?>.<span><br> Saat ini anda berada di halaman admin</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                <polyline points="17 6 23 6 23 12"></polyline>
                                            </svg>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /SELAMAT DATANG -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-three">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <div class="inv-title">
                                            <h5 class="">DATABASE GAMBUT</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONSOLE DATA ADMIN GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE DATA ADMINISTRATIF GAMBUT</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                                                        <path d="M13 7l0 .01"></path>
                                                        <path d="M17 7l0 .01"></path>
                                                        <path d="M17 11l0 .01"></path>
                                                        <path d="M17 15l0 .01"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Administrasi : <a href="/admin/gambut/administrasi"><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data wilayah secara administratif.</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Kelembagaan : <a href="/admin/gambut/kelembagaan "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data kelembagaan dan unit pelaksana.</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-drag-drop-2" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                                                        <path d="M4 4l0 .01"></path>
                                                        <path d="M8 4l0 .01"></path>
                                                        <path d="M12 4l0 .01"></path>
                                                        <path d="M16 4l0 .01"></path>
                                                        <path d="M4 8l0 .01"></path>
                                                        <path d="M4 12l0 .01"></path>
                                                        <path d="M4 16l0 .01"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Kawasan : <a href="/admin/gambut/kawasan"><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data kawasan gambut.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE DATA ADMIN GAMBUT -->

                    <!-- CONSOLE DOKUMEN KEGIATAN GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE ARAHAN TINDAKAN RESTORASI</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-autofit-content" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6 4l-3 3l3 3"></path>
                                                        <path d="M18 4l3 3l-3 3"></path>
                                                        <path d="M4 14m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                                        <path d="M10 7h-7"></path>
                                                        <path d="M21 7h-7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Arahan Tindakan : <a href="/admin/gambut/tindakan"><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data arahan tindakan restorasi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE DOKUMEN KEGIATAN GAMBUT -->

                    <!-- CONSOLE KEGIATAN DAN TINDAKAN GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE PERENCANAAN KEGIATAN</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                                        <path d="M16 3l0 4"></path>
                                                        <path d="M8 3l0 4"></path>
                                                        <path d="M4 11l16 0"></path>
                                                        <path d="M8 15h2v2h-2z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Perencanaan Kegiatan : <a href="/admin/gambut/rencana "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data dokumen, sasaran, dan rencana kegiatan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE KEGIATAN DAN TINDAKAN GAMBUT -->

                    <!-- CONSOLE PERENCANAAN GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE DATA PERENCANAAN KEGIATAN GAMBUT</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M15 3v4a1 1 0 0 0 1 1h4"></path>
                                                        <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"></path>
                                                        <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Perencanaan : <a href="/admin/gambut/perencanaan "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data alokasi dan perencanaan kegiatan</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-run" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M13 4m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                        <path d="M4 17l5 1l.75 -1.5"></path>
                                                        <path d="M15 21l0 -4l-4 -3l1 -6"></path>
                                                        <path d="M7 12l0 -3l5 -1l3 3l3 1"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Survey : <a href="/admin/gambut/survey "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data survey dari rencana kegiatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE PERENCANAAN GAMBUT -->
                    <!-- CONSOLE PEMBIAYAAN GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE DATA PEMBIAYAAN KEGIATAN GAMBUT</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 17h-11v-14h-2"></path>
                                                        <path d="M6 5l14 1l-1 7h-13"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Pembiayaan : <a href="/admin/gambut/pembiayaan "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data alokasi biaya kegiatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE PEMBIAYAAN GAMBUT -->
                    <!-- CONSOLE PELAKSANAAN GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE DATA PELAKSANAAN KEGIATAN GAMBUT</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Pelaksanaan : <a href="/admin/gambut/pelaksanaan "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data pelaksanaan kegiatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE PELAKSANAAN GAMBUT -->

                    <!-- CONSOLE MONEV GAMBUT -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">CONSOLE DATA MONITORING DAN EVALUASI KEGIATAN GAMBUT</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tree" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 13l-2 -2"></path>
                                                <path d="M12 12l2 -2"></path>
                                                <path d="M12 21v-13"></path>
                                                <path d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"></path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Database Shortcut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-shadow-top"></div>
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-desktop-analytics" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z"></path>
                                                        <path d="M7 20h10"></path>
                                                        <path d="M9 16v4"></path>
                                                        <path d="M15 16v4"></path>
                                                        <path d="M9 12v-4"></path>
                                                        <path d="M12 12v-1"></path>
                                                        <path d="M15 12v-2"></path>
                                                        <path d="M12 12v-1"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Monitoring : <a href="/admin/gambut/monitoring "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data monitoring kegiatan</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                                        <path d="M9 12l.01 0"></path>
                                                        <path d="M13 12l2 0"></path>
                                                        <path d="M9 16l.01 0"></path>
                                                        <path d="M13 16l2 0"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Data Evaluasi : <a href="/admin/gambut/evaluasi "><span>[MASUK]</span></a></h5>
                                                </div>
                                                <p>Data evaluasi kegiatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONSOLE PERENCANAAN GAMBUT -->
                </div>

            </div>
        </div>

        <?= $this->endSection(); ?>