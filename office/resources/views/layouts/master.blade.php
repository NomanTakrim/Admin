<!doctype html>
<html lang="en">
  @include('include.head')

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  @include('include.header')
  @include('include.aside')
    <div class="content-wrapper">

      @yield('content')

    </div>
  @include('include.footer')
  </div>
  @include('include.foot')
</body>

</html>