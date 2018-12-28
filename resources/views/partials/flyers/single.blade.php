
<div class="{{ $class }} d-flex flex-column mb-5">
  <h2>{{ $flyer->street }} - {{ $flyer->zip }}</h2>
  <h4>{{ $flyer->city }}-{{ $flyer->country }}</h4>
  <span>${{ $flyer->price }}</span>
  <p class="flex-grow-1">
    {!! nl2br($flyer->description) !!}
  </p>
  <p><a class="btn btn-info text-white" href="{{ $flyer->url() }}" role="button">View Flyer &raquo;</a></p>
</div>
