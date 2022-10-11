function muestracat(idcat) 
{
    var widtpv = document.getElementById("hidtpv").value;
if(idcat > '0')
{   
$.ajax({

    type   : 'POST',
    url     : "modules/tpv/ajax/ajx_cat-products.php",
    data    : {idcategoria : idcat, idtpv : widtpv},

    success : function (resultado) {

    // response = respuesta del servidor.
   response = JSON.parse(resultado);

   var imprimeimpuesto	= "";		

   document.getElementById('productosrs').innerHTML = "";
    for (nlinea in response) {

           imprimeimpuesto = imprimeimpuesto + response[nlinea];


           }

           document.getElementById('productosrs').innerHTML = imprimeimpuesto;	

    }

});
}
else
{    
    document.getElementById('productosrs').innerHTML = "";
}


$.ajax({

    type   : 'POST',
    url     : "modules/tpv/ajax/ajx_categorias.php",
    data    : {idcategoria : idcat},

    success : function (resultado) {

    // response = respuesta del servidor.
   response = JSON.parse(resultado);

   var imprimeimpuesto	= "";		

   document.getElementById('productosrs').innerHTML = "";
    for (nlinea in response) {

           imprimeimpuesto = imprimeimpuesto + response[nlinea];


           }

           document.getElementById('muestracategorias').innerHTML = imprimeimpuesto;	

    }

});

}


