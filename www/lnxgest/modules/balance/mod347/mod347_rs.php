<?php

?>
<script src="scripts/jquery/jquery-ui.js"></script>
<script language="javascript">
//la función recibe como parámetros el numero de la columna a ocultar
function ocultarColumna(num)
{
  //aquí utilizamos el id de la tabla, en este caso es 'tabla'
  fila=document.getElementById('tabla').getElementsByTagName('tr');

 //mostramos u ocultamos la cabecera de la columna
 if (fila[0].getElementsByTagName('th')[num].style.display=='none')
    {
    fila[0].getElementsByTagName('th')[num].style.display=''
    }
  else
    {
    fila[0].getElementsByTagName('th')[num].style.display='none'
    }
   //mostramos u ocultamos las celdas de la columna seleccionada
  for(i=1;i<fila.length;i++)
    {
        if (fila[i].getElementsByTagName('td')[num].style.display=='none')
            {
                fila[i].getElementsByTagName('td')[num].style.display=''; 
             }     
        else
            {
             fila[i].getElementsByTagName('td')[num].style.display='none'
            }      
    }        
   
}

$(window).resize(function(){

    vistaanchomovil();

})


window.onload = function(){
  
  vistaanchomovil();
};

function vistaanchomovil()
{
    var alto = screen.height;
    var ancho= screen.width;

    if(ancho <= 480)
    {
        document.getElementById("muestratabla").style.display = "block";
        document.getElementById("muestratabla").style.overflowX = "auto";
    }
    else
    {
        document.getElementById("muestratabla").style.display = "inline";
        document.getElementById("muestratabla").style.overflowX = "none";
    }
}

</script>

<?php

$anoactual = date('Y');
$fechaactual = date('d/m/Y');

$ftxtfecha = $_POST["txtfecha"];
if ($ftxtfecha == ""){$ftxtfecha = '01/01/'.$anoactual;}
$ftxtfechafin = $_POST["txtfechafin"];
if ($ftxtfechafin == ""){$ftxtfechafin = $fechaactual;}


$xfecha = explode("/", $ftxtfecha);
$dbfechadesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];
$xfecha = explode("/", $ftxtfechafin);
$dbfechahasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


$flstempresas = $_POST["lstempresas"];

$fchkfv = $_POST["chkfv"];
$fchkfvr = $_POST["chkfvr"];
$fchkfc = $_POST["chkfc"];

$importeaviso = $_POST["txtmaximporte"];

$xid = 0;
foreach ($fchkfv as $id_serie)
{
    if($xid == 0)
    {
        $sql_series_fv = "idserie = '".$id_serie."' ";
    }
    else
    {
        $sql_series_fv = $sql_series_fv."or idserie = '".$id_serie."' ";
    }
    $xid = $xid +1;
}

$xid = 0;
foreach ($fchkfc as $id_serie)
{
    if($xid == 0)
    {
        $sql_series_fc = "idserie = '".$id_serie."' ";
    }
    else
    {
        $sql_series_fc = $sql_series_fc."or idserie = '".$id_serie."' ";
    }
    $xid = $xid +1;
}

$xid = 0;
foreach ($fchkfvr as $id_serie)
{
    if($xid == 0)
    {
        $sql_series_fvr = "idserie = '".$id_serie."' ";
    }
    else
    {
        $sql_series_fvr = $sql_series_fvr."or idserie = '".$id_serie."' ";
    }
    $xid = $xid +1;
}
?>

<div class="row">
  <div class="col maintitle" align="left">
    Resultados Modelo 347
  </div>
</div>
  
<div class="row">
  <div class="col-sm-2" align="left">
      Fecha inicio
  </div>
  <div class="col-sm-2" align="left">
    <?php echo $_POST["txtfecha"]; ?>
  </div>
  <div class="col-sm-2" align="left">
      Fecha Fin
  </div>
  <div class="col-sm-2" align="left">
  <?php echo $_POST["txtfechafin"]; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
      
  </div>
  <div class="col" align="left">
  Estan marcados en amarillo todos aquellos valores sean igual o superior a <b><?php echo $importeaviso; ?></b> Euros
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Empresa
  </div>
  <div class="col" align="left">
<?php
$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."empresas where id = '".$flstempresas."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_empresa = $rowaux["razonsocial"];

echo '<b>'.$lbl_empresa.'</b>';
?>
  </div>
</div>
  

<div class="row">
  <div class="col maintitle">
    Series
  </div>
</div>
    
