



const productos_imagenes = new Vue ({
  el: '#prd-images' ,
  data:{
       DataForm:{},
       errors: new ErrorsController,
       NuevoRegistro: false,
  },

  methods:{
              ProductosImagenesEliminar: function( IdImagen ){
              var URL = '/imagenes/' + IdImagen;
              axios.delete( URL )
              .then( response => {
                    location.href= "/imagenes/" + response.data ;
                  toastr.success('Registro eliminado correctamente!!!');
                   })
              .catch( error => {
                  toastr.error('Registro no puede ser eliminado porque causaría inconsistencias en la base de datos');
              });
       },



  }// Methods


});


