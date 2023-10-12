<div>
	<h1 class="text-3xl text-center font-semibold">10° Simposium Regional de Informática</h1>
	<h1 class="text-xl text-center mt-2">Formulario de registro</h1>
	<form wire:submit="save">
		<div class="flex gap-4 mt-2">
			<div class="w-2/3">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="name">Nombre</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm focus" type="text"
					wire:model="form.name" placeholder="Nombre" id="name">
				@error('form.name')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
			<div class="w-1/3">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="curp">CURP</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm focus" type="text"
					wire:model="form.curp" placeholder="CURP" id="curp" autofocus>
				@error('form.curp')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="flex gap-4 mt-4">
			<div class="w-2/3">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="email">Correo
					Electrónico</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm" type="email" wire:model="form.email"
					placeholder="Correo Electrónico" id="email">
				@error('form.email')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
			<div class="w-1/3">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="phone_number">Número de
					teléfono</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm" type="text"
					wire:model="form.phone_number" placeholder="Número de teléfono" id="phone_number">
				@error('form.phone_number')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="flex gap-4 mt-4">
			<div class="w-1/2">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="type">¿Perteneces a la
					institución?</label>
				<select wire:model.live="form.type"
					class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm text-neutral-400" id="type">
					<option>Selecciona una opción</option>
					<option value="external">No, soy ajeno a la institución</option>
					<option value="internal">Soy estudiante del campus</option>
				</select>
				@error('form.type')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
			<div class="w-1/2">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="gender">Género</label>
				<select wire:model.live="form.gender"
					class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm text-neutral-400" id="gender">
					<option>Selecciona una opción</option>
					<option value="female">Femenino</option>
					<option value="male">Masculino</option>
					<option value="not_especified">Prefiero no especificar</option>
				</select>
				@error('form.gender')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
		</div>
		@if($form->type == 'internal')
		<div wire:transition class="mt-4">
			<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="career">Carrera</label>
			<select class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm text-neutral-400"
				wire:model="form.career">
				<option value="">Selecciona una opción</option>
				@foreach ($careers as $career)
				<option value="{{ $career['name'] }}">{{ $career['name'] }}</option>
				@endforeach
			</select>
			@error('form.career')
			<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<div wire:transition class="flex justify-between gap-4 mt-4">
			<div class="w-1/2">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="code">Matrícula</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm focus" type="text"
					wire:model="form.code" placeholder="Matrícula" id="code">
				@error('form.code')
				<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
				@enderror
			</div>
			<div class="w-1/2">
				<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="semester">Semestre</label>
				<input class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm" type="number"
					wire:model="form.semester" placeholder="Semestre" min="1" max="13" id="semester">
				@error('form.semester')
				<span wire:transition class="text-sm text-red-600">{{ __($message) }}</span>
				@enderror
			</div>
		</div>
		@endif
		<div class="mt-4">
			<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="workshop">Taller</label>
			<select class="block w-full p-2 rounded-lg ring-0 bg-neutral-800 text-sm text-neutral-400"
				wire:model="form.workshop">
				<option value="">Selecciona una opción</option>
				@foreach ($workshops as $workshop)
				<option value="{{ $workshop['name'] }}">{{ $workshop['name'] }}</option>
				@endforeach
			</select>
			@error('form.workshop')
			<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<div class="mt-4">
			<label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white" for="image_file">Recibo de
				pago</label>
			<input wire:model="form.image_file"
				class="block w-full text-sm text-neutral-50 rounded-lg cursor-pointer bg-neutral-800 dark:placeholder-neutral-400 p-2"
				id="image_file" type="file" accept="image/jpg,image/jpeg,image/png">
			@error('form.image_file')
			<span wire:transition class="text-sm text-red-600">{{ $message }}</span>
			@enderror
		</div>
		<button wire:loading.attr="disabled" type="submit"
			class="bg-neutral-50 px-6 py-4 rounded-lg w-full mt-8 text-neutral-900 text-xl font-semibold hover:bg-neutral-300 transition-all duration-200 shadow-sm shadow-neutral-50">
			Registrarse
		</button>
		{{-- <div wire:loading wire:target="form" class="text-2xl text-center w-full mt-6">
			Registrando
		</div> --}}
	</form>
</div>