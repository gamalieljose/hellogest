<?php
function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}

$ficherito = generarCodigo(15); // genera un cÃ³digo de 15 caracteres de longitud.
	

if ($flstprinter == '0')
{
    //Si es PDF imprime en el directorio temporal del usuario
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
    $row = mysqli_fetch_assoc($ConsultaMySql);
    $usuariofolder = $row['username'];
	
    $rutaficheropdf = $lnxrutaficherostemp."usr/".$usuariofolder."/documento.pdf";
	
}
else
{    
    //Si es diferente de PDF envia la impresión al printspooler
    $rutaficheropdf = $lnxprintspool."job_".$ficherito.".pdf";
    
    $prtjobsql= $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo, iduser, display) values ('".$flstprinter."', 'job_".$ficherito.".pdf', '2', '".$_COOKIE["lnxuserid"]."', 'Listado de TPV vista facturación')");
}


$f_fechadesde = $_POST["dpkfechadesde"];
$f_fechahasta = $_POST["dpkfechahasta"];
$f_lstseries = $_POST["lstseries"];
$f_lsttiendas = $_POST["lsttiendas"];
$f_lstterminal = $_POST["lstterminal"];

$xfecha = explode("/", $f_fechadesde);
    $f_fdesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0]." 00:00:00";
$xfecha = explode("/", $f_fechahasta);
    $f_fhasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0]." 23:59:59";

if ($f_lstseries == '' || $f_lstseries == '0')
{ $sql_seriestpv = " idserie > '0' ";}
else
{ $sql_seriestpv = " idserie = '".$f_lstseries."'";}

if ($f_lsttiendas == '' || $f_lsttiendas == '0')
{ $sql_tienda = "";}
else
{ $sql_tienda = " and idtienda = '".$f_lsttiendas."'";}
    
