<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendee;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::GET('/attendees', function(Request $request) {
    // Obtiene el correo electrónico y el token especial de la solicitud
    $email = $request->input('email');
    $token = $request->input('token');

    // Realiza la verificación en la tabla 'attendee_certificate_tokens'
    $verification = DB::table('attendee_certificate_tokens')
        ->where('email', $email)
        ->where('token', $token)
        ->first();

    if ($verification) {
        // La verificación es exitosa, el usuario se encuentra en la tabla 'attendee_certificate_tokens'

        // Ahora puedes buscar el nombre del asistente en la tabla 'attendees'
        $attendee = DB::table('attendees')
            ->where('email', $email)
            ->first();

        if ($attendee) {
            // Si se encuentra el asistente en la tabla 'attendees'
            $data = [
                'nombre' => $attendee->name,
            ];
            return response()->json($data);
        }
    }

    // Si la verificación falla o el asistente no se encuentra, devuelve una respuesta de error
    return response()->json(['error' => 'Usuario no válido'], 401);
});