<?php
$idtpv = $_POST["hidtpv"];
$fhpaseborraador = $_POST["hpaseborraador"];

if($fhpaseborraador == 'borrador' && $idtpv > '0')
{
    //Primero chequea que realmente sea el último, sino no hgas nada y muestra un mensaje
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbidserie = $rowaux["idserie"];
    $dbcodigoint = $rowaux["codigoint"];
    
    $sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."tpv where idserie = '".$dbidserie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbultimodelaserie = $rowaux["contador"];
    
    if($dbcodigoint == $dbultimodelaserie)
    {
        //Coincide de que todavia lo sea
        $lbl_codigo = "(PROV ".$idtpv.")";
        $sqltpv = $mysqli->query("update ".$prefixsql."tpv set codigoint = '0', codigo = '".$lbl_codigo."', estado = '1' where id = '".$idtpv."'");
        
        
        $mensaje = "Cambios efectuados con éxito";
    }
    else
    {
        $mensaje = "No se ha podido pasar a borrador, existen nuevos tickets generados para la misma serie";
    }
    
}



$url_atras = "index.php?module=tpv&section=tpv&action=view&id=".$idtpv;
header( "refresh:2;url=".$url_atras );
?>

<div align="center">

    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Mensaje</td>
    </tr>
    <tr>
        <td align="center">
            
            <p><?php echo $mensaje; ?></p>

</br></td>
    </tr>
    <tr>
        <td align="center">         
            <?php echo '<a href="'.$url_atras.'" class="btnedit">Aceptar</a>'; ?>
        </td>
    </tr>
</table>
</div>

