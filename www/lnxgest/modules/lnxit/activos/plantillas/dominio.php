<?php
// ------------------------------
$lbl_caracteristica = "Caracteristica";
$lbl_valor1 = "Valor 1";
$lbl_valor2 = "Valor 2";

//------------------------------


$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($cnssql);

$dbnombre = $row["nombre"];

?>

<div class="row">
  <div class="col maintitle" align="left">
    Plantilla Dominio
  </div>
</div>

<p><b>Campos necesarios:</b></p>
<p>Proveedor, ID Pass...</p>

