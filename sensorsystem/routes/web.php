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

use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/admin/customers/addCustomer', function () {
    return view('admin.customers.addCustomer');
});

Route::get('/admin/corpManagers/addCorpManager', function () {
    return view('admin.corpManagers/addCorpManager');
});

Route::get('/admin/employees/addEmployee', function () {
    return view('admin.employees/addEmployee');
});

Route::get('/admin/sites/addSite', function () {
    return view('admin.sites.addSite');
});

Route::get('/admin/sensors/addSensor', function () {
    return view('admin.sensors.addSensor');
});

Route::get('/admin/sensors/installableSensors', function () {
    return view('admin.sensors.installableSensors');
});

Route::get('/admin/sensors/addBrand', function () {
    return view('admin.sensors.addBrand');
});

Route::get('/admin/sensors/addType', function () {
    return view('admin.sensors.addType');
});

Route::get('/admin/sensors/deleteBrandType', function () {
    return view('admin.sensors.deleteBrandType');
});

Route::get('/admin/sites', function () {
    return view('admin.sites');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/utenti', function () {
    return view('admin.utenti');
});

Route::get('/admin/sensors', function () {
    return view('admin.sensors');
});

Route::get('/admin/myProfile', function () {
    return view('admin.myProfile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customers', 'CustomerController');

Route::resource('corpManagers', 'CorpmanagerController');

Route::resource('employees', 'EmployeeController');

Route::resource('admins', 'AdminController');

Route::resource('myProfile', 'MyProfileController');

Route::resource('sites', 'SiteController');

Route::resource('sensors', 'SensorController');

Route::resource('brands', 'BrandController');

Route::resource('types', 'TypeController');

Route::get('dashboard', 'DashboardController@load');