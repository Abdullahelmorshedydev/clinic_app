<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Back\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Back\MajorController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Back\DoctorController;
use App\Http\Controllers\Back\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Back\Doctor\HomeController as DoctorHomeController;
use App\Http\Controllers\Back\Patient\BookingController as PatientBookingController;
use App\Http\Controllers\Back\Patient\HomeController as PatientHomeController;
use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\DoctorController as FrontDoctorController;
use App\Http\Controllers\Front\MajorController as FrontMajorController;

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
    return redirect()->route('front.home');
});

Route::group(['prefix' => '/back', 'middleware' => 'auth', 'as' => 'back.'], function () {

    Route::group(['prefix' => '/admin', 'middleware' => 'check.admin.role', 'as' => 'admin.'], function () {

        Route::get('/home', HomeController::class)->name('home');

        Route::resource('majors', MajorController::class);

        Route::resource('doctors', DoctorController::class);

        Route::resource('contacts', ContactController::class);
    });

    Route::group(['prefix' => '/doctor', 'middleware' => 'check.doctor.role', 'as' => 'doctor.'], function () {

        Route::get('/home', DoctorHomeController::class)->name('home');

        Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {

            Route::get('/', [BookingController::class, 'bookings'])->name('show');

            Route::post('/accept/{id}', [BookingController::class, 'acceptBooking'])->name('acceptBooking');
            Route::post('/complete/{id}', [BookingController::class, 'completeBooking'])->name('completeBooking');
            Route::post('/cancel/{id}', [BookingController::class, 'cancelBooking'])->name('cancelBooking');
            Route::post('/destroy/{id}', [BookingController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => '/patient', 'middleware' => 'check.patient.role', 'as' => 'patient.'], function () {

        Route::get('/home', PatientHomeController::class)->name('home');

        Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {

            Route::get('/', [PatientBookingController::class, 'bookings'])->name('show');

            Route::post('/cancel/{id}', [PatientBookingController::class, 'cancelBooking'])->name('cancelBooking');
            Route::post('/destroy/{id}', [PatientBookingController::class, 'destroy'])->name('destroy');
        });
    });

    Route::get('/logout', LogoutController::class)->name('logout');
});

Route::group(['prefix' => '/auth', 'middleware' => 'guest', 'as' => 'auth.'], function () {

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::group(['prefix' => '/clinic', 'as' => 'front.'], function () {

    Route::get('/', FrontHomeController::class)->name('home');

    Route::get('/majros', FrontMajorController::class)->name('majors');

    Route::get('/major/doctors/{id}', [FrontDoctorController::class, 'showDoctors'])->name('show.doctors');
    Route::get('/doctor/{id}', [FrontDoctorController::class, 'showDoctor'])->name('show.doctor');
    Route::get('/doctors', [FrontDoctorController::class, 'showAll'])->name('show.all');

    Route::get('/contact', [FrontContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [FrontContactController::class, 'store'])->name('contact.store');

    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth');
});
