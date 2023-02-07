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

Route::get('/', [ObjektController::class, 'index'])->name('index');

Route::get('/banesat/{id}', [BanesaController::class, 'index'])->name('banesat');

Route::get('/create', [ObjektController::class, 'create'])->name('create')->middleware('auth','verified');

Route::post('store', [ObjektController::class, 'store'])->name('store')->middleware('auth','verified');

Route::get('createbanesa/{id}', [BanesaController::class, 'create'])->name('createbanesa')->middleware('auth','verified');

Route::post('storebanesa/{id}', [BanesaController::class, 'store'])->name('storebanesa')->middleware('auth','verified');

Route::get('edit/{id}',[BanesaController::class, 'edit'])->name('edit')->middleware('auth','verified');

Route::patch('update/{id}',[BanesaController::class, 'update'])->name('update')->middleware('auth','verified');

Route::get('editdescription/{id}',[BanesaController::class, 'editdescription'])->name('editdescription')->middleware('auth','verified');

Route::get('readdescription/{id}',[BanesaController::class, 'readdescription'])->name('readdescription')->middleware('auth','verified');

Route::patch('updatedescription/{id}',[BanesaController::class, 'updatedescription'])->name('updatedescription')->middleware('auth','verified');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth','verified');

Route::get('apartments/{id}', [AdminController::class, 'showapartments'])->name('apartments')->middleware('auth','verified');

Route::get('editbuilding/{id}', [AdminController::class, 'editbuilding'])->name('editbuilding')->middleware('auth','verified');

Auth::routes(['register' => false]);

Route::delete('destroy/{m2}/{objektid}', [AdminController::class, 'destroy'])->name('destroy')->middleware('auth','verified');

Route::delete('destroybuilding/{id}/{objektid}', [AdminController::class, 'destroybuilding'])->name('destroybuilding')->middleware('auth','verified');

Route::get('editapartment/{m2}/{objektid}',[AdminController::class, 'editapartment'])->name('editapartment')->middleware('auth','verified');

Route::patch('updateapartment/{m2}/{objektid}',[AdminController::class, 'updateapartment'])->name('updateapartment')->middleware('auth','verified');

?>
