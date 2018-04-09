
@extends('templates.app-admin')

@section('contenido-app')


  <div class="row">
    <div class="col col-3">

    </div>

    <div class="col col-9">
      <label for="buscar">Buscar Producto </label>
      <input type="text" class="form-control" id="input_buscar" onkeyup="BuscarEnTabla('table','input_buscar')">
    </div>

  </div>


  <div class="row"  >
    <div class="col-sm-3">
          <h2>Tipos de Productos</h2>
          <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $Categorias as $Categoria)
                <tr name='cats'>
                  <td>
                   <a href="{{ route('productos.categoria', ['idcategoria' => $Categoria->idorden_nv_2 ] ) }}">
                  <div class="badge badge-rounded bg-green "> &nbsp; {{ $Categoria->cantidad }}  &nbsp;     </div>  &nbsp;
                     {{ $Categoria->orden_nivel_2 }}  </div>

                      </a>
                 </td>
                </tr>
                @endforeach
              </tbody>

           </table>

    </div>
    <div class="col-sm-9">

    <table class="table table-striped" id="table">
      <thead>
        <tr>
          <th>Nombre Producto</th>
          <th>Presentación</th>
          <th>Marca</th>
          <th>Precio Tron</th>
          <th>Precio Ocasional</th>
          <th>Tabs</th>
          <th>Imágenes</th>
          <th>Estado</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach ( $Productos as $Producto)

        <tr>
          <td> {{ $Producto->nom_producto             }} </td>
          <td> {{ $Producto->nompresentacion          }} </td>
          <td> {{ $Producto->nom_marca                }} </td>
          <td> {{ number_format( $Producto->pv_tron, 0, '.', ',' ) }} </td>
           <td> {{ number_format( $Producto->pv_ocasional, 0, '.', ',' ) }} </td>
          <td>
            <h4>
            <a href="{{route('tabs.show', $Producto->idproducto )}} ">
            <div class="badge badge-rounded bg-green text-small"> &nbsp; {{ $Producto->cant_tabs}} Tabs  &nbsp;    </div>
            </a>
            </h4>
          </td>

          <td>
           <h4>
            <a href="{{route('productos.imagenes.show',['IdProducto' =>$Producto->idproducto ] ) }}">
            <div class="badge badge-rounded bg-orange text-small"> &nbsp; {{ $Producto->cant_imagenes }} Imágenes  &nbsp;    </div>
            </a>
            </h4>
          </td>

          <td>
           <h4>
            @if( $Producto->inactivo=='1' )
              <div class="badge badge-rounded bg-red text-small"> &nbsp;   Inactivo  &nbsp;    </div>
              @else
              <div class="badge badge-rounded bg-blue text-small"> &nbsp;   Activo  &nbsp;    </div>
            @endif
            </h4>
          </td>

        </tr>
        @endforeach


      </tbody>

    </table>
  </div>
</div>

@endsection

