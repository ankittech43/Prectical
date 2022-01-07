<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|php artisan make:migration create_Companies_table --create=Companies
|php artisan make:migration create_Employees_table --create=Employees
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employee',\App\Http\Controllers\EmployeeController::class)->name('*','employee');;
Route::resource('company',\App\Http\Controllers\CompanyController::class);

Route::get("empList",[\App\Http\Controllers\EmployeeController::class,'empList']);
Route::get("employeeEdit/{id}",[\App\Http\Controllers\EmployeeController::class,'employeeEdit']);
Route::get("empdelete/{id}",[\App\Http\Controllers\EmployeeController::class,'empdelete']);
Route::get("compList",[\App\Http\Controllers\CompanyController::class,'compList']);
Route::get("companyEdit/{id}",[\App\Http\Controllers\CompanyController::class,'companyEdit'])->name("companyEdit");
Route::get("compdelete/{id}",[\App\Http\Controllers\CompanyController::class,'compdelete']);


//Route::get('/employeeList',[\App\Http\Controllers\Controller::class,'employeeList']);
//class,'employeeList'
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
