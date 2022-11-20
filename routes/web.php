<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;

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
    return view('frontend.index');
});

// 具体例
// Route::controller(DemoController::class)->group(function () {
//     Route::get('/about', 'Index')->name('about.page')->middleware('check');
//     Route::get('/about', 'Index')->name('about.page')->middleware('check');
// });

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

Route::get('/dashboard', function () {
    return view('admin. index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


 // Home Slide All Route 
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

 // About Page All Route 
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about2', 'HomeAbout')->name('home.about');
});
