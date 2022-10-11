function buscaproductos() 
{
        var widtpv = document.getElementById("hidtpv").value;
        var wbuscaproducto = document.getElementById("txtbuscarproducto").value;
if(wbuscaproducto != '')
{   
$.ajax({

    type   : 'POST',
    url     : "modules/tpv/ajax/ajx_products.php",
    data    : {buscar : wbuscaproducto, idtpv : widtpv},

    success : function (resultado) {

    // response = respuesta del servidor.
   response = JSON.parse(resultado);

   var imprimeimpuesto	= "";		

   document.getElementById('resultadobusqueda').innerHTML = "";
    for (nlinea in response) {

           imprimeimpuesto = imprimeimpuesto + response[nlinea];


           }

           document.getElementById('resultadobusqueda').innerHTML = imprimeimpuesto;	

    }

});
}
else
{    
    document.getElementById('resultadobusqueda').innerHTML = "";
}


}

