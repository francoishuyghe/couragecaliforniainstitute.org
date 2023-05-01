@php $cats = get_the_category($post->ID) @endphp
<article @php post_class() @endphp>
  <div class="container">
  <header>
    <a href="/blog" class="back"><i class="fal fa-long-arrow-left"></i> Back to blog</a>
    <div class="categories">
      @foreach ($cats as $cat)
        @if($cat->name !== 'Uncategorized')
          <a href="{{ get_category_link( $cat->term_id ) }}" class="category-link">
              {{ $cat->name }}
          </a>
          @endif
      @endforeach
    </div>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials.entry-meta')
    <div class="date">
      {{ the_date() }}
    </div>
    @if(function_exists('social_warfare'))  
      @php social_warfare() @endphp
    @endif
  </header>

  @php $thumb_url = get_the_post_thumbnail_url() @endphp
  @if( $thumb_url )
    <div class="thumbnail">
      <img src="{{ $thumb_url }}" />
    </div>
  @endif

  <div class="entry-content">
      @php the_content() @endphp
  </div>

  <div class="footer-links">
    <div class="row">
    <div class="col-6 left">
      @php $prev = get_previous_post_link($format = '%link') @endphp
      @if($prev)
      <h6>Previous</h6>
      {!! $prev !!}
      @endif
    </div>
    <div class="right col-6">
      @php $next = get_next_post_link($format = '%link') @endphp
      @if($next)
      <h6>Next</h6>
      {!! $next !!}
      @endif
    </div>
    </div>
  </div>
</article>