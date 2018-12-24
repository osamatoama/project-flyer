@extends('layouts.app')

@section('title', 'show flyer')
@push('styles')
	{{-- dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
@endpush
@section('content')
	<div class="container mt-4">
		<h1 class="display-2">{{  $flyer->street }}
		</h1>
		<h5>${{ $flyer->price }}</h5>
		<hr>
		<h3 class="line-height-1-7">
			{!!  nl2br( $flyer->description)!!}
		</h3>
		@can('addPhoto', $flyer)
			<photos :id="{{ $flyer->id }}"></photos>
			<div class="row">
				<div class="col-12 mt-5">
					<form action="{{ route('flyers.add_photo', [$flyer]) }}"  class="dropzone">
						@csrf
					</form>
				</div>
			</div>
		@endcan
	</div>
@stop


@push('scripts')
	{{-- dropzone  --}}
    <script src="{{ js('dropzone.js') }}"></script>
@endpush

