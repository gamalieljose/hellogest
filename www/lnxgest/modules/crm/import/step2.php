<?php
$rutafichero = $_POST["hrutafichero"];

if ($rutafichero !== "")
{
    $ficherosubido = "YES";

    $crazonsocial = $_POST["crazonsocial"];
    $cnomcomercial = $_POST["cnomcomercial"];
    $cnif = $_POST["cnif"];      
    $ctel = $_POST["ctel"];
    $cactivo = $_POST["cactivo"];
    $ccodcli = $_POST["ccodcli"];
    $ccodpro = $_POST["ccodpro"];
    $cdir = $_POST["cdir"];
    $ccp = $_POST["ccp"];
    $cpobla = $_POST["cpobla"];
    $cidprov = $_POST["cidprov"];
    $cidpais = $_POST["cidpais"];
    $ccodclipro = $_POST["ccodclipro"];
    $cfechaalta = $_POST["cfechaalta"];
    $cncuenta = $_POST["cncuenta"];
    $cnotas = $_POST["cnotas"];
    $corigen = $_POST["corigen"];
    $cemail = $_POST["cemail"];
    $cnotaimp = $_POST["cnotaimp"];
    $cidcomercial = $_POST["cidcomercial"];

    $cbpais = $_POST["cbpais"];


}
else
{
    $urlatras = "index.php?module=crm&section=import";

header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Error en la subida del fichero</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}


