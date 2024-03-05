<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\FoateerDetailsController;
use App\Models\Section;
use App\Models\Foateer;
use App\Http\Controllers\FoateerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers;
use App\Models\Foateer_details;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('sections', 'App\Http\Controllers\SectionController');

 Route::patch('section/update', [SectionController::class, 'update'])->name('section.update');


Route::resource('foateer','App\Http\Controllers\FoateerController');
Route::resource('products','App\Http\Controllers\ProductsController');
// Route::get('sections/{id}','FoateerController@getproducts');
Route::post('products/store',[ProductsController::class,'store'])->name('products.store');
Route::get('sections/{id}', [FoateerController::class, 'getproducts']);
Route::get('FoateerDetails/{id}','App\Http\Controllers\FoateerDetailsController@edit');
Route::get('edit_foateer/{id}','App\Http\Controllers\FoateerController@edit');

Route::put('foateers/update', [FoateerController::class, 'update'])->name('foateer.update');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    ;
});
//Route::get('/foateers', 'App\Http\Controllers\FoateerDetailsController@index');

require __DIR__.'/auth.php';
