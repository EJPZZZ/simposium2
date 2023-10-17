<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@vite('resources/css/app.css')

	<style>
		html {
			margin: 0px;
			padding: 0px;
		}

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

		.image-background {
			height: 100%;
			width: 100%;
			z-index: -1;
			position: absolute;
		}

		.name{
			position: absolute;
			z-index: 1;
			font-size: 3rem;
			top: 40%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.token{
			position: absolute;
			z-index: 1;
			font-size: 1rem;
			bottom: 1%;
			right: 5%;
			transform: translate(0%, -50%);
		}
	</style>
</head>

<body class="body">
	<img class="image-background" src="{{ asset('storage/images/test-certificate.png') }}" alt="template">
	<div class="text-align: right;">
		<h1 class="name">{{ $data['name'] }}</h1>
		<h5 class="token">{{ $data['token'] }}</h5>
	</div>
</body>

</html>