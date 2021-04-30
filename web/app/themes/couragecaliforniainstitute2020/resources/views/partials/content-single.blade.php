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
    @php social_warfare() @endphp
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
</article>