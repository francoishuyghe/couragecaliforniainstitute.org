<section id="register" class="{{ $block->classes }}">
    <div class="row">
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $title }}</h3>
                <a class="button" href="/voter-tools">{{ $button }}</a>
            </div>
        </div>
        @if($image)
        <div class="col-md-6 image" style="background-image: url({{ $image['sizes']['large'] }})"></div>
        @endif
    </div>
</section>
