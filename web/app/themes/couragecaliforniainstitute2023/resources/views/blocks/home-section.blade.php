<div class="{{ $block->classes }}">
<section class="block-home-section {{ $background_color }}">
    <div class="row">
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $title }}</h3>
                    <a class="button" href="{{ $link['url'] }}">{{ $link_text }}</a>
            </div>
        </div>
        @if($image)
            <div class="col-md-6 image" style="background-image: url({{ $image['sizes']['large'] }})"></div>
        @endif
    </div>
</section>
</div>