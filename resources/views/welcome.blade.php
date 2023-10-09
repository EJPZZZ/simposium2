@extends('layouts.guest')

@section('title', 'Inicio')

@section('content')
<div class="w-full min-h-screen relative overflow-hidden">
	<img class="absolute w-full object-cover object-center z-0 opacity-70"
		src="{{ asset('storage/images/background-home.jpeg') }}" alt="background">
	<div class="absolute w-full min-h-screen z-10 flex flex-col justify-between">
		<div class="grid grid-cols-1 sm:grid-cols-2">
			<div class="flex items-start justify-start">
				<img class="w-96 mt-20 ml-12" src="{{ asset('storage/images/Logo-TecNM-blanco.png') }}" alt="logo-tecnm">
			</div>
			<div class="flex items-center justify-end">
				<a href="{{ route('registration') }}"
					class="bg-zinc-800 px-8 py-4 rounded-full mr-20 text-2xl text-orange-100 shadow-md cursor-pointer hover:opacity-80 transition-all duration-200">Registrarse</a>
			</div>
		</div>
		<div class="flex items-end">
			<h1 class="text-8xl text-orange-100 text-right font-bold mr-20 mb-20">10° Simposium Regional de Informática</h1>
		</div>
	</div>
</div>
@endsection