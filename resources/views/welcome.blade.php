@extends('layouts.guest')

@section('title', 'Inicio')

@section('content')
<section class="w-full min-h-screen relative overflow-hidden">
	<img class="absolute min-h-screen w-full object-cover object-center z-0 opacity-70"
		src="{{ asset('storage/images/background-home.jpeg') }}" alt="background">
	<div class="absolute min-h-screen w-full z-10 flex flex-col justify-between">
		<div class="flex justify-between items-center p-4 lg:p-8">
			<div class="flex items-start justify-start">
				<img class="w-56 lg:w-96" src="{{ asset('storage/images/Logo-TecNM-blanco.png') }}" alt="logo-tecnm">
			</div>
			<div class="flex items-center justify-end">
				<a wire:navigate href="{{ route('registration') }}"
					class="bg-zinc-800 px-4 lg:px-8 py-4 rounded-full text-lg lg:text-2xl text-orange-100 shadow-md cursor-pointer hover:opacity-80 transition-all duration-200">
					Registrarse
				</a>
			</div>
		</div>
		<div class="flex items-end pb-16">
			<h1
				class="text-3xl lg:text-8xl text-orange-100 text-center lg:text-right font-bold bg-neutral-900 bg-opacity-90 py-4 lg:px-10">
				10° Simposium Regional de Informática</h1>
		</div>
	</div>
</section>
<section class="relative min-h-screen overflow-hidden">
	<img class="absolute min-h-screen w-full object-cover object-center z-0 opacity-20"
		src="{{ asset('storage/images/background-home2.jpeg') }}" alt="background">
	<div class="min-h-screen h-full flex flex-col lg:flex-row p-4 lg:px-20 lg:py-24 z-10 bg-neutral-950 ">
		<div class="w-1/2 flex items-start">
			<span class="text-4xl lg:text-6xl text-orange-100 font-medium">
				"Herramientas Inteligentes, el futuro nos alcanza"
			</span>
		</div>
		<div class="text-center w-full lg:w-1/2 flex items-end lg:pb-20 lg:px-10 pt-60">
			<p class="text-xl text-white">
				La carrera Ing. Informática te invita a nuestro <strong class="text-2xl">10° Simposium Regional de
					Informática</strong>, un espacio vibrante donde el conocimiento cobra vida a través de experiencias
				interactivas y colaborativas, dias 23 y 24 de noviembre.
			</p>
		</div>
	</div>
</section>
<section class="w-full min-h-screen text-neutral-50 lg:py-20 flex flex-col justify-start items-center">
	<h1 class="text-2xl lg:text-6xl font-medium uppercase text-center py-6 lg:py-0">Talleres impartidos</h1>
	<livewire:workshops-list />
</section>
<section class="w-full grid grid-cols-1 lg:grid-cols-3 bg-neutral-50 p-8">
	<div class="flex flex-col gap-4">
		<h1 class="text-xl font-bold">Información</h1>
		<span class="text-md font-semibold">
			Dirección: Carretera Teapa-Tacotalpa Km 4.5, Francisco Javier Mina, Teapa Tabasco C.P. 86801
		</span>
		<span class="text-md font-semibold">
			Teléfono: 9323 240 650
		</span>
		<span class="text-md font-semibold">
			Email academia: regionsierra@regionsierra.tecnm.mx<br>
			Dirección general: direccion@regionsierra.tecnm.mx
		</span>
	</div>
	<div class="flex flex-col gap-4 items-end lg:items-center mt-4 lg:mt-0">
		<h1 class="text-xl font-bold">Redes sociales</h1>
		<span class="text-lg font-semibold">
			@SIMPOSIUMRI
		</span>
		<span class="text-lg font-semibold">
			@SIMPOSIUMRI
		</span>
		<span class="text-lg font-semibold">
			@SIMPOSIUMRI
		</span>
	</div>
	<div class="flex items-start">
		<img class="w-56 lg:w-96" src="{{ asset('storage/images/Logo-TecNM-negro.png') }}" alt="logo-tecnm">
	</div>
</section>
@endsection