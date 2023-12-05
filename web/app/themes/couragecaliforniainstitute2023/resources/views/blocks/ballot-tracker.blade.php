<section id="track" class="{{ $block->classes }}">
    <div class="row">
        <div class="col-md-6 image" @if($image) style="background-image: url({{ $image['sizes']['large'] }})" @endif></div>
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $title }}</h3>
                <a class="button" href="{{ $button_link }}" target="_blank">{{ $button }}</a>
            </div>
        </div>
    </div>
</section>
