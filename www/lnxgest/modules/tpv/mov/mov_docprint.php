<?php
$flstprinter = $_POST["lstprinter"];
$ficherodocprint = $_POST["lstdocprint"];

$flstprinter = $_POST["lstprinter"];

include("modules/tpv/docprint/".$ficherodocprint);

 
?>

<div align="center">
<table width="400" class="msgaviso">
	<tr class="maintitle"><td>Impresion</td></tr>
	
	<tr>
		<td align="center">
		<p>Impresion finalizada</p>
		
		<p><a class="btnedit_verde" href="index.php?module=tpv&section=mov">Aceptar</a> 
		<?php
		if($flstprinter == "0")
		{
			$cnsauxusr = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
			$rowauxusr = mysqli_fetch_assoc($cnsauxusr);
			$usuariofolder = $rowauxusr["username"];
			
			$nomfichero = "documento.pdf";
			$rutafiletemp = "usr/".$usuariofolder."/".$nomfichero;
			
			$xurlpass = base64_encode($rutafiletemp);
				
				
				
			echo '<a href="modules/ficheros/downloadtemp.php?fichero='.$xurlpass.'&nomfichero='.$nomfichero.'" class="btnedit">Descargar archivo</a>';
		}
		?>
		</p>
		</td>
	</tr>
	
</table>

</div>