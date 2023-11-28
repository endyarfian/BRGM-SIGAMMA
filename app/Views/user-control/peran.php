<?= $this->extend('template/pengguna'); ?>
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
                            <img src="<?= base_url('/dashboard/src/assets/img/logo.svg') ?>" class="navbar-logo" alt="logo">
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
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                </li>
                <!-- /dashboard -->

                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg><span>MANAJEMEN PENGGUNA</span></div>
                </li>

                <!-- pengguna -->
                <li class="menu ">
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
                <li class="menu active">
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
                            <a href="<?= base_url('/admin/gambut/kawasan'); ?>"> Data Kawasan</a>
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
                            <li class="breadcrumb-item"><a href="#">WEB-MASTER</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peran dan Perizinan</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <!-- tabel hak akses -->
                <div id="head-3" class="seperator-header layout-top-spacing">
                    <h4 class="">DATA HAK AKSES PENGGUNA</h4>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Pengguna</th>
                                            <th>Email Pengguna</th>
                                            <th>ID Peran</th>
                                            <th>Nama Peran</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($akses as $var) : ?>
                                            <tr>
                                                <td scope="row"><?= $no++; ?></td>
                                                <td><?= $var['user_id']; ?></td>
                                                <td><?= $var['email']; ?></td>
                                                <td><?= $var['group_id']; ?></td>
                                                <td><?= $var['group']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="modal" data-bs-target="#edit_3<?= $var['aksesid']; ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="35" height="35" viewBox="0 0 25 25" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                            </svg>
                                                        </button>
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
                <!-- tabel hak akses -->
                <!-- modal hak akses -->
                <div id="modal-akses">
                    <?php foreach ($akses as $var) : ?>
                        <div id="edit_akses">
                            <div class="modal fade" id="edit_3<?= $var['aksesid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">UPDATE PERAN PENGGUNA</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="peran/edit_akses/<?= $var['aksesid']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="alert alert-icon-left alert-light-success alert-dismissible fade show mb-4" role="alert">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                                                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                                        <line x1="12" y1="9" x2="12" y2="13"></line>
                                                        <line x1="12" y1="17" x2="12" y2="17"></line>
                                                    </svg>
                                                    <strong>Perhatian!</strong> Data dibawah ini akan diperbaharui.
                                                </div>
                                                <div class="form-group">
                                                    <label for="kodekec">
                                                        <p>Akun Pengguna</p>
                                                    </label>
                                                    <input id="kodekec" type="text" name="kodekec" value="<?= $var['email']; ?>" class="form-control" readonly>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="groupid">
                                                        <p>Sunting hak akses.</p>
                                                    </label>
                                                    <select type="text" name="groupid" id="groupid" class="form-select">
                                                        <option value="<?= $var['group_id']; ?>" select><?= $var['group']; ?></option>
                                                        <option value="2">web-Master</option>
                                                        <option value="3">super-admin</option>
                                                        <option value="4">gambut-admin</option>
                                                        <option value="5">mangrove-admin</option>
                                                        <option value="6">user</option>
                                                    </select>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i>Batal</button>
                                                <button type="submit" id="edit_kec" class="btn btn-submit btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- modal hak akses -->

                <!-- tabel role -->
                <div id="head-2" class="seperator-header layout-top-spacing">
                    <h4 class="">DATA PERAN PENGGUNA</h4>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="zero-config1" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Peran</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($role as $var) : ?>
                                            <tr>
                                                <td><?= $var['id']; ?></td>
                                                <td><?= $var['name']; ?></td>
                                                <td><?= $var['description']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tabel role -->
            </div>

        </div>

        <div id="input_1error" email="<?= $validation->getError('email'); ?>" username="<?= $validation->getError('username'); ?>" nama="<?= $validation->getError('nama'); ?>"></div>
        <?= $this->endSection(); ?>