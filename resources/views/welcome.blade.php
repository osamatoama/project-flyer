@inject('flyer', 'App\Flyer')
@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3 text-capitalize">{{ $title }}</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('flyers.create') }}" role="button">Add Flyer &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          @foreach ($flyer->all() as $flyer)
            <div class="col-md-4">
              <h2>{{ $flyer->street }} - {{ $flyer->zip }}</h2>
              <h4>{{ $flyer->city }}-{{ $flyer->country }}</h4>
              <span>${{ $flyer->price }}</span>
              <p>
                {!! nl2br($flyer->description) !!}
              </p>
              <p><a class="btn btn-secondary" href="{{ $flyer->url() }}" role="button">View Flyer &raquo;</a></p>
            </div>
          @endforeach
        </div>

        <hr>

      </div> <!-- /container -->

    </main>
@endsection

