    $(document).ready(function () {


    var alto = $(window).height();
    $("nav.side-navbar").height(alto-70);



    $( window ).resize(function() {
        var alto = $(window).height();
        $("nav.side-navbar").height(alto-70);
    });

});