if($ficherosubido == "YES")
{

    if($_POST["chkutf8"] == "YES")
    {
        echo '<p><i>UTF8 encode ACTIVADO</i></p>';
    }
    echo '<p>&nbsp;</p>';
?>
<form name="frmregistro" method="POST" action="index.php?module=crm&section=import&action=step3" >

<input type="hidden" name="hrutafichero" value="<?php echo $rutafichero; ?>" />
<?php
$utf8check = $_POST["chkutf8"];
if($_POST["chkutf8"] == "YES"){$utf8check = 'YES';}else{$utf8check = 'NO';}
echo '<input type="hidden" name="chkutf8" value="'.$utf8check.'" />';
?>


<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Previsualizar</button> 
<a href="index.php?module=crm&section=import" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<!-- <table style="display: block; overflow-x: auto;"> -->
<div style="display: block; overflow-x: auto;">
<table width="2200">
<tr class="maintitle">
<th width="30"></th>
<th width="200">Razon social</th>
<th width="250">Nombre comercial</th>
<th width="100">nif</th>
<th width="100">Telefono</th>
<th width="80">activo</th>
<th>codcli</th>
<th>codpro</th>
<th width="300">dir</th>
<th width="80">cp</th>
<th width="250">pobla</th>
<th width="150">idprov</th>
<th width="150">idpais</th>
<th>codclipro</th>
<th>fechaalta</th>
<th>ncuenta</th>
<th>notas</th>
<th>origen</th>
<th>email</th>
<th>notaimp</th>
<th width="150">idcomercial</th>
</tr>
<?php

$fp = fopen($rutafichero,"r");
    //Leemos linea por linea el contenido del archivo
$nlinea = 0;
    while ($linea = fgets($fp,1024))
    {
        if ($nlinea > 0)
        {
            if($_POST["chkutf8"] == "YES")
            {
                $camposlinea = utf8_encode($linea);
            }
            else
            {
                $camposlinea = $linea;
            }
            $camposcsv = explode(";", $camposlinea);
            
            $lbl_razonsocial = $camposcsv[$crazonsocial];
            $lbl_nomcomercial = $camposcsv[$cnomcomercial];
            $lbl_nif = $camposcsv[$cnif];
            $lbl_tel = $camposcsv[$ctel];
            $lbl_activo = $camposcsv[$cactivo];
            $lbl_codcli = trim($camposcsv[$ccodcli]);
            $lbl_codpro = trim($camposcsv[$ccodpro]);
            $lbl_dir = $camposcsv[$cdir];
            $lbl_cp = $camposcsv[$ccp];
            $lbl_pobla = $camposcsv[$cpobla];
            $lbl_prov = $camposcsv[$cidprov];
            $lbl_pais = $camposcsv[$cidpais];
            $lbl_codclipro = trim($camposcsv[$ccodclipro]);
            $lbl_fechaalta = $camposcsv[$cfechaalta];
            $lbl_ncuenta = $camposcsv[$cncuenta];
            $lbl_notas = $camposcsv[$cnotas];
            $lbl_origen = $camposcsv[$corigen];
            $lbl_email = $camposcsv[$cemail];
            $lbl_notaimp = $camposcsv[$cnotaimp];
            $lbl_comercial = $camposcsv[$cidcomercial];

            $fechahoy = date("d/m/Y");
            if($lbl_fechaalta == "")
            {
                $lbl_fechaalta = $fechahoy;
            }

            if($cnomcomercial == -1){$lbl_nomcomercial = $lbl_razonsocial;}
            if($cnif == -1){$lbl_nif = "";}
            
            if($lbl_codcli > 0 || $lbl_codcli <> ""){$lbl_codcli = "ADD";}else{$lbl_codcli = "0";}
            if($lbl_codpro > 0 || $lbl_codpro <> ""){$lbl_codpro = "ADD";}else{$lbl_codpro = "0";}

            if($cactivo == -1){$lbl_activo = "1";}

            //Buscamos si el pais existe
            if(trim($lbl_pais) == "")
            {
                if($cidpais == -1 || trim($lbl_pais) == "")
                {
                    
                    $sqlaux = $mysqli->query("select * from ".$prefixsql."paises where id = '".$cbpais."' "); 
                    $rowaux = mysqli_fetch_assoc($sqlaux);
                    $pais_id = $rowaux["id"];
                    $lbl_pais = $rowaux["pais"];
                }
                
            }
            else
            {
                $sqlaux = $mysqli->query("select * from ".$prefixsql."paises where pais like '".trim($lbl_pais)."' "); 
                $existe = $sqlaux->num_rows;
                if($existe > 0)
                {
                    $rowaux = mysqli_fetch_assoc($sqlaux);
                    $pais_id = $rowaux["id"];
                    $lbl_pais = $rowaux["pais"];
                }
                else
                {
                    $pais_id = -404; //No se encuentra Not Found
                    $lbl_pais = $lbl_pais;
                }
            }
            
            //Si solo existe la poblacion, partiendo del nombre de la población obtendremos el codigo postal y la provincia
            if(trim($lbl_cp) == "" && trim($lbl_prov) == "" & trim($lbl_pobla) <> "")
            {
                $sqlaux = $mysqli->query("select * from ".$prefixsql."poblaciones where idpais = '".$pais_id."' and poblacion like '".trim($lbl_pobla)."' limit 1"); 
                $existe = $sqlaux->num_rows;
                if($existe > 0)
                {
                    $rowaux = mysqli_fetch_assoc($sqlaux);
                    $pobla_id = $rowaux["id"];
                    $prov_id = $rowaux["idprov"];
                    $lbl_pobla = $rowaux["poblacion"];
                    $lbl_cp = $rowaux["cp"];

                    $sqlaux = $mysqli->query("select * from ".$prefixsql."provincias where id = '".$prov_id."' "); 
                    $rowaux = mysqli_fetch_assoc($sqlaux);
                    $lbl_prov = $rowaux["provincia"];

                }
                else
                {
                    $lbl_pobla = trim($lbl_pobla);
                    $lbl_cp = "";
                }
                
            }
                        
            if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
            echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td><input type="hidden" name="hnlinea['.$nlinea.']" value="'.$nlinea.'" />'.$nlinea.'</td>';
echo '<td><input type="hidden" name="hrazonsocial['.$nlinea.']" value="'.$lbl_razonsocial.'" />'.$lbl_razonsocial.'</td>';
echo '<td><input type="hidden" name="hnomcomercial['.$nlinea.']" value="'.$lbl_nomcomercial.'" />'.$lbl_nomcomercial.'</td>';
echo '<td><input type="hidden" name="hnif['.$nlinea.']" value="'.$lbl_nif.'" />'.$lbl_nif.'</td>';
echo '<td><input type="hidden" name="htel['.$nlinea.']" value="'.$lbl_tel.'" />'.$lbl_tel.'</td>';
echo '<td><input type="hidden" name="hactivo['.$nlinea.']" value="'.$lbl_activo.'" />'.$lbl_activo.'</td>';
echo '<td><input type="hidden" name="hcodcli['.$nlinea.']" value="'.$lbl_codcli.'" />'.$lbl_codcli.'</td>';
echo '<td><input type="hidden" name="hcodpro['.$nlinea.']" value="'.$lbl_codpro.'" />'.$lbl_codpro.'</td>';
echo '<td><input type="hidden" name="hdir['.$nlinea.']" value="'.$lbl_dir.'" />'.$lbl_dir.'</td>';

if($lbl_cp == ""){$tipocampo = 'text';}else{$tipocampo = 'hidden';}
echo '<td><input type="'.$tipocampo.'" name="hcp['.$nlinea.']" value="'.$lbl_cp.'" style="width: 100%" maxlength="10"/>'.$lbl_cp.'</td>';

if($lbl_pobla == ""){$tipocampo = 'text';}else{$tipocampo = 'hidden';}
echo '<td><input type="'.$tipocampo.'" name="hpobla['.$nlinea.']" value="'.$lbl_pobla.'" style="width: 100%" maxlength="50" />'.$lbl_pobla.'</td>';

if($pais_id == -404)
{echo '<td colspan="2">';}
else
{
    echo '<td>';
}

    if($lbl_prov == "")
    {
        echo '<select name="hidprov" style="width: 100%;">';

        if($cidpais > 0)
        {
            $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
            while($colpais = mysqli_fetch_array($cnsaux))
            {
                echo '<optgroup label="'.$colpais["pais"].'">';

                $cnsaux2 = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$colpais["id"]."' order by provincia");
                while($colprov = mysqli_fetch_array($cnsaux2))
                {
                    
                    if($_POST["cbprovincias"] == $colprov["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
                    echo '<option value="'.$colprov["id"].'" '.$seleccionado.'>'.$colprov["provincia"].'</option>';
                }
                

            }
        }
        else
        {
            $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$pais_id."' order by provincia");
            while($col = mysqli_fetch_array($cnsaux))
            {
                
                if($_POST["cbprovincias"] == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
                echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["provincia"].'</option>';
            }
        }
        
        echo '</select>';
    }
    else
    {
        echo '<input type="hidden" name="hidprov['.$nlinea.']" value="'.$prov_id.'" />'.$lbl_prov;
    }
echo '</td>';


echo '<td><input type="hidden" name="hidpais['.$nlinea.']" value="'.$pais_id.'" />'.$lbl_pais.'</td>';


echo '<td><input type="hidden" name="hcodclipro['.$nlinea.']" value="'.$lbl_codclipro.'" />'.$lbl_codclipro.'</td>';
echo '<td><input type="hidden" name="hfechaalta['.$nlinea.']" value="'.$lbl_fechaalta.'" />'.$lbl_fechaalta.'</td>';
echo '<td><input type="hidden" name="hncuenta['.$nlinea.']" value="'.$lbl_ncuenta.'" />'.$lbl_ncuenta.'</td>';
echo '<td><input type="hidden" name="hnotas['.$nlinea.']" value="'.$lbl_notas.'" />'.$lbl_notas.'</td>';
echo '<td><input type="hidden" name="horigen['.$nlinea.']" value="'.$lbl_origen.'" />'.$lbl_origen.'</td>';
echo '<td><input type="hidden" name="hemail['.$nlinea.']" value="'.$lbl_email.'" />'.$lbl_email.'</td>';
echo '<td><input type="hidden" name="hnotaimp['.$nlinea.']" value="'.$lbl_notaimp.'" />'.$lbl_notaimp.'</td>';

echo '<td>';
//echo $cidcomercial." - ".$_POST["cbidcomercial"]." -- ".$lbl_comercial;

if($cidcomercial > 0 && $_POST["cbidcomercial"] == -1)
{
    if(trim($lbl_comercial) == "")
    {
        $idagente = 0;
        $lbl_comercial = "-Sin asignar-";
        echo '<input type="hidden" name="hcomercial['.$nlinea.']" value="'.$idagente.'" />'.$lbl_comercial;
    }
    else
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."users where username like '".trim($lbl_comercial)."' "); 
        $existe = $sqlaux->num_rows;
        if($existe > 0)
        {
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $idagente = $rowaux["id"];
            $lbl_comercial = $rowaux["display"];

            echo '<input type="hidden" name="hcomercial['.$nlinea.']" value="'.$idagente.'" />'.$lbl_comercial;
        }
        else
        {
            echo '<select name="hcomercial['.$nlinea.']" style="width: 100%;">';
            echo '<option value="0" selected="">-sin asignar-</option>';
            $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."users where activo = '1' order by display");
            while($col = mysqli_fetch_array($cnsaux))
            {
                echo '<option value="'.$col["id"].'" >'.$col["display"].'</option>';
            }
            echo '</select>';
        }  
    }
}
else
{
    if($_POST["cbidcomercial"] >= 0)
    {
        if($_POST["cbidcomercial"] > 0)
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$_POST["cbidcomercial"]."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $idagente = $rowaux["id"];
            $lbl_comercial = $rowaux["display"];
        }
        if($_POST["cbidcomercial"] == 0)
        {
            $idagente = 0;
            $lbl_comercial = "-Sin asignar-";
        }
        
        echo '<input type="hidden" name="hcomercial['.$nlinea.']" value="'.$idagente.'" />'.$lbl_comercial;
    }
    else
    {
        $idagente = 0;
        $lbl_comercial = '-Sin asignar-';
        echo '<input type="hidden" name="hcomercial['.$nlinea.']" value="'.$idagente.'" />'.$lbl_comercial;
    }
}




echo '</td>';
echo '</tr>';


        }

        $nlinea = $nlinea +1;
    }    

    
?>
</table>
</div>
<?php
}
?>