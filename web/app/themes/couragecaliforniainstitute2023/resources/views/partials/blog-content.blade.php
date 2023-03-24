@php global $post @endphp

<section id="blog">
    <div class="row">
        @foreach ($blog_posts as $post)
        @php setup_postdata($post) @endphp
        @php $categories = get_the_category($post->ID) @endphp
        
        <div class="post-wrap @foreach($categories as $cat) {{ $cat->slug }}@endforeach">
        @include('partials.post-block')
        </div>
        
        @php wp_reset_postdata() @endphp
        @endforeach
    </div>
</section>