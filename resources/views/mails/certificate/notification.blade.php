@extends('mails.layout')

@section('content')
<div class="body">
	<div class="container">
		<h1 class="title">10° Simposium Regional de Informática</h1>
		<p>
			Querid@ participante del 10° Simposium Regional de Informática, ya puedes descargar los certificados de participación del evento en los siguientes links:
		</p>
		<div style="margin-top: 1rem">
			<label class="font-bold underline">Certificado del taller en el que participaste:</label>
			<a class="" href="{{ route('certificate.workshop', $token) }}">{{ route('certificate.workshop', $token) }}</a>
		</div>
		<div style="margin-top: 1rem">
			<label class="font-bold underline">Certificado del evento:</label><br>
			<a class="" href="{{ route('certificate.event', $token) }}">{{ route('certificate.event', $token) }}</a>
		</div>
		<p class="greetings">Esperamos puedas estar con nosotros en la próxima edición <br>¡Gracias por participar! </p>
	</div>
</div>
@endsection