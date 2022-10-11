function contanuevocodigo(campoorigen, campodestino, campolabel) 
{
    if(campoorigen != '' && campodestino != '')
    {
        
        var wcodigo = document.getElementById(campoorigen).value;
        
        $.ajax({

		type   : 'POST',
		url     : "modules/conta/ajax/ajx_nuevocodigo.php",
		data    : {codigo : wcodigo},
						 
		success : function (resultado) 
		{

			// response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var xconcepto = response["conta_abreviado"];
                        var xlabel = response["conta_label"];
			document.getElementById(campodestino).value = xconcepto;
                    
                        document.getElementById(campolabel).innerHTML = xlabel;
                    
                        
						
		}

	});
    }
}