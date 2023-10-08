<div>
	<h1 class="text-2xl text-center">Registrarse al evento</h1>
	<form wire:submit="save">
		<div class="mt-4">
			<label for="code">Matrícula</label>
			<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 focus" type="text" wire:model="form.code"
				placeholder="Matrícula" id="code" autofocus>
			@error('form.code')
			<span class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<div class="mt-4">
			<label for="name">Nombre</label>
			<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 focus" type="text" wire:model="form.name"
				placeholder="Nombre" id="name">
			@error('form.name')
			<span class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<div class="mt-4">
			<label for="email">Correo Electrónico</label>
			<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800" type="text" wire:model="form.email"
				placeholder="Correo Electrónico">
			@error('form.email')
			<span class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<div class="mt-4">
			<label for="phone_number">Número de teléfono</label>
			<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800" type="text" wire:model="form.phone_number"
				placeholder="Número de teléfono" id="phone_number">
			@error('form.phone_number')
			<span class="text-sm text-red-600">{{ __($message) }}</span>
			@enderror
		</div>
		<div class="flex justify-between gap-4 mt-4">
			<div class="w-2/3">
				<label for="career">Carrera</label>
				<select class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-gray-400" wire:model="form.career">
					<option value="">Selecciona una opción</option>
					@foreach ($careers as $career)
					<option value="{{ $career['name'] }}">{{ $career['name'] }}</option>
					@endforeach
				</select>
				@error('form.career')
				<span class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
			<div class="w-1/3">
				<label for="semester">Semestre</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800" type="number" wire:model="form.semester"
					placeholder="Semestre" min="1" max="13" id="semester">
				@error('form.semester')
				<span class="text-sm text-red-600">{{ __($message) }}</span>
				@enderror
			</div>
		</div>
		<div class="mt-4">
			<label for="workshop">Taller</label>
			<select class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-gray-400" wire:model="form.workshop">
				<option value="">Selecciona una opción</option>
				@foreach ($workshops as $workshop)
				<option value="{{ $workshop['name'] }}">{{ $workshop['name'] }}</option>
				@endforeach
			</select>
			@error('form.workshop')
			<span class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<button type="submit"
			class="bg-neutral-50 px-6 py-4 rounded-lg w-full mt-8 text-neutral-900 text-xl font-semibold hover:bg-neutral-300 transition-all duration-200 shadow-sm shadow-neutral-50">Registrarse</button>
	</form>
</div>