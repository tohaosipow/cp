<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    $data = json_decode(file_get_contents('http://151.248.116.4:5000/get_message'))[0];
    var_dump($data);
    $as = new \App\Services\ApplicationService();
    $as->createApplication(\App\Category::where('name', $data->category)->first()->id, $data->text, $data->phone, $data->lat, $data->lon, $data->record_url, $data->id);
    echo json_encode(\App\Application::find(1));
});

Route::get('/makeapp', function ($request) {
    $data = (object) $request->all();
    $as = new \App\Services\ApplicationService();
    $as->createApplication(\App\Category::where('name', $data->category)->first()->id, $data->text, $data->phone, $data->lat, $data->lon, $data->record_url, $data->id);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/providers/create', "ProviderController@create");
Route::post('/providers/create', "ProviderController@createPost");
Route::get('/providers/{provider}/dashboard', "DashboardController@index")->name('dashboard');
Route::get('/providers/{provider}/settings/categories', "SettingsController@categories")->name('categories');
Route::get('/providers/{provider}/applications/my', "ApplicationController@my_index")->name('applications');
Route::get('/providers/{provider}/applications/all', "ApplicationController@index")->name('all-application');
Route::get('/providers/{provider}/application/{application}', "ApplicationController@item")->name('application');