@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <main role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3 text-capitalize">
          Project Flyer
        </h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('flyers.create') }}" role="button">Add Flyer &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          {{-- it can be
            @each('partials.flyers.single', $flyer->all, 'flyer', 'partials.flyer.empty')
            with remove the references to class variable
           --}}
          @forelse($flyers as $flyer)
            @include('partials.flyers.single', ['flyer' => $flyer, 'class' => 'col-lg-3 col-md-4 col-sm-6'])

          @empty
            @include('partials.flyers.empty')
          @endforelse

        </div>

        <hr>

      </div> <!-- /container -->

    </main>
@endsection

