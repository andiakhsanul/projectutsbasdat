<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SatuansController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BarangsController;
use App\Http\Controllers\VendorsController;


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
//     return view('index.login');
// });

Route::get('/', [LoginController::class, 'index'])->name('index');


Route::get('/home',[HomeController::class,'index'])->name('homeadmin');

//route role
Route::get('roles',[RolesController::class,'index'])->name('indexroles');
Route::get('roles/add',[RolesController::class,'create'])->name('createroles');
Route::put('roles/restoreall',[RolesController::class,'restore'])->name('restoreallroles');
Route::post('roles/simpan',[RolesController::class,'store'])->name('storeroles');
Route::get('roles/edit/{role}',[RolesController::class,'edit']);
Route::patch('roles/{role}', [RolesController::class,'update']);
Route::put('roles/delete/{role}',[RolesController::class,'softdelete'])->name('softdeleteroles');

//route user
Route::get('users',[UsersController::class,'index'])->name('indexusers');
Route::get('users/add',[UsersController::class,'create'])->name('createusers');
Route::put('users/restoreall',[UsersController::class,'restore'])->name('restoreallusers');
Route::put('users/delete/{user}',[UsersController::class,'softdelete'])->name('softdeleteusers');
Route::post('users/simpan',[UsersController::class,'store'])->name('storeusers');
Route::get('users/edit/{user}',[UsersController::class,'edit']);
Route::patch('users/{user}', [UsersController::class,'update']);

//route satuan

Route::get('satuans',[SatuansController::class,'index'])->name('indexsatuans');
Route::get('satuans/add',[SatuansController::class,'create'])->name('createsatuans');
Route::put('satuans/restoreall',[SatuansController::class,'restore'])->name('restoreallsatuans');
Route::post('satuans/simpan',[SatuansController::class,'store'])->name('storesatuans');
Route::get('satuans/edit/{satuan}',[SatuansController::class,'edit']);
Route::patch('satuans/{satuan}', [SatuansController::class,'update']);
Route::put('satuans/delete/{satuan}',[SatuansController::class,'softdelete'])->name('softdeletesatuans');

//route barang
Route::get('barangs',[BarangsController::class,'index'])->name('indexbarangs');
Route::get('barangs/add',[BarangsController::class,'create'])->name('createbarangs');
Route::put('barangs/restoreall',[BarangsController::class,'restore'])->name('restoreallbarangs');
Route::post('barangs/simpan',[BarangsController::class,'store'])->name('storebarangs');
Route::get('barangs/edit/{barang}',[BarangsController::class,'edit']);
Route::patch('barangs/{barang}', [BarangsController::class,'update']);
Route::put('barangs/delete/{barang}',[BarangsController::class,'softdelete'])->name('softdeletebarangs');

//route vendor
Route::get('vendors',[VendorsController::class,'index'])->name('indexvendors');
Route::get('vendors/add',[VendorsController::class,'create'])->name('createvendors');
Route::put('vendors/restoreall',[VendorsController::class,'restore'])->name('restoreallvendors');
Route::post('vendors/simpan',[VendorsController::class,'store'])->name('storevendors');
Route::get('vendors/edit/{vendor}',[VendorsController::class,'edit']);
Route::patch('vendors/{vendor}', [VendorsController::class,'update']);
Route::put('vendors/delete/{vendor}',[VendorsController::class,'softdelete'])->name('softdeletevendors');









