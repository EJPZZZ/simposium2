@extends('layouts.guest')

@section('title', 'Confirmación de Registro')

@section('content')
<div class="w-full min-h-screen grid grid-cols-1 sm:grid-cols-2">
	<div class="flex items-center justify-end">
		<div class="bg-neutral-50 w-1/2 p-8 rounded-xl text-center">
			<p>
				Te enviamos un correo con la información necesaria para participar del taller que seleccionaste.
			</p>
			<h1 class="font-bold mt-4 mb-6">Gracias por ser parte del 10° Simposium Regional de Informática.</h1>
			<a class="bg-neutral-950 px-4 py-3 rounded-xl text-white shadow-neutral-950 shadow-sm hover:opacity-80 transition-all duration-200" href="{{ route('registration') }}">Regresar</a>
		</div>
	</div>
	<div class="flex items-center justify-start">
		<img class="h-96" src="{{ asset('storage/images/armadillo.png') }}" alt="armadillo">
	</div>
</div>
@endsection