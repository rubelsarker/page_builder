<?php

use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\PagesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/test', function () {
    return menu('Home-Navbar');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/pages', PagesController::class);
Route::get('user-pages/{slug}', [PagesController::class, 'pages'])->name('user-pages');
Route::get('design/page/{id}', [PagesController::class, 'design'])->name('pages.design');
Route::get('menu-builder', [MenuBuilderController::class, 'index'])->name('menu-builder.index');
Route::get('menu-builder/{id}', [MenuBuilderController::class, 'builder'])->name('menu-builder.builder');
Route::post('menu-item', [MenuBuilderController::class, 'store'])->name('menu-item.store');
Route::post('order/{id}', [MenuBuilderController::class, 'order'])->name('menu-item.order');
