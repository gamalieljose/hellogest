<?php



$fficherosxml = $_POST["chkficheroxml"];

if($_POST["txtcodigo"] == $_POST["htxtcodigo"])
{
    foreach ($fficherosxml as $ficherito) 
    {
        $ficheroxml = $lnxrecoverymode_files.$ficherito; 

        $xmltemp = simplexml_load_file($ficheroxml);
        
        $xml_modulo = $xmltemp->module; //obtenemos el modulo y agregamo0s script

        include("modules/".$xml_modulo."/recovery/restaura.php");
    
    }


    $urlatras = "index.php?module=backup"; 
    header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="400" class="msgaviso">
	<tr><td class="maintitle">Modo Recovery </td></tr>
    <tr><td align="center">
    <p><img src="img/loading.gif" /> <b>Restaurando ficheros...</b></p>
    </td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

}
else 
{
    $urlatras = "index.php?module=backup"; 
    header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje: </td></tr>
	<tr><td>Código introducido incorrecto</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}



?>