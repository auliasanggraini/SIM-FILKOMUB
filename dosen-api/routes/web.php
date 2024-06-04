<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    // Routes for Dosen
    $router->get('dosen', 'DosenController@getListDataDosen');
    $router->post('dosen', 'DosenController@createDataDosen');
    $router->get('dosen/{id}', 'DosenController@getDetailDataDosen');
    $router->put('dosen/update/{id}', 'DosenController@updateDataDosen');
    $router->delete('dosen/{id}', 'DosenController@deleteDataDosen');

    // Routes for Mata Kuliah
    $router->get('mata-kuliah', 'MataKuliahController@getListMataKuliah');
    $router->post('mata-kuliah', 'MataKuliahController@createMataKuliah');
    $router->get('mata-kuliah/{id}', 'MataKuliahController@getDetailMataKuliah');
    $router->put('mata-kuliah/update/{id}', 'MataKuliahController@updateMataKuliah');
    $router->delete('mata-kuliah/{id}', 'MataKuliahController@deleteMataKuliah');
    $router->get('mata-kuliah/{mataKuliahId}/dosen', 'MataKuliahController@getDosenWithSameMataKuliah');
    $router->get('dosen/{dosenId}/jadwal', 'MataKuliahController@getJadwalMataKuliahDosen');
});
