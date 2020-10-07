@php $cats = get_the_category($latest_post->ID) @endphp
<div class="post-block">
    <a href="{{ get_the_permalink($latest_post->ID) }}">
    <div class="thumbnail">
        <img src="{{ get_the_post_thumbnail_url($latest_post->ID) }}" />
    </div>
    </a>
    <div class="categories">
        @foreach ($cats as $cat)
            <a href="{{ get_category_link( $cats[0]->term_id ) }}" class="category-link">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>
    <a href="{{ get_the_permalink($latest_post->ID) }}">
        <h4>{!! get_the_title($latest_post->ID) !!}</h4>
    </a>
    <div class="byline">By {{ get_the_author() }}</div>
    <div class="date">{{ get_the_date() }}</div>
</div>