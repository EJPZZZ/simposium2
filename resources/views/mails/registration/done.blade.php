@extends('mails.layout')

@section('content')
<div class="bg-neutral-950 min-h-screen w-full flex items-center justify-center">
	<div class="w-full sm:w-1/3 bg-neutral-50 rounded-xl text-center p-8">
		<h1 class="text-2xl font-semibold mb-4">10° Simposium Regional de Informática</h1>
		<p><u>¡{{ $attendeeName }}</u> tu registro ha sido completado!, el taller que seleccionaste fue <u>{{
				$attendeeWorkshop }}</u> el cual se realizará se llevará a cabo de manera presencial en el <u>{{
				$workshopLocation }}</u> en las instalaciones del Tecnológico Nacional de México Campus de la Región Sierra.</p>
		<p class="mt-4 text-xl font-semibold">¡Gracias por participar!</p>
	</div>
</div>
@endsection