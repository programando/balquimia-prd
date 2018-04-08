class ErrorsController {

    constructor() {
        this.ErrorsController      = {};
       }

    get( field ){
       if ( this.ErrorsController[field]){
        return this.ErrorsController[field][0];
       }
    }
    record( errors ){
        this.ErrorsController = errors;
    }

   clear ( field ){
      delete this.ErrorsController[field] ;
     }

   has ( field){
      return this.ErrorsController.hasOwnProperty( field );
   }

   any(){
       return Object.keys(this.ErrorsController).length > 0 ;
   }
}




const Tabs = new Vue ({
  el: '#main' ,
  data:{
       DataForm:{},
       errors: new ErrorsController,
       NuevoRegistro: false,
  },

  methods:{
       TabShow: function( IdTab){
         var self = this;
          axios.get('/tabs-detalle/'+IdTab).then( response => {
              self.DataForm = response.data[0] ;
               $("#summernote").summernote("code", self.DataForm.informacion_tab);
          });
       },



       TabDelete: function( IdTab ){
              var URL = '/tabs/' + IdTab;
              axios.delete( URL )
              .then( response => {
                  this.toUrl(response.data  );
                  toastr.success('Registro eliminado correctamente!!!');
                   })
              .catch( error => {
                  toastr.error('Registro no puede ser eliminado porque causaría inconsistencias en la base de datos');
              });
            },

       TabTabUpdateOld: function(){
              var self             = this.DataForm;
              self.informacion_tab = $("#summernote").summernote("code");
              axios.post('/tabs', self  )
              .then( response => {
                    toastr.success('Registro actualizado con éxito');
                   })
              .catch ( this.onFail);
            },

       TabUpdate: function(){
              var self             = this.DataForm;
              if ( $.isEmptyObject(self ) ) {
                 toastr.error('Seleccione una de las tabs para actualizar su información');
                 return ;
              }
              self.informacion_tab = $("#summernote").summernote("code");
              axios.post('/tabs',{
                  idtab:           self.idtab,
                  informacion_tab: self.informacion_tab,
                  nombre_tab:      self.nombre_tab,
                  orden_tab:       self.orden_tab,
                  idproducto:      self.idproducto,
                  NuevoRegistro:   this.NuevoRegistro
                })
              .then( response => {
                    toastr.success('Registro grabado / actualizado con éxito');
                    //location.href="/tabs/" +self.idproducto;
                    this.toUrl ( self.idproducto) ;
                    this.NuevoRegistro = false;
                   })
              .catch ( this.onFail );
            },


       onFail: function (error){
              this.errors.record( error.response.data.errors);
           },

       TabnewRecord: function( IdProducto){
           this.NuevoRegistro = true ;
           $("#summernote").summernote("code", "");
           $("#nombre_tab").focus();
           this.DataForm.idproducto = IdProducto;
       },

       toUrl: function( Url ){
         location.href= "/tabs/" + Url ;
       },

/*
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
       */


  }// Methods


});


