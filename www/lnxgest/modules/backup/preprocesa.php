<?php
$fhaccion = $_POST["haccion"];

?>

<form name="frmborrar" method="POST" action="index.php?module=backup&action=save">
<input type="hidden" name="haccion" value="backuprestore"/>
<input type="hidden" name="hficheroborrar" value="<?php echo $ficheroxml; ?>"/>
<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><td>Aviso antes de restaurar</td></th>
<tr><td align="center">
<p>Se van a sobreescribir los cambios a la base de datos de los snapshots seleccionados anteriormente, asegurese antes 
de que desea realizar esta operación, puede perder datos</p>

<p>Si es esta realmente seguro de realizar esta acción, por favor introduzca el codigo que se muestra a continuación y escribalo.</p>
<?php
function codigorestaurar($longitud) {
    $key = '';
    $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
   }
    
       
   $txtcodigo = codigorestaurar(6);
   

echo '<p><span style="-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;"><b>'.$txtcodigo.'</b></span></p>';
?>
<p><input type="text" value="" name="txtcodigo" /></p>
<input type="hidden" value="<?php echo $txtcodigo; ?>" name="htxtcodigo" autocomplete="off"/>
<p align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-database fa-lg"></i> Procesar</button> 
<a href="index.php?module=backup" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> </p>
</td></tr>
</table>

</div>
<?php
$ficheritos = $_POST["chkficheroxml"];

foreach ($ficheritos as $chkfichero) 
{
echo '<input type="hidden" value="'.$chkfichero.'" name="chkficheroxml[]" />';
}


?>


</form>