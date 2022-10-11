<?php
echo '<div align="center">';
echo '<table width="200">
<tr><td colspan="2" bgcolor="#CCCCCC"><b>Partes de trabajo</b></td><tr>';

//si existe el modulo partes muestra la entrada en el menu
$nombre_fichero = 'modules/lnxit/main.php';

if (file_exists($nombre_fichero)) 
{
	if ($_GET["section"] == 'workorders')
		{
			$selecionado = 'class="menuactivo"';
			$menuestilo = 'class="selmenulatactivo"';
			$menuestilotext = 'class="selmenulattextactivo"';
		}else
		{
			$selecionado = 'bgcolor="#CCCCCC"';
			$menuestilo = 'class="selmenulat"';
			$menuestilotext = 'class="selmenulattext"';
		}
	echo '<tr '.$menuestilo.'><td width="5" '.$selecionado.'></td><td><A '.$menuestilotext.' HREF="index.php?module=lnxit">Gestión y soporte</A></td><tr>';
	
} 




if ($_GET["section"] == 'terceros')
	{
		$selecionado = 'class="menuactivo"';
		$menuestilo = 'class="selmenulatactivo"';
		$menuestilotext = 'class="selmenulattextactivo"';
	}else
	{
		$selecionado = 'bgcolor="#CCCCCC"';
		$menuestilo = 'class="selmenulat"';
		$menuestilotext = 'class="selmenulattext"';
	}
echo '<tr '.$menuestilo.'><td width="5" '.$selecionado.'></td><td><A '.$menuestilotext.' HREF="index.php?module=partes">Partes de trabajo</A></td><tr>';


echo '</table>';
echo '</div>';

?>