<div class="{{ $block->classes }} {{ $background_color }}">
  <div class="row">
      <div class="col-md-6 text">
          <div class="wrap">
              <h3>{{ $title }}</h3>
              <p>{{ $description }}</p>
              @if($link)
                <a class="button" href="{{ $link['url'] }}">{{ $link_text }}</a>
              @endif
          </div>
      </div>
      @if($image)
          <div class="col-md-6 image" style="background-image: url({{ $image['sizes']['large'] }})"></div>
      @endif
  </div>
</div>