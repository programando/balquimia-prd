
@extends('templates.app-admin')

@section('contenido-app')
{{--  @keydown="errors.clear(.target.name)" --}}



<div id="main">
    <div class="row align-items-center justify-content-center">
    <div class="col-sm-5 ">

      {!! Form::open( ['url'=> route('productos.imagenes.save'),'files'=> true  ] ) !!}
      <div class="client card">
                <div class="card-header">
          <h3> {{ $NomProducto }}</h3>
        </div>
        <div class="card-body text-center">

            <div class="form-group">
              <img src="  {{ FolderImages232x232().'/tron_162_25187491422.jpg' }} ">
            </div>

          <div class="form-group">
            {!! Form::file('imagen',
              [
                'class'         => 'filestyle',  'data-text'     => 'Cambiar imagen',
                'data-size'     => 'nr',
                'data-btnClass' => 'btn-success',
              ])
              !!}
               @if ( $errors->has('imagen') )
                    <div class="text-danger"><i class='fa fa-exclamation-circle'></i> {{ $errors->first('imagen') }} </div>
              @endif
            </div>

            {{ Form::hidden('idproducto', $IdProducto  ) }}


            {{--Botón Submit =====================================================================================--}}
            <button type ="submit" class="btn btn-primary btn-block"> Actualizar </button>
            {{-- /Botón Submit ===================================================================================== --}}
          </div>
        </div>

        {!! Form::close() !!}

  </div>
</div>


</div>

@endsection

