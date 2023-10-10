<?php

use App\Mail\AttendeeCertificatesMail;
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

Route::get('/confirmation/{token}', function ($token) {
	return view('confirmation', [
		'token' => $token
	]);
})->name('confirmation');

Route::get('/mailable', function () {
	$attendee = Attendee::find(1);
	return new AttendeeRegistrationDone($attendee);
});

Route::get('/certificate_mailable/{token}', function($token) {
	return new AttendeeCertificatesMail($token);
});

Route::get('/workshop_certificate/{token}', function($token){
	return 'taller';
})->name('certificate.workshop');

Route::get('/event_certificate/{token}', function($token){
	return 'evento';
})->name('certificate.event');


