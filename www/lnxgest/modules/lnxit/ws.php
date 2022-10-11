<?php

echo '<output>'. PHP_EOL;

if($_POST["lnx_cmd"] == "showittipos")
{
	$sql_terceros = "select * from ".$prefixsql."it_tipos";

	//Muestra el listado de it_tipos (incidencia, solicitud...)
	$cnssql= $mysqli->query($sql_terceros);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		echo '<itemtipo>'. PHP_EOL;
		echo '   <id>'.$col["id"].'</id>'. PHP_EOL;
		echo '   <tipo>'.$col["tipo"].'</tipo>'. PHP_EOL;
		echo '</itemtipo>'. PHP_EOL;
		
	}
}



if($_POST["lnx_cmd"] == "showitcategorias")
{
	$sql_terceros = "select * from ".$prefixsql."it_categorias";

	//Muestra el listado de terceros
	$cnssql= $mysqli->query($sql_terceros);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		echo '<itemcat>'. PHP_EOL;
		echo '   <id>'.$col["id"].'</id>'. PHP_EOL;
		echo '   <categoria>'.$col["categoria"].'</categoria>'. PHP_EOL;
		echo '</itemcat>'. PHP_EOL;
		
	}
}

if($_POST["lnx_cmd"] == "showlasttickets30") //Muestra los ultimos tickets de los ultimos 30 dias
{
	$fechahoy = date("Y-m-d");
	$fechaayer = strtotime ( '-30 day' , strtotime ( $fechahoy ) ) ;
	$fechaayer = date ( 'Y-m-d' , $fechaayer );
	
	$sql_consulta = "select * from ".$prefixsql."it_tickets where fmodificacion >= '".$fechaayer."'";

	//Muestra el listado de tickets modificados desde hace 30 dias hasta hoy
	$cnssql= $mysqli->query($sql_consulta);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		echo '<itemticket>'. PHP_EOL;
		echo '   <id>'.$col["id"].'</id>'. PHP_EOL;
		echo '   <resumen>'.$col["resumen"].'</resumen>'. PHP_EOL;
		echo '</itemticket>'. PHP_EOL;
		
	}
}

if($_POST["lnx_cmd"] == "showidactivo" && $_POST["idactivo"] > 0) //el activo por ID
{

	$idactivo = $_POST["idactivo"];

	$sqlactivos = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$idactivo."' "); 
	$col = mysqli_fetch_assoc($sqlactivos);
	$existe = $sqlactivos->num_rows;
	if($existe > 0)
	{
		$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_tercero = $rowaux["razonsocial"];

		if($col["idcontacto"] > 0)
		{
			$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$lbl_contacto = $rowaux["nombre"];
		}
		else 
		{
			$lbl_contacto = "";
		}

		$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_tipos where id = '".$col["idtipo"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_tipo = $rowaux["tipo"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_estados where id = '".$col["estado"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_estado = $rowaux["estado"];
		
		

		$dbidtercero = $col["idtercero"];
		$dbidcontacto = $col["idcontacto"];
		$dbidtipo = $col["idtipo"];
		$dbcodigo = $col["codigo"];
		$dbnombre = $col["nombre"];
		$dbestado = $col["estado"];
		$dbfalta = $col["falta"];
		$dbfcaducidad = $col["fcaducidad"];
		$dbavisar = $col["avisar"];
		$dbfaviso = $col["faviso"];
		$dbnotas = $col["notas"];
		$dbtratarcomo = $col["tratarcomo"];
		if($dbtratarcomo == '0'){$lbl_tratarcomo = '- Genérico -';}
		if($dbtratarcomo == '1'){$lbl_tratarcomo = 'Tratar como licencia';}
		if($dbtratarcomo == '2'){$lbl_tratarcomo = 'Tratar como ordenador';}
	}
	else 
	{
		$idactivo = "0";
		$dbidtercero = "";
		$dbidcontacto = "";
		$dbidtipo = "";
		$dbcodigo = "";
		$dbnombre = "";
		$dbestado = "";
		$dbfalta = "";
		$dbfcaducidad = "";
		$dbavisar = "";
		$dbfaviso = "";
		$dbnotas = "";
		$dbtratarcomo = "";
		$lbl_tercero = "";
		$lbl_contacto = "";
		$lbl_tipo = "";
		$lbl_estado = "";
		$lbl_tratarcomo = "";
	}
	echo '<activo>'. PHP_EOL;
	echo '   <id>'.$idactivo.'</id>'. PHP_EOL;
	echo '   <idtercero>'.$dbidtercero.'</idtercero>'. PHP_EOL;
	echo '   <label_tercero>'.$lbl_tercero.'</label_tercero>'. PHP_EOL;
	echo '   <idcontacto>'.$dbidcontacto.'</idcontacto>'. PHP_EOL;
	echo '   <label_contacto>'.$lbl_contacto.'</label_contacto>'. PHP_EOL;
	echo '   <idtipo>'.$dbidtipo.'</idtipo>'. PHP_EOL;
	echo '   <label_tipo>'.$lbl_tipo.'</label_tipo>'. PHP_EOL;
	echo '   <codigo>'.$dbcodigo.'</codigo>'. PHP_EOL;
	echo '   <nombre>'.$dbnombre.'</nombre>'. PHP_EOL;
	echo '   <estado>'.$dbestado.'</estado>'. PHP_EOL;
	echo '   <label_estado>'.$lbl_estado.'</label_estado>'. PHP_EOL;
	echo '   <falta>'.$dbfalta.'</falta>'. PHP_EOL;
	echo '   <fcaducidad>'.$dbfcaducidad.'</fcaducidad>'. PHP_EOL;
	echo '   <avisar>'.$dbavisar.'</avisar>'. PHP_EOL;
	echo '   <faviso>'.$dbfaviso.'</faviso>'. PHP_EOL;
	echo '   <notas>'.$dbnotas.'</notas>'. PHP_EOL;
	echo '   <tratarcomo>'.$dbtratarcomo.'</tratarcomo>'. PHP_EOL;
	echo '   <label_tratarcomo>'.$lbl_tratarcomo.'</label_tratarcomo>'. PHP_EOL;
	echo '</activo>'. PHP_EOL;
}

