
function mostrar() {
    div = document.getElementById("div_buscaproducto");
    div.style.display = "";
    document.getElementById("txtbuscaproducto").focus();
}


$(document).ready(function(){
   $("#txtbuscaproducto").keyup(function () {
           
	elegido=$(this).val();
	var elegido = document.getElementById("txtbuscaproducto").value;

	$.post("core/com/ajx_productos-codnom.php", { elegido: elegido }, function(data){

	$("#lstproducto").html(data);
	});            
      
   })
});


