@extends('mails.layout')

@section('content')
<div class="body">
	<div class="container">
		<h1 class="title">10° Simposium Regional de Informática</h1>
		<p>
			<u>¡{{ $attendeeName }}</u> tu registro ha sido completado!, el taller que seleccionaste fue <u>{{
				$attendeeWorkshop }}</u>, el cual se realizará se llevará a cabo de manera presencial en el <u>{{
				$workshopLocation }}</u>, en las instalaciones del <strong>Tecnológico Nacional de México Campus de la Región Sierra</strong>.
		</p>
		<p class="greetings">
			¡Gracias por participar!
		</p>
		<p style="margin-top: 8px">
			Te enviamos el código con el cuál tendrás acceso a las conferencias presenciales.
		</p>
		<div class="qr-section">
			{{ QrCode::size(300)->generate($attendeeToken) }}
		</div>
	</div>
</div>
@endsection