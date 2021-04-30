<div class="page-header">
  <div class="row">
    <div class="col-md-6">
      <h1>{!! App::title() !!}</h1>
      <div class="cats">
        @php $cats = get_categories() @endphp
        @foreach ($cats as $category)
        @if(strpos($category->name, 'County') == false && $category->name !== 'Uncategorized')
        <a href="{{get_category_link($category->term_id) }}">{{$category->name }}</a>
        @endif
        @endforeach
      </div>
    </div>
      <div class="col-md-6" id="intro">
          {!! the_content() !!}
      </div>
    </div>
</div>
