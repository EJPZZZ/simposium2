<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	{{--
	<link rel="stylesheet" href="{{ asset('build/assets/app-45c5ea2f.css') }}"> --}}
	{{-- <script src="https://cdn.tailwindcss.com"></script> --}}
	<style>
		html,
		.body {
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			font-size: 1rem;
			background-color: black;
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			min-height: 100vh;
		}

		.container {
			padding: 2rem;
			border-radius: 0.75rem;
			width: 100%;
			text-align: center;
			background-color: whitesmoke;

			@media (min-width: 640px) {
				width: 50%;
			}
		}

		.title {
			margin-bottom: 1rem;
			font-size: 1.5rem;
			line-height: 2rem;
			font-weight: 600;
		}

		.greetings {
			margin-top: 1rem;
			font-size: 1rem;
			line-height: 1.75rem;
			font-weight: 600;
		}

		.qr-section {
			display: flex;
			margin-top: 2rem;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>

<body class="antialiased">
	@yield('content')
</body>

</html>