<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $title }}</title>
	<style>
		html{
			margin: auto;
		}

		body {
			font-family: 'Roboto', sans-serif;
			background-color: whitesmoke;
		}
	</style>
</head>

<body style="width: 100%; min-height: 100vh;">
	<div style="display: flex; justify-content:center; align-items:center; margin:0; padding: 40px 20px 0 60px">
		<div style="float: left; width: 60%; margin: auto;">
			<p style="font-size: 1.125rem; line-height: 1.75rem; width:100%; margin: auto; padding: 0px">
				10° Simposium Regional de Informática<br>TecNM Campus de la Región Sierra<br>Fecha: 23 y 24 de Noviembre del 2023
			</p>
		</div>
		<div style="float: left;">
			<img src="data:image/png;base64,{{  $qrcode  }}" alt="qr-code">
		</div>
	</div>
</body>

</html>