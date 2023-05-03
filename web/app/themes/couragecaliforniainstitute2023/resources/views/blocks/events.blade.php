@if(function_exists('tribe_get_events'))
    @php $events = tribe_get_events() @endphp
    @if($events)
    <section id="dates" class="{{ $block->classes }}">
        <div class="container">
            <h3>{{ $title }}</h3>
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
                <a class="button blue" href="/calendar">{{ $button }}</a>
            </footer>
        </div>
    </section>
    @endif
@endif