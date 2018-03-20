/* MI APP.JS  */




 new Vue ({
   el: '#perfiles5' ,
   mounted : function(){
      this.PerfilesListar();
      this.MarcasListar();
   },

   data: {
            perfiles    : [],
            marcas      : [],
            errors      : [],
            UpdPerfiles : {'IdPerfil':'', 'NomPerfil':'', 'Inactivo': '0'},
            nom_perfil: '',
            nom_mrca  : '',
            uso_domest: 0,


   },
   methods: {

            MarcasListar: function(){
                var self = this;
                axios.get('marcas.show').then( response => {
                    self.marcas = response.data
                });
              },

            PerfilesListar: function(){
                var self = this;
                axios.get('perfiles.show').then( response => {
                    self.perfiles = response.data
                });
              },

            MarcasCrear: function(){
              var self = this;
              axios.post('marcas',{
                nom_perfil: self.nom_perfil,
                uso_domest: self.uso_domest
              }).then( response => {
                    self.MarcasListar();
                    self.nom_perfil = '';
                    self.errors    = [];
                    $('#create').modal('hide');
                    toastr.success('Registro creado con éxito');
              }).catch ( error => {
                      self.errors     = error.response.data.errors.nom_perfil;
              });
            },

            PerfilesCrear: function(){
              var self = this;
              axios.post('perfiles',{
                nom_perfil: self.nom_perfil
              }).then( response => {
                    self.PerfilesListar();
                    self.nom_perfil = '';
                    self.errors    = [];
                    $('#create').modal('hide');
                    toastr.success('Registro creado con éxito');
              }).catch ( error => {
                      self.errors     = error.response.data.errors.nom_perfil;
              });
            },

            PerfilesCrearBtnCancelar: function(){
              var self        = this;
              self.nom_perfil = '';
              self.errors     = [];
            },


            PerfilesBorrar: function( IdPerfil ){
              var self = this;
              var URL = 'perfiles/' + IdPerfil;
              axios.delete( URL ).then( response => {
                  toastr.success('Registro eliminado correctamente!!!');
                  this.PerfilesListar();
              });
            },

            //Mostrar el formulario de editar registro.
            PerfilesEditar: function( objPefil ){
                this.UpdPerfiles.IdPerfil  = objPefil.id_perfil;
                this.UpdPerfiles.NomPerfil = objPefil.nom_perfil;
                this.UpdPerfiles.Inactivo  = objPefil.inactivo;
                $('#edit').modal('show');
            },

            // Actualizar la base de datos
            PerfilesActualizar: function( IdPerfil ){
              var self = this;
              var URL = 'perfiles/' + IdPerfil;
              axios.put( URL, self.UpdPerfiles).then( response => {
                  self.PerfilesListar();
                  self.UpdPerfiles = {'IdPerfil':'', 'NomPerfil':'', 'Inactivo':''},
                  self.errors = [];
                  $('#edit').modal('hide');
                  toastr.success('Registro actualizado con éxito!!!');
              }).catch ( error =>{
                  self.errors     = error.response.data.errors.NomPerfil;
              });

            },

 }
});


/*
// aquí vamos con el componente de perfiles

Vue.component("perfiles", {
 data: function() {
  return {
   perfiles: []
  }
 },
 mounted: function () {
  var self = this
  axios.get("/profiles/get").then(function(response) {
   self.perfiles = response.data
  })
 },
 template: "<ul>"+
              "<li v-for='perfil in perfiles'>{{ perfil.nom_perfil }}" +
               "<p><button @click='eliminar(perfil.id_perfil)'>Eliminar {{ perfil.id_perfil }}</button></p>" +
              "</li>" +
           "</ul>"
,
 methods: {
  eliminar: function (id) {
   var self = this
   axios.delete("/perfiles/" + id).then(function(response) {
    if (response.data.success) {
     // enviaremos la variable success desde php para validar que se eliminó
     // en lugar de mostrar en consola, removeremos el objeto correspondiente a eese registro
     // se puede hacer de una manera más fácil, pero la idea es aprender lo difícil
     var index
     for (i in self.perfiles) {
      if (self.perfiles[i].id_perfil === response.data.deleted) {
       index = i
       break
      }
     }
     self.perfiles.splice(index, 1)
    }
   })
  }
 }
})

 new Vue ({
   el: '#perfiles' ,

   data: {

   },

});
*/

