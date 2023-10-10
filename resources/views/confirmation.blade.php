@extends('layouts.guest')

@section('title', 'Confirmación de Registro')

@section('content')
	<livewire:attendee-confirmation token="{{ $token }}"/>
@endsection