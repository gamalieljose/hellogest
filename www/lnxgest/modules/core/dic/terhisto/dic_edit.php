<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_historico_cfg where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtabla = $row["tabla"];
$dbcampoid = $row["campoid"];
$dbfecha = $row["fecha"];
$dbcodigo = $row["codigo"];
$dbdescripcion = $row["descripcion"];
$dbtipo = $row["tipo"];
$dburl = $row["url"];



echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=terhisto&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=terhisto&action=save" method="post">

<div align="center" class="rectangulobtnsguardar">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=dic&subs=terhisto" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    Tabla
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="<?php echo $dbtabla; ?>" name="txttabla" required="" class="campoencoger"> </br>
    <i>Use [[PREFIXSQL]] para añadir el prefijo de las tablas</i>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    campo ID
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="50" value="<?php echo $dbcampoid; ?>" name="txtid" required="" class="campoencoger"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    campo fecha
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="50" value="<?php echo $dbfecha; ?>" name="txtfecha" required="" class="campoencoger"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    campo codigo
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="50" value="<?php echo $dbcodigo; ?>" name="txtcodigo" required="" style="width: 100%;" />
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    campo descripción
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="50" value="<?php echo $dbdescripcion; ?>" name="txtdescripcion" required="" style="width: 100%;" />
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    campo tipo
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="50" value="<?php echo $dbtipo; ?>" name="txttipo" required="" style="width: 100%;" />
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    URL
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="100" value="<?php echo $dburl; ?>" name="txturl" required="" style="width: 100%;" /></br>
  <i>[[id]] para añadir el valor del campo <b>id</b></i>
  </div>
</div>


</form>
