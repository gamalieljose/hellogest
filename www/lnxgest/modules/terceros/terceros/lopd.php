<?PHP
$idtercero = $_GET["idtercero"];

//Recuperamos los valores de la BBDD

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
	
include("modules/terceros/botones.php");
?>



<p>
<?php 
    echo '<a href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'&action=new" class="btnedit" >Nuevo documento</a> '; 
?>
Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

<?php 
echo '<form name="terceroslopd" method="POST" action="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'" >';
if($_POST["haccion"] != '')
{
    $ftxtrepresentante = addslashes($_POST["txtrepresentante"]);
    $ftxtrepresentantenif = addslashes($_POST["txtrepresentantenif"]);
    
    $sqlficheros = $mysqli->query("delete from ".$prefixsql."terceros_lopd where idtercero = '".$idtercero."'");
    $sqlficheros = $mysqli->query("insert into ".$prefixsql."terceros_lopd set idtercero = '".$idtercero."', campo = 'representante', valor = '".$ftxtrepresentante."'");
    $sqlficheros = $mysqli->query("insert into ".$prefixsql."terceros_lopd set idtercero = '".$idtercero."', campo = 'representantenif', valor = '".$ftxtrepresentantenif."'");
    
    
    
    foreach($_POST as $campo => $valor)
    {
        //echo "<br />- ". $campo ." = ". $valor;
        $campoprefijo = substr($campo, 0, 4);
        if ($campoprefijo == "fdb_")
        {
            $nombrecampo = explode("_", $campo);
            $sqlficheros = $mysqli->query("insert into ".$prefixsql."terceros_lopd set idtercero = '".$idtercero."', campo = '".$nombrecampo[1]."', valor = '".$valor."'");
        }
    }
    
}

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_lopd  where idtercero = '".$idtercero."' and campo = 'representante'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrepresentante = $rowaux['valor'];
$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_lopd  where idtercero = '".$idtercero."' and campo = 'representantenif'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrepresentantenif = $rowaux['valor'];

?>
<input type="hidden" value="new" name="haccion" />
<div class="row">
  <div class="col maintitle">
    Datos LOPD
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Representante
  </div>
  <div class="col" align="left">
    <input type="text" value="<?php echo $dbrepresentante; ?>" name="txtrepresentante" required="" style="width: 100%;" maxlength="50" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    NIF representante
  </div>
  <div class="col" align="left">
    <input type="text" value="<?php echo $dbrepresentantenif; ?>" name="txtrepresentantenif" required="" style="width: 100%;" maxlength="15" />
    
  </div>
</div>


<div class="row">
  <div class="col maintitle">
    Campos personalizados
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Campos:
  </div>
    <div class="col" align="left">
    
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros_lopd_cfg");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_lopd  where idtercero = '".$idtercero."' and campo = '".$columna["campo"]."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbvalorcampo = $rowaux['valor'];

    if($columna["tipo"] == "sino")
    {
        if($dbvalorcampo == "YES"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        echo '<p><label><input type="checkbox" value="YES" name="fdb_'.$columna["campo"].'" '.$seleccionado.'/> '.$columna["display"].'</label></p>';
    }
    
    if($columna["tipo"] == "text")
    {
        echo '<p>'.$columna["display"].'</br>';
        echo '<input type="text" value="'.$dbvalorcampo.'" maxlength="50"  style="width: 100%" name="fdb_'.$columna["campo"].'" /></p>';
    }
}
?>

  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

</div>

</form>

<div class="row">
  <div class="col maintitle">
    Documentación
  </div>
</div>

