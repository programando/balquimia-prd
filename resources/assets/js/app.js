Vue.config.devtools = true;


 $(document).ready(function() {

    $("html , .side-navbar").niceScroll({
      cursorcolor:"#47bc6a",
      cursorwidth:"8px",
    });

    $('.summernote').summernote({
        height: 300,
        width: 1070,
    });

 });



function BuscarEnTabla( Tabla, InputBusqueda  ) {
     // Declare variables
     var input, filter, table, tr, td, i;
     input  = document.getElementById(InputBusqueda);
     filter = input.value.toUpperCase();
     table  = document.getElementById(Tabla);
     tr     = table.getElementsByTagName("tr");

     // Loop through all table rows, and hide those who don't match the search query
     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[0];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }


