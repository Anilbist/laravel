<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\category;
use App\http\controllers\productController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/cat', function ()
//  {return view('category');
// });

Route::get("/cat",[category::class,'index'])
	->middleware('auth');
Route::get("/cat/create",[category::class,'create'])->name('create')
	->middleware('auth');
Route::post("/cat/create",[category::class,'store'])->name('create')
	->middleware('auth');
Route::get("/cat/edit/{id}",[category::class,'edit'])->name('edit')
	->middleware('auth');
Route::post("/cat/edit/{id}",[category::class,'update'])->name('update')
	->middleware('auth');
Route::get("/cat/delete/{id}",[category::class,'delete'])
	->middleware('auth');
Route::get("/cat/details/{id}",[category::class,'detail'])
	->middleware('auth');


Route::get("/prod",[productController::class,'index'])
	->middleware('auth');
Route::get("/prod/add",[productController::class,'add'])->name('add')
	->middleware('auth');
Route::post("/prod/add",[productController::class,'store'])->name('add')
	->middleware('auth');
Route::get("/prod/edit/{id}",[productController::class,'edit'])->name('edit')
	->middleware('auth');
Route::post("/prod/edit/{id}",[productController::class,'update'])->name('update')
	->middleware('auth');
Route::get("/prod/delete/{id}",[productController::class,'delete'])
	->middleware('auth');