<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//all-access
/////////////////////////////////////////////////////////////////////////////////////
$routes->get('/', 'Home::index');
$routes->get('/gambut', 'Home::gambutdashboard');
$routes->get('/mangrove', 'Home::mangrovedashboard');
$routes->get('/peta-interaktif', 'Peta::index');

//user-gambut
// $routes->get('/gambut/administrasi', 'UserGambutAdministrasi::index');
// $routes->get('/gambut/kelembagaan', 'UserGambutKelembagaan::index');
// $routes->get('/gambut/kawasan', 'UserGambutKawasan::index');
// $routes->get('/gambut/dokumen', 'UserGambutDokumen::index');
// $routes->get('/gambut/tindakan', 'UserGambutTindakan::index');
// $routes->get('/gambut/perencanaan', 'UserGambutAlokasi::index');

$routes->get('/gambut/administrasi', 'UserGambutAdministrasi::index');
$routes->get('/gambut/administrasi/prov/(:num)', 'UserGambutProv::index/$1');
$routes->get('/gambut/administrasi/pelaksana/(:num)', 'UserGambutPelaksana::index/$1');
$routes->get('/gambut/administrasi/kabkot/(:num)', 'UserGambutKabkot::index/$1');
$routes->get('/gambut/administrasi/kec/(:num)', 'UserGambutKec::index/$1');
$routes->get('/gambut/administrasi/lemdes/(:num)', 'UserGambutLemdes::index/$1');

$routes->get('/gambut/kelembagaan', 'UserGambutKelembagaan::index');

$routes->get('/gambut/kawasan', 'UserGambutKawasan::index');
$routes->get('/gambut/kawasan/khg/(:num)', 'UserGambutKhg::index/$1');
$routes->get('/gambut/kawasan/subkhg/(:num)', 'UserGambutSubKhg::index/$1');

$routes->get('/gambut/tindakan', 'UserGambutTindakan::index');
$routes->get('/gambut/tindakan/cvvccvcv csubtindakan/(:num)', 'UserGambutSubTindakan::index/$1');

$routes->get('/gambut/rencana', 'UserGambutRencana::index');
$routes->get('/gambut/rencana/sasaran/(:num)', 'UserGambutSasaran::index/$1');
$routes->get('/gambut/rencana/sasaran-intervensi/(:num)', 'UserGambutSasaranInv::index/$1');
$routes->get('/gambut/rencana/sasaran-claim/(:num)', 'UserGambutSasaranClaim::index/$1');
$routes->get('/gambut/rencana/kegiatan/(:num)', 'UserGambutKegiatan::index/$1');
$routes->get('/gambut/rencana/alokasi/(:num)', 'UserGambutAlokasi::index/$1');

//all-admin
$routes->get('/admin-dashboard', 'AdminHome::index', ['filter' => 'role:developer,web-master,super-admin, gambut-admin,mangrove-admin']);

// admin gambut-administrasi
$routes->get('/admin/gambut/administrasi', 'AdmGambutAdministrasi::index', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/administrasi/upload', 'AdmGambutAdministrasi::upload', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/simpan_prov', 'AdmGambutAdministrasi::simpan_prov', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/edit_prov/(:num)', 'AdmGambutAdministrasi::edit_prov/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/hapus_prov/(:num)', 'AdmGambutAdministrasi::hapus_prov/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/administrasi/prov/(:num)', 'AdmGambutProv::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/administrasi/prov/(:num)/upload', 'AdmGambutProv::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/prov/(:num)/simpan_kabkot', 'AdmGambutProv::simpan_kabkot/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/prov/(:num)/edit_kabkot/(:num)', 'AdmGambutProv::edit_kabkot/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/prov/(:num)/hapus_kabkot/(:num)', 'AdmGambutProv::hapus_kabkot/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/administrasi/pelaksana/(:num)', 'AdmGambutPelaksana::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/administrasi/pelaksana/(:num)/upload', 'AdmGambutPelaksana::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/pelaksana/(:num)/simpan_pelaksana', 'AdmGambutPelaksana::simpan_pelaksana/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/pelaksana/(:num)/edit_pelaksana/(:num)', 'AdmGambutPelaksana::edit_pelaksana/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/pelaksana/(:num)/hapus_pelaksana/(:num)', 'AdmGambutPelaksana::hapus_pelaksana/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/administrasi/kabkot/(:num)', 'AdmGambutKabkot::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/administrasi/kabkot/(:num)/upload', 'AdmGambutKabkot::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/kabkot/(:num)/simpan_kec', 'AdmGambutKabkot::simpan_kec/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/kabkot/(:num)/edit_kec/(:num)', 'AdmGambutKabkot::edit_kec/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/kabkot/(:num)/hapus_kec/(:num)', 'AdmGambutKabkot::hapus_kec/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/administrasi/kec/(:num)', 'AdmGambutKec::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/administrasi/kec/(:num)/upload', 'AdmGambutKec::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/kec/(:num)/simpan_desa', 'AdmGambutKec::simpan_desa/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/kec/(:num)/edit_desa/(:num)', 'AdmGambutKec::edit_desa/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/kec/(:num)/hapus_desa/(:num)', 'AdmGambutKec::hapus_desa/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/administrasi/lemdes/(:num)', 'AdmGambutLemdes::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/administrasi/lemdes/(:num)/upload', 'AdmGambutLemdes::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/lemdes/(:num)/simpan_lemdes', 'AdmGambutLemdes::simpan_lemdes/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/lemdes/(:num)/edit_lemdes/(:num)', 'AdmGambutLemdes::edit_lemdes/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/administrasi/lemdes/(:num)/hapus_lemdes/(:num)', 'AdmGambutLemdes::hapus_lemdes/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

// admin gambut-kelembagaan
// $routes->get('/admin/gambut/kelembagaan', 'AdmGambutKelembagaan::index', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/upload_lemdes', 'AdmGambutKelembagaan::upload_lemdes', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/simpan_lemdes', 'AdmGambutKelembagaan::simpan_lemdes', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/edit_lemdes/(:num)', 'AdmGambutKelembagaan::edit_lemdes/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/hapus_lemdes/(:num)', 'AdmGambutKelembagaan::hapus_lemdes/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/upload_pelaksana', 'AdmGambutKelembagaan::upload_pelaksana', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/simpan_pelaksana', 'AdmGambutKelembagaan::simpan_pelaksana', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/edit_pelaksana/(:num)', 'AdmGambutKelembagaan::edit_pelaksana/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kelembagaan/hapus_pelaksana/(:num)', 'AdmGambutKelembagaan::hapus_pelaksana/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

// admin gambut-kawasan
$routes->get('/admin/gambut/kawasan', 'AdmGambutKawasan::index', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kawasan/upload', 'AdmGambutKawasan::upload', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/simpan_khg', 'AdmGambutKawasan::simpan_khg', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/edit_khg/(:num)', 'AdmGambutKawasan::edit_khg/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/hapus_khg/(:num)', 'AdmGambutKawasan::hapus_khg/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/kawasan/khg/(:num)', 'AdmGambutKhg::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kawasan/khg/(:num)/upload', 'AdmGambutKhg::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/khg/(:num)/simpan_subkhg', 'AdmGambutKhg::simpan_subkhg/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/khg/(:num)/edit_subkhg/(:num)', 'AdmGambutKhg::edit_subkhg/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/khg/(:num)/hapus_subkhg/(:num)', 'AdmGambutKhg::hapus_subkhg/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/kawasan/subkhg/(:num)', 'AdmGambutSubKhg::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/kawasan/subkhg/(:num)/upload', 'AdmGambutSubKhg::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/subkhg/(:num)/simpan_hru', 'AdmGambutSubKhg::simpan_hru/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/subkhg/(:num)/edit_hru/(:num)', 'AdmGambutSubKhg::edit_hru/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/kawasan/subkhg/(:num)/hapus_hru/(:num)', 'AdmGambutSubKhg::hapus_hru/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

// admin gambut-arahantindakan
$routes->get('/admin/gambut/tindakan', 'AdmGambutTindakan::index', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/tindakan/upload', 'AdmGambutTindakan::upload', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/tindakan/simpan_tindakan', 'AdmGambutTindakan::simpan_tindakan', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/tindakan/edit_tindakan/(:num)', 'AdmGambutTindakan::edit_tindakan/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/tindakan/hapus_tindakan/(:num)', 'AdmGambutTindakan::hapus_tindakan/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/tindakan/subtindakan/(:num)', 'AdmGambutSubTindakan::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/tindakan/subtindakan/(:num)/upload', 'AdmGambutSubTindakan::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/tindakan/subtindakan/(:num)/simpan_subtindakan', 'AdmGambutSubTindakan::simpan_subtindakan/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/tindakan/subtindakan/(:num)/edit_subtindakan/(:num)', 'AdmGambutSubTindakan::edit_subtindakan/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/tindakan/subtindakan/(:num)/hapus_subtindakan/(:num)', 'AdmGambutSubTindakan::hapus_subtindakan/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

// admin gambut-rencana
$routes->get('/admin/gambut/rencana', 'AdmGambutRencana::index', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/rencana/upload', 'AdmGambutRencana::upload', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/simpan_rencana', 'AdmGambutRencana::simpan_rencana', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/edit_rencana/(:num)', 'AdmGambutRencana::edit_rencana/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/hapus_rencana/(:num)', 'AdmGambutRencana::hapus_rencana/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/rencana/kegiatan/(:num)', 'AdmGambutKegiatan::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/rencana/kegiatan/(:num)/upload', 'AdmGambutKegiatan::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/kegiatan/(:num)/simpan_kegiatan', 'AdmGambutKegiatan::simpan_kegiatan/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/kegiatan/(:num)/edit_kegiatan/(:num)', 'AdmGambutKegiatan::edit_kegiatan/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/kegiatan/(:num)/hapus_kegiatan/(:num)', 'AdmGambutKegiatan::hapus_kegiatan/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/rencana/alokasi/(:num)', 'AdmGambutAlokasi::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/rencana/alokasi/(:num)/upload', 'AdmGambutAlokasi::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/alokasi/(:num)/simpan_alokasi', 'AdmGambutAlokasi::simpan_alokasi/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/alokasi/(:num)/edit_alokasi/(:num)', 'AdmGambutAlokasi::edit_alokasi/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/alokasi/(:num)/hapus_alokasi/(:num)', 'AdmGambutAlokasi::hapus_alokasi/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

// admin gambut-sasaran
$routes->get('/admin/gambut/rencana/sasaran/(:num)', 'AdmGambutSasaran::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/rencana/sasaran/(:num)/upload', 'AdmGambutSasaran::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran/(:num)/simpan_sasaran', 'AdmGambutSasaran::simpan_sasaran/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran/(:num)/edit_sasaran/(:num)', 'AdmGambutSasaran::edit_sasaran/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran/(:num)/hapus_sasaran/(:num)', 'AdmGambutSasaran::hapus_sasaran/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/rencana/sasaran-intervensi/(:num)', 'AdmGambutSasaranInv::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/rencana/sasaran-intervensi/(:num)/upload', 'AdmGambutSasaranInv::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran-intervensi/(:num)/simpan_sasaran_inv', 'AdmGambutSasaranInv::simpan_sasaran_inv/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran-intervensi/(:num)/edit_sasaran_inv/(:num)', 'AdmGambutSasaranInv::edit_sasaran_inv/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran-intervensi/(:num)/hapus_sasaran_inv/(:num)', 'AdmGambutSasaranInv::hapus_sasaran_inv/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

$routes->get('/admin/gambut/rencana/sasaran-claim/(:num)', 'AdmGambutSasaranClaim::index/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
// $routes->post('/admin/gambut/rencana/sasaran-claim/(:num)/upload', 'AdmGambutSasaranClaim::upload/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran-claim/(:num)/simpan_sasaran_claim', 'AdmGambutSasaranClaim::simpan_sasaran_claim/$1', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran-claim/(:num)/edit_sasaran_claim/(:num)', 'AdmGambutSasaranClaim::edit_sasaran_claim/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);
$routes->post('/admin/gambut/rencana/sasaran-claim/(:num)/hapus_sasaran_claim/(:num)', 'AdmGambutSasaranClaim::hapus_sasaran_claim/$1/$2', ['filter' => 'role:developer,web-master,super-admin,gambut-admin']);

// web-master
$routes->get('/admin/pengguna', 'Pengguna::index', ['filter' => 'role:developer,web-master']);
$routes->post('/admin/pengguna/simpan_pengguna', 'Pengguna::simpan_pengguna', ['filter' => 'role:developer,web-master']);
$routes->post('/admin/pengguna/edit_pengguna/(:num)', 'Pengguna::edit_pengguna/$1', ['filter' => 'role:developer,web-master']);
$routes->post('/admin/pengguna/hapus_pengguna/(:num)', 'Pengguna::hapus_pengguna/$1', ['filter' => 'role:developer,web-master']);
$routes->post('/admin/peran/edit_akses/(:num)', 'Peran::edit_akses/$1', ['filter' => 'role:developer,web-master']);
$routes->get('/admin/peran', 'Peran::index', ['filter' => 'role:developer,web-master']);

// APIs
// dashboard data
$routes->get('/gambut/data-dashboard', 'DataGrafik::grafikgambut');
$routes->get('/gambut/data-dashboard2', 'DataGrafik::grafikmangrove');
// maps data
$routes->get('/gambut/data-map', 'DataMaps::mapsdata');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
