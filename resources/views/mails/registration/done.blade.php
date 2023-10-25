@extends('mails.layout')

@section('content')
<h1 class="title">10° Simposium Regional de Informática</h1>
<p>
	<u>¡{{ $attendee_name }}</u> tu registro ha sido completado!, el taller que seleccionaste fue <u>{{
		$attendee_workshop }}</u>, el cual se realizará se llevará a cabo de manera presencial en el <u>{{
		$workshop_location }}</u>, en las instalaciones del <strong>Tecnológico Nacional de México Campus de la Región
		Sierra</strong>.
</p>
<p class="greetings">
	¡Gracias por participar!
</p>
<p style="margin-top: 8px">
	Te enviamos el código con el cuál tendrás acceso a las conferencias presenciales.
</p>
<div class="qr-section">
	<img src="data:image/png;base64,{{  $attendee_qr  }}" alt="qr-code">
	{{-- <img src="{{ $message->embedData(QrCode::format('png')->size(200)->encoding('UTF-8')->generate(1), 'QrCode.png', 'image/png') }}"> --}}
	{{-- <img src="{{ $message->embedData($attendee_qr, 'nameForAttachment.png') }}" alt=""> --}}
</div>
@endsection