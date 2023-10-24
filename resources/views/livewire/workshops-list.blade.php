<div class="w-full grid grid-cols-1 lg:grid-cols-3 px-8 pb-8 lg:py-20 lg:px-10 gap-4">
	@foreach ($workshops as $workshop)
	<div class="h-60 bg-orange-100 rounded-lg flex items-center justify-center">
		<h1 class="text-neutral-900 font-medium text-2xl text-center">
			{{ $workshop['name'] }}
		</h1>
	</div>
	@endforeach
</div>