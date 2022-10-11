<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Vincula Productos</title>

<link href="../../../core/bs/css/bootstrap.min.css" rel="stylesheet">
<link href="../../../core/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="../../../core/css/sb-admin.css" rel="stylesheet">
<link href="../../../core/css/custom.css" rel="stylesheet">
  
  
 <script type="text/javascript">
function setFocusToTextBox(){
    document.getElementById("txtbuscar").focus();
}

function vincular(idproducto, stockglobal, stockwarehouse) 
{

 var idlinea = window.document.getElementById('hidlinea').value;


 var devolver = "vincula" + idlinea;

  
window.opener.document.getElementById(devolver).innerHTML = '<i class="fa fa-fw fa-link "></i> <input type="hidden" value="' + idproducto + '" name="hidproducto[' + idlinea + ']" />'; 


var tblsag = "sag" + idlinea;
var tblsaw = "saw" + idlinea;
var tblstck = "stck" + idlinea;


 window.opener.document.getElementById(tblsag).innerHTML = stockglobal; 
 window.opener.document.getElementById(tblsaw).innerHTML = stockwarehouse; 


var stockactual =  window.opener.document.getElementById(tblstck).innerHTML;

var tblstcksuma = "ss" + idlinea;
var stockactualsumado = 0; 

stockactualsumado = parseInt(stockactual) + parseInt(stockwarehouse);

window.opener.document.getElementById(tblstcksuma).innerHTML = stockactualsumado;



 this.window.close();
}
 
function solocerrar() 
{
 this.window.close();
}

 </script>

 </head>
 <body onload='setFocusToTextBox()'>
<?php
require("../../../core/cfpc.php");

if ($_GET["id"] > '0'){$idlinea = $_GET["id"];}
if($_POST["hidlinea"] > '0'){$idlinea = $_POST["hidlinea"];}

if($_POST["hidwarehouse"] > '0'){$idwarehouse = $_POST["hidwarehouse"];}else{$idwarehouse = $_GET["idwh"];}

$ftxtbuscar = $_POST["txtbuscar"];

?>
<form name="frmbuscaproducto" method="POST" action="vincular.php" />

<input type="hidden" name="hidlinea" id="hidlinea" value="<?php echo $idlinea; ?>"/> 
<input type="hidden" name="hidwarehouse" id="hidwarehouse" value="<?php echo $idwarehouse; ?>"/> 

<div class="row">
    <div class="col maintitle" align="left">
        Vincula el producto
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Buscar
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $ftxtbuscar; ?>" name="txtbuscar" id="txtbuscar" style="width: 100%;" autocomplete="off"/>
    </div>
    <div class="col" style="max-width: 200px;" align="right">
        
        <input class="btnsubmit" name="btnguardar" value="Buscar" type="submit"> 
        <button class="btncancel" onclick="solocerrar();" >Cerrar</button> 

    </div>
</div>
 </form>
     
<div class="row">
    <div class="col maintitle" align="left">
        Resultados
    </div>
</div>    
     
<table width="100%">
    <tr class="maintitle">
    <td width="100">&nbsp;</td>
    <td>Codigo</td>
    <td>Concepto</td>
    </tr>

<?php
if($ftxtbuscar <> '')
{    
    $cnssql= $mysqli->query("select * from ".$prefixsql."productos where codventa like '".$ftxtbuscar."%' or concepto like '".$ftxtbuscar."%'");	
    while($col = mysqli_fetch_array($cnssql))
    {
        
        $sqlaux = $mysqli->query("select sum(stock) as cantidades from ".$prefixsql."productos_wh where idproducto = '".$col["id"]."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_stockactualglobal = $rowaux["cantidades"];
        if($lbl_stockactualglobal == ''){$lbl_stockactualglobal = '0';}

        $sqlaux = $mysqli->query("select sum(stock) as cantidades from ".$prefixsql."productos_wh where idproducto = '".$col["id"]."' and idwh = '".$idwarehouse."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_stockwhactual = $rowaux["cantidades"];
        if($lbl_stockwhactual == ''){$lbl_stockwhactual = '0';}
        
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
	
        
        echo "<td><a href=\"javascript:vincular('".$col["id"]."', '".$lbl_stockactualglobal."', '".$lbl_stockwhactual."');\" class=\"btnedit\">Seleccionar</a></td>";
        echo '<td>'.$col["codventa"].'</td>';
        echo '<td>'.$col["concepto"].'</td>';
       
        echo '</tr>';
    }
}
?>
</table>
     
 
 
 </body>
</html>
