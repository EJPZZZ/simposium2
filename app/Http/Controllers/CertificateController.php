<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
	public function workshop(Request $request)
	{
		$attendee_email = Attendee::verify_token($request->token);

		Attendee::where('email', $attendee_email)->first();
		
	}

	public function general(Request $request)
	{
		$attendee_email = Attendee::verify_token($request->token);
		
		Attendee::where('email', $attendee_email)->first();
	}
}
