<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_cfpc where opcion = 'numdigitos' and idempresa = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbnumdigitos = $rowaux["valor"];

?>
<form name="frmconta" method="POST" action="index.php?module=conta&section=config&action=save" >
<div class="row">
    <div class="col-sm-2" align="left">
        Digitos contabilidad
    </div>
    <div class="col" align="left">
        Recomendado minimo 8, máximo 20</br>
        <input type="number" min="6" max="20" value="<?php echo $dbnumdigitos; ?>" name="txtnumdigitos" required=""/>
    </div>   
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Ejemplo:
    </div>
    <div class="col-sm-2" align="left">
<?php
$contagrupo = "400";
$contaid = "5";

// $dbnumdigitos es el número total de digitos

$digitosgrupo = strlen($contagrupo);
$digitosid = strlen($contaid);
$digitostotal = $digitosgrupo + $digitosid;
$cerosanadir = $dbnumdigitos - $digitostotal;

$i = 0;
$textoceros = "";
do {
    $i = $i + 1;
    $textoceros = $textoceros."0";
} 
while ($i < $cerosanadir);

?>


        Grupo: 430 </br>
        Cliente: 5</br>
        Resultado: <?php echo $contagrupo.$textoceros.$contaid; ?>
        
    </div>   
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=conta">Cancelar</a>

</div>
    
</form>