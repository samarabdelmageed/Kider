<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TestimonialController;


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
    return view('welcome');
});

Route::fallback(Controller::class);

Route::get('home',[Controller::class,'home'])->name('home');

Route::get('about',[Controller::class,'about'])->name('about');

Route::get('appointment',[Controller::class,'appointment'])->name('appointment');

Route::get('classes',[Controller::class,'classes'])->name('classes');

Route::get('contact',[Controller::class,'contact'])->name('contact');

Route::get('facilities',[Controller::class,'facilities'])->name('facilities');

Route::get('team',[Controller::class,'team'])->name('team');

Route::get('testimonial',[Controller::class,'testimonial'])->name('testimonial');

Route::get('callToAction',[Controller::class,'callToAction'])->name('callToAction');

Route::post('sendContactUs',[Controller::class,'sendContactUs'])->name('sendContactUs');

Route::post('sendAppointment',[Controller::class,'sendAppointment'])->name('sendAppointment');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
