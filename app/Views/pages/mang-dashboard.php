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
                        <li class="active">
                            <a href="<?= base_url('/mangrove'); ?>"> Mangrove </a>
                        </li>
                        <li>
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
                                            <span>Hai,</span> <?= user()->fullname; ?><span>.<br> Saat ini anda berada di halaman dashboard mangrove. query datanya belum ready ya gaes, datanya belum masuk.</span>
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

                    <!-- <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-six">
                    <div class="widget-heading">
                        <h6 class="">Statistics</h6>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="statistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="statistics" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-chart">
                        <div class="w-chart-section">
                            <div class="w-detail">
                                <p class="w-title">Total Visits</p>
                                <p class="w-stats">423,964</p>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="total-users"></div>
                            </div>
                        </div>

                        <div class="w-chart-section">
                            <div class="w-detail">
                                <p class="w-title">Paid Visits</p>
                                <p class="w-stats">7,929</p>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="paid-visits"></div>
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
                                <h6 class="value">Expenses</h6>
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
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg></p>
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="">
                                <div class="w-icon">
                                    <p>57%</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-three">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">Total Balance</h5>
                                </div>
                                <div class="inv-balance-info">
                                    <p class="inv-balance">$ 41,741.42</p>
                                    <span class="inv-stats balance-credited">+ 2453</span>
                                </div>
                            </div>
                            <div class="acc-action">
                                <div class="">
                                    <a href="javascript:void(0);" class="btn-wallet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg></a>
                                </div>
                                <a href="javascript:void(0);" class="btn-add-balance">Add Balance</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-three">
                    <div class="widget-heading">
                        <div class="">
                            <h5 class="">Unique Visitors</h5>
                        </div>

                        <div class="dropdown ">
                            <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="uniqueVisitors">
                                <a class="dropdown-item" href="javascript:void(0);">View</a>
                                <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div id="uniqueVisits"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-activity-five">

                    <div class="widget-heading">
                        <h5 class="">Activity Log</h5>

                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">View All</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Mark as Read</a>
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
                                        <div class="t-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>New project created : <a href="javscript:void(0);"><span>[Cork Admin]</span></a></h5>
                                        </div>
                                        <p>07 May, 2022</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Mail sent to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></h5>
                                        </div>
                                        <p>06 May, 2022</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Server Logs Updated</h5>
                                        </div>
                                        <p>01 May, 2022</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Task Completed : <a href="javscript:void(0);"><span>[Backup Files EOD]</span></a></h5>
                                        </div>
                                        <p>30 Apr, 2022</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                                <polyline points="13 2 13 9 20 9"></polyline>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Documents Submitted from <a href="javascript:void(0);">Sara</a></h5>
                                            <span class=""></span>
                                        </div>
                                        <p>25 Apr, 2022</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
                                                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                                <line x1="6" y1="6" x2="6" y2="6"></line>
                                                <line x1="6" y1="18" x2="6" y2="18"></line>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Server rebooted successfully</h5>
                                            <span class=""></span>
                                        </div>
                                        <p>10 Apr, 2022</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-shadow-bottom"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="">Visitors by Browser</h5>
                    </div>
                    <div class="widget-content">
                        <div class="vistorsBrowser">
                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <line x1="21.17" y1="8" x2="12" y2="8"></line>
                                        <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
                                        <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
                                    </svg>
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Chrome</h6>
                                        <p class="browser-count">65%</p>
                                    </div>
                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                                    </svg>
                                </div>
                                <div class="w-browser-details">

                                    <div class="w-browser-info">
                                        <h6>Safari</h6>
                                        <p class="browser-count">25%</p>
                                    </div>

                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                                <div class="w-browser-details">

                                    <div class="w-browser-info">
                                        <h6>Others</h6>
                                        <p class="browser-count">15%</p>
                                    </div>

                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row widget-statistic">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">31.6K</p>
                                        <h5 class="">Followers</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-chart">
                                    <div id="hybrid_followers"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div class="widget widget-one_hybrid widget-referral">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link">
                                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">1,900</p>
                                        <h5 class="">Referral</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-chart">
                                    <div id="hybrid_followers1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                        </svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">18.2%</p>
                                        <h5 class="">Engagement</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="w-chart">
                                    <div id="hybrid_followers3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-five">

                    <div class="widget-heading">

                        <a href="javascript:void(0)" class="task-info">

                            <div class="usr-avatar">
                                <span>FD</span>
                            </div>

                            <div class="w-title">

                                <h5>Figma Design</h5>
                                <span>Design Project</span>

                            </div>

                        </a>

                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="pendingTask" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">View Project</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Edit Project</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="widget-content">

                        <p>Doloribus nisi vel suscipit modi, optio ex repudiandae voluptatibus officiis commodi.</p>

                        <div class="progress-data">

                            <div class="progress-info">
                                <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    <p>5 Tasks</p>
                                </div>
                                <div class="progress-stats">
                                    <p>86.2%</p>
                                </div>
                            </div>

                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>

                        <div class="meta-info">

                            <div class="due-time">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg> 3 Days Left</p>
                            </div>


                            <div class="avatar--group">

                                <div class="avatar translateY-axis more-group">
                                    <span class="avatar-title">+6</span>
                                </div>
                                <div class="avatar translateY-axis">
                                    <img alt="avatar" src="../src/assets/img/profile-8.jpeg" />
                                </div>
                                <div class="avatar translateY-axis">
                                    <img alt="avatar" src="../src/assets/img/profile-12.jpeg" />
                                </div>
                                <div class="avatar translateY-axis">
                                    <img alt="avatar" src="../src/assets/img/profile-19.jpeg" />
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-content">

                        <div class="media">
                            <div class="w-img">
                                <img src="../src/assets/img/profile-19.jpeg" alt="avatar">
                            </div>
                            <div class="media-body">
                                <h6>Jimmy Turner</h6>
                                <p class="meta-date-time">Monday, May 18</p>
                            </div>
                        </div>

                        <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

                        <div class="w-action">
                            <div class="card-like">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
                                    <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                </svg>
                                <span>551 Likes</span>
                            </div>

                            <div class="read-more">
                                <a href="javascript:void(0);">Read More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right">
                                        <polyline points="13 17 18 12 13 7"></polyline>
                                        <polyline points="6 17 11 12 6 7"></polyline>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-two">
                    <div class="widget-content">

                        <div class="media">
                            <div class="w-img">
                                <img src="../src/assets/img/g-8.png" alt="avatar">
                            </div>
                            <div class="media-body">
                                <h6>Dev Summit - New York</h6>
                                <p class="meta-date-time">Bronx, NY</p>
                            </div>
                        </div>

                        <div class="card-bottom-section">
                            <h5>4 Members Going</h5>
                            <div class="img-group">
                                <img src="../src/assets/img/profile-19.jpeg" alt="avatar">
                                <img src="../src/assets/img/profile-6.jpeg" alt="avatar">
                                <img src="../src/assets/img/profile-8.jpeg" alt="avatar">
                                <img src="../src/assets/img/profile-3.jpeg" alt="avatar">
                            </div>
                            <a href="javascript:void(0);" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div> -->

                </div>

            </div>

        </div>

        <?= $this->endSection(); ?>