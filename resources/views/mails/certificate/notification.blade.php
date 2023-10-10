@extends('mails.layout')

@section('content')
<div class="bg-neutral-950 min-h-screen w-full flex items-center justify-center">
	<div class="w-full sm:w-3/4 bg-neutral-50 rounded-xl text-center p-8">
		<h1 class="text-2xl font-semibold mb-4">10° Simposium Regional de Informática</h1>
		<p>
			Querido participante del 10° Simposium Regional de Informática, ya puedes descargar los certificados de participación del evento en los siguientes links:
		</p>
		<div class="mt-4">
			<label class="font-bold underline">Certificado del taller en el que participaste:</label>
			<a class="" href="{{ route('certificate.workshop', $token) }}">{{ route('certificate.workshop', $token) }}</a>
		</div>
		<div class="mt-4">
			<label class="font-bold underline">Certificado del evento:</label><br>
			<a class="" href="{{ route('certificate.event', $token) }}">{{ route('certificate.event', $token) }}</a>
		</div>
		<p class="mt-4 text-lg font-semibold">Esperamos puedas estar con nosotros en la próxima edición ¡Gracias por participar! </p>
	</div>
</div>
@endsection