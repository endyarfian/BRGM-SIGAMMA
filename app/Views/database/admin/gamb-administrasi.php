<?= $this->extend('template/database'); ?>
<?= $this->section('content'); ?>

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
                        <a href="<?= base_url('/gambut'); ?>" class="nav-link">SIGAMMA</a>
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
                <li class="menu">
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
                            </svg><span>MANAJEMEN PENGGUNA</span>
                        </div>
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
                <?php if (in_groups(['developer', 'web-master', 'super-admin', 'gambut-admin'])) : ?>
                    <!-- GAMBUT -->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span><strong>CONSOLE DATA GAMBUT</strong></span>
                        </div>
                    </li>
                    <!-- administratif gambut -->
                    <li class="menu active">
                        <a href="#administratif-g" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
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
                        <ul class="collapse submenu list-unstyled show" id="administratif-g" data-bs-parent="#accordionExample">
                            <li class="active">
                                <a href="<?= base_url('/admin/gambut/administrasi'); ?>"> Data Administrasi </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/admin/gambut/kawasan'); ?>"> Data Kawasan</a>
                            </li>
                        </ul>
                    </li>
                    <!-- /data administratif gambut -->
                    <!-- dokumen tindakan -->
                    <li class="menu">
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
                <?php if (in_groups(['developer', 'web-master', 'super-admin', 'mangrove-admin'])) : ?>
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
                                <span>Perencanaan Keg.</span>
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
                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a>ADMIN</a></li>
                            <li class="breadcrumb-item"><a>Gambut</a></li>
                            <li class="breadcrumb-item"><a>Administrasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Provinsi</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->
                <!-- tabel data provinsi -->
                <div id="head-1" class="seperator-header layout-top-spacing">
                    <h4 class=""><strong>DATA PROVINSI</strong></h4>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>FORM ENTRY DATA</h4>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-top: 5px; padding-left: 5px; padding-right: 5px;">
                                    <form action="<?= base_url('admin/gambut/administrasi/simpan_prov'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="kodeprov">
                                                        <p>Masukkan kode Provinsi.</p>
                                                    </label>
                                                    <input type="text" placeholder="Kode Provinsi..." class="form-control <?= ($validation->hasError('kodeprov')) ? 'is-invalid' : ''; ?>" id="kodeprov" name="kodeprov" value="<?= old('kodeprov'); ?>" autofocus>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kodeprov'); ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="namaprov">
                                                        <p>Masukkan nama Provinsi.</p>
                                                    </label>
                                                    <input type="text" placeholder="Nama Provinsi..." class="form-control <?= ($validation->hasError('namaprov')) ? 'is-invalid' : ''; ?>" id="namaprov" name="namaprov" value="<?= old('namaprov'); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('namaprov'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="simpan_desa" class="btn btn-outline-success btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 30 27" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                </svg>
                                                <strong>SIMPAN</strong>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <table id="user" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Provinsi</th>
                                            <th>Nama Provinsi</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($prov as $var) : ?>
                                            <tr>
                                                <td scope="row"><?= $no++; ?></td>
                                                <td><?= $var['kode_prov']; ?></td>
                                                <td><?= $var['nama_prov']; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#edit_1<?= $var['id']; ?>" title="Sunting Record">Sunting</button>
                                                        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#hapus_1<?= $var['id']; ?>" title="Hapus Record">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="35" height="35" viewBox="0 0 25 25" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M4 7h16"></path>
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                <path d="M10 12l4 4m0 -4l-4 4"></path>
                                                            </svg>
                                                        </button>
                                                        <a href="<?= base_url('admin/gambut/administrasi/pelaksana/'); ?>/<?= $var['id']; ?>" type="button" class="btn btn-outline-warning" title="Data Pelaksana">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-backhoe" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                <path d="M13 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                <path d="M13 19l-9 0" />
                                                                <path d="M4 15l9 0" />
                                                                <path d="M8 12v-5h2a3 3 0 0 1 3 3v5" />
                                                                <path d="M5 15v-2a1 1 0 0 1 1 -1h7" />
                                                                <path d="M21.12 9.88l-3.12 -4.88l-5 5" />
                                                                <path d="M21.12 9.88a3 3 0 0 1 -2.12 5.12a3 3 0 0 1 -2.12 -.88l4.24 -4.24z" />
                                                            </svg>
                                                        </a>
                                                        <a href="<?= base_url('admin/gambut/administrasi/prov/'); ?>/<?= $var['id']; ?>" type="button" class="btn btn-outline-warning" title="Data Kabupaten/Kota">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-chevron-right" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M11 9l3 3l-3 3"></path>
                                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0z"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tabel data provinsi -->
                <!-- modal provinsi -->
                <div id="modal-prov">
                    <?php foreach ($prov as $var) : ?>
                        <div id="edit_prov">
                            <div class="modal fade" id="edit_1<?= $var['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">UPDATE DATA PROVINSI</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="administrasi/edit_prov/<?= $var['id']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="alert alert-icon-left alert-light-success alert-dismissible fade show mb-4" role="alert">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                                                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                                        <line x1="12" y1="9" x2="12" y2="13"></line>
                                                        <line x1="12" y1="17" x2="12" y2="17"></line>
                                                    </svg>
                                                    <strong>Perhatian!</strong> dibawah ini akan diperbarui.
                                                </div>
                                                <div class="form-group">
                                                    <label for="kodeprov">
                                                        <p>Sunting kode Provinsi.</p>
                                                    </label>
                                                    <input id="kodeprov" type="text" name="kodeprov" value="<?= $var['kode_prov']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <br>
                                                    <label for="namaprov">
                                                        <p>Sunting nama Provinsi.</p>
                                                    </label>
                                                    <input id="namaprov" type="text" name="namaprov" value="<?= $var['nama_prov']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i>Batal</button>
                                                <button type="submit" id="edit_prov" class="btn btn-submit btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="hapus_prov">
                            <div class="modal fade" id="hapus_1<?= $var['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">HAPUS DATA PROVINSI</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="administrasi/hapus_prov/<?= $var['id']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="alert alert-icon-left alert-light-warning alert-dismissible fade show mb-4" role="alert">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7h16"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        <path d="M10 12l4 4m0 -4l-4 4"></path>
                                                    </svg>
                                                    <strong>Perhatian!</strong> Data dibawah ini akan dihapus.
                                                </div>
                                                <p><strong>Kode Provinsi : </strong><?= $var['kode_prov']; ?></p>
                                                <p><strong>Nama Provinsi : </strong><?= $var['nama_prov']; ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i>Batal</button>
                                                <button type="submit" id="hapus_prov" class="btn btn-danger btn-sm">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- modal provinsi -->

            </div>

        </div>

        <?= $this->endSection(); ?>