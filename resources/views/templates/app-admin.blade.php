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

        <div class="content-inner">

          <section class="yes-padding-top">

            <div class="container-fluid">
                 @yield('contenido-app')
            </div>

          </section>




        </div>
      </div>
    </div>


    @include('templates.js')
    @include('alerts.msg-tostr')


</body>
</html>
