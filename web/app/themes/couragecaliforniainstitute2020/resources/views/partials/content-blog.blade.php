<section id="intro">
    {!! the_content() !!}
</section>

<section id="blog">
    <div class="container">
        <div class="row">
            @foreach ($blog_posts as $latest_post)
            <div class="col-md-4">
                @include('partials.post-block')
            </div>
            @endforeach
        </div>
    </div>
</section>