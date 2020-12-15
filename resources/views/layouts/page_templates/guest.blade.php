@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('https://images.pexels.com/photos/3639181/pexels-photo-3639181.jpeg?crop=entropy&cs=srgb&dl=pexels-castorly-stock-3639181.jpg&fit=crop&fm=jpg&h=1280&w=1920'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>
