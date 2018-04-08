@extends('templates.app-admin')
@section('contenido-app')


  <div id="prd-images">
      <div class="row align-items-center justify-content-center">
        <div class="col-sm-8 ">
            {!! Form::open( ['url'=> route('productos.imagenes.save'),'files'=> true  ] ) !!}
             <div class="client card">
                <div class="card-header">
                  <h3> {{ $NomProducto }} </h3>
                </div>
                <div class="card-body text-center">
                    <article class="row">
                        @foreach( $Imagenes  as $Imagen   )
                          <article class="col-md-4">
                            <img src="  {{'http://www.balquimiaventasonline.com/public/images/productos/150x150/'. $Imagen->nombre_imagen }} ">
                            <buttom type ="buttom" class="btn btn-danger btn-sm"
                              v-on:click="ProductosImagenesEliminar( {{ $Imagen->idimagen }} )"> Eliminar </buttom>
                           </article>
                       @endforeach
                    </article>
                    <br>
                     <br>
                      <div class="row align-items-center">
                         <div class="col-sm-6"  >
                         <div class="form-group">
                              {!! Form::file('imagen',
                                [
                                  'class'         => 'filestyle',  'data-text'     => 'Agregar imagen',
                                  'data-size'     => 'nr',
                                  'data-btnClass' => 'btn-success',
                                ])
                                !!}
                             @if ( $errors->has('imagen') )
                                <div class="text-danger"><i class='fa fa-exclamation-circle'></i> {{ $errors->first('imagen') }} </div>
                             @endif
                        </div>
                      </div>
                      <div class="col-sm-6"  >

                        <div class="form-group">
                          <button type ="submit" class="btn btn-primary btn-block"> Agregar nueva imagen al producto  </button>
                        </div>
                      </div>
                    </div>

                </div>
               </div>
                {{ Form::hidden('idproducto', $IdProducto  ) }}
            {!! Form::close() !!}
       </div>
    </div>
  </div>



  @endsection

