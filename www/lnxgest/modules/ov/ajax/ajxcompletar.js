function buscacodventa() {

var wcodigo = document.getElementById("codventa").value;

if(wcodigo != '')
{
	$.ajax({

		type   : 'POST',
		url     : "modules/fv/ajax/buscarcodigo.php",
		data    : {codigo : wcodigo},
						 
		success : function (resultado) 
		{

			// response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var xconcepto = response["lbl_concepto"];
			var xprecio = response["lbl_precio"];
			var xvalortax = 0;
			
			document.getElementById("txtconcepto").value = xconcepto;
			document.getElementById("txtunidades").value = "1";
			document.getElementById("txtprecio").value = xprecio;
			document.getElementById("txtdto").value = "0";
			document.getElementById("txtimporte").value = xprecio;
			
			var valortemp = 0;
			var valortemplbl = 0;
			
			var elemvalortax = document.getElementsByName("txttax[]");
			var elementosidtax = document.getElementsByName("hidimpuesto[]");
			var elemheditabletax = "";

			var xvalororigen = "";
			var xidimpuesto = "";
			var xvalorespecifico = "";
			var xvalorespecificolbl = "";
			
			for(i=0; i<elementosidtax.length; i++){
				if(elementosidtax[i].name == "hidimpuesto[]")
				{
					xvalororigen = document.getElementsByName("txttax[]")[i].value;
					xidimpuesto = document.getElementsByName("hidimpuesto[]")[i].value;
					valortemp = "tax" + xidimpuesto;
					xvalorespecifico = response[valortemp];
					
					valortemplbl = "lbltax" + xidimpuesto;
					xvalorespecificolbl = response[valortemplbl];
					
					
					if(typeof xvalorespecifico !== "undefined")
					{
						elemheditabletax = document.getElementsByName("heditabletax[]")[i].value;
						if (elemheditabletax == "editsi")
						{
							// alert("El impuesto es editable");
							document.getElementsByName("txttax[]")[i].value = xvalorespecifico
							
						}
						else
						{
							// alert("El impuesto NO es editable");
							if(xvalorespecifico != '')
							{
								if(xvalorespecifico !== document.getElementsByName("txttax[]")[i].value)
								{
									alert("OJO el " + xvalorespecificolbl +" de este producto tiene asignado un valor de " + xvalorespecifico + "% que no se puede establecer puesto que el impuesto NO es editable en esta serie");
								}
							}
							
						}
					}
					
					//alert("Origen: " + xvalororigen + " ID impuesto: " + xidimpuesto + " Especifico: " + xvalorespecifico);
					
					
					
				}
			}

		}

	});
}
else
{
	document.getElementById("formlinea").reset();
}

}




var addFocusconcepto = function(){
		var nadz = $('#txtconcepto').val();
		$("#txtconcepto").autocomplete({
		  source: function(request, response) {
			$.getJSON("modules/fv/ajax/bc_concepto.php", { term_concepto : nadz }, response);
		  },
		  minLength: 1,
		  select: function(event, ui) {
			  value = ui.item.value.split(",");
    		 
			  $('#txtconcepto').val(value[0]);
				$.getJSON("modules/fv/ajax/rc_concepto.php",{term_concepto : value[0]}, function(data){
					$('#codventa').val(data[0].codventa);
					$('#txtconcepto').val(data[0].concepto);
					$('#txtprecio').val(data[0].precio);
					$('#txtimporte').val(data[0].precio);
					
					buscacodventa();
					
					});	  	
		  }
		});
	
	}