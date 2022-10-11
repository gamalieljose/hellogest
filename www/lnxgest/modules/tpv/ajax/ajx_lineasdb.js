function actulineadb(waccion, widlinea, wvalor) 
{
    
    $.ajax({

    type   : 'POST',
    url     : "modules/tpv/ajax/ajx_lineasdb.php",
    data    : {accion : waccion, id : widlinea, valor : wvalor},

    success : function (resultado) {

    // response = respuesta del servidor.
   response = JSON.parse(resultado);
/*
   var imprimeihtml	= "";		

   document.getElementById('lineasrs').innerHTML = "";
    for (nlinea in response) {

           imprimeihtml = imprimeihtml + response[nlinea];


           }
*/

    
           document.getElementById('lineasrs').innerHTML = response["imprimelineas"];	
           document.getElementById("tpv-total").innerHTML = response["importetotal"];   
           document.getElementById("tpv_baseimponible").innerHTML = response["baseimponible"];
           document.getElementById("tpv_impuestos").innerHTML = response["sumaimpuestos"];
    }

});


}

