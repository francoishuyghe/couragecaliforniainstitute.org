<header class="banner">
    <a class="brand" href="#">
      <img src="@asset('images/logo_black.png')" class="black"/>
      <img src="@asset('images/logo_white.png')" class="white"/>
    </a>
    <a class="hamburger" href="#">
      <i class="far fa-bars"></i>
      <i class="fal fa-times"></i>
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
</header>