if ($f_lstterminal == '' || $f_lstterminal == '0')
{ $sql_terminal = "";}
else
{ $sql_terminal = " and idterminal = '".$f_lstterminal."'";}  

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$f_lstseries."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_serie = $rowaux["serie"];
$dbidempresa = $rowaux["idempresa"];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$dbidempresa."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_empresa = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$f_lsttiendas."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tienda = $rowaux["tienda"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."pos_terminales where id = '".$f_lstterminal."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_terminal = $rowaux["descripcion"];


$max_lineas = 30; //Numero de linas por página

require('scripts/fpdf/fpdf.php');
require('scripts/fpdf/writehtml.php');

$pdf = new FPDF();
// Inicio cabecera
$pdf->AddPage('L', 'A4');
$pdf->SetFont('Arial','B',16);
$pdf->text(10,10, "Listado TPV");
$pdf->Line(10, 11, 290, 11);

$pdf->SetFont('Arial','',10);

// FIN cabecera ---------------------

$pdf->setY(20);
$pdf->Cell(50,5,"Fecha(s)",1,0,'L');
$xtexto = $f_fechadesde." - ".$f_fechahasta;
$pdf->Cell(70,5,$xtexto,0,1,'L');

$pdf->setY(25);
$pdf->Cell(50,5,"Empresa",1,0,'L');
$pdf->Cell(70,5,$lbl_empresa,0,1,'L');

$pdf->setY(30);
$pdf->Cell(50,5,"Serie TPV",1,0,'L');
$pdf->Cell(70,5,$lbl_serie,0,1,'L');

$pdf->setY(35);
$pdf->Cell(50,5,"Tienda",1,0,'L');
$pdf->Cell(70,5,$lbl_tienda,0,1,'L');

$pdf->setY(40);
$pdf->Cell(50,5,"Caja",1,0,'L');
$pdf->Cell(70,5,$lbl_terminal,0,1,'L');

$totalventas = '0';
$totalcompras = '0';

$cnssql = "select 'Ticket' as tipo, id, codigo, fecha from ".$prefixsql."tpv where codigoint > '0' and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') union all select 'Movimiento' as tipo, id, codigo, fecha from ".$prefixsql."tpv_cajon where (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') order by fecha ";
$ConsultaMySql= $mysqli->query($cnssql);
while($col = mysqli_fetch_array($ConsultaMySql))
{
    if($col["tipo"] == 'Ticket')
    {
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $importelineas = $rowaux["importe"];
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $importelineastax = $rowaux["importe"];
        
        $total = $importelineas + $importelineastax;
        $totalventas = $totalventas + $total;
        
        
        $cnsmovtax= $mysqli->query("select * from ".$prefixsql."tpv_lineas_tax where idtpv = '".$col["id"]."'");
        while($colmovtax = mysqli_fetch_array($cnsmovtax))
        {
            $idtax = $colmovtax["idtax"];
              
                $importeanterior = $v_importetax[$idtax];
                $v_importetax[$idtax] = $importeanterior + $colmovtax["importe"];
            
        }
        
        
        
        
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idtpv = '".$col["id"]."' and (tipo = 'TCKT' or tipo = 'TPAGO') ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $importepagado = $rowaux["importe"];
        
        $totalpagado = $totalpagado + $importepagado;
        
        //ahora calculamos los campos personalizados
        
        $cnssqlcustom = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' and tipo = 'float' ");
        while($colcustom = mysqli_fetch_array($cnssqlcustom))
        {
            $idfpago = $colcustom["id"];
            $importeantes = $totalcampocustom[$idfpago];
            
            $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_campos where idtpv = '".$col["id"]."' and campo = '".$colcustom["campo"]."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $importecustom = $rowaux["valor"];
            
            $totalcampocustom[$idfpago] = $importeantes + $importecustom;
        }
        
    }
    
    if($col["tipo"] == 'Movimiento')
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbtipomov = $rowaux["tipomov"];
        $total = $rowaux["importe"];
        
        $cnsmovtax= $mysqli->query("select * from ".$prefixsql."tpv_cajon_tax where idcajon = '".$col["id"]."'");
        while($colmovtax = mysqli_fetch_array($cnsmovtax))
        {
            $idtax = $colmovtax["idtax"];
            if($dbtipomov == 'IN')
            {   
                $importeanterior = $v_importetax[$idtax];
                $v_importetax[$idtax] = $importeanterior + $colmovtax["importe"];
            }
            if($dbtipomov == 'OUT')
            {   
                $importeanterior = $c_importetax[$idtax];
                $c_importetax[$idtax] = $importeanterior + $colmovtax["importe"];
            }
            
        }
        
        if($dbtipomov == 'IN')
        { 
            $totalventas = $totalventas + $total;
            $totalpagado = $totalpagado + $total;
        }
        if($dbtipomov == 'OUT')
        {
            $totalcompras = $totalcompras + $total;
            $totalpagado = $totalpagado - $total;
        }
    }
}

$pdf->setY(80);
$pdf->Cell(30,5,"Concepto",1,0,'L');
$pdf->Cell(20,5,"Importe",1,0,'L');

$cnsmovtax= $mysqli->query("select * from ".$prefixsql."impuestosrules where idserie = '".$f_lstseries."'");
while($colmovtax = mysqli_fetch_array($cnsmovtax))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$colmovtax["idimpuesto"]."' ");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lblimpuesto = $rowaux["impuesto"];
    
    $pdf->Cell(20,5,$lblimpuesto,1,0,'R');
    
}
$pdf->Cell(5,5," ",0,1,'L');


$totalventas = round($totalventas, 2);

$pdf->setY(85);
$pdf->Cell(30,5,"Total Ventas",0,0,'L');
$pdf->Cell(20,5,$totalventas,0,0,'R');

$cnsmovtax= $mysqli->query("select * from ".$prefixsql."impuestosrules where idserie = '".$f_lstseries."'");
while($colmovtax = mysqli_fetch_array($cnsmovtax))
{
    $idtax = $colmovtax["idimpuesto"];
    $lblimpuesto = round($v_importetax[$idtax], 2);
    $pdf->Cell(20,5,$lblimpuesto,0,0,'R');
    
}
$pdf->Cell(5,5," ",0,1,'L');

$totalpagado = round($totalpagado, 2);
$pdf->setY(90);
$pdf->Cell(30,5,"Total Pagado",0,0,'L');
$pdf->Cell(20,5,$totalpagado,0,1,'R');

