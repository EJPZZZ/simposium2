<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
	public function workshop(Request $request)
	{
		// $attedee_email = Attendee::verify_token($request->token);
		// dd(Attendee::where('email', $attedee_email)->first());
		
	}

	public function general(Request $request)
	{
		$attedee_email = Attendee::verify_token($request->token);
		dd(Attendee::where('email', $attedee_email)->first());
	}
}
