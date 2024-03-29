<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{
    UserController,
    RoleController,
    ChauffeurController,

};
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



require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {return view('dashboard.index');});

    Route::get('/home', function () {return view('dashboard.index');})->name('home');

    Route::resource('users',UserController::class);

    Route::resource('roles',RoleController::class);

    Route::resource('chauffeurs',ChauffeurController::class);

});
