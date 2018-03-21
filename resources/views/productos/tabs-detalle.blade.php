  @extends('templates.app-admin')

  @section('contenido-app')

  <br>

  <div class="row" >
   <div class="col-sm-12">
    <div class="card" width="100%">
           <div class="card-header">
      <h4>{{ $Tab[0]->nom_producto}}</h4>
          <a href="#" class="btn btn-success btn-sm pull-right">
       <i class="fa fa-pencil-square-o"></i> Crear Nueva Tab </a>
     </div>

     <div class="card-body">

      <form class="form-inline">

       <div class="form-group">
        <label for="inlineFormInput"  >Nombre  Tab : &nbsp;  </label>
        <input id="inlineFormInput" type="text"  class="mr-5 form-control" value="{{ $Tab[0]->nombre_tab}}">
       </div>

       <div class="form-group">
        <label for="inlineFormInputGroup"  >Orden : &nbsp;  </label>
        <input id="inlineFormInputGroup" type="text"    value="{{ $Tab[0]->orden_tab}}" class="mr-3 form-control">
       </div>

       <div class="form-group">
        <textarea width="100%" class="summernote" > {{$Tab[0]->informacion_tab }} </textarea>
       </div>


     </div>

        <div class="form-group">
        &nbsp;  <button class="btn btn-primary "> Grabar Tab </button>
     </div>

</form>
    </div>
   </div>
  </div>

  @endsection



