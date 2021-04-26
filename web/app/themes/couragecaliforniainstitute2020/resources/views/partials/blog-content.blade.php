@php global $post @endphp
{{-- <section id="intro">
    {!! the_content() !!}
</section> --}}

<section id="blog">
    <div class="row">
        @foreach ($blog_posts as $post)
        @php setup_postdata($post) @endphp
        @if($loop->iteration < 4 )
        <div class="col-md-4">
            @include('partials.post-block')
        </div>
        @else
        <div class="col-md-12 horizontal">
            @include('partials.post-block')
        </div>
        @endif
        @php wp_reset_postdata() @endphp
        @endforeach
    </div>
</section>