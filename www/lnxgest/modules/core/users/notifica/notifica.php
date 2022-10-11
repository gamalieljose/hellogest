<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."notifica ");	
while($col = mysqli_fetch_array($cnssql))
{
    if($col["opcion"] == 'TLGM_ACTIV'){$dbtlgm_activ = $col["valor"];}
    if($col["opcion"] == 'TLGM_BOTID'){$dbtlgm_botid = $col["valor"];}

    if($col["opcion"] == 'TLGM_TEXT'){$dbtlgm_texto = $col["valor"];}
    if($col["opcion"] == 'TLGM_FILE'){$dbtlgm_files = $col["valor"];}
    
    
}


?>


<form name="frmnotifica" autocomplete="off" method="POST" action="index.php?&module=core&section=notifica&action=save" >

<div class="row">
  <div class="col maintitle">
	Configuración de correo
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	
  </div>
  <div class="col" align="left">
    <label><input name="emailchkactivo" value="1" type="checkbox"> Activar notificaciones por email</label>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Nombre remitente
  </div>
  <div class="col" align="left">
    <input name="emailtxtdisplay" value="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	e-mail
  </div>
  <div class="col" align="left">
    <input name="emailtxtemail" value="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Login
  </div>
  <div class="col" align="left">
    <input name="emailtxtlogin" value="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Password
  </div>
  <div class="col" align="left">
    <input name="emailtxtpassword" value="" type="password" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Servidor SMTP
  </div>
  <div class="col" align="left">
    <input name="emailtxtsmtp" value="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>



<div class="row">
  <div class="col maintitle">
	Configuración de Telegram
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	
  </div>
  <div class="col" align="left">

<?php
if ($dbtlgm_activ == '1'){$seleccionado = 'checked=""';}else{$seleccionado = '';}

?>

    <label><input name="tlgmchkactivo" value="1" type="checkbox" <?php echo $seleccionado; ?>> Activar notificaciones por telegram</label>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	BotID
  </div>
  <div class="col" align="left">
    <input name="tlgmbotid" value="<?php echo $dbtlgm_botid; ?>" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Envio de texto
  </div>
  <div class="col" align="left">
    <input name="tlgmtexto" value="<?php echo htmlspecialchars($dbtlgm_texto); ?>" type="text" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Envio de ficheros
  </div>
  <div class="col" align="left">
    <input name="tlgmfiles" value="<?php echo htmlspecialchars($dbtlgm_files); ?>" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Comandos
  </div>
  <div class="col">
  <b>[[BOTID]]</b> - ID del bot de telegram que enviará los mensajes </br>
  <b>[[CHATID]]</b> - ID del chat de telegram al que se enviará los mensajes </br>
  <b>[[CHATMSG]]</b> - ID del chat de telegram al que se enviará los mensajes </br>
  <b>[[FILEPATH]]</b> - Ruta completa al que se enviará el archivo </br>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 


</div>

</form>