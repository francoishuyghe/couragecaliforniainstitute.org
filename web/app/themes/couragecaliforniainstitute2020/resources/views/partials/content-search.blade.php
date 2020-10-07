<article @php post_class('post-block') @endphp>
  <header>
    <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
</article>
