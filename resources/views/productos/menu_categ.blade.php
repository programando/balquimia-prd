
<div class="row" id="body-row">

    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">

        <ul class="list-group">

              @php
                    $IdMenuPadreIni =  $Menus[0]['idmenuPadre'];
              @endphp

              @foreach( $Menus  as  $Menu  )
                  @php
                    $IdMenuPadre =  $Menu['idmenuPadre'];
                    $TextMenu    =  $Menu['menu']  ;
                    $TextMenu    = ucfirst( strtolower( $TextMenu ) );
                  @endphp

                  @if ( $IdMenuPadreIni != $IdMenuPadre )
                    @php  $IdMenuPadreIni =  $IdMenuPadre;  @endphp
                      </div>
                  @endif


                 @if ( $Menu['idmenu'] > 0 )
                     <a href="#submenu{{ $Menu['idmenuPadre'] }}" data-toggle="collapse" aria-expanded="false"
                              class=" list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-start align-items-center">
                              <span class="menu-collapsed"><strong>{{ $TextMenu }}</strong></span>
                              <span class="submenu-icon ml-auto"></span>
                          </div>
                       </a>
                       <div id='submenu{{ $Menu['idmenuPadre'] }}' class="collapse sidebar-submenu">

                      @else
                        <a href="{{ route('productos.categoria', ['idcategoria' => $Menu['idsubmenu'] ] ) }}" class="list-group-item list-group-item-action">
                          <span class="menu-collapsed"> &nbsp; &nbsp; {{ $Menu['submenu'] }} &nbsp; </span>
                          <span class="bage badge-right badge-rounded bg-green"> &nbsp;
                          <small> &nbsp;  {{ $Menu['cantidad']}}  &nbsp;   </small> &nbsp; </span>


                          </span>

                        </a>


                  @endif


               @endforeach

         </ul>
    </div>
</div>


