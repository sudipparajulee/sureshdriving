<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\FrontendController;
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

Route::get('/', [FrontendController::class,'home'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    

    //Notices
    Route::resource('notices',NoticeController::class);
    Route::post('/notice/delete',[NoticeController::class,'delete'])->name('notices.delete');

    //Testimonials
    Route::resource('testimonials',TestimonialController::class);
    Route::post('/testimonials/delete',[TestimonialController::class,'delete'])->name('testimonials.delete');
});

require __DIR__.'/auth.php';