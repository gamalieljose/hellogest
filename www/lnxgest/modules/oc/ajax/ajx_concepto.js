
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