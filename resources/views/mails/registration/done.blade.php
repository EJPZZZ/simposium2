<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		body {
			/* font-family: -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans"
				, "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; */
			font-family: 'Roboto', sans-serif;
		}
	</style>
</head>

<body
	style="background-color: black; display: flex; justify-content: center; align-items: center; width: 100%; min-height: 100vh; margin: auto">
	<div style="border-radius: 0.75rem; width: 75%; text-align: center; background-color: #e0e0e0; padding: 20px">
		<h1 style="margin-bottom: 1rem;	font-size: 1.5rem; line-height: 2rem;	font-weight: 600;">
			10° Simposium Regional de Informática
		</h1>
		<p style="margin: 10px 0 10px 0;">
			<u>¡{{ $attendee_name }}</u> tu registro ha sido completado!<br>El taller que seleccionaste fue <u>{{
				$attendee_workshop }}</u>, el cual se realizará de manera presencial en el <u>{{
				$workshop_location }}</u>, en las instalaciones del <strong>Tecnológico Nacional de México Campus de la Región
				Sierra</strong>.
		</p>
		<p style="margin: 10px 0 10px 0; font-size: 1rem; line-height: 1.75rem; font-weight: 600;">
			¡Gracias por participar!
		</p>
		<p style="margin: 10px 0 10px 0;">
			Te enviamos el código con el cuál tendrás acceso a las conferencias presenciales.
		</p>
		{{-- <div style="display: flex; margin: 6px 0 6px 0; justify-content: center;	align-items: center;"> --}}
			{{-- <img style=“display:block” src="data:image/png;base64,{{  $attendee_qr  }}" alt="qr-code"> --}}
			{{-- <img src="{{ $message->embed(QrCode::format('png')->size(200)->encoding('UTF-8')->generate(1), 'QrCode.png', 'image/png') }}"> --}}
			{{-- <img src="{{ $message->embedData($attendee_qr, 'nameForAttachment.png') }}" alt=""> --}}
		{{-- </div> --}}
	</div>
</body>

</html>