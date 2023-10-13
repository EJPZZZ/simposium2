<div class="w-full min-h-screen grid grid-cols-1 sm:grid-cols-2">
	<div class="flex items-center justify-end">
		<div class="bg-neutral-50 w-1/2 p-8 rounded-xl text-center">
			@if ($attendee_name)
			<p>
				Estimado <strong>{{ $attendee_name }}</strong> te enviamos un correo con la información necesaria para
				participar en el <strong>{{ $workshop_name }}</strong> que seleccionaste.
			</p>
			<h1 class="font-bold mt-4 mb-8">Gracias por ser parte del 10° Simposium Regional de Informática.</h1>
			@else
			<p>
				Lo sentimos, ha ocurrido un error en tu solicitud.
			</p>
			<h1 class="font-bold mt-4 mb-8">Te recomendamos contactar al equipo organizador.</h1>
			@endif
			<div class="flex justify-evenly">
				<a wire:navigate href="{{ route('home') }}"
					class="bg-neutral-950 px-4 py-2 rounded-xl text-white shadow-neutral-950 shadow-sm hover:opacity-80 transition-all duration-200">Inicio</a>
				<a wire:navigate
					class="bg-neutral-950 px-4 py-2 rounded-xl text-white shadow-neutral-950 shadow-sm hover:opacity-80 transition-all duration-200"
					href="{{ route('registration') }}">Volver al registro</a>
			</div>
		</div>
	</div>
	<div class="flex items-center justify-start">
		<img class="h-96" src="{{ asset('storage/images/armadillo.png') }}" alt="armadillo">
	</div>
</div>