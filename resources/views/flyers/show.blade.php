@extends('layouts.app')

@section('title', 'show flyer')
@push('styles')
	{{-- dropzone --}}
    <link rel="stylesheet" href="{{ css('dropzone.min.css') }}" />
@endpush
@section('content')
	<div class="container mt-4">
		<h1 class="display-2">{{  $flyer->street }}
		</h1>
		<h5>${{ $flyer->price }}</h5>
		<h5>added By: {{ $flyer->user->name }}</h5>

		<hr>
		<h3 class="line-height-1-7">
			{!!  nl2br( $flyer->description)!!}
		</h3>
		<photos :id="{{ $flyer->id }}" :can-delete="'{{ $flyer->ownedByAuthUser() }}'"></photos>
		@can('addPhoto', $flyer)
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

    <script>
		Dropzone.autoDiscover = false;
    	var s = new Dropzone(".dropzone", {
    		error: function (e) {
				swal({
					title: "Error",
					text: e.xhr.response,
					icon: "error",
					timer: 2500,
					button: false
				});

    		}
    	});

    </script>
@endpush

