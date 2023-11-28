<?= $this->extend('template/database-user'); ?>
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
                    <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
                    <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">
                        <li>
                            <a href="<?= base_url('/gambut'); ?>"> Gambut </a>
                        </li>
                        <li>
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
                <li class="menu ">
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
                <li class="menu active">
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
                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Gambut</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Perencanaan Kegiatan</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->
                <!-- tabel dokumen -->
                <div id="head-1" class="seperator-header layout-top-spacing">
                    <h4 class="">DATA DOKUMEN PERENCANAAN KEGIATAN</h4>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="tabel-1" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Dokumen</th>
                                            <th>Tipe Dokumen</th>
                                            <th>Judul Dokumen</th>
                                            <th>Tgl. Berlaku</th>
                                            <th>Tgl. Berakhir</th>
                                            <th>Pengesah</th>
                                            <th>File</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($doc as $var) : ?>
                                            <tr>
                                                <td scope="row"><?= $no++; ?></td>
                                                <td><?= $var['kode_rencana']; ?></td>
                                                <td><?= $var['tipe_rencana']; ?></td>
                                                <td><?= $var['judul']; ?></td>
                                                <td><?= $var['tgl_berlaku']; ?></td>
                                                <td><?= $var['tgl_berakhir']; ?></td>
                                                <td><?= $var['pengesah']; ?></td>
                                                <td style="white-space: pre-line;"><?= $var['nama_file']; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="<?= base_url('404'); ?>/<?= $var['id']; ?>" type="button" class="btn btn-success" title="Unduh Berkas">
                                                            <svg xmlns=" http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                                                                <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6"></path>
                                                                <path d="M17 18h2"></path>
                                                                <path d="M20 15h-3v6"></path>
                                                                <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="<?= base_url('gambut/rencana/sasaran/'); ?>/<?= $var['id']; ?>" type="button" class="btn btn-success" title="Data Sasaran Kegiatan">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-target-arrow" width="32" height="32" viewBox="0 0 25 25" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                                <path d="M12 7a5 5 0 1 0 5 5"></path>
                                                                <path d="M13 3.055a9 9 0 1 0 7.941 7.945"></path>
                                                                <path d="M15 6v3h3l3 -3h-3v-3z"></path>
                                                                <path d="M15 9l-3 3"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="<?= base_url('gambut/rencana/kegiatan/'); ?>/<?= $var['id']; ?>" type="button" class="btn btn-outline-success" title="Data Arahan Tindakan">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M7 7l5 5l-5 5"></path>
                                                                <path d="M13 7l5 5l-5 5"></path>
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
                <!-- tabel dokumen -->
            </div>

        </div>
        <?= $this->endSection(); ?>