const Tabs = new Vue ({
  el: '#main' ,
  data:{
       TabInfo:{},
       errors:[],
  },
  methods:{
       Show: function( IdTab){
         var self = this;
          axios.get('/tabs-detalle/'+IdTab).then( response => {
              self.TabInfo = response.data[0] ;
               $("#summernote").summernote("code", self.TabInfo.informacion_tab);
          });
       },
       Delete: function( IdTab ){
              var URL = '/tabs/' + IdTab;
              axios.delete( URL )
              .then( response => {
                  location.href="/tabs/" + response.data ;
                  toastr.success('Registro eliminado correctamente!!!');
                   })
              .catch( error => {
                  toastr.error('Registro no puede ser eliminado porque causaría inconsistencias en la base de datos');
              });
            },
       TabUpdateOld: function(){
              var self             = this.TabInfo;
              self.informacion_tab = $("#summernote").summernote("code");
              axios.post('/tabs',{ $FormData:  self   })
              .then( response => {
                    toastr.success('Registro actualizado con éxito');
                    //location.href="/tabs/" +self.idproducto })
                   })
              .catch ( error => {
                      self.errors     = error.response.data.errors;
              });
            },
       TabUpdate: function(){
              var self             = this.TabInfo;
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
                  idproducto:      self.idproducto
                })
              .then( response => {
                    toastr.success('Registro actualizado con éxito');
                    location.href="/tabs/" +self.idproducto;
                   })
              .catch ( error => {
                      this.errors    = error.response.data.errors;
              });

            },


  }// Methods


});


