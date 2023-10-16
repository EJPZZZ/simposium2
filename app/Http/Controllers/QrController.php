<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
	public function getQrCode()
	{
		return view('test', [
			'data' => 'daniel pérez flores'
		]);
	}
}
