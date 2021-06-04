<?php

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

/*
// Route::get('/', function () {
    return view('welcome_page');
});
*/

Route::get('/', [App\Http\Controllers\PublicWelcomePageController::class, 'index']);
Route::get('/about_us', [App\Http\Controllers\AboutUsController::class, 'index']);
Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index']);
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);

// ADMINISTRATOR SIDE
Route::get('/appointment_list', [App\Http\Controllers\AdminAppointmentListController::class, 'index']);
Route::get('/client_testimonial', [App\Http\Controllers\AdminClientTestimonialController::class, 'index']);
Route::get('/branch', [App\Http\Controllers\AdminBranchController::class, 'index']);
Route::get('/services_list', [App\Http\Controllers\AdminServicesController::class, 'index']);
Route::get('/admin_blog', [App\Http\Controllers\AdminBlogController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');