<?php

use App\Http\Controllers\CertificateController;
use App\Mail\AttendeeCertificatesMail;
use App\Mail\AttendeeRegistrationDone;
use App\Models\Attendee;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
})
	->name('home');

Route::get('/registration', function () {
	return view('registration');
})->name('registration');

Route::get('/confirmation/{token}', function ($token) {
	return view('confirmation', [
		'token' => $token
	]);
})
	->name('confirmation');

Route::get('/workshop_certificate/{token}', [CertificateController::class, 'workshop'])
	->name('certificate.workshop');

Route::get('/event_certificate/{token}', [CertificateController::class, 'general'])
	->name('certificate.event');

Route::get('/confirmation_mailable/{id}', function ($id) {
	$attendee = Attendee::find($id);
	$qrcode = base64_encode(QrCode::format('png')->size(200)->generate('hola mundo'));

	return view('tickets.qr_confirmation', [
		'title' => 'test',
		'qrcode'=> $qrcode,
	]);
	// $qr = base64_encode($qrcode);

	// return new AttendeeRegistrationDone($attendee, $qr);
})
	->middleware('auth');

Route::get('/certificate_mailable/{token}', function ($token) {
	return new AttendeeCertificatesMail($token);
})
	->middleware('auth');


Route::get('/payment_images/{image}', function ($image) {

	$file = Storage::get('/payment_images/' . $image);

	if (!(bool) $file) {
		abort(404);
	}

	$type = Storage::mimeType('/payment_images/' . $image);

	$response = Response::make($file, 200);

	$response->header("Content-Type", $type);

	return $response;

	return $file;
})
	->middleware('auth');
