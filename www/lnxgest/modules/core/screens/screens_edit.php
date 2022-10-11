<?php
$idscreen = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."screens where id = '".$idscreen."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbscreen = $row["screen"];
$dbidpermiso = $row["idpermiso"];
$dbdisplay = $row["display"];
$dburl = $row["url"];
?>


<form name="form1" action="index.php?module=core&section=screens&action=save" method="POST">
<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidscreen" value="'.$_GET["id"].'"/>'; ?>
<div class="row">
    <div class="col-sm-2" align="left">
        Screen
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dbscreen; ?>" name="txtscreen" maxlength="10" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        ID Permiso
    </div>
    <div class="col" align="left">
        <select name="lstidpermiso" class="campoencoger">
	<?php
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."permisos order by display");
	while($colaux = mysqli_fetch_array($sqlaux))
	{
            if($dbidpermiso == $colaux["idpermiso"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colaux["idpermiso"].'" '.$seleccionado.'>'.$colaux["idpermiso"].' - '.$colaux["display"].'</option>';
	}
	?>
	</select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dbdisplay; ?>" name="txtdisplay" required="" class="campoencoger"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        url
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dburl; ?>" name="txturl" required="" style="width: 100%;"/>
    </div>
</div>
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=screens">Cancelar</a>

</div>

</form>
