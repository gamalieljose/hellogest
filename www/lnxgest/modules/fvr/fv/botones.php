<?php

$idfv = $_GET["id"];

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);

$dbcodigoint = $rowprincipal["codigoint"];
$dbeditfv = $rowprincipal["editfv"];
$dbidserie = $rowprincipal["idserie"];

$cnsconta = $mysqli->query("SELECT * FROM ".$prefixsql."empresa where campo = 'conta'");
$rowempresa = mysqli_fetch_assoc($cnsconta);
	
$mod_conta = $rowempresa["valor"]; //yes



//averiguamos si es la ultima de su serie
$cnsprincipal= $mysqli->query("SELECT max(codigoint) as codigomax from ".$prefixsql.$lnxinvoice." where idserie = '".$dbidserie."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigo = $row["codigomax"];

if($dbcodigo == $dbcodigoint){$pasarborrador = "SI";}else{$pasarborrador = "NO";}



echo '<p>';


//if ($_GET["section"] == "main" && $_GET["action"] == "view")
//{$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}
//echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv.'">'.$lblnxinvoice.'</a> ';


//if ($dbcodigoint == 0)
//{
//	if ($_GET["section"] == "main" && $_GET["action"] == "edit") 
//	{$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}
	
//	echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=main&action=edit&id='.$idfv.'">Cambiar serie y cliente</a> ';
	
	
	
//}


//if ($_GET["section"] == 'pagos') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}
//	echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'">Pagos</a> ';


//if ($mod_conta == 'yes')
//{
//	if ($_GET["section"] == 'conta') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}
//	echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=conta&id='.$idfv.'">Contabilidad</a> ';

//}

// if ($_GET["section"] == 'print') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}

// echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=print&action=setup&id='.$idfv.'">Imprimir</a> ';


// if ($_GET["section"] == 'docs') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}



// $sqlficheros = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = '".$lnxinvoice."' and idlinea0 = '".$idfv."'");
// $cuentaficheros = $sqlficheros->num_rows;


//echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=docs&id='.$idfv.'">Documentos ['.$cuentaficheros.']</a> ';

//if ($dbeditfv == 0 && $dbcodigoint == 0)
//{
//	if ($_GET["section"] == 'del') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnenlacecancel";}
//	echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=borrafactura&id='.$idfv.'">Eliminar</a> ';
	
//}

/*
if ($pasarborrador == 'SI')
{
	//Si ya no esta como borrador pero es la ultima factura de la serie, que se pueda editar
	if ($_GET["section"] == 'convertborrador') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}

echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=convertborrador&id='.$idfv.'">Convertir a Borrador</a> ';
	
}
*/

	// if ($_GET["section"] == 'otros') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnedit";}
	// echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=otros&id='.$idfv.'">Otras acciones</a> ';
	


//if (($dbeditfv == 0 && $dbcodigoint > 0 )|| ($dbeditfv > 0 && $dbcodigoint == 0) )
//{
//	if ($_GET["section"] == 'editfv') {$pintaboton = "btnsubmit";}else{$pintaboton = "btnenlacecancel";}
//	echo '<a class="'.$pintaboton.'" href="index.php?module='.$lnxinvoice.'&section=editfv&id='.$idfv.'">Modificar</a> ';
	
//}


echo '</p>';

?>