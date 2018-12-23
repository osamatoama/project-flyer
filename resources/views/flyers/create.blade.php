@extends('layouts.app')

@section('title', 'sell your home')

@section('content')
	<div class="container">
		<h1>selling your home?</h1>
		<hr>
		<form class="flyers-form" method="POST" enctype="multipart/form-data" action="{{ route('flyers.store') }}">
			@include('partials.flyers.create')
		</form>

		@include('partials.errors')
	</div>
@stop
