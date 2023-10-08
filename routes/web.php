<?php

use App\Mail\AttendeeRegistrationDone;
use App\Models\Attendee;
use Illuminate\Support\Facades\Route;

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

Route::get('/registration', function () {
	return view('registration');
})->name('registration');

Route::get('/confirmation', function () {
	return view('confirmation');
})->name('confirmation');

Route::get('/mailable', function () {
	$attendee = Attendee::find(1);

	return new AttendeeRegistrationDone($attendee);
});