if($_POST["lnx_cmd"] == "addnewfiledocum" && $_POST["iddocum"] > 0) //el ID de la documentacion
{
	
	$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_docum where id = '".$_POST["iddocum"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$contador = $rowaux["contador"];

	if($contador == "1")
	{
		echo '<docum>'. PHP_EOL;
		echo '   <id>'.$_POST["iddocum"].'</id>'. PHP_EOL;
		echo '</docum>'. PHP_EOL;
	}
	else 
	{
		echo '<docum>'. PHP_EOL;
		echo '   <id>0</id>'. PHP_EOL;
		echo '</docum>'. PHP_EOL;
	}
}


if($_POST["lnx_cmd"] == "documsearch" && $_POST["lnx_search"] <> "") //el ID de la documentacion
{

	$docum_busca = addslashes($_POST["lnx_search"]);

	echo '<docum>'. PHP_EOL;

	$cnssql= $mysqli->query("select * from ".$prefixsql."it_docum where titulo like'%".$docum_busca."%' order by titulo");	
	while($col = mysqli_fetch_array($cnssql))
	{
		$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_tercero = $rowaux["razonsocial"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."it_categorias where id = '".$col["iditcat"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_categoria = $rowaux["categoria"];
		
		echo '   <documentacion>'. PHP_EOL;
		echo '      <id>'.$col["id"].'</id>'. PHP_EOL;
		echo '      <idtercero>'.$col["idtercero"].'</idtercero>'. PHP_EOL;
		echo '      <label_tercero>'.$lbl_tercero.'</label_tercero>'. PHP_EOL;
		echo '      <titulo>'.$col["titulo"].'</titulo>'. PHP_EOL;
		echo '      <fmodificado>'.$col["fmodificado"].'</fmodificado>'. PHP_EOL;
		echo '      <iditcat>'.$col["iditcat"].'</iditcat>'. PHP_EOL;
		echo '      <label_itcat>'.$lbl_categoria.'</label_itcat>'. PHP_EOL;
		echo '   </documentacion>'. PHP_EOL;
		
	}
	
	echo '</docum>'. PHP_EOL;
}

echo '</output>'. PHP_EOL;
?>