<table width="100%">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_lopd order by lopdcat");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
    $sqlaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."terceros_lopd_files where idtercero = '".$idtercero."' and idcatlopd = '".$columna["id"]."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbcontarregistros = $rowaux["contador"];
    
    if($dbcontarregistros > '0')
    {
	echo '<tr class="maintitle">';
	echo '<td colspan="4">'.$columna["lopdcat"].'</td>';
	echo '</tr>';
        
        $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."terceros_lopd_files where idtercero = '".$idtercero."' and idcatlopd = '".$columna["id"]."'");
        while($colaux = mysqli_fetch_array($cnsaux))
        {
            if ($color == '1')
            {
                    $color = '2';
                    $pintacolor = "listacolor2";

            }
            else
            {
                    $color = '1';
                    $pintacolor = "listacolor1";

            }
            
            $buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."empresas where id = '".$colaux["idempresa"]."'");
            $row = mysqli_fetch_assoc($buscatercero);
                    $dbrazonsocial = $row["razonsocial"];
            
            $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'terceros_lopdfiles' and idlinea0 = '".$colaux["id"]."' ");
                $row = mysqli_fetch_assoc($sqlaux);
                $fichero_id = $row["idfichero"];
                    
                    
            echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
            echo '<td width="80"><a href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'&action=edit&id='.$colaux["id"].'" class="btnedit">Editar</a></td>';	
			echo '<td>'.$dbrazonsocial.'</td>';
            echo '<td width="50%">'.$colaux["descripcion"].'</td>';
            echo '<td width="100" align="right"><a href="modules/ficheros/download.php?id='.$fichero_id.'" class="btnedit">Download</a></td>';
        }
    }   
}	
	
?>
</table>

<p>&nbsp;</p>

<div class="row">
  <div class="col maintitle">
    Plantillas disponibles
  </div>
</div>




<table width="100%">
    <tr class="maintitle">
        <td width="110" > </td>
        <td>Empresa</td>
        <td>Categoria</td>
        <td>Descripcion</td>
    </tr>
<?php
$ConsultaMySql = $mysqli->query("SELECT * from ".$prefixsql."lopd order by nomdoc");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
    if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";

	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";

	}
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
        
        if($columna["idempresa"] > '0')
        {
            $sqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."empresas where id = '".$columna["idempresa"]."'");
            $row = mysqli_fetch_assoc($sqlaux);
            $dbrazonsocial = $row["razonsocial"];
        }
        else
        {$dbrazonsocial = "";}
        
        $sqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."dic_lopd where id = '".$columna["idcatlopd"]."'");
        $row = mysqli_fetch_assoc($sqlaux);
        $dblopdcat = $row["lopdcat"];
        
        
        $sqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."ficheros_loc where module = 'lopd' and idlinea0 = '".$columna["id"]."' ");
        $row = mysqli_fetch_assoc($sqlaux);
        $dbidfichero = $row["idfichero"];
        
        // echo '<td><a href="modules/terceros/terceros/lopd_download.php?id='.$dbidfichero.'&idtercero='.$idtercero.'&idplantilla='.$columna["id"].'" targe="_blank" class="btnedit">Descargar</td>';
        
		 echo '<td>';
			 echo '<a href="modules/terceros/terceros/lopd_download.php?id='.$dbidfichero.'&idtercero='.$idtercero.'&idplantilla='.$columna["id"].'&formato=doc" targe="_blank" title="Descarga en formato Microsoft Word" ><img src="img/extensions/doc.png" /></a> ';
			 echo '<a href="modules/terceros/terceros/lopd_download.php?id='.$dbidfichero.'&idtercero='.$idtercero.'&idplantilla='.$columna["id"].'&formato=pdf" targe="_blank" title="Descarga en formato PDF"><img src="img/extensions/pdf.png" /></a> ';
			 echo '<a href="modules/terceros/terceros/lopd_download.php?id='.$dbidfichero.'&idtercero='.$idtercero.'&idplantilla='.$columna["id"].'&formato=odt" targe="_blank" title="Descarga en formato ODT LibreOffice"><img src="img/extensions/odt.png" /></a> ';
			 echo '</td>';
		
		
		echo '<td>'.$dbrazonsocial.'</td>';
        echo '<td>'.$dblopdcat.'</td>';
        echo '<td>'.$columna["nomdoc"].'</td>';
        echo '</tr>';
}


?>
            
            
        </table>
    </div>
</div>