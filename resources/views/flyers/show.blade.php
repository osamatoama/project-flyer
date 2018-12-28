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
						<span class="d-block dz-message text-danger">
								add some photo to your flyer(maximum: {{ config('flyer.max_images_for_each_flyer') }})
						</span>
						@csrf
					</form>
				</div>
			</div>
		@endcan
	</div>
@stop

@can('addPhoto', $flyer)
	@push('scripts')
		{{-- dropzone  --}}
	    <script src="{{ js('dropzone.js') }}"></script>

	    <script src="{{ js('dropzone-handling.js') }}"> </script>
	@endpush
@endcan

