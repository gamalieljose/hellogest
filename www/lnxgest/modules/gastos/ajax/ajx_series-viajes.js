$(document).ready(function(){
    $("#lstempresas").change(function () {
            $("#lstempresas option:selected").each(function () {
             elegido=$(this).val();
             $.post("modules/gastos/ajax/ajx_empresa-serie_viajes.php", { elegido: elegido }, function(data){
             $("#lstseries").html(data);
             });            
         });
    })
 });