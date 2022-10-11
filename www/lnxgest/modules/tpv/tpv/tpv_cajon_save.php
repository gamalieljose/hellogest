<?php

$idtpv = $_POST["hidtpv"]; //obtenemos el Id del ticket que estaba editando para volver despues
$fhaccion = $_POST["haccion"];

$fhidterminal = $_POST["hidterminal"]; //ID Terminal desde el que se hizo el movimiento
$fhidtienda = $_POST["hidtienda"]; //idtienda
$flstusuario = $_POST["lstusuario"];
$fhidserie = $_POST["hidserie"];
$tipomov = $_POST["optmovimiento"];
$ftxtmotivo = $_POST["txtmotivo"];
$ftxtimporte = $_POST["txtimporte"];
$flstformapago = $_POST["lstformapago"];

$ftxttax = $_POST["txttax"];
$ftxtimportebi = $_POST["txtimportebi"];

if($fhaccion == "new")
{
    $fechita = date("Y-m-d h:m:s");
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$fhidserie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $db_lblserie = $rowaux["serie"];
    
    $sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."tpv_cajon where idserie = '".$fhidserie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $ultimoid = $rowaux["contador"];
    $ultimoid = $ultimoid +1;
    
    $xcodigo = $db_lblserie."-MV/".$ultimoid;
    
    $sqlcamposcustom = $mysqli->query("insert into ".$prefixsql."tpv_cajon (idtienda, iduser, idterminal, idserie, codigoint, codigo, fecha, idtercero, tipomov, motivo, importe, idfpago) VALUES ('".$fhidtienda."', '".$flstusuario."', '".$fhidterminal."', '".$fhidserie."', '".$ultimoid."', '".$xcodigo."', '".$fechita."', '0', '".$tipomov."', '".$ftxtmotivo."', '".$ftxtimporte."', '".$flstformapago."')");
    
    $sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."tpv_cajon "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $idtpvcajon = $rowaux["contador"];
    
    
    $tipomov = "MV".$tipomov;
    $sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_pagos (idtienda, iduser, idterminal, idserie, idtpv, tipo, fecha, idfpago, importe) values('".$fhidtienda."', '".$flstusuario."', '".$fhidterminal."', '".$fhidserie."', '".$idtpvcajon."', '".$tipomov."', '".$fechita."', '".$flstformapago."', '".$ftxtimporte."')");

    
    //insertamos los impuestos del movimiento  creado
		
    
		$idtemp = '0';
		foreach($ftxttax as $impimpuesto){
			$valor = $impimpuesto;
				
			$var = $_POST["hidimpuesto"][$idtemp];
					
				$idimpuesto = $var;
				$valorimpuesto = $valor;
				
				if($valorimpuesto <> '')
				{
                                    //Calculamos el importe por impuesto
                                    $ftxtimportebi = round($ftxtimportebi, 2);
                                    $lblimporte = $ftxtimportebi / 100 * $valorimpuesto;
                                    $lblimporte = round($lblimporte, 2);
                                    
					$ssql_insimp = $mysqli->query("insert into ".$prefixsql."tpv_cajon_tax (idcajon, idtax, valor, importe) values ('".$idtpvcajon."', '".$idimpuesto."', '".$valorimpuesto."', '".$lblimporte."')");
				}
				//insertamos los impuestos a la bbdd
				
			$idtemp = $idtemp + 1;
				
		}
    
    
    $url_atras = "index.php?module=tpv&section=tpv&action=view&id=".$idtpv;
}

if($fhaccion == "update")
{
    $idmovimiento = $_POST["hidmovimiento"];
    $ftxtfecha = $_POST["txtfecha"];
    $flsthh = $_POST["lsthh"];
    $flstmm = $_POST["lstmm"];
    
    
    $xfecha = explode("/", $ftxtfecha);
    
    $fechacompleta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0]." ".$flsthh.":".$flstmm.":00";
    
    $fchktercero = $_POST["chktercero"];
    $flsttercero = $_POST["lsttercero"];
    $foptmovimiento = $_POST["optmovimiento"];
    $ftxtmotivo = addslashes($_POST["txtmotivo"]);
    $ftxtimporte = $_POST["txtimporte"];
    $flstformapago = $_POST["lstformapago"];
    $flstusuario = $_POST["lstusuario"];
    
    $flstseries = $_POST["lstseries"];
    
    if($fchktercero == 'YES'){$xidtercero = $flsttercero;}else{$xidtercero = '0';}
    
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$idmovimiento."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $original_idserie = $rowaux["idserie"];
    
    if($flstseries <> $original_idserie)
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$flstseries."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $nombreserie = $rowaux["serie"];
        $nombreserie = $nombreserie."-MV/";
                
        $sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."tpv_cajon where idserie = '".$flstseries."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $codigonuevaserie = $rowaux["contador"] +1;
            
        $sqlserie = ", idserie = '".$flstseries."', codigo = '".$nombreserie.$codigonuevaserie."', codigoint = '".$codigonuevaserie."' ";
    }
    else
    {
        $sqlserie = "";
    }
    
     
    //Eliminamos el pago asociado
    $ssql_insimp = $mysqli->query("delete from ".$prefixsql."tpv_pagos where idtpv = '".$idmovimiento."' and (tipo = 'MVOUT' or tipo = 'MVIN') ");
    
    //Añadimos el registro correspondiente al pago
    $tipomov = "MV".$tipomov;
    $sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_pagos (idtienda, iduser, idterminal, idserie, idtpv, tipo, fecha, idfpago, importe) values(idtienda, iduser, idterminal, '".$flstseries."', '".$idmovimiento."', '".$tipomov."', '".$fechacompleta."', '".flstformapago."', '".$ftxtimporte."')");

    
    
    $sqldebug = "update ".$prefixsql."tpv_cajon set iduser = '".$flstusuario."', idtercero = '".$xidtercero."', fecha = '".$fechacompleta."', tipomov = '".$foptmovimiento."', motivo='".$ftxtmotivo."', importe = '".$ftxtimporte."', idfpago = '".$flstformapago."' ".$sqlserie." where id = '".$idmovimiento."'";
    $sqltpv = $mysqli->query($sqldebug);

    
    //insertamos los impuestos del movimiento  creado
    $ssql_insimp = $mysqli->query("delete from ".$prefixsql."tpv_cajon_tax where idcajon = '".$idmovimiento."'");
    
		$idtemp = '0';
		foreach($ftxttax as $impimpuesto){
			$valor = $impimpuesto;
				
			$var = $_POST["hidimpuesto"][$idtemp];
					
				$idimpuesto = $var;
				$valorimpuesto = $valor;
				
				if($valorimpuesto <> '')
				{
                                    //Calculamos el importe por impuesto
                                    $ftxtimportebi = round($ftxtimportebi, 2);
                                    $lblimporte = $ftxtimportebi / 100 * $valorimpuesto;
                                    $lblimporte = round($lblimporte, 2);
                                    
					$ssql_insimp = $mysqli->query("insert into ".$prefixsql."tpv_cajon_tax (idcajon, idtax, valor, importe) values ('".$idmovimiento."', '".$idimpuesto."', '".$valorimpuesto."', '".$lblimporte."')");
				}
				//insertamos los impuestos a la bbdd
				
			$idtemp = $idtemp + 1;
				
		}
    
    
    
    
    $url_atras = "index.php?module=tpv&section=mov";
}



header( "refresh:2;url=".$url_atras );
echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a> ';
	echo '</td></tr>
	</table></div>';


?>
