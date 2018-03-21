  @extends('templates.app-admin')

  @section('contenido-app')


  <br>

 <div id="main">
  <div class="row">
   <div class="col-sm-3">
    <div class="card">
     <div class="card-header">
      <h4>Tabs Producto</h4>
     </div>
     <div class="card-body">
      @foreach ( $Tabs as $Tab )


         <a href=" {{ route('productos.tab.detalle', $Tab->idtab) }}" >
            {{ $Tab->nombre_tab }}
         </a>

 {{--
         <a href="" @click.prevent="BuscarTab( {{ $Tab->idtab}})">
            {{ $Tab->nombre_tab }}
         </a>

--}}
      <br>
      @endforeach

     </div>
    </div>

   </div>
{{--   <div class="col-sm-9">


    <div class="card">

     <div class="card-body">

      <form class="form-inline">

       <div class="form-group">
        <label for="inlineFormInput"  >Nombre  Tab : &nbsp;  </label>
        <input id="inlineFormInput" type="text"  v-model="nombre_tab" class="mr-5 form-control">
       </div>
       <div class="form-group">
        <label for="inlineFormInputGroup"  >Orden : &nbsp;  </label>
        <input id="inlineFormInputGroup" type="text" v-model="orden_tab" class="mr-3 form-control">
       </div>

       <div class="form-group">
        <textarea class="summernote"  :value="nombre_tab"> @{{ nombre_tab }}  </textarea>
       </div>


       <div class="form-group">
       <button> Grabar</button>
      </div>

      </form>

     </div>

    </div>

   </div>
   --}}


  </div>
  </div>
  @endsection



