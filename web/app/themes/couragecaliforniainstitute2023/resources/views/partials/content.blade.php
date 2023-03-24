<article @php post_class('post-block') @endphp>
    <div class="thumbnail">
      <img src="{{ get_the_post_thumbnail_url() }}" />
    </div>
    <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
    @include('partials/entry-meta')
</article>
