<div align="center">
<form name="form1" action="index.php?module=userpanel&section=spool&action=save" method="POST">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><td>Eliminar documento en cola</td></tr>
<tr>
	<td align="center">
	¿Desea eliminar los trabajos de impresion indicados anteriormente?
	</br>
	</br>
	
<?php 
$fchkimpresion = $_POST["chkimpresion"];


$idtemp = '0';
		foreach($fchkimpresion as $idjob){
					
			
					
				echo '<input type="hidden" value="'.$idjob.'" name="chkimpresion[]">';

				
			$idtemp = $idtemp +1;
				
		}
?>
<input type="hidden" value="delete" name="haccion">
	<input class="btnsubmit" name="btnguardar" value="Eliminar" type="submit"> 

<a class="btncancel" href="index.php?module=userpanel&section=spool">Cancelar</a>
	
	</td>
</tr>

</table>
</form>
</div>