<section id="counties" class="{{ $block->classes }}">
    <div class="container">
        <h2>{{ $title }}</h2>
        {!! $text !!}
        <select name="counties" id="selectCounties">
            <option disabled selected>Select Your County</option>
            @foreach ($post_categories as $cat)
                @php $arg = array( 
                    'post_type' => 'howto',
                    'numberposts' => 1, 
                    'category'   => $cat->term_id 
                );
                $catPost = get_posts($arg); @endphp
                @if ($catPost)
                    <option value="{{ get_permalink($catPost[0]) }}">{{ $cat->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <img src="@asset('images/cc-ballot.png')" class="ballot" />
    @if($illustration)
        <img src="{{ $illustration['url'] }}" class="mailbox" />
    @endif
</section> 