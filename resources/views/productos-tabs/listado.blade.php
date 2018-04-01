@extends('templates.app-admin')
@section('contenido-app')

<div id="main">

  <div class="row">
    <div class="col-sm-3">
      <div class="table-responsive">
       @if ( count($Tabs) > 0 )
          <table class="table table-striped table-sm" id="table">
            <thead>
              <tr>
                <th>Nombre Tab</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $Tabs as $Tab)
              <tr>
                <td> {{ $Tab->nombre_tab }}  </td>
                <td width="10px">
                  <button class="btn btn-primary btn-xs" v-on:click="TabShow( {{ $Tab->idtab }})">
                   <i class="fa fa-pencil"></i> &nbsp; Editar &nbsp;&nbsp; </button>
                 </td>
                 <td width="10px">
                  <button class="btn btn-danger btn-xs" v-on:click="TabDelete( {{ $Tab->idtab }}) ">
                   <i class="fa fa-times"></i> &nbsp; Eliminar  </button>
                 </td>
               </tr>
               @endforeach
             </tbody>
           </table>
        @endif
         <br>
         <button class="btn btn-success btn-sm" :disabled="NuevoRegistro" @click="TabnewRecord( {{ $IdProducto}} )">
           <i class="fa fa-plus-circle"></i> &nbsp; Crear Nueva Tab
         </button>
       </div>
     </div>



     {{-- Columna de la tab  --}}
     <div class="col-sm-9">
      <div class="card">
       <div class="card-header">
        @if ( isset( $Tab->nom_producto))
            <h4>{{ $Tab->nom_producto }}</h4>
        @endif
      </div>

      <div class="card-body">
                <form class="form-horizontal" method="POST" v-on:submit.prevent="TabUpdate()"
                    @keydown="errors.clear($event.target.name)">
                    {{ csrf_field() }}

                    <div class="row">
                      <div class="col-sm-8" >
                        <div class="form-group row">
                         <label class="col-sm-3 form-control-label">Nombre  Tab : </label>
                         <div class="col-sm-9">
                          <input type          = "text"
                          id           = "nombre_tab"
                          name         = "nombre_tab"
                          class        = "form-control"
                          v-model      = "DataForm.nombre_tab"
                          v-bind:class = "{ 'is-invalid': errors.has('nombre_tab')}">
                          <span class="text-danger" v-text="errors.get('nombre_tab')" v-if="errors.has('nombre_tab')"></span>
                          <input type="hidden" id="idproducto" v-model="DataForm.idproducto">
                          <input type="hidden" id="NuevoRegistro" v-model="NuevoRegistro">
                        </div>
                      </div>
                  </div>

                <div class="col-sm-4" >
                  <div class="form-group row">
                   <label class="col-sm-4 form-control-label">Orden :  </label>
                   <div class="col-sm-8">
                    <input type="text"
                    id="orden_tab"
                    name="orden_tab"
                    class="form-control "
                    v-model="DataForm.orden_tab"
                    v-bind:class = "{ 'is-invalid': errors.has('orden_tab')}" >
                    <span class="text-danger" v-text="errors.get('orden_tab')" v-if="errors.has('orden_tab')"></span>
                  </div>
                </div>
              </div>

              <div class="col-ms-12">
               <div class="form-group">
                 <textarea class="summernote" id="summernote" >   </textarea>
               </div>
             </div>
           </div>

           <div class="form-group">
            <button  type="submit" class="btn btn-primary btn-sm" v-bind:disabled="errors.any()"> Actualizar Información Tab </button>
          </div>

        </form>

      </div>
    </div>
  </div>


</div>


</div>


@endsection





