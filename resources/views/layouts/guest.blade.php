<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Simposium Regional de Informática | @yield('title')</title>

	@livewireStyles
	@vite('resources/css/app.css')
</head>

<body class="antialiased bg-neutral-50 dark:bg-neutral-950">
	@yield('content')
	@livewireScripts
</body>

</html>