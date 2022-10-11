<form name="form1" action="index.php?module=core&section=screens&action=save" method="POST">
<input type="hidden" name="haccion" value="new"/>

<div class="row">
    <div class="col-sm-2" align="left">
        Screen
    </div>
    <div class="col" align="left">
        <input type="text" value="" name="txtscreen" maxlength="10" required=""/>
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
		echo '<option value="'.$colaux["idpermiso"].'">'.$colaux["idpermiso"].' - '.$colaux["display"].'</option>';
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
        <input type="text" value="" name="txtdisplay" required="" class="campoencoger"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        url
    </div>
    <div class="col" align="left">
        <input type="text" value="" name="txturl" required="" style="width: 100%;"/>
    </div>
</div>
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=screens">Cancelar</a>

</div>

</form>
