<article @php post_class() @endphp>
  <div class="container">
  <header>
    <div class="categories">
      @foreach ($cats as $cat)
          <a href="{{ get_category_link( $cats[0]->term_id ) }}" class="category-link">
              {{ $cat->name }}
          </a>
      @endforeach
  </div>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="thumbnail">
    <img src="{{ the_post_thumbnail_url() }}" />
  </div>
  <div class="entry-content">
      @php the_content() @endphp
  </div>
</article>