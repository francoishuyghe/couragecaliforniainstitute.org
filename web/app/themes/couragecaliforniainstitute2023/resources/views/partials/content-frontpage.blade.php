<section id="intro">
    <div class="container">
        <p class="subtitle">{!! $data['intro']['subtitle'] !!}</p>
        <h2>{!! $data['intro']['title'] !!}</h2>
        <p>{{ $data['intro']['text'] }}</p>
        <a class="button" href="{{ $data['intro']['button']['url'] }}">{{ $data['intro']['button']['title'] }}</a>
        <img class="top" src="{{ $data['intro']['image']['sizes']['large'] }}" />
        <img class="left" src="{{ $data['intro']['image_left']['sizes']['large'] }}" />
        <img class="right" src="{{ $data['intro']['image_right']['sizes']['large'] }}" />
    </div>
</section>

{!! the_content() !!}

<section id="about">
    <div class="container">
        <h3>{{ $data['about']['title'] }}</h3>
        {!! $data['about']['text'] !!}
        <a class="button" href="/about">Learn More</a>
    </div>
</section>

<section id="newsletter">
    <div class="container">
        <h3>{!! $data['newsletter']['text'] !!}</h3>
        @include('partials.newsletter-signup', ['buttonText' => "Subscribe", "formName" => "signup"])
        @if ( array_key_exists('success_message', $data['newsletter']) )
        <div class="success">
            {{ $data['newsletter']['success_message']}}
        </div>
        @endif
    </div>
</section>