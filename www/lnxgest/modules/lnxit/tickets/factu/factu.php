<?php				   
include("modules/lnxit/tickets/tabs.php");

$idticket = $_GET["id"];
if($_POST["hidticket"] > 0)
{
	$foptfacturar = $_POST["opfacturar"];
	$sqlticket = $mysqli->query("update ".$prefixsql."it_tickets set idfv = '".$foptfacturar."' where id = '".$_POST["hidticket"]."' ");
}

$sqlfactuticket = $mysqli->query("select * from ".$prefixsql."it_tickets where id = '".$idticket."'");
$row = mysqli_fetch_assoc($sqlfactuticket);
$dbidfv = $row["idfv"];

echo '<form name="frmfacturar" method="POST" action="index.php?module=lnxit&section=ticketfactu&id='.$idticket.'" >';
?>
<input type="hidden" value="<?php echo $idticket; ?>" name="hidticket" />
<div class="row">
	<div class="col maintitle" align="left">
		Facturar Ticket
   </div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Facturar
   </div>
   <div class="col" align="left">
<?php
	if($dbidfv == "0" || $dbidfv == "-1")
	{
		if($dbidfv == "0"){$seleccionado = 'checked=""';}else{$seleccionado = '';}
		echo '<label><input type="radio" value="0" name="opfacturar" '.$seleccionado.'/> Permitir facturar este ticket </label></br>';
		if($dbidfv == "-1"){$seleccionado = 'checked=""';}else{$seleccionado = '';}
		echo '<label><input type="radio" value="-1" name="opfacturar" '.$seleccionado.'/> NO facturar este ticket </label>';
	}
	else
	{
		echo '<a href="index.php?module=fv&section=main&action=view&id='.$dbidfv.'" class="btnedit" >Ver factura</a>';
	}
?>
   </div>
</div>

<?php
if($dbidfv == "0" || $dbidfv == "-1")
{
echo '<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

</div>';
}
?>
</form>