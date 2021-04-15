@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container">
      @include('partials.blog-header')
      @include('partials.blog-content')
    </div>
  @endwhile
@endsection