$pdf->setY(95);
$pdf->Cell(30,5,"Total Compras",0,0,'L');
$pdf->Cell(20,5,$totalcompras,0,0,'R');
$cnsmovtax= $mysqli->query("select * from ".$prefixsql."impuestosrules where idserie = '".$f_lstseries."'");
while($colmovtax = mysqli_fetch_array($cnsmovtax))
{
    $idtax = $colmovtax["idimpuesto"];
    $lblimpuesto = round($c_importetax[$idtax], 2);
    $pdf->Cell(20,5,$lblimpuesto,0,0,'R');
    
}
$pdf->Cell(5,5," ",0,1,'L');


$total_caja = $totalventas - $totalcompras;
$total_caja = round($total_caja, 2);
$pdf->SetFont('Arial','B',11);

$pdf->setY(100);
$pdf->Cell(30,5,"Total Caja",0,0,'L');
$pdf->Cell(20,5,$total_caja,0,0,'R');
$cnsmovtax= $mysqli->query("select * from ".$prefixsql."impuestosrules where idserie = '".$f_lstseries."'");
while($colmovtax = mysqli_fetch_array($cnsmovtax))
{
    $idtax = $colmovtax["idimpuesto"];
    $lblimpuesto = $v_importetax[$idtax] - $c_importetax[$idtax];
    $lblimpuesto = round($lblimpuesto, 2);
    $pdf->Cell(20,5,$lblimpuesto,0,0,'R');
    
}
$pdf->Cell(5,5," ",0,1,'L');




$pdf->SetFont('Arial','',10);


$pdf->setY(80);
$pdf->setX(150);
$pdf->Cell(50,5,"Campos personalizados",1,0,'L');
$pdf->Cell(20,5,"Importe",1,1,'L');

$poscustomy = 80;

$cnssqlcustom = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' and tipo = 'float' ");
while($colcustom = mysqli_fetch_array($cnssqlcustom))
{
    $idfpago = $colcustom["id"];
    $poscustomy = $poscustomy + 5;
    $pdf->setY($poscustomy);
    $pdf->setX(150);
    $pdf->Cell(50,5,$colcustom["campo"],0,0,'L');
    $pdf->Cell(20,5,$totalcampocustom[$idfpago],0,1,'R');

     
}




// $max_lineas
$linea = 0;


$cnssql = "select 'Ticket' as tipo, id, codigo, fecha from ".$prefixsql."tpv where codigoint > '0' and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') union all select 'Movimiento' as tipo, id, codigo, fecha from ".$prefixsql."tpv_cajon where (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') order by fecha ";
$ConsultaMySql= $mysqli->query($cnssql);

$numregistros = $ConsultaMySql->num_rows;

$paginas = $numregistros / $max_lineas;
$paginas = ceil($paginas);
$paginas = $paginas + 1;
$pag_actual = 1;
$lbl_pagina = "Pagina ".$pag_actual." de ".$paginas;

$pdf->text(10,200, $lbl_pagina);


