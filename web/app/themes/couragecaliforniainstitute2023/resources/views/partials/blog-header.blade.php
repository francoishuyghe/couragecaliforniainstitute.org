<div class="page-header">
  <h1>{{ the_title() }}</h1>
  {!! the_content() !!}
  <div class="cats">
      @php $cats = get_terms( 'category', array(
        'parent'    => 65,
        'hide_empty' => false
      )); 
    @endphp
      @foreach ($cats as $category)
        <a href="{{get_category_link($category->term_id) }}" data-cat="{{ $category->slug }}" @if($category->count > 0)class="available"@endif>{{$category->name }}</a>
      @endforeach
  </div>
</div>
