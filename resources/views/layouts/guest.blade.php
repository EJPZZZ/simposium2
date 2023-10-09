<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Simposium Regional de Informática | @yield('title')</title>

	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/favicon/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/favicon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('storage/favicon/site.webmanifest') }}">
	<meta name="theme-color" content="#ffffff">

	@livewireStyles
	@vite('resources/css/app.css')
</head>

<body class="antialiased bg-neutral-50 dark:bg-neutral-950">
	@yield('content')
	@livewireScripts
</body>

</html>