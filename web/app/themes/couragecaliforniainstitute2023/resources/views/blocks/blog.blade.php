  <section id="blog" class="{{ $block->classes }}">
    <div class="container">
    <div class="section-header center">
        <h3><a href="/blog">{{ $title }}</a></h3>
        <p>{{ $description }}</p>
    </div>
    <div class="row posts">
        @php global $post @endphp
        @foreach ($latest_posts as $post)
            @php setup_postdata($post) @endphp
            <div class="col-md-4">
                @include('partials.post-block')
            </div>
            @php wp_reset_postdata() @endphp
        @endforeach
    </div>
    <div class="section-footer center">
        <a class="button" href="/blog">{{ $button }}</a>
    </div>
    </div>
</section>
