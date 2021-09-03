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

<section id="register">
    <div class="row">
        <div class="col-md-6 text">
            <div class="wrap">
                <h3>{{ $data['register']['title'] }}</h3>
                <a class="button" href="/voter-tools">{{ $data['register']['button'] }}</a>
            </div>
        </div>
        <div class="col-md-6 image" style="background-image: url({{ $data['register']['image']['sizes']['large'] }})"></div>
    </div>
</section>

{{-- Blog --}}
<section id="blog">
    <div class="container">
    <div class="section-header center">
        <h3><a href="/blog">{{ $data['blog']['title'] }}</a></h3>
        <p>{{ $data['blog']['description'] }}</p>
    </div>
    <div class="row posts">
        @php global $post @endphp
        @foreach ($latest_posts as $post)
            @php setup_postdata($post) @endphp
            <div class="col-md-4">
                @include('partials.post-block')
            </div>
            @php wp_reset_postdata() @endphp
        @endforeach
    </div>
    <div class="section-footer center">
        <a class="button" href="/blog">{{ $data['blog']['button'] }}</a>
    </div>
    </div>
</section>

{{-- Track --}}
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

<section id="counties">
    <div class="container">
        <h2>{{ $data['counties']['title'] }}</h2>
        {!! $data['counties']['text'] !!}
        <select name="counties" id="selectCounties">
            <option disabled selected>Select Your County</option>
            @foreach ($post_categories as $cat)
                @php $arg = array( 
                    'post_type' => 'howto',
                    'numberposts' => 1, 
                    'category'   => $cat->term_id 
                );
                $catPost = get_posts($arg); @endphp
                <option value="{{ get_permalink($catPost[0]) }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        {{-- <p>Or check out <a href="/statewide-voting-information">statewide voting information</a>.</p> --}}
    </div>
    <img src="@asset('images/cc-ballot.png')" class="ballot" />
<img src="{{ $data['counties']['illustration']['url'] }}" class="mailbox" />
</section>


{{-- EVENTS --}}
@php $events = tribe_get_events() @endphp
@if($events)
<section id="dates">
    <div class="container">
        <h3>{{ $data['key_dates']['title'] }}</h3>
        <div class="wrap">
            @foreach ($events as $event)
            <div class="date-wrap row">
                <div class="date col-md-4">
                    <h4>{{ date('M j', strtotime($event->event_date)) }}</h4>
                </div>
                <div class="text col-md-8">{{ $event->post_title }}</div>
            </div>
            @endforeach
        </div>
        <footer>
            <a class="button blue" href="/calendar">Full Calendar</a>
        </footer>
    </div>
</section>
@endif

<section id="newsletter">
    <div class="container">
        <h3>{!! $data['newsletter']['text'] !!}</h3>
        @include('partials.newsletter-signup')
        <div class="success">
            {{ $data['newsletter']['success_message']}}
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
        <a class="button" href="/about">Learn More</a>
    </div>
</section>