<?php
$ftxtbuscar = addslashes($_POST["txtbuscar"]);
$fhcontrol = $_POST["hcontrol"];

$fchktercero = $_POST["chktercero"];
$flsttercero = $_POST["lsttercero"];

$fchkcategoria = $_POST["chkcategoria"];
$flstcategoria = $_POST["lstcategoria"];



if($fchktercero == '1')
{
    $sqltercero = " and ".$prefixsql."it_docum.idtercero = '".$flsttercero."' ";
}
else 
{
    $sqltercero = "";
}

if($fchkcategoria == '1')
{
    $sqlcategoria = " and ".$prefixsql."it_docum.iditcat = '".$flstcategoria."' ";
}
else 
{
    $sqlcategoria = "";
}
?>
<script src="core/com/js_terceros_all.js"></script>
<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=docum" autocomplete="off">
<input type="hidden" value="YES" name="hcontrol" />
<div class="row tblbuscar">
    <div class="col-sm-2" align="left">
<?php
if($fchktercero == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        echo '<label><input type="checkbox" value="1" name="chktercero" '.$seleccionado.'/> Tercero</label>';
?>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" autocomplete="off" class="campoencoger"/></br> 
</div>
<div class="campoencoger">
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>

<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php
	//seleciona cliente
	
	
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>
</div>
    </div>
</div>
<div class="row tblbuscar">
    <div class="col-sm-2" align="left">
<?php
    if($fchkcategoria == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
    echo '<label><input type="checkbox" value="1" name="chkcategoria" '.$seleccionado.'/> Categoria</label>';
?>
    </div>
    <div class="col" align="left">
	
	<select name="lstcategoria" id="lstcategoria" class="campoencoger">
<?php
    if($flstcategoria == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="0" '.$seleccionado.'>-sin asignar-</option>'; 
    
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."it_categorias order by categoria");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{    
            if($flstcategoria == $colter["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["categoria"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row tblbuscar">
    <div class="col-sm-2" align="left">
        <b>Buscar</b>
    </div>
    <div class="col" align="left">
        <input type="text" maxlength="40" value="<?php echo $_POST["txtbuscar"]; ?>" name="txtbuscar" style="width: 100%;" autofocus/>
    </div>
</div>
<div align="center" class="rectangulobtnsguardar" >

        <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-search fa-lg"></i> Buscar
        </button>
</div>
</form>
<p><a href="index.php?module=lnxit&section=docum&action=new" class="btnedit">Nueva documentación</a></p>

<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th width="80"></th>
<th>Tercero</th>
<th>Documentación</th>
<th>Modificado</th>
<th>Categoria</th>
</tr>
<?php
if($fhcontrol == "YES")
{
    /*
    $sqldocum = "SELECT ".$prefixsql."it_docum.id, ".$prefixsql."it_docum.idtercero, ".$prefixsql."it_docum.titulo, ".$prefixsql."it_docum.titulo, ".$prefixsql."it_docum.iditcat, ".$prefixsql."it_docum.fcreado, ".$prefixsql."it_docum.fmodificado, ".$prefixsql."it_docum_lines.documentacion
    FROM ".$prefixsql."it_docum, ".$prefixsql."it_docum_lines 
    WHERE ".$prefixsql."it_docum_lines.iddocum = ".$prefixsql."it_docum.id and (".$prefixsql."it_docum.titulo like '%".$ftxtbuscar."%' or ".$prefixsql."it_docum_lines.documentacion like '%".$ftxtbuscar."%' ) ".$sqltercero." ".$sqlcategoria."
    ORDER BY ".$prefixsql."it_docum.fmodificado desc";
*/

    $sqldocum = "SELECT DISTINCT(".$prefixsql."it_docum.id)
    FROM ".$prefixsql."it_docum, ".$prefixsql."it_docum_lines 
    WHERE ".$prefixsql."it_docum_lines.iddocum = ".$prefixsql."it_docum.id and (".$prefixsql."it_docum.titulo like '%".$ftxtbuscar."%' or ".$prefixsql."it_docum_lines.documentacion like '%".$ftxtbuscar."%' ) ".$sqltercero." ".$sqlcategoria."
    ORDER BY ".$prefixsql."it_docum.fmodificado desc";

    $cnssql= $mysqli->query($sqldocum);	
    while($col = mysqli_fetch_array($cnssql))
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."it_docum where id = '".$col["id"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbdocum_idtercero = $rowaux["idtercero"];
        $dbdocum_titulo = $rowaux["titulo"];
        $dbdocum_fcreado = $rowaux["fcreado"];
        $dbdocum_fmodificado = $rowaux["fmodificado"];
        $dbdocum_iditcat = $rowaux["iditcat"];

        $sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$dbdocum_idtercero."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_razonsocial = $rowaux["razonsocial"];

        $sqlaux = $mysqli->query("select id, categoria from ".$prefixsql."it_categorias where id = '".$dbdocum_iditcat."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_categoria = $rowaux["categoria"];


        if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
        echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
        echo '<td><a href="index.php?module=lnxit&section=docum&action=view&id='.$col["id"].'" class="btnedit">Ver</a></td>';
        echo '<td>'.$lbl_razonsocial.'</td>';
        echo '<td>'.$dbdocum_titulo.'</td>';
        echo '<td>'.$dbdocum_fmodificado.'</td>';
        echo '<td>'.$lbl_categoria.'</td>';
        echo '</tr>';
        
    }
}
?>
</table>
</div>

<?php
if($fhcontrol !== "YES")
{
    $sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_docum");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbcontador = $rowaux["contador"];

    echo '<p>Existen '.$dbcontador.' documentos en la base de datos</p>';
    
}

?>