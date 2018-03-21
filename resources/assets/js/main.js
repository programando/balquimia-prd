
 new Vue ({
   el: '#main' ,

   data:{
        informacion_tab : '',
        nombre_tab : '',
        orden_tab: '',
   },
   methods:{
       BuscarTab: function( IdTab){
         var self = this;
         var TextoHtml = '';
          axios.get('/tabs-detalle/'+IdTab).then( response => {

              self.informacion_tab = response.data[0].informacion_tab;
              self.nombre_tab      = response.data[0].nombre_tab;
              self.orden_tab       =  response.data[0].orden_tab;

              //console.log( self );
          });
       },
   }

});

