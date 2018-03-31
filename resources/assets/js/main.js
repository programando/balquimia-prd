
 new Vue ({
   el: '#main' ,

   data:{
        idproducto          : '',
        idtab               : '',
        informacion_tab     : '',
        nombre_tab          : '',
        orden_tab           : '',
        errors              : [],
   },
   methods:{
       TabBuscar: function( IdTab){
         var self = this;
          axios.get('/tabs-detalle/'+IdTab).then( response => {
              self.idproducto      = response.data[0].idproducto;
              self.idtab           = response.data[0].idtab;
              self.informacion_tab = response.data[0].informacion_tab;
              self.nombre_tab      = response.data[0].nombre_tab;
              self.orden_tab       = response.data[0].orden_tab;
              $("#summernote").summernote("code", self.informacion_tab);
          });
       },

       TabActualziar: function(){
              var self             = this;
              self.informacion_tab = $("#summernote").summernote("code");
              axios.post('/tabs',{
                idtab:           self.idtab,
                informacion_tab: self.informacion_tab,
                nombre_tab:      self.nombre_tab,
                orden_tab:       self.orden_tab,
                idproducto:      self.idproducto
              }).then( response => {
                    toastr.success('Registro actualizado con éxito');
                    location.href="/tabs/" +self.idproducto;
              }).catch ( error => {
                      self.errors     = error.response.data.errors.nombre_tab;
              });
            },
      TabCrearNueva: function( IdProducto ){
            location.href="/tabs/" + IdProducto;

      },
   }

});


