<section id="intro" style="background-image: url({{ $data['intro']['image']['sizes']['large'] }})">
    <div class="container">
        <h2>{{ $data['intro']['title'] }}</h2>
        <p>{{ $data['intro']['text'] }}</p>
    </div>
</section>

<section id="register">
    <div class="row">
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $data['register']['title'] }}</h3>
                <a class="button">{{ $data['register']['button'] }}</a>
            </div>
        </div>
        <div class="col-md-6 image" style="background-image: url({{ $data['register']['image']['sizes']['large'] }})"></div>
    </div>
</section>

<section id="newsletter">
    <div class="container">
        <h3>{{ $data['newsletter']['text'] }}</h3>
    </div>
</section>

<section id="dates">
    <div class="container">
    <h3>{{ $data['key_dates']['title'] }}</h3>
    </div>
</section>

<section id="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{ $data['faq']['title'] }}</h3>
            </div>
            <div class="col-md-8">
                Questions
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