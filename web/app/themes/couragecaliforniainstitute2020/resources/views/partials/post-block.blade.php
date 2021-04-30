@php $cats = get_the_category($post->ID) @endphp
<div class="post-block">
    <div class="thumbnail">
        <div class="thumbnail-wrap">
        <a href="{{ get_the_permalink($post->ID) }}">
            <img src="{{ get_the_post_thumbnail_url($post->ID) }}" />
        </a>
        </div>
    </div>
    <div class="text">
    <div class="categories">
        @foreach ($cats as $cat)
        @if($cat->name !== 'Uncategorized')
            <a href="{{ get_category_link( $cat->term_id ) }}" class="category-link">
                {{ $cat->name }}
            </a>
            @endif
        @endforeach
    </div>
    <a href="{{ the_permalink() }}">
        <h4>{!! the_title() !!}</h4>
    </a>
    <div class="excerpt">
        {!! the_excerpt() !!}
    </div>
    <div class="byline">By {{ get_the_author() }}</div>
    </div>
</div>