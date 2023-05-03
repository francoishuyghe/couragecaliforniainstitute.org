<section id="faq" class="{{ $block->classes }}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-md-8">
                @if($questions)
                @foreach ($questions as $question)
                <div class="question drawer-wrap">
                    <div class="drawer-title">
                        <h4>{{ $question['question'] }}</h4>
                    </div>
                    <div class="drawer-content">
                        {!! $question['answer'] !!}
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
