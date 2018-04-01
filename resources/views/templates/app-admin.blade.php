<!DOCTYPE html>
<html>
<head>
  @include('templates.metas')
  @include('templates.css')
</head>
<body>


    <div class="page">
      @include('templates.navbar-top')

      <div class="page-content d-flex align-items-stretch">

            <div class="container-fluid">
                  <br>
                 @yield('contenido-app')
            </div>

      </div>
    </div>


    @include('templates.js')
    @include('alerts.msg-tostr')


</body>
</html>
