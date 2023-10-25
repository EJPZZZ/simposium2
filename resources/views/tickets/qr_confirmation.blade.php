<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $title }}</title>
	<style>
		html {
			margin: 0px;
			padding: 10%;
		}
		
		body{
			font-family: 'Roboto', sans-serif;
			background-color: whitesmoke;
		}
	</style>
</head>

<body style="display: flex; justify-content: center; align-items:initial; width: 100%; min-height: 100vh;">
	<div style="display: flex; justify-content: space-between; align-items: center; ">
		<div style="font-size: 1.125rem;	line-height: 1.75rem; ">
			10° Simposium Regional de Informática
		</div>
		<img src="data:image/png;base64,{{  $qrcode  }}" alt="qr-code">
	</div>
</body>

</html>