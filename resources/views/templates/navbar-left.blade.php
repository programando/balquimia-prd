<!-- Side Navbar -->
<nav class="side-navbar">
  <!-- Sidebar Header-->

  <div class="sidebar-header d-flex align-items-center">
    <a href="{{ route('modify-image') }}">
    <div class="avatar">

      @if( User()->imagen == '' )
         <img src="{{ asset('admin/img/avatar.svg') }}" alt="Cambiar imagen" class="img-fluid rounded-circle">
         @else
         <img src="{{ asset("storage/images/50x50"). User()->imagen }}" alt="Cambiar Imagen" class="img-fluid rounded-circle">
      @endif


      {{--<img src="@if ( User()->imagen == '') ? {{ asset('admin/img/avatar-1.jpg') }} : User()->imagen; @endif"
        alt="..." class="img-fluid rounded-circle">
        --}}


    </div>
    </a>
    <div class="title">
      <h1 class="h5">{{ User()->nom_usua }}</h1>
      {{-- <p>Cerrar Sistema</p> --}}
    </div>
  </div>

  <!-- Sidebar Navidation Menus <span class="heading">Main</span> -->
  <ul class="list-unstyled">

    <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse">
          <i class="icon-interface-windows"></i>
            Configuración
        </a>
        <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
          <li class="active">
                <a href="{{ route('perfiles.index') }}" >
                      Perfiles/Cargos
                </a>
          </li>

          <li class="">
                <a href="{{ route('marcas.index') }}" >
                      Marcas
                </a>
          </li>


        </ul>
    </li>



  <!-- Sidebar Navidation Menus <span class="heading">Main</span> -->
 {{-- <ul class="list-unstyled">

        @php
            $menus = Session::get('menus');
        @endphp

          @foreach ($menus as $key => $item)
              @if ($item['parent'] != 0)
                  @break
              @endif
              @include('partials.menu-item', ['item' => $item])

          @endforeach


  </ul>



  <span class="heading">Extras</span>

--}}


</nav>
