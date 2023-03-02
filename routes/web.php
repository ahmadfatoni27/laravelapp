<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CompanyCRUDController;
// use App\Http\Controllers\ContactCRUDController;
// use App\Http\Controllers\ToniCRUDController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionsController;





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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function() {
// 	return View::make('sigin.index');
// });
Route::get('/sigin', function() {
	return View::make('sigin.index');
});
Route::get('/sigup', function() {
	return View::make('sigup.index');
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'actionlogin']);
Route::post('resgist', [LoginController::class, 'actionregist']);


Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');





Route::get('/admin', function() {
	return View::make('dashboard.index');
});




// users
Route::resource('users', UsersController::class);
Route::resource('users/show', UsersController::class);
Route::resource('users/show/edit', UsersController::class);
Route::resource('users/update', UsersController::class);
Route::resource('users/save', UsersController::class);
Route::resource('users/create_data', UsersController::class);


// products
Route::resource('product', ProductController::class);
Route::resource('product/show', ProductController::class);
Route::resource('product/show/edit', ProductController::class);
Route::resource('product/update', ProductController::class);
Route::resource('product/save', ProductController::class);
Route::resource('product/create_data', ProductController::class);


// transactions
Route::resource('transaction', TransactionsController::class);
Route::resource('transaction/show', TransactionsController::class);
Route::resource('transaction/show/edit', TransactionsController::class);
Route::resource('transaction/update', TransactionsController::class);
Route::resource('transaction/save', TransactionsController::class);
Route::resource('transaction/create_data', TransactionsController::class);
