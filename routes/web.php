<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjektController;
use App\Http\Controllers\BanesaController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [ObjektController::class, 'index'])->name('index');;

Route::get('/banesat/{id}', [BanesaController::class, 'index'])->name('banesat');

Route::get('/create', [ObjektController::class, 'create'])->name('create');

Route::post('store', [ObjektController::class, 'store'])->name('store');

Route::get('createbanesa/{id}', [BanesaController::class, 'create'])->name('createbanesa');

Route::post('storebanesa/{id}', [BanesaController::class, 'store'])->name('storebanesa');

Route::get('edit/{id}',[BanesaController::class, 'edit'])->name('edit');

Route::patch('update/{id}',[BanesaController::class, 'update'])->name('update');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('apartments/{id}', [AdminController::class, 'showapartments'])->name('apartments');

Route::get('editbuilding/{id}', [AdminController::class, 'editbuilding'])->name('editbuilding');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('destroy/{m2}/{objektid}', [AdminController::class, 'destroy'])->name('destroy');
?>
