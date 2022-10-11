<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="core/bs/js/bootstrap.min.js"></script>
<link href="modules/tpv/img/module.css" rel="stylesheet" type="text/css">
<script src="modules/tpv/ajax/ajx_categoria-producto.js"></script>
<script src="modules/tpv/ajax/js_cantidades.js"></script>
<script src="modules/tpv/ajax/ajx_buscaproductos.js"></script>
<script src="modules/tpv/ajax/js_modificapreciokbnum.js"></script>
<script src="modules/tpv/ajax/ajx_lineasdb.js"></script>

<script type="text/javascript">
function muestra_tab_principal() 
{
	document.getElementById('tab-principal').style.display = 'inline';
	document.getElementById('tab-categorias').style.display = 'none';
	document.getElementById('tab-buscar').style.display = 'none';
	
	document.getElementById('btn_tab_principal').className = 'btn_tab_sel';
	document.getElementById('btn_tab_categorias').className = 'btn_tab';
	document.getElementById('btn_tab_buscar').className = 'btn_tab';

}
function muestra_tab_categorias() 
{
	document.getElementById('tab-principal').style.display = 'none';
	document.getElementById('tab-categorias').style.display = 'inline';
	document.getElementById('tab-buscar').style.display = 'none';
	
	document.getElementById('btn_tab_principal').className = 'btn_tab';
	document.getElementById('btn_tab_categorias').className = 'btn_tab_sel';
	document.getElementById('btn_tab_buscar').className = 'btn_tab';

}
function muestra_tab_buscar() 
{
	document.getElementById('tab-principal').style.display = 'none';
	document.getElementById('tab-categorias').style.display = 'none';
	document.getElementById('tab-buscar').style.display = 'inline';
	
	document.getElementById('btn_tab_principal').className = 'btn_tab';
	document.getElementById('btn_tab_categorias').className = 'btn_tab';
	document.getElementById('btn_tab_buscar').className = 'btn_tab_sel';

}
</script>

<?php
$idtpv = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidterminal = $rowaux["idterminal"];
$dbidtienda = $rowaux["idtienda"];
$dbidterminal = $rowaux["idterminal"];
$dbidserie = $rowaux["idserie"];
$dbidtercero = $rowaux["idtercero"];
$dbedittpv = $rowaux["edittpv"];
$dbcodigoint = $rowaux["codigoint"];
$dbestado = $rowaux["estado"];
$dbfecha = $rowaux["fecha"];

    $xfecha = explode(" ", $dbfecha);
        $fechita = $xfecha[0];
    $xfecha = explode("-", $fechita); 
    $fano = $xfecha[0];
    $fmes = $xfecha[1];
    $fdia = $xfecha[2];
    
    $dbfecha = $fdia."/".$fmes."/".$fano;
    
    
$sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbtienda = $rowaux["tienda"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."pos_terminales where id = '".$dbidterminal."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbterminal = $rowaux["descripcion"];




$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbserie = $rowaux["serie"];
$dbidempresa = $rowaux["idempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$dbidempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbclirazonsocial = $rowaux["razonsocial"];

?>

<a name="tpvview"></a>
<?php echo '<input type="hidden" value="'.$idtpv.'" name="hidtpv"  id="hidtpv" />'; ?>

<div class="row maintitle">
	<div class="col" align="left">
<?php 
if ($dbedittpv == '1')
{    
echo '<div style="width: 100%; background-color: #FFFF00;">
    <p align="center">Este ticket esta en modificación</p>
</div>';
}
?>
	Terminal: <?php echo $dbterminal; ?> Tienda: <?php echo $dbtienda; ?>  Fecha: <?php echo $dbfecha; ?></br>
        <?php
		if($dbestado == '0' || ($dbcodigoint > 0 && $dbedittpv == '1'))
		{
			$urlcambiatpv = "#";
		}
		else
		{
			$urlcambiatpv = "index.php?module=tpv&section=ct&id=".$idtpv;
		}
                
                if($dbedittpv == '1'){$urlcambiatpv = "index.php?module=tpv&section=ct&id=".$idtpv;}

        echo 'Serie:  <a href="'.$urlcambiatpv.'" >'.$dbserie.'</a>  Empresa:  <a href="'.$urlcambiatpv.'" >'.$dbrazonsocial.'</a></br> ';
        echo 'Tercero:  <a href="'.$urlcambiatpv.'" >'.$dbclirazonsocial.'</a>';
        ?>

</div>
<div class="col-4" align="right">
<?php
$sqlaux = $mysqli->query("select sum(importe) as contador from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$tpv_bi = $rowaux["contador"];

$cnsaux = $mysqli->query("SELECT sum(importe) as sumatax from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$tpv_taxes = $rowaux["sumatax"];

$tpv_total = $tpv_bi + $tpv_taxes;

$tpv_total = round($tpv_total, 2);
$tpv_bi = round($tpv_bi, 2);

?>
    
    
    Total: <font size=6><span id="tpv-total"><?php echo $tpv_total; ?></span></font> eur </br>
	<a href="index.php?module=tpv&section=list" class="btnedit">Aparcar ticket</a> 
	<?php
        
        echo '<a href="index.php?module=tpv&section=tpv&action=cajon&id='.$idtpv.'" class="btnedit">Cajón</a> ';
        
        
        if($dbcodigoint == '0'){echo '<a href="index.php?module=tpv&section=tpv&action=cerrar&id='.$idtpv.'" class="btnedit_verde">Finalizar ticket</a> ';}
        
        if($dbedittpv == '1'){echo '<a href="index.php?module=tpv&section=tpv&action=onlyprint&id='.$idtpv.'" class="btnedit_verde">Imprimir ticket</a> ';}
        
        ?>

	</div>
</div>
<div class="row">
	<div class="col">
<?php
if($dbcodigoint == '0' || $dbedittpv == '1')
{
    include("modules/tpv/tpv/izquierda.php");
}
else
{    
    include("modules/tpv/tpv/izquierda_pagos.php");
}
?>


</div>
<div class="col-8" style="max-width: 700px;">



<?php

if($dbcodigoint == '0' || $dbedittpv == '1')
{
    include("modules/tpv/tpv/derecha.php"); 
}
else
{    
    include("modules/tpv/tpv/derecha_read.php"); 
}

?>

</div>
</div>

<div class="fondonegro" id="capa_fondonegro" >
   

    
</div>

<div class="tecladopantalla" id="tpv_tecladonum">
    <div align="center">
    <p>Precio: <input type="text" value="" name="txtteclado" id="txtteclado" maxlength="10"/> <a href="javascript:cerrartecladonum();" class="btnenlacecancel">X</a></p>
    <input type="hidden" name="hkbrdlinea" id="hkbrdlinea" value="" />
    <table>
    <tr height="80">
    <td width="70"><a href="javascript:kbrdenviotecla(7);" class="btnteclado">7</a></td>
    <td width="70"><a href="javascript:kbrdenviotecla(8);" class="btnteclado">8</a></td>
    <td width="70"><a href="javascript:kbrdenviotecla(9);" class="btnteclado">9</a></td>
    <td width="70" align="right"><a href="javascript:kbrdenviotecla('borrauno');" class="btnteclado_rojo"> <--- </a></td>
    </tr>
    
    <tr height="80">
    <td><a href="javascript:kbrdenviotecla(4);" class="btnteclado">4</a></td>
    <td><a href="javascript:kbrdenviotecla(5);" class="btnteclado">5</a></td>
    <td><a href="javascript:kbrdenviotecla(6);" class="btnteclado">6</a></td>
    <td width="70" align="right"><a href="javascript:kbrdenviotecla('borratodo');" class="btnteclado_rojo">Borrar</a></td>
    </tr>
    
    <tr height="80">
    <td><a href="javascript:kbrdenviotecla(1);" class="btnteclado">1</a></td>
    <td><a href="javascript:kbrdenviotecla(2);" class="btnteclado">2</a></td>
    <td><a href="javascript:kbrdenviotecla(3);" class="btnteclado">3</a></td>
    <td width="70"> </td>
    </tr>
    
    <tr height="80">
    <td><a href="javascript:kbrdenviotecla(0);" class="btnteclado">0</a></td>
    <td><a href="javascript:kbrdenviotecla('comadecimal');" class="btnteclado">,</a></td>
    <td> </td>
    <td align="right"><a href="javascript:aceptartecladonum();" class="btnteclado_verde">Aceptar</a></td>
    </tr>
    </table>
    </div>
</div>

<div class="tecladopantallaqwerty" id="tpv_tecladoqwerty">
    <div align="center">
    <p>Texto: <input type="text" value="" name="txttecladoqwerty" id="txttecladoqwerty" maxlength="50" style="width: Calc(100% - 150px);"/> <a href="javascript:cerrartecladoqwerty();" class="btnenlacecancel">X</a></p>
    <input type="hidden" value="" name="kbdhnombrecampo" id="kbdhnombrecampo" />
<table>
<tr height="80">
<td width="900" align="center">
    <a href="javascript:kbrqwertydenviotecla('1');" class="btntecladoqwety">1</a> 
    <a href="javascript:kbrqwertydenviotecla('2');" class="btntecladoqwety">2</a> 
    <a href="javascript:kbrqwertydenviotecla('3');" class="btntecladoqwety">3</a> 
    <a href="javascript:kbrqwertydenviotecla('4');" class="btntecladoqwety">4</a> 
    <a href="javascript:kbrqwertydenviotecla('5');" class="btntecladoqwety">5</a> 
    <a href="javascript:kbrqwertydenviotecla('6');" class="btntecladoqwety">6</a> 
    <a href="javascript:kbrqwertydenviotecla('7');" class="btntecladoqwety">7</a> 
    <a href="javascript:kbrqwertydenviotecla('8');" class="btntecladoqwety">8</a> 
    <a href="javascript:kbrqwertydenviotecla('9');" class="btntecladoqwety">9</a> 
    <a href="javascript:kbrqwertydenviotecla('0');" class="btntecladoqwety">0</a> 
    <a href="javascript:kbrqwertydenviotecla('borrauno');" class="btnteclado_rojo"> <--- </a>

</td>
</tr>
<tr height="80">
<td width="900" align="center">
    <div id="capa_minus1">
    
    
    <a href="javascript:kbrqwertydenviotecla('q');" class="btntecladoqwety">q</a> 
    <a href="javascript:kbrqwertydenviotecla('w');" class="btntecladoqwety">w</a> 
    <a href="javascript:kbrqwertydenviotecla('e');" class="btntecladoqwety">e</a> 
    <a href="javascript:kbrqwertydenviotecla('r');" class="btntecladoqwety">r</a> 
    <a href="javascript:kbrqwertydenviotecla('t');" class="btntecladoqwety">t</a> 
    <a href="javascript:kbrqwertydenviotecla('y');" class="btntecladoqwety">y</a> 
    <a href="javascript:kbrqwertydenviotecla('u');" class="btntecladoqwety">u</a> 
    <a href="javascript:kbrqwertydenviotecla('i');" class="btntecladoqwety">i</a> 
    <a href="javascript:kbrqwertydenviotecla('o');" class="btntecladoqwety">o</a> 
    <a href="javascript:kbrqwertydenviotecla('p');" class="btntecladoqwety">p</a>
    <a href="javascript:aceptartecladoqwerty();" class="btnteclado_verde">Aceptar</a>
    </div>
    
    <div id="capa_mayus1" style="display: none;">
    
    
    <a href="javascript:kbrqwertydenviotecla('Q');" class="btntecladoqwety">Q</a> 
    <a href="javascript:kbrqwertydenviotecla('W');" class="btntecladoqwety">W</a> 
    <a href="javascript:kbrqwertydenviotecla('E');" class="btntecladoqwety">E</a> 
    <a href="javascript:kbrqwertydenviotecla('R');" class="btntecladoqwety">R</a> 
    <a href="javascript:kbrqwertydenviotecla('T');" class="btntecladoqwety">T</a> 
    <a href="javascript:kbrqwertydenviotecla('Y');" class="btntecladoqwety">Y</a> 
    <a href="javascript:kbrqwertydenviotecla('U');" class="btntecladoqwety">U</a> 
    <a href="javascript:kbrqwertydenviotecla('I');" class="btntecladoqwety">I</a> 
    <a href="javascript:kbrqwertydenviotecla('O');" class="btntecladoqwety">O</a> 
    <a href="javascript:kbrqwertydenviotecla('P');" class="btntecladoqwety">P</a> 
    <a href="javascript:aceptartecladoqwerty();" class="btnteclado_verde">Aceptar</a>
    </div>
    
</td>
</tr>

<tr height="80">
<td width="900" align="center">
    <div id="capa_minus2">
    <a href="javascript:activamayus();" class="btntecladoqwety">MAYUS</a> 
    
    <a href="javascript:kbrqwertydenviotecla('a');" class="btntecladoqwety">a</a> 
    <a href="javascript:kbrqwertydenviotecla('s');" class="btntecladoqwety">s</a> 
    <a href="javascript:kbrqwertydenviotecla('d');" class="btntecladoqwety">d</a> 
    <a href="javascript:kbrqwertydenviotecla('f');" class="btntecladoqwety">f</a> 
    <a href="javascript:kbrqwertydenviotecla('g');" class="btntecladoqwety">g</a> 
    <a href="javascript:kbrqwertydenviotecla('h');" class="btntecladoqwety">h</a> 
    <a href="javascript:kbrqwertydenviotecla('j');" class="btntecladoqwety">j</a> 
    <a href="javascript:kbrqwertydenviotecla('k');" class="btntecladoqwety">k</a> 
    <a href="javascript:kbrqwertydenviotecla('l');" class="btntecladoqwety">l</a> 
    <a href="javascript:kbrqwertydenviotecla('ñ');" class="btntecladoqwety">ñ</a> 
    </div>
    
    <div id="capa_mayus2" style="display: none;">
    <a href="javascript:desactivamayus();" class="btntecladoqwetymayuson">MAYUS</a> 
    
    <a href="javascript:kbrqwertydenviotecla('A');" class="btntecladoqwety">A</a> 
    <a href="javascript:kbrqwertydenviotecla('S');" class="btntecladoqwety">S</a> 
    <a href="javascript:kbrqwertydenviotecla('D');" class="btntecladoqwety">D</a> 
    <a href="javascript:kbrqwertydenviotecla('F');" class="btntecladoqwety">F</a> 
    <a href="javascript:kbrqwertydenviotecla('G');" class="btntecladoqwety">G</a> 
    <a href="javascript:kbrqwertydenviotecla('H');" class="btntecladoqwety">H</a> 
    <a href="javascript:kbrqwertydenviotecla('J');" class="btntecladoqwety">J</a> 
    <a href="javascript:kbrqwertydenviotecla('K');" class="btntecladoqwety">K</a> 
    <a href="javascript:kbrqwertydenviotecla('L');" class="btntecladoqwety">L</a> 
    <a href="javascript:kbrqwertydenviotecla('Ñ');" class="btntecladoqwety">Ñ</a> 
    </div>
</td>
</tr>

<tr height="80">
<td width="900" align="center">
    <div id="capa_minus3">
    <a href="javascript:kbrqwertydenviotecla('z');" class="btntecladoqwety">z</a> 
    <a href="javascript:kbrqwertydenviotecla('x');" class="btntecladoqwety">x</a> 
    <a href="javascript:kbrqwertydenviotecla('c');" class="btntecladoqwety">c</a> 
    <a href="javascript:kbrqwertydenviotecla('v');" class="btntecladoqwety">v</a> 
    <a href="javascript:kbrqwertydenviotecla('b');" class="btntecladoqwety">b</a> 
    <a href="javascript:kbrqwertydenviotecla('n');" class="btntecladoqwety">n</a> 
    <a href="javascript:kbrqwertydenviotecla('m');" class="btntecladoqwety">m</a> 
    <a href="javascript:kbrqwertydenviotecla(',');" class="btntecladoqwety">,</a> 
    <a href="javascript:kbrqwertydenviotecla('.');" class="btntecladoqwety">.</a> 
    <a href="javascript:kbrqwertydenviotecla('-');" class="btntecladoqwety">-</a> 
    </div>
    <div id="capa_mayus3" style="display: none;">
    <a href="javascript:kbrqwertydenviotecla('Z');" class="btntecladoqwety">Z</a> 
    <a href="javascript:kbrqwertydenviotecla('X');" class="btntecladoqwety">X</a> 
    <a href="javascript:kbrqwertydenviotecla('C');" class="btntecladoqwety">C</a> 
    <a href="javascript:kbrqwertydenviotecla('V');" class="btntecladoqwety">V</a> 
    <a href="javascript:kbrqwertydenviotecla('B');" class="btntecladoqwety">B</a> 
    <a href="javascript:kbrqwertydenviotecla('N');" class="btntecladoqwety">N</a> 
    <a href="javascript:kbrqwertydenviotecla('M');" class="btntecladoqwety">M</a> 
    <a href="javascript:kbrqwertydenviotecla(';');" class="btntecladoqwety">;</a> 
    <a href="javascript:kbrqwertydenviotecla(':');" class="btntecladoqwety">:</a> 
    <a href="javascript:kbrqwertydenviotecla('_');" class="btntecladoqwety">_</a> 
    </div>
</td>
</tr>

<tr height="80">
<td width="900" align="center">
    <a href="javascript:kbrqwertydenviotecla(' ');" class="btntecladoqwety">[________]</a> 


</td>
</tr>

    </table>
    </div>
</div>