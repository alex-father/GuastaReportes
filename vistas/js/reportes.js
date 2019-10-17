



$(".tablas").on("click", ".btnImprimirReporte", function(){


    var codigoReporte = $(this).attr("codigoReporte");


      window.open("extensiones/tcpdf/pdf/reporte.php?codigo="+codigoReporte, "_blank");


})