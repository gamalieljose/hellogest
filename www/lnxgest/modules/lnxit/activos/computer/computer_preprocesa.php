<?php
include("modules/lnxit/activos/tabs.php");

$fhidactivo = $_POST["hidactivo"];
$urlatras = "index.php?module=lnxit&section=activos&ss=computer&id=".$fhidactivo;


$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dirusuario = $rowaux["username"];

$rutaficheromsinfo = $lnxrutaficherostemp."usr/".$dirusuario."/fichero.xml";


if (is_uploaded_file($_FILES['ficheritonfo']['tmp_name']))
{  
    move_uploaded_file($_FILES['ficheritonfo']['tmp_name'], $rutaficheromsinfo);




$xmllabel_nomso = ""; //Nombre sistema operativo
$xmllabel_versionso = ""; //Version sistema operativo
$xmllabel_nompc = ""; //nombre del equipo
$xmllabel_pcmodel = ""; //Modelo equipo
$xmllabel_pb_modelo = ""; //Modelo Placa base
$xmllabel_pb_fabric = ""; //Fabricante placa base
$xmllabel_pb_procesador = "";
$xmllabel_username = "";
$xmllabel_ram = "";

// Recursos del sistema
$xml = simplexml_load_file($rutaficheromsinfo);

foreach ($xml->Category->Data as $xml_categoria) 
{
    if($xml_categoria->Elemento == "Nombre del SO"){$xmllabel_nomso = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Versión"){$xmllabel_versionso = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Nombre del sistema"){$xmllabel_nompc = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Producto de placa base"){$xmllabel_pb_modelo = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Fabricante del sistema"){$xmllabel_pb_fabric = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Procesador"){$xmllabel_pb_procesador = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Nombre de usuario"){$xmllabel_username = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Memoria física instalada (RAM)"){$xmllabel_ram = $xml_categoria->Valor;}
    if($xml_categoria->Elemento == "Modelo del sistema"){$xmllabel_pcmodel = $xml_categoria->Valor;}
    

}

//Tarjetas de red
$aryaddrmac = array();
$aryaddrip = array();
$tarjeta = 0;


$arraytarjeta[][] = array();

$idlinea = 0;

$totallineas = count($xml->Category[0]->Category[1]->Category[7]->Category[0]->Data);

foreach ($xml->Category[0]->Category[1]->Category[7]->Category[0]->Data as $xml_categoria) 
{
    $idlinea = $idlinea +1;

    if($xml_categoria->Elemento == "Nombre")
    {
        $tarjeta = $tarjeta + 1;
    }

    $lineatexto = $xml_categoria->Elemento->__toString()."===".$xml_categoria->Valor->__toString();

    $arraytarjeta[$tarjeta][$idlinea] = $lineatexto;
   
}


echo '<form name="frmactivonfo" method="POST" action="index.php?module=lnxit&section=activos&ss=computer&id='.$fhidactivo.'&action=save" >';
?>
<div align="center">

<div class="msgaviso" style="width: 100%; max-width:400px;">
<p><img src="img/exclamation.png"/></p>
<p>Se reemplazaran los datos actuales por los siguientes, este prcoeso no es reversible</p>
</div>
</div>

<input type="hidden" name="haccion" value="nfo" />
<input type="hidden" name="hidactivo" value="<?php echo $fhidactivo; ?>" />
<div class="row">
    <div class="col maintitle">
    <i class="fas fa-desktop"></i> Equipo
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        Sistema Operativo
    </div>
    <div class="col">
        <input type="text" name="txtpc_os" value="<?php echo $xmllabel_nomso; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Versión S.O.
    </div>
    <div class="col">
        <input type="text" name="txtpc_osv" value="<?php echo $xmllabel_versionso; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Nombre equipo
    </div>
    <div class="col">
        <input type="text" name="txtpc_cn" value="<?php echo $xmllabel_nompc; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Fabricante P.B.
    </div>
    <div class="col">
        <input type="text" name="txtpc_mbf" value="<?php echo $xmllabel_pb_fabric; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Modelo P.B.
    </div>
    <div class="col">
        <input type="text" name="txtpc_mbm" value="<?php echo $xmllabel_pb_modelo; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Modelo equipo
    </div>
    <div class="col">
        <input type="text" name="txtpc_model" value="<?php echo $xmllabel_pcmodel; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Procesador
    </div>
    <div class="col">
        <input type="text" name="txtpc_procesador" value="<?php echo $xmllabel_pb_procesador; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Usuario
    </div>
    <div class="col">
        <input type="text" name="txtpc_user" value="<?php echo $xmllabel_username; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Memoria instalada
    </div>
    <div class="col">
        <input type="text" name="txtpc_memoria"value="<?php echo $xmllabel_ram; ?>" style="width: 100%;" readonly/>
    </div>
</div>
<div class="row">
    <div class="col maintitle">
    
    <i class="fab fa-windows"></i> Unidades de red / <i class="fab fa-linux"></i> Punto de montaje
    </div>
</div>
<?php
$idunidad = 0;
foreach ($xml->Category[0]->Category[2]->Category[3]->Data as $xml_categoria) 
{
    $xml_unidad_red = $xml_categoria->Nombre_local;
    $xml_unidad_mapeo = $xml_categoria->Nombre_remoto;
    $xml_unidad_usuario = $xml_categoria->Nombre_de_usuario;
?>
<input type="hidden" name="txtnetmap_id[<?php echo $idunidad; ?>]" value="<?php echo $idunidad; ?>" /> 
    <div class="row">
    <div class="col">
        Unidad / Origen montaje </br>
        <input type="text" name="txtnetmap_unidad[<?php echo $idunidad; ?>]" value="<?php echo $xml_unidad_red; ?>" style="width: 100%;" readonly/>
    </div>
    <div class="col">
        Ruta de mapeo / Punto de montaje</br>
        <input type="text" name="txtnetmap_map[<?php echo $idunidad; ?>]" value="<?php echo $xml_unidad_mapeo; ?>" style="width: 100%;" readonly/>
    </div>
    <div class="col">
        Usuario </br>
        <input type="text" name="txtnetmap_user[<?php echo $idunidad; ?>]" value="<?php echo $xml_unidad_usuario; ?>" style="width: 100%;" readonly/>
    </div>
    </div>
  <?php  
  $idunidad = $unidad +1;
}
?>
<div class="row">
    <div class="col maintitle">
        Tarjetas de red
    </div>
</div>


<?php

$idtarjetared = -1;
foreach ($arraytarjeta as $idtarjeta => $xvalor) 
{
    
    foreach ($xvalor as $key => $value) {
        
        $campos = explode("===", $value );
        $procesalinea = "NO";
        if($campos[0] == "Nombre")
        {
            $procesalinea = "YES";
            $tr_nombre = $campos[1];
            $idtarjetared = $idtarjetared +1;
        }
        if($campos[0] == "Dirección IP"){$procesalinea = "YES";}
        if($campos[0] == "DHCP habilitado"){$procesalinea = "YES";}
        if($campos[0] == "Dirección MAC"){$procesalinea = "YES";}
        
        
        if($procesalinea == "YES")
        {
            if($campos[0] == "Dirección IP")
            {
                $direcionesip = explode(", ", $campos[1]);
                foreach ($direcionesip as $ipindividual) 
                {
                    //echo '<p>NET_IDCARD-'.$idtarjeta.'-NET_IP-'.$ipindividual.'</p>';
                    if($ipindividual <> "No disponible")
                    {
                        echo '<div class="row"><div class="col-sm-2">IP</div><div class="col"><input type="hidden" name="xml_netips['.$idtarjetared.']" value="'.$campos[1].'" />'.$ipindividual.'</div></div>';
                    }
                }
                
            }
            elseif ($campos[0] == "DHCP habilitado") 
            {
                echo '<div class="row"><div class="col-sm-2">DHCP</div><div class="col"><input type="hidden" name="txtnetdhcp['.$idtarjetared.']" value="'.$campos[1].'" />'.$campos[1].'</div></div>';
            }
            elseif ($campos[0] == "Dirección MAC") 
            {
                echo '<div class="row"><div class="col-sm-2">MAC Address</div><div class="col"><input type="hidden" name="txtnetmac['.$idtarjetared.']" value="'.$campos[1].'" />'.$campos[1].'</div></div>';
            }
            else 
            {
                
                echo '<div class="row maintitle"><div class="col"><i class="fas fa-network-wired"></i><input type="hidden" name="hidtarjeta['.$idtarjetared.']" value="'.$idtarjetared.'" /> <input type="hidden" name="txtnetname['.$idtarjetared.']" value="'.$campos[1].'" />'.$campos[1].'</div></div>';
            }
        }
    }
}
?>


<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<?php

echo '<a href="'.$urlatras.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> ';
?>
</div>

<?php
    echo '</form>';
}
else 
{
    header("Location: ".$urlatras);
}
?>