@extends('mails.layout')

@section('content')
<div class="body">
	<div class="container">
		<h1 class="title">10° Simposium Regional de Informática</h1>
		<p>
			Querid@ participante, ya puedes descargar los certificados de participación del evento en los siguientes links:
		</p>
		<div style="margin-top: 1rem;">
			<label>Certificado del taller:</label><br>
			<a class="link" href="{{ route('certificate.workshop', $token) }}">Obtener certificado</a>
		</div>
		<div style="margin-top: 1rem">
			<label>Certificado del evento:</label><br>
			<a class="link" href="{{ route('certificate.event', $token) }}">Obtener certificado</a>
		</div>
		<p class="greetings">Esperamos puedas estar con nosotros en la próxima edición <br>¡Gracias por participar! </p>
	</div>
</div>
@endsection