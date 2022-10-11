<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script language="javascript">
function recoverymodebackup(variableenviorecoverymode) {
	
    
    $.ajax({
    
         type   : 'POST',
         url     : "core/recoverymodexml.php",
         data    : {varrecoverymode : variableenviorecoverymode},
                         
         success : function (resultado) {
    
         // response = respuesta del servidor.
        response = JSON.parse(resultado);
         
        var respuesta_xml = response["recoverymoders"];
        
        alert(respuesta_xml);
    
                  
                
        }
    
    });
        
    }
</script>
<?php
$lnxrcvymode_modulo = base64_encode($_SERVER["QUERY_STRING"]);

?>


<table width="100%"><tr><td align="center" bgcolor="#04B45F">
<b>RECOVERY MODE</b><?php echo $lnxrecoverymode_files; ?> </br>
<?php 


echo "<a href=\"javascript:recoverymodebackup('".$lnxrcvymode_modulo."');\" class=\"btnedit_verde\" >Take snapshot</a>"; 


?>
</td></tr></table>

