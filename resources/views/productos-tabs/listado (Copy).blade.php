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
             <a href="" @click.prevent="TabBuscar( {{ $Tab->idtab}} )">
                {{ $Tab->nombre_tab }}
             </a>
             <br>
          @endforeach
       </div>
    </div>
    <div class="form-group">
      <button class="btn btn-success" @click="TabCrearNueva({{ $Tab->idproducto }}  )"> Crear Nueva Tab </button>
    </div>


   </div>


   <div class="col-sm-9">
    <div class="card">
         <div class="card-header">
      <h4>{{ $Tab->nom_producto }}</h4>
     </div>
     <div class="card-body">
      <form class="form-inline" method="POST" v-on:submit.prevent="TabActualziar()">
          {{ csrf_field() }}

           <div class="form-group">
                <label for="inlineFormInput"  >Nombre  Tab : &nbsp;  </label>
                <input id="inlineFormInput" type="text"  v-model="nombre_tab" class="mr-5 form-control">
                <span v-for="error in errors" class="form-control is-invalid">@{{ error }}</span>

                <input  name="idtab"    type="hidden"  v-model="idtab" >
                <input id="idproducto" name="idproducto"    type="hidden"  v-model="idproducto"  >
           </div>

           <div class="form-group">
               <label for="inlineFormInputGroup"  >Orden : &nbsp;  </label>
                <input id="inlineFormInputGroup" type="text" v-model="orden_tab" class="mr-3 form-control">
           </div>

           <div class="form-group">
                 <textarea class="summernote" id="summernote" >   </textarea>
           </div>


           <div class="form-group">
                <button  type="submit" class="btn btn-primary"> Actualizar Información Tab </button>
                 &nbsp;<button  type="submit" class="btn btn-danger"> Borrar Tab </button>
          </div>

      </form>
     </div>
    </div>
   </div>



  </div>
  </div>
  @endsection



