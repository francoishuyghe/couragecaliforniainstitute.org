<div class="page-header">
  <h1>{{ the_title() }}</h1>
  {!! the_content() !!}
  <div class="cats">
      @php $cats = get_categories() @endphp
      @foreach ($cats as $category)
      @if(strpos($category->name, 'County') == false && $category->name !== 'Uncategorized')
      <a href="{{get_category_link($category->term_id) }}">{{$category->name }}</a>
      @endif
      @endforeach
  </div>
</div>
