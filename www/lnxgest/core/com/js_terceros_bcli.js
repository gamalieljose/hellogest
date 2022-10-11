
        function mostrar() {
            div = document.getElementById("div_buscatercero");
            div.style.display = "";
            document.getElementById("txttercero").focus();
        }


$(document).ready(function(){
   $("#txttercero").keyup(function () {
           
	elegido=$(this).val();
	var elegido = document.getElementById("txttercero").value;

	$.post("core/com/ajx_terceros_bcli.php", { elegido: elegido }, function(data){

	$("#lsttercero").html(data);
	});            
      
   })
});


