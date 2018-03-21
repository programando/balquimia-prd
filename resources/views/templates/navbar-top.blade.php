 <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">

          <!-- Search Box-->

          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand -->

                <a href="{{ route('index') }}" class="navbar-brand">
                  <div class="brand-text brand-big">
                      <span>{{ trans('_app.APP_NAME') }} </span>

                  </div>
                  <div class="brand-text brand-small">
                      <strong>BD</strong>
                  </div>
                </a>

                <!-- Toggle Button-->
                <a id="toggle-btn" href="#" class="menu-btn active">
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                <!-- icon Search
                <li class="nav-item d-flex align-items-center">
                    <a id="search" href="#">
                        <i class="icon-search"></i>
                    </a>
                </li>
                -->

                <!-- Notifications-->
                <!-- Messages  -->

                <!-- Logout    -->
                <li class="nav-item">
                    <a href="{{ route('productos.listado') }}" class="nav-link logout">
                      Productos
                      <i class="fa fa-product-hunt"></i>
                    </a>
                </li>

           <li class="nav-item">
                    <a href="{{ route('cerrar-sistema') }}" class="nav-link logout">
                      Marcas
                      <i class="fa fa-tags"></i>
                    </a>
                </li>

           <li class="nav-item">
                    <a href="{{ route('cerrar-sistema') }}" class="nav-link logout">
                      Banco de Imágenes
                    <i class="fa fa-camera"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cerrar-sistema') }}" class="nav-link logout">
                      Cerrar Sistema
                      <i class="fa fa-sign-out"></i>
                    </a>
                </li>


              </ul>
            </div>
          </div>

        </nav>

      </header>
      <div class="falsoHeader"></div>
