<?php

use Illuminate\Support\Facades\Route;
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

// Breezeの導入によって更地になったweb.phpを確認...悲しい！(´Д｀)
// 今後はauth.phpを参考にすればよさそう...
Route::get('/', function () {
    return view('welcome');
});

// 具体例
// Route::controller(DemoController::class)->group(function () {
//     Route::get('/about', 'Index')->name('about.page')->middleware('check');
//     Route::get('/about', 'Index')->name('about.page')->middleware('check');
// });

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
});

Route::get('/dashboard', function () {
    return view('admin. index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
