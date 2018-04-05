<style>
.rojo{
  background-color: red;
}
.verde{
  background-color: green;
}

.bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn){
  width: 190px !important;

}

</style>
@extends('templates.app-admin')

@section('contenido-app')
{{--  @keydown="errors.clear(.target.name)" --}}

<div id="main">
  <div class="card">
    <div class="card-header">
      Nombre de Producto
    </div>
    <div class="card-body">
      <form   method="POST" v-on:submit.prevent="Update()" >
        {{ csrf_field() }}
        <div class="row ">

          <div class="col-sm-7">
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Nombre Largo: </label>
              <div class="col-sm-9">
                <input type          = "text"
                id           = "nombre_tab"
                name         = "nombre_tab"
                class        = "form-control"
                v-model      = "DataForm.nombre_tab"
                v-bind:class = "{ 'is-invalid': errors.has('nombre_tab')}">
                <span class="text-danger" v-text="errors.get('nombre_tab')" v-if="errors.has('nombre_tab')"></span>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Nombre  Corto : </label>
              <div class="col-sm-9">
                <input type          = "text"
                id           = "nombre_tab"
                name         = "nombre_tab"
                class        = "form-control"
                v-model      = "DataForm.nombre_tab"
                v-bind:class = "{ 'is-invalid': errors.has('nombre_tab')}">
                <span class="text-danger" v-text="errors.get('nombre_tab')" v-if="errors.has('nombre_tab')"></span>
              </div>
            </div>


            <div class="row">
              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label">Presentación :</label>
                  <div class="col-sm-6">

                    <select class="selectpicker">
                      <option value="0 ">{{'Seleccione una '}}</option>
                      @foreach( $Presentaciones as $Presentacion )
                      <option value="{{ $Presentacion->idpresentacion}} ">{{ $Presentacion->nompresentacion}}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
              </div>

              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label">Peso en gramos :</label>
                  <div class="col-sm-6">
                    <input type          = "text"
                    id           = "nombre_tab"
                    name         = "nombre_tab"
                    class        = "form-control"
                    v-model      = "DataForm.nombre_tab"
                    v-bind:class = "{ 'is-invalid': errors.has('nombre_tab')}">
                    <span class="text-danger" v-text="errors.get('nombre_tab')" v-if="errors.has('nombre_tab')"></span>
                  </div>
                </div>
              </div>
            </div>


            <div class="row ">
              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label">Marca :</label>
                  <div class="col-sm-6">
                    <select class="selectpicker">
                          @foreach( $Marcas  as   $Marca)
                                 <option value="{{ $Marca->idmarca}} "> {{ $Marca->nom_marca }}</option>
                          @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label"> Fragancia/Referencia: </label>
                  <div class="col-sm-6">
                    <input type          = "text"
                    id           = "nombre_tab"
                    name         = "nombre_tab"
                    class        = "form-control"
                    v-model      = "DataForm.nombre_tab"
                    v-bind:class = "{ 'is-invalid': errors.has('nombre_tab')}">
                    <span class="text-danger" v-text="errors.get('nombre_tab')" v-if="errors.has('nombre_tab')"></span>
                  </div>
                </div>
              </div>
            </div>   {{-- /row --}}


            <div class="row ">
              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label">Clase :</label>
                  <div class="col-sm-6">
                    <select class="selectpicker">
                      <option>Mustard</option>
                      <option>Ketchup</option>
                      <option>Relish</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label"> Nivel 1: </label>
                  <div class="col-sm-6">
                    <select class="selectpicker">
                      <option>Mustard</option>
                      <option>Ketchup</option>
                      <option>Relish</option>
                    </select>

                  </div>
                </div>
              </div>
            </div>   {{-- /row --}}

            <div class="row ">
              <div class="col-sm-6 ">
                <div class="form-group row">
                  <label class="col-sm-6 form-control-label">Nivel 2 :</label>
                  <div class="col-sm-6">
                    <select class="selectpicker">
                      <option>Mustard</option>
                      <option>Ketchup</option>
                      <option>Relish</option>
                    </select>

                  </div>
                </div>
              </div>

            </div>   {{-- /row --}}

            <div class="form-group">
              <label class="form-control-label">Descripción</label>
              <textarea  class="form-control"> </textarea>
            </div>


          </div>






          <div class="col-sm-5" >
                <div class="row">
                      <div class="col-sm-12 text-center">

            <div class="form-group">
              <img src="  {{ FolderImages232x232().'/tron_162_25187491422.jpg' }} ">
            </div>
            </div>
                <input type="file" class="filestyle" >
            </div>

            <br>


            <div class="form-group">
              <label class="form-control-label">Etiquetas de búsqueda</label>
              <textarea  class="form-control"> </textarea>
            </div>

          </div>
        </div>

        <div class="form-group">
          <button  type="submit" class="btn btn-primary pull-right" v-bind:disabled="errors.any()"> Actualizar Información Producto </button>
        </div>

      </form>
    </div>

    <div>

    </div>   {{-- div.id vue --}}

    @endsection

