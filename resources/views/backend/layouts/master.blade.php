<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
  <link href="{{ asset('backend') }}/font/Sans-Pro.css" rel="stylesheet">

  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('backend.layouts.navbar')

  @include('backend.layouts.sidebar')

  <div class="content-wrapper">
    <div class="content-header" style="padding: 10px !important;">
      
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  @include('backend.layouts.footer')
</div>


<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/dist/js/adminlte.min.js"></script>

@yield('script')

</body>
</html>
