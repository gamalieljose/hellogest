<?php
$idempresa = $_POST["lstempresa"];

if($idempresa == "" || $idempresa == "0")
{
?>
<form name="form1" method="POST" action="index.php?module=lnxrouter&section=extapps">
<div class="msgaviso">
<div class="row">
	<div class="col maintitle">
		Empresa
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Empresa
	</div>
	<div class="col">
	<select name="lstempresa" style="width: 100%;">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
while($col = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$col["id"].'">'.$col["razonsocial"].'</option>';
}

?>
		
	</select>
	</div>
	<div class="col-sm-2" align="center">
		<input type="submit" value="Seleccionar" class="btnsubmit"/>
	</div>
</div>
</div>
</form>

<?php
}
else
{
	//Editando los campos
	$sqlempresa = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."'");
	$row = mysqli_fetch_assoc($sqlempresa);
	$lblempresa = $row["razonsocial"];
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."router where idempresa = '".$idempresa."'");
	while($colrouter = mysqli_fetch_array($ConsultaMySql))
	{
		if($colrouter["opcion"] == "orangehrm_activo"){$dborangehrm_activo = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_publicurl"){$dborangehrm_publicurl = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_routerurl"){$dborangehrm_routerurl = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_routerpass"){$dborangehrm_routerpass = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_ftp"){$dborangehrm_ftp = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_ftpuser"){$dborangehrm_ftpuser = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_ftppassword"){$dborangehrm_ftppassword = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_ftpsyncin"){$dborangehrm_ftpsyncin = $colrouter["valor"];}
		if($colrouter["opcion"] == "orangehrm_ftpsyncout"){$dborangehrm_ftpsyncout = $colrouter["valor"];}

		if($colrouter["opcion"] == "suitecrm_activo"){$dbsuitecrm_activo = $colrouter["valor"];}
		if($colrouter["opcion"] == "suitecrm_ftp"){$dbsuitecrm_ftp = $colrouter["valor"];}
		if($colrouter["opcion"] == "suitecrm_ftpuser"){$dbsuitecrm_ftpuser = $colrouter["valor"];}
		if($colrouter["opcion"] == "suitecrm_ftppassword"){$dbsuitecrm_ftppassword = $colrouter["valor"];}
		if($colrouter["opcion"] == "suitecrm_ftpsyncin"){$dbsuitecrm_ftpsyncin = $colrouter["valor"];}
		if($colrouter["opcion"] == "suitecrm_ftpsyncout"){$dbsuitecrm_ftpsyncout = $colrouter["valor"];}

		
	}
?>
<form name="form2" method="POST" action="index.php?module=lnxrouter&section=extapps&action=save">
<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidempresa" value="<?php echo $idempresa; ?>" />
<div class="row">
	<div class="col maintitle">
		Editando engranajes de enlaces
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Empresa
	</div>
	<div class="col">
		<?php echo $lblempresa; ?>
	</div>
</div>

<div class="row maintitle">
	<div class="col">
		Aplicaciones
	</div>
</div>
<div class="row maintitle">
	<div class="col-sm-2">
		<b>Orange HRM</b>
	</div>
	<div class="col">
	<?php
	if($dborangehrm_activo == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	?>
		<label><input type="checkbox" name="chkorangehrm" value="1" <?php echo $seleccionado; ?>/> Habilitar Orange HRM</label>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		URL Publica
	</div>
	<div class="col">
		<input type="text" name="orangehrm_url" value="<?php echo $dborangehrm_publicurl; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		URL LNX Router
	</div>
	<div class="col">
		<input type="text" name="orangehrm_lnxrouter" value="<?php echo $dborangehrm_routerurl; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Password LNX Router
	</div>
	<div class="col">
		<input type="password" name="orangehrm_passrouter" value="<?php echo $dborangehrm_routerpass; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP Server
	</div>
	<div class="col">
		<input type="text" name="orangehrm_ftp" value="<?php echo $dborangehrm_ftp; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP username
	</div>
	<div class="col">
		<input type="text" name="orangehrm_ftpuser" value="<?php echo $dborangehrm_ftpuser; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP password
	</div>
	<div class="col">
		<input type="password" name="orangehrm_ftppassword" value="<?php echo $dborangehrm_ftppassword; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP Sync IN
	</div>
	<div class="col">
		<input type="text" name="orangehrm_ftpsyncin" value="<?php echo $dborangehrm_ftpsyncin; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP Sync OUT
	</div>
	<div class="col">
		<input type="text" name="orangehrm_ftpsyncout" value="<?php echo $dborangehrm_ftpsyncout; ?>" style="width: 100%;"/>
	</div>
</div>






<div class="row maintitle">
	<div class="col-sm-2">
		<b>Suite CRM</b>
	</div>
	<div class="col">
	<?php
	if($dbsuitecrm_activo == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	?>
		<label><input type="checkbox" name="chksuitecrm" value="1" <?php echo $seleccionado; ?>/> Habilitar Suite CRM</label>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		FTP Server
	</div>
	<div class="col">
		<input type="text" name="suitecrm_ftp" value="<?php echo $dbsuitecrm_ftp; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP username
	</div>
	<div class="col">
		<input type="text" name="suitecrm_ftpuser" value="<?php echo $dbsuitecrm_ftpuser; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP password
	</div>
	<div class="col">
		<input type="password" name="suitecrm_ftppassword" value="<?php echo $dbsuitecrm_ftppassword; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP Sync IN
	</div>
	<div class="col">
		<input type="text" name="suitecrm_ftpsyncin" value="<?php echo $dbsuitecrm_ftpsyncin; ?>" style="width: 100%;"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		FTP Sync OUT
	</div>
	<div class="col">
		<input type="text" name="suitecrm_ftpsyncout" value="<?php echo $dbsuitecrm_ftpsyncout; ?>" style="width: 100%;"/>
	</div>
</div>





<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxrouter&section=extapps">Cancelar</a>

</div>
</form>
<?php
}
?>