@extends('layouts.guest')

@section('content')
	<div>
		{{-- <img src="data:image/png;base64, {{ base64_encode($qr) }} "> --}}
		{!! QrCode::size(300)->generate($data) !!}
	</div>
@endsection