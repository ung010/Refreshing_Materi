<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuKategori;
use App\Http\Controllers\FullController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register/create', [LoginController::class, 'create'])->name('register.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/home', [AdminController::class, 'index'])->name('home.index');;
    Route::get('/home/admin', [AdminController::class, 'admin'])->middleware('UserAkses:admin')->name('admin.index');;
    Route::get('/home/users', [AdminController::class, 'users'])->middleware('UserAkses:users')->name('users.index');;
    Route::get('/home/manager', [AdminController::class, 'manager'])->middleware('UserAkses:manager')->name('manager.index');;
});

// Route::get('/home', function() {
//     return redirect('/home');
// });


route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
route::post('/buku/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');

route::get('/kategori', [BukuKategori::class, 'index'])->name('bukukategori.index');
route::get('/kategori/create', [BukuKategori::class, 'create'])->name('bukukategori.create');
route::post('/kategori/store', [BukuKategori::class, 'store'])->name('bukukategori.store');
route::get('/kategori/edit/{id}', [BukuKategori::class, 'edit'])->name('bukukategori.edit');
route::post('/kategori/update/{id}', [BukuKategori::class, 'update'])->name('bukukategori.update');
route::post('/kategori/delete/{id}', [BukuKategori::class, 'delete'])->name('bukukategori.delete');

route::get('/full', [FullController::class, 'index'])->name('full.index');
route::get('/full/create', [FullController::class, 'create'])->name('full.create');
route::post('/full/store', [FullController::class, 'store'])->name('full.store');
route::get('/full/edit/{id}', [FullController::class, 'edit'])->name('full.edit');
route::post('/full/update/{id}', [FullController::class, 'update'])->name('full.update');
route::post('/full/delete/{id}', [FullController::class, 'delete'])->name('full.delete');