<div class="row">
  <div class="col-sm-2 maintitle" align="left">
    F. Venta
  </div>
  <div class="col" align="left">
<?php
$cuentacolserie = 1;

foreach ($fchkfv as $id_serie)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$id_serie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];

    $cuentacolserie = $cuentacolserie +1;
    echo '<label><input type="checkbox" checked="" onclick="ocultarColumna('.$cuentacolserie.')"/> '.$lbl_serie.'</label> ';
}

$cuentacolserie = $cuentacolserie +1;
echo '<label><input type="checkbox" checked="" onclick="ocultarColumna('.$cuentacolserie.')"/> Total Ventas</label> ';
?>
  </div>
</div>
<div class="row">  
  <div class="col-sm-2 maintitle" align="left">
    F. V. Rectificativas
  </div>
  <div class="col" align="left">
  <?php
foreach ($fchkfvr as $id_serie)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$id_serie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];

    $cuentacolserie = $cuentacolserie +1;
    echo '<label><input type="checkbox" checked="" onclick="ocultarColumna('.$cuentacolserie.')"/> '.$lbl_serie.'</label> ';
}

$cuentacolserie = $cuentacolserie +1;
echo '<label><input type="checkbox" checked="" onclick="ocultarColumna('.$cuentacolserie.')"/> Total Ventas Rect.</label> ';
?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2 maintitle" align="left">
    F. Compra
  </div>
  <div class="col" align="left">
  <?php
foreach ($fchkfc as $id_serie)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$id_serie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];
    
    $cuentacolserie = $cuentacolserie +1;
    echo '<label><input type="checkbox" checked="" onclick="ocultarColumna('.$cuentacolserie.')"/> '.$lbl_serie.'</label> ';
}
$cuentacolserie = $cuentacolserie +1;
echo '<label><input type="checkbox" checked="" onclick="ocultarColumna('.$cuentacolserie.')"/> Total Compras</label> ';
?>
  </div>
</div>




<div id="muestratabla" style="display: block; overflow-x: auto;">
<table id="tabla" width="100%">
<tr class="maintitle">
    <th width="80"> </th>
    <th>Tercero</th>
<?php
foreach ($fchkfv as $id_serie)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$id_serie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];
    echo '<th>'.$lbl_serie.'</th>';
}
?>
<th align="center">Total </br>Ventas</th>

<?php
foreach ($fchkfvr as $id_serie)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$id_serie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];
    echo '<th>'.$lbl_serie.'</th>';
}
?>
<th align="center">Total </br>Ventas R.</th>

<?php
foreach ($fchkfc as $id_serie)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$id_serie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];
    echo '<th>'.$lbl_serie.'</th>';
}
?>
<th align="center">Total </br>Compras</th>

<th>Total Facturado</th>
</tr>
<?php

$sqlfacturas = "select DISTINCT(".$prefixsql."fv.idtercero), ".$prefixsql."terceros.razonsocial from ".$prefixsql."fv, ".$prefixsql."terceros where ".$prefixsql."fv.idtercero = ".$prefixsql."terceros.id and (".$sql_series_fv.") and codigoint <> '0' and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') "
." UNION DISTINCT "
."select DISTINCT(".$prefixsql."fc.idtercero), ".$prefixsql."terceros.razonsocial from ".$prefixsql."fc, ".$prefixsql."terceros where ".$prefixsql."fc.idtercero = ".$prefixsql."terceros.id and (".$sql_series_fc.") and codigoint <> '0' and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') "
." UNION DISTINCT "
."select DISTINCT(".$prefixsql."fvr.idtercero), ".$prefixsql."terceros.razonsocial from ".$prefixsql."fvr, ".$prefixsql."terceros where ".$prefixsql."fvr.idtercero = ".$prefixsql."terceros.id and (".$sql_series_fvr.") and codigoint <> '0' and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') "
."order by razonsocial";



$cnssql= $mysqli->query($sqlfacturas);	
while($col = mysqli_fetch_array($cnssql))
{

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a class="btnedit" href="index.php?module=terceros&section=factu&action=edit&idtercero='.$col["idtercero"].'" >Detalles</td>';
    echo '<td>'.$col["razonsocial"].'</td>';   

    $total_series = 0;
    foreach ($fchkfv as $id_serie)
    {   
        $lbl_sumafactu = 0;
        $sumaserie = 0;
        $sqlfactus = $mysqli->query("select id from ".$prefixsql."fv where idtercero = '".$col["idtercero"]."' and idserie = '".$id_serie."' and codigoint <> '0' and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') "); 
        while($colfactu = mysqli_fetch_array($sqlfactus))
        {            
            $sqlaux = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fv_lineas where idfv = '".$colfactu["id"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $xsumaserie = $rowaux["importe"];

            $sqlaux = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fv_lineas_tax where idfv = '".$colfactu["id"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $xsumaserie_tax = $rowaux["importe"];

            $sumaserie = $sumaserie + $xsumaserie + $xsumaserie_tax;
        }

        $total_series = $total_series + $sumaserie;

        if($sumaserie >= $importeaviso){$coloraviso = 'bgcolor="#FFFF00"';}else{$coloraviso = '';}

        $lbl_sumafactu = round($sumaserie, 2);
	    $lbl_sumafactu = number_format($lbl_sumafactu, 2, ".", ",");

        echo '<td align="right" '.$coloraviso.'>'.$lbl_sumafactu.'</td>';
    }
    
    $total_fv = $total_series;

    $total_series = round($total_series, 2);
	$total_series = number_format($total_series, 2, ".", ",");
    echo '<td align="right">'.$total_series.'</td>';
    
    

    $total_series = 0;
    foreach ($fchkfvr as $id_serie)
    {
        $lbl_sumafactu = 0;
        $sumaserie = 0;
        $sqlfactus = $mysqli->query("select id from ".$prefixsql."fvr where idtercero = '".$col["idtercero"]."' and idserie = '".$id_serie."' and codigoint <> '0' and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') "); 
        while($colfactu = mysqli_fetch_array($sqlfactus))
        {            
            $sqlaux = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fvr_lineas where idfvr = '".$colfactu["id"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $xsumaserie = $rowaux["importe"];

            $sqlaux = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fvr_lineas_tax where idfvr = '".$colfactu["id"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $xsumaserie_tax = $rowaux["importe"];

            $sumaserie = $sumaserie + $xsumaserie + $xsumaserie_tax;
        }

        $total_series = $total_series + $sumaserie;

        if($sumaserie >= $importeaviso){$coloraviso = 'bgcolor="#FFFF00"';}else{$coloraviso = '';}

        $lbl_sumafactu = round($sumaserie, 2);
	    $lbl_sumafactu = number_format($lbl_sumafactu, 2, ".", ",");

        echo '<td align="right" '.$coloraviso.'>'.$lbl_sumafactu.'</td>';
    }
    
    $total_fvr = $total_series;

    $total_series = round($total_series, 2);
	$total_series = number_format($total_series, 2, ".", ",");
    echo '<td align="right">'.$total_series.'</td>';
    
    

    $total_series = 0;
    foreach ($fchkfc as $id_serie)
    {
        $lbl_sumafactu = 0;
        $sumaserie = 0;
        $sqlfactus = $mysqli->query("select id from ".$prefixsql."fc where idtercero = '".$col["idtercero"]."' and idserie = '".$id_serie."' and codigoint <> '0' and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') "); 
        while($colfactu = mysqli_fetch_array($sqlfactus))
        {            
            $sqlaux = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fc_lineas where idfc = '".$colfactu["id"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $xsumaserie = $rowaux["importe"];

            $sqlaux = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fc_lineas_tax where idfc = '".$colfactu["id"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $xsumaserie_tax = $rowaux["importe"];

            $sumaserie = $sumaserie + $xsumaserie + $xsumaserie_tax;
        }

        $total_series = $total_series + $sumaserie;

        if($sumaserie >= $importeaviso){$coloraviso = 'bgcolor="#FFFF00"';}else{$coloraviso = '';}

        $lbl_sumafactu = round($sumaserie, 2);
	    $lbl_sumafactu = number_format($lbl_sumafactu, 2, ".", ",");

        echo '<td align="right" '.$coloraviso.'>'.$lbl_sumafactu.'</td>';
    }
    
    $total_fc = $total_series;

    $total_series = round($total_series, 2);
	$total_series = number_format($total_series, 2, ".", ",");
    echo '<td align="right">'.$total_series.'</td>';
    
    $total_tercero = $total_fv + $total_fvr + $total_fc;

    $total_tercero = round($total_tercero, 2);
    $total_tercero = number_format($total_tercero, 2, ".", ",");
    
    echo '<td align="right">'.$total_tercero.'</td>';
    echo '</tr>';
    
}


?>
</table>
</div>
<?php

echo '<p>'.$sqldebug.'</p>'; 

?>