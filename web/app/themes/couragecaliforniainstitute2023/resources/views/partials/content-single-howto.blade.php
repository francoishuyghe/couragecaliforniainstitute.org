<article @php post_class() @endphp>
  <div class="container">
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
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