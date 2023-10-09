@extends('layouts.guest')

@section('title', 'Registro')

@section('content')
<div class="w-full min-h-screen relative overflow-hidden">
	<img class="absolute w-full object-cover object-center z-0 opacity-70"
		src="{{ asset('storage/images/background-registration.jpeg') }}" alt="background">
	<div class="absolute w-full min-h-screen z-10 grid grid-cols-1 sm:grid-cols-2 justify-between">
		<div class="flex items-center justify-center">
			<img class="w-full opacity-90" src="{{ asset('storage/images/Logo-TecNM-blanco.png') }}" alt="logo-tecnm">
		</div>
		<div class="flex items-center justify-center">
			<div class="w-full sm:w-3/4 bg-neutral-950 bg-opacity-70 px-20 py-8 text-neutral-50 rounded-xl">
				<livewire:attendee-registration />
			</div>
		</div>
	</div>
</div>
@endsection