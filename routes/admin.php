<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

Auth::routes(['verify'=>true]);
Route::prefix('admin')->middleware('verified')->group(function () {
    
    //dashboard
    Route::get('dashboard',[Controller::class,'dashboard'])->name('dashboard');

    //testimonials
    Route::get('insertTestimonial',[TestimonialController::class,'insertTestimonial'])->name('insertTestimonial');
    Route::get('createTestimonial',[TestimonialController::class,'create'])->name('createTestimonial');
    Route::post('storeTestimonial',[TestimonialController::class,'store'])->name('storeTestimonial');
    Route::get('testimonials',[TestimonialController::class,'index'])->name('testimonials');
    Route::get('updateTestimonial/{id}',[TestimonialController::class,'edit'])->name('updateTestimonial');
    Route::put('updateTesti/{id}',[TestimonialController::class,'update'])->name('updateTesti');
    Route::get('showTestimonial/{id}',[TestimonialController::class,'show'])->name('showTestimonial');
    Route::get('deleteTestimonial/{id}',[TestimonialController::class,'destroy'])->name('deleteTestimonial');
    Route::get('trashedTestimonials',[TestimonialController::class,'trashed'])->name('trashedTestimonials');
    Route::get('forceDeleteTestimonial/{id}',[TestimonialController::class,'forceDelete'])->name('forceDeleteTestimonial');
    Route::get('restoreTestimonial/{id}',[TestimonialController::class,'restore'])->name('restoreTestimonial');
    
    //Teachers
    Route::get('insertTeacher',[TeacherController::class,'insertTeacher'])->name('insertTeacher');
    Route::get('createTeacher',[TeacherController::class,'create'])->name('createTeacher');
    Route::post('storeTeacher',[TeacherController::class,'store'])->name('storeTeacher');
    Route::get('teachers',[TeacherController::class,'index'])->name('teachers');
    Route::get('updateTeacher/{id}',[TeacherController::class,'edit'])->name('updateTeacher');
    Route::put('updateTeach/{id}',[TeacherController::class,'update'])->name('updateTeach');
    Route::get('showTeacher/{id}',[TeacherController::class,'show'])->name('showTeacher');
    Route::get('deleteTeacher/{id}',[TeacherController::class,'destroy'])->name('deleteTeacher');
    Route::get('trashedTeachers',[TeacherController::class,'trashed'])->name('trashedTeachers');
    Route::get('forceDeleteTeacher/{id}',[TeacherController::class,'forceDelete'])->name('forceDeleteTeacher');
    Route::get('restoreTeacher/{id}',[TeacherController::class,'restore'])->name('restoreTeacher');

    //Classes
    Route::get('insertClass',[SubjectController::class,'insertClass'])->name('insertClass');
    Route::get('createClass',[SubjectController::class,'create'])->name('createClass');
    Route::post('storeClass',[SubjectController::class,'store'])->name('storeClass');
    Route::get('classesList',[SubjectController::class,'index'])->name('classesList');
    Route::get('updateClass/{id}',[SubjectController::class,'edit'])->name('updateClass');
    Route::put('updateCla/{id}',[SubjectController::class,'update'])->name('updateCla');
    Route::get('showClass/{id}',[SubjectController::class,'show'])->name('showClass');
    Route::get('deleteClass/{id}',[SubjectController::class,'destroy'])->name('deleteClass');
    Route::get('trashedClasses',[SubjectController::class,'trashed'])->name('trashedClasses');
    Route::get('forceDeleteClass/{id}',[SubjectController::class,'forceDelete'])->name('forceDeleteClass');
    Route::get('restoreClass/{id}',[SubjectController::class,'restore'])->name('restoreClass');

    //appointments
    Route::get('appointments',[AppointmentController::class,'index'])->name('appointments');

    //contacts
    Route::get('contacts',[ContactController::class,'index'])->name('contacts');
    Route::get('deleteContact/{id}',[ContactController::class,'destroy'])->name('deleteContact');
    Route::get('markAsRead/{id}',[Controller::class,'markAsRead'])->name('markAsRead');
    Route::get('unreadContacts',[ContactController::class,'unread'])->name('unreadContacts');


    // Route::post('insertest', function () {
    //     // Matches The "/admin/users" URL
    // })->name('insertest');
});