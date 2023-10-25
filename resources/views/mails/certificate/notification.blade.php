<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
			background-color: #e0e0e0;

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

		.link {
			background-color: white;
			color: black;
			border: 2px solid black;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			border-radius: 1rem;
			margin-top: 10px;
			transition: ease-in-out 0.1s;
		}

		.link:hover,
		.link:active {
			background-color: black;
			color: white;
		}

		.qr-section {
			display: flex;
			margin-top: 2rem;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>

<body class="body">
	<div class="container">
		<h1 class="title">10° Simposium Regional de Informática</h1>
		<p>
			Querid@ participante, ya puedes descargar los certificados de participación del evento en los siguientes links:
		</p>
		<div style="margin-top: 1rem;">
			<label>Certificado del taller:</label><br>
			<a class="link" href="{{ route('certificate.workshop', $token) }}">Obtener certificado</a>
		</div>
		<div style="margin-top: 1rem">
			<label>Certificado del evento:</label><br>
			<a class="link" href="{{ route('certificate.event', $token) }}">Obtener certificado</a>
		</div>
		<p class="greetings">Esperamos puedas estar con nosotros en la próxima edición <br>¡Gracias por participar! </p>
	</div>
</body>

</html>