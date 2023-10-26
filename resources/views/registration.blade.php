@extends('layouts.guest')

@section('title', 'Registro')

@section('content')
<section class="w-full min-h-screen relative">
	<div class="absolute min-h-screen w-full flex items-center justify-center overflow-hidden">
		<img class="min-h-screen scale-125 object-cover object-center z-0 opacity-70" src="{{ asset('storage/images/background-registration.jpeg') }}" alt="background">
	</div>
	<div class="absolute min-h-screen w-full z-10 grid grid-cols-1 lg:grid-cols-3 justify-between">
		<div class="flex items-start justify-center">
			<img class="w-1/2 lg:w-full opacity-90 p-4 lg:mt-20 lg:ml-10" src="{{ asset('storage/images/Logo-TecNM-blanco.png') }}" alt="logo-tecnm">
		</div>
		<div class="flex items-center justify-center col-span-2">
			<div class="w-full lg:w-3/4 bg-neutral-950 bg-opacity-90 px-4 lg:px-16 py-8 text-neutral-50 rounded-xl">
				<livewire:attendee-registration />
			</div>
		</div>
	</div>
</section>
@endsection