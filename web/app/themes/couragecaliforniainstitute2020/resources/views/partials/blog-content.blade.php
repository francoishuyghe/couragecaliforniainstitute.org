@php global $post @endphp

<section id="blog">
    <div class="row">
        @foreach ($blog_posts as $post)
        @php setup_postdata($post) @endphp
        <div class="post-wrap">
        @include('partials.post-block')
        </div>
        @php wp_reset_postdata() @endphp
        @endforeach
    </div>
</section>