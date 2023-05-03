@php global $post @endphp

<section id="blog" class="loading">
    <div class="row">
        @foreach ($blog_posts as $post)
            @php setup_postdata($post) @endphp
            @include('partials.post-block')
            @php wp_reset_postdata() @endphp
        @endforeach

    </div>
    <div id="loadingDisplay"></div>
    <button class="button" id="loadMore">Load More</button>
</section>