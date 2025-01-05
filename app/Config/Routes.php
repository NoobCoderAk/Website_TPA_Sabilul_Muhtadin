<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// USER interface route
$routes->get("/", 'User\Home::index');
$routes->get('about', 'User\About::index');
$routes->get('fasilitas', 'User\Fasilitas::index');
$routes->get('prestasi', 'User\Prestasi::index');
$routes->get('galeri', 'User\Galeri::index');
$routes->get('kontak', 'User\Kontak::index');
$routes->get('jadwal', 'User\Jadwal::index');
$routes->get('pertanyaan', 'User\Pertanyaan::index');
$routes->get('artikel', 'User\Artikel::index');

// $routes->get('artikel/detail_artikel/(:num)', 'User\Artikel::get_detail_artikel/$1');
$routes->get('artikel/get_artikel/(:num)', 'User\Artikel::get_artikel/$1');
$routes->get('prestasi/get_prestasi/(:num)', 'User\Prestasi::get_prestasi/$1');


$routes->get('form', 'Admin\TestController::index');
$routes->post('form', 'Admin\TestController::index');


// =================== ADMIN ========================

// ADMIN interface route
$routes->get('login', 'Admin\Login::index');
$routes->post('login', 'Admin\Login::process');

$routes->get('registration', 'Admin\Registration::index');
$routes->post('registration', 'Admin\Registration::register');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->get('logout', 'Admin\Login::logout');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('edit-account', 'Admin\Account::edit');
    $routes->put('update-account/(:num)', 'Admin\Account::update/$1');


    // ADMIN FASILITAS
    $routes->get('fasilitas', 'Admin\FasilitasController::index');
    $routes->post('add/fasilitas', 'Admin\FasilitasController::storeFasilitas');
    $routes->put('edit/fasilitas/(:num)', 'Admin\FasilitasController::editFasilitas/$1');
    $routes->delete('delete/fasilitas/(:num)', 'Admin\FasilitasController::deleteFasilitas/$1');

    // ADMIN REVIEW
    $routes->get('review', 'Admin\ReviewController::index');
    $routes->post('add/review', 'Admin\ReviewController::storeReview');
    $routes->put('edit/review/(:num)', 'Admin\ReviewController::editReview/$1');
    $routes->delete('delete/review/(:num)', 'Admin\ReviewController::deleteReview/$1');

    // ADMIN JADWAL
    $routes->get('jadwal', 'Admin\JadwalController::index');


    $routes->post('add/jadwalIqro', 'Admin\JadwalController::storeJadwalIqro');
    $routes->put('edit/jadwalIqro/(:num)', 'Admin\JadwalController::editJadwalIqro/$1');
    $routes->delete('delete/jadwalIqro/(:num)', 'Admin\JadwalController::deleteJadwalIqro/$1');

    $routes->post('add/jadwalQuran', 'Admin\JadwalController::storeJadwalQuran');
    $routes->put('edit/jadwalQuran/(:num)', 'Admin\JadwalController::editJadwalQuran/$1');
    $routes->delete('delete/jadwalQuran/(:num)', 'Admin\JadwalController::deleteJadwalQuran/$1');

    $routes->post('add/mapelIqro', 'Admin\JadwalController::storeMapelIqro');
    $routes->put('edit/mapelIqro/(:num)', 'Admin\JadwalController::editMapelIqro/$1');
    $routes->delete('delete/mapelIqro/(:num)', 'Admin\JadwalController::deleteMapelIqro/$1');

    $routes->post('add/mapelQuran', 'Admin\JadwalController::storeMapelQuran');
    $routes->put('edit/mapelQuran/(:num)', 'Admin\JadwalController::editMapelQuran/$1');
    $routes->delete('delete/mapelQuran/(:num)', 'Admin\JadwalController::deleteMapelQuran/$1');

    // ADMIN ARTIKEL
    $routes->get('artikel', 'Admin\ArtikelController::index');
    $routes->post('add/artikel', 'Admin\ArtikelController::storeArtikel');
    $routes->put('edit/artikel/(:num)', 'Admin\ArtikelController::editArtikel/$1');
    $routes->delete('delete/artikel/(:num)', 'Admin\ArtikelController::deleteArtikel/$1');

    // ADMIN PRESTASI
    $routes->get('prestasi', 'Admin\PrestasiController::index');
    $routes->post('add/prestasi', 'Admin\PrestasiController::storePrestasi');
    $routes->put('edit/prestasi/(:num)', 'Admin\PrestasiController::editPrestasi/$1');
    $routes->delete('delete/prestasi/(:num)', 'Admin\PrestasiController::deletePrestasi/$1');

    // ADMIN PERTANYAAN
    $routes->get('pertanyaan', 'Admin\PertanyaanController::index');
    $routes->post('add/pertanyaan', 'Admin\PertanyaanController::storePertanyaan');
    $routes->put('edit/pertanyaan/(:num)', 'Admin\PertanyaanController::editPertanyaan/$1');
    $routes->delete('delete/pertanyaan/(:num)', 'Admin\PertanyaanController::deletePertanyaan/$1');

    // ADMIN PENGAJAR
    $routes->get('pengajar', 'Admin\PengajarController::index');
    $routes->post('add/pengajar', 'Admin\PengajarController::storePengajar');
    $routes->put('edit/pengajar/(:num)', 'Admin\PengajarController::editPengajar/$1');
    $routes->delete('delete/pengajar/(:num)', 'Admin\PengajarController::deletePengajar/$1');

    // ADMIN KONTAK
    $routes->get('kontak', 'Admin\KontakController::index');
    $routes->post('update/kontak', 'Admin\KontakController::update');
    // Other admin routes
});