while($col = mysqli_fetch_array($ConsultaMySql))
{
    if($linea == $max_lineas ){$linea = '0';}
    if($linea == '0')
    {  
    // Inicio cabecera
    $pdf->AddPage('L', 'A4');
    $pdf->SetFont('Arial','B',16);
    $pdf->text(10,10, "Listado TPV");
    $pdf->Line(10, 11, 290, 11);

    $pdf->SetFont('Arial','',10);
    
    $pag_actual = $pag_actual +1;
    $lbl_pagina = "Pagina ".$pag_actual." de ".$paginas;

    $pdf->text(10,200, $lbl_pagina);

    // FIN cabecera ---------------------

    $pdf->setY(15);
    $pdf->Cell(25,5,"Tipo",1,0,'L');
    $pdf->Cell(30,5,"Codigo",1,0,'L');
    $pdf->Cell(25,5,"Fecha",1,0,'L');
    $pdf->Cell(70,5,"Tercero / Motivo",1,0,'L');
    $pdf->Cell(30,5,"F. Pago",1,0,'L');
    $pdf->Cell(20,5,"Ventas",1,0,'L');
    $pdf->Cell(20,5,"Compras",1,0,'L');
    
    $sqlcamposcustom = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' ");
    while($colcc = mysqli_fetch_array($sqlcamposcustom))
    {
        $str = utf8_decode($colcc["campo"]);
        $pdf->Cell(25,5,$str,1,0,'L');
    }

    $pdf->Cell(5,5," ",0,1,'L');
    
    
    $alturalinea = 15;
    }
    
    $linea = $linea + 1;
    $alturalinea = $alturalinea + 5;
    
    $xvartemp = explode(" ",$col["fecha"]);
    $xvartemp2 = explode("-",$xvartemp[0]);
    $lblfecha = $xvartemp2[2]."/".$xvartemp2[1]."/".$xvartemp2[0];
    
    
    
    if($col["tipo"] == 'Ticket')
    {
        $lbl_tipo = ">> Ticket";
        $lbl_fpago = '';
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_codigo = $rowaux["codigo"];
        $dbidtercero = $rowaux["idtercero"];
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_tercero = $rowaux["razonsocial"];
        
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $importelineas = $rowaux["importe"];
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $importelineastax = $rowaux["importe"];
        
        $lbl_ventas = $importelineas + $importelineastax;
        $lbl_compras = '0';
        
        $cnssqlcustom = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' ");
        while($colcustom = mysqli_fetch_array($cnssqlcustom))
        {
            $idfpago = $colcustom["id"];
                        
            $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_campos where idtpv = '".$col["id"]."' and campo = '".$colcustom["campo"]."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $totalcampocustom[$idfpago] = $rowaux["valor"];

        }
        
    }
    if($col["tipo"] == 'Movimiento')
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbtipomov = $rowaux["tipomov"];
        $lbl_codigo = $rowaux["codigo"];
        $dbidtercero = $rowaux["idtercero"];
        $dbidfpago = $rowaux["idfpago"];
        $dbimporte = $rowaux["importe"];
        
        if($dbidtercero > '0')
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $lbl_tercero = $rowaux["razonsocial"];
        }
        else 
        {
            $lbl_tercero = $rowaux["motivo"];
        }
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$dbidfpago."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_fpago = $rowaux["formapago"];
        
        if($dbtipomov == 'IN')
        {
            $lbl_tipo = ">> Movimiento";
            $lbl_ventas = $dbimporte;
            $lbl_compras = '0';
        }
        if($dbtipomov == 'OUT')
        {
            $lbl_tipo = "<< Movimiento";
            $lbl_ventas = '0';
            $lbl_compras = $dbimporte;
        }
    }
    
    $lbl_ventas = number_format($lbl_ventas,2,".",",");
    $lbl_compras = number_format($lbl_compras,2,".",",");
    
    if($lbl_ventas == '0.00'){$lbl_ventas = '';}
    if($lbl_compras == '0.00'){$lbl_compras = '';}
    
    $pdf->setY($alturalinea);
    $pdf->Cell(25,5,$lbl_tipo,0,0,'L');
    $pdf->Cell(30,5,$lbl_codigo,0,0,'L');
    $pdf->Cell(25,5,$lblfecha,0,0,'L');
    $pdf->Cell(70,5,$lbl_tercero,0,0,'L');
    $pdf->Cell(30,5,$lbl_fpago,0,0,'L');
    $pdf->Cell(20,5,$lbl_ventas,0,0,'R');
    
    
    if($col["tipo"] == 'Ticket')
    {
    $pdf->Cell(20,5,$lbl_compras,0,0,'R');
        $cnssqlcustom = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' ");
        while($colcustom = mysqli_fetch_array($cnssqlcustom))
        {
            $idfpago = $colcustom["id"];
            $lbl_campocustom = $totalcampocustom[$idfpago];
            if($colcustom["tipo"] == 'float'){$alinear = 'R';}else{$alinear = 'L';}
            $pdf->Cell(25,5,$lbl_campocustom,0,0,$alinear);    

        }
    }
    else
    {
        $pdf->Cell(20,5,$lbl_compras,0,1,'R');
    }
}


$pdf->Output('F', $rutaficheropdf);
?>

