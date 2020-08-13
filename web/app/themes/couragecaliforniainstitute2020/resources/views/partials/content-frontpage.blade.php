<section id="intro" style="background-image: url({{ $data['intro']['image']['sizes']['large'] }})">
    <div class="container">
        <h2>{!! $data['intro']['title'] !!}</h2>
        <p>{{ $data['intro']['text'] }}</p>
    </div>
</section>

<section id="register">
    <div class="row">
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $data['register']['title'] }}</h3>
                <a class="button registerLink" href="#registerForm">{{ $data['register']['button'] }}</a>
            </div>
        </div>
        <div class="col-md-6 image" style="background-image: url({{ $data['register']['image']['sizes']['large'] }})"></div>
    </div>
</section>

<section id="registerForm">
    @include('partials.register-form')
    <a href="#register" class="center registerLink">Close this form</a>
</section>

<section id="track">
    <div class="row">
        <div class="col-md-6 image" style="background-image: url({{ $data['track']['image']['sizes']['large'] }})"></div>
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $data['track']['title'] }}</h3>
                <a class="button" href="{{ $data['track']['button_link'] }}" target="_blank">{{ $data['track']['button'] }}</a>
            </div>
        </div>
    </div>
</section>

<section id="newsletter">
    <div class="container">
        <h3>{!! $data['newsletter']['text'] !!}</h3>
        @include('partials.newsletter-signup')
        <div class="success">
            {{ $data['newsletter']['success_message']}}
        </div>
    </div>
</section>

<section id="dates">
    <div class="container">
    <h3>{{ $data['key_dates']['title'] }}</h3>
    <div class="wrap">
        @foreach ($data['key_dates']['dates'] as $date)
            <div class="date-wrap row">
                <div class="date col-md-4">
                    <h4>{{ $date['date']}}</h4>
                </div>
                <div class="text col-md-8">{{ $date['text'] }}</div>
            </div>
        @endforeach
    </div>
    </div>
</section>

<section id="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{ $data['faq']['title'] }}</h3>
            </div>
            <div class="col-md-8">
                @foreach ($data['faq']['questions'] as $question)
                <div class="question drawer-wrap">
                    <div class="drawer-title">
                        <h4>{{ $question['question'] }}</h4>
                    </div>
                    <div class="drawer-content">
                        {!! $question['answer'] !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <h3>{{ $data['about']['title'] }}</h3>
        {!! $data['about']['text'] !!}
    </div>
</section>