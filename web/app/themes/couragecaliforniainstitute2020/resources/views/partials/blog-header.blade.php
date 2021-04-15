<div class="page-header">
  <h1>{!! App::title() !!}</h1>
  <div class="cats">
    @php $cats = get_categories() @endphp
    @foreach ($cats as $category)
      @if(strpos($category->name, 'County') == false)
        <a href="{{get_category_link($category->term_id) }}">{{$category->name }}</a>
      @endif
    @endforeach
  </div>
</div>
