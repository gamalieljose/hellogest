<?php
$fhaccion = $_POST["haccion"];
$fiddocum = $_POST["hiddocum"];
$fhiddocumlinea = $_POST["hiddocumlinea"];
$flsttercero = $_POST["lsttercero"];
$fchktercero = $_POST["chktercero"];
    if($fchktercero <> 1){$flsttercero = '0';}

$ftxttitulo = addslashes($_POST["txttitulo"]);
$flstcategoria = $_POST["lstcategoria"];
$ftxtdocumentacion = addslashes($_POST["txtdocumentacion"]);


$fchkficheroborrar = $_POST["chkficheroborrar"];

$fechahoy = date("Y-m-d H:i:s");

$url_atras = "index.php?module=lnxit&section=docum";

$flstficheritos = $_POST["lstficheritos"]; //vincular o no vincular fichero existente

$flstdelaction = $_POST["lstdelaction"]; //accion para eliminar un archivo vinculado
//1 - eliminar del docum
//2 - desvincular y dejarlo en docum

if ($fhaccion == 'new')
{
    $sqldocum = $mysqli->query("insert into ".$prefixsql."it_docum (idtercero, iduser, titulo, fcreado, fmodificado, iditcat) VALUES ('".$flsttercero."', '".$_COOKIE["lnxuserid"]."' , '".$ftxttitulo."', '".$fechahoy."', '".$fechahoy."', '".$flstcategoria."')");

    $sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."it_docum"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbiddocum = $rowaux["contador"];

    $sqldocum = $mysqli->query("insert into ".$prefixsql."it_docum_lines (iddocum, documentacion, fcreado, iduser, fmodificado) VALUES ('".$dbiddocum."', '".$ftxtdocumentacion."', '".$fechahoy."', '".$_COOKIE["lnxuserid"]."', '".$fechahoy."')");
    $sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."it_docum_lines"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbiddocumline = $rowaux["contador"];

    $url_atras = "index.php?module=lnxit&section=docum&action=view&id=".$dbiddocum;

    if (is_uploaded_file($_FILES['fileficherito']['tmp_name']))
    {
        // Ruta archivos $lnxrutaficheros /lnxgest/files/
        $extension = end(explode(".", $_FILES['fileficherito']['name']));
        
        $extension = strtolower($extension);
        
        $dirano = "Y".date('Y');
        $dirmes = "M".date('m');
        
        $fechasubida = date("Y-m-d H:i:s");
                
        $rutafichero = $lnxrutaficheros.$dirano;
        
        if (file_exists($rutafichero))
        {
            //si existe la carpeta de la serie no hace nada
        }else
        {
            //como NO existe la carpeta de las serie se crea la carpeta correspondiente
            
            $oldmask = umask(0);
            //mkdir($rutafichero, 7777, true);
            mkdir($rutafichero, 0777);
            umask($oldmask);
        }
        
        $rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;
        
        if (file_exists($rutafichero))
        {
            //si existe la carpeta de la serie no hace nada
        }else
        {
            //como NO existe la carpeta de las serie se crea la carpeta correspondiente
            
            $oldmask = umask(0);
            //mkdir($rutafichero, 7777, true);
            mkdir($rutafichero, 0777);
            umask($oldmask);
        }
        
        $dirsubida = $dirano."/".$dirmes;
        
        $fichero_nombre = $_FILES['fileficherito']['name'];
        $ficherotm = $_FILES['fileficherito']['type'];

        $sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza, dirfichero, fsubido, iduser) VALUES ('xxx', '".$fichero_nombre."', '".$extension."', '".$ftxttitulo."', '".$ficherotm."', '0', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."')");

        $sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
        $row = mysqli_fetch_assoc($sqlficheros);
        $dbcontador = $row["contador"];
        
        $fichero_nombrefin = $dbcontador.".".$extension;
        
        $sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

        move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

        //insertamos el registro ficheros_loc localizacion
        $sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$dbcontador."', 'lnxit_docum', '".$dbiddocum."', '".$dbiddocumline."', '0', '".$ftxttitulo."', '0', '0')");

    }
}
if ($fhaccion == 'newpage')
{
    $sqldocum = $mysqli->query("insert into ".$prefixsql."it_docum_lines (iddocum, documentacion, fcreado, iduser, fmodificado) VALUES ('".$fiddocum."', '".$ftxtdocumentacion."', '".$fechahoy."', '".$_COOKIE["lnxuserid"]."', '".$fechahoy."')");
    
        $sqldocum = $mysqli->query("select max(id) as contador from ".$prefixsql."it_docum_lines ");
        $row = mysqli_fetch_assoc($sqldocum);
        $dbultimoiddocumlines = $row["contador"];
    
    $sqldocum = $mysqli->query("update ".$prefixsql."it_docum set idtercero = '".$flsttercero."' , titulo = '".$ftxttitulo."', fmodificado = '".$fechahoy."', iditcat = '".$flstcategoria."' where id = '".$fiddocum."'");
    
    
    $url_atras = "index.php?module=lnxit&section=docum&action=view&id=".$fiddocum."#item".$dbultimoiddocumlines;

    if($flstficheritos == 0)
    {
        if (is_uploaded_file($_FILES['fileficherito']['tmp_name']))
        {
            // Ruta archivos $lnxrutaficheros /lnxgest/files/
            $extension = end(explode(".", $_FILES['fileficherito']['name']));
            
            $extension = strtolower($extension);
            
            $dirano = "Y".date('Y');
            $dirmes = "M".date('m');
            
            $fechasubida = date("Y-m-d H:i:s");
                    
            $rutafichero = $lnxrutaficheros.$dirano;
            
            if (file_exists($rutafichero))
            {
                //si existe la carpeta de la serie no hace nada
            }else
            {
                //como NO existe la carpeta de las serie se crea la carpeta correspondiente
                
                $oldmask = umask(0);
                //mkdir($rutafichero, 7777, true);
                mkdir($rutafichero, 0777);
                umask($oldmask);
            }
            
            $rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;
            
            if (file_exists($rutafichero))
            {
                //si existe la carpeta de la serie no hace nada
            }else
            {
                //como NO existe la carpeta de las serie se crea la carpeta correspondiente
                
                $oldmask = umask(0);
                //mkdir($rutafichero, 7777, true);
                mkdir($rutafichero, 0777);
                umask($oldmask);
            }
            
            $dirsubida = $dirano."/".$dirmes;
            
            $fichero_nombre = $_FILES['fileficherito']['name'];
            $ficherotm = $_FILES['fileficherito']['type'];
            
            $sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza, dirfichero, fsubido, iduser) VALUES ('xxx', '".$fichero_nombre."', '".$extension."', '".$ftxttitulo."', '".$ficherotm."', '0', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."')");

            $sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
            $row = mysqli_fetch_assoc($sqlficheros);
            $dbcontador = $row["contador"];
            
            $fichero_nombrefin = $dbcontador.".".$extension;
            
            $sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

            move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

            //insertamos el registro ficheros_loc localizacion
            $sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$dbcontador."', 'lnxit_docum', '".$fiddocum."', '".$dbultimoiddocumlines."', '0', '".$ftxttitulo."', '0', '0')");

        }
    }
    else 
    {
        

        $sqlficheros = $mysqli->query("update ".$prefixsql."ficheros_loc set idlinea1 = '".$dbultimoiddocumlines."' where id = '".$flstficheritos."'");
    }
}


if ($fhaccion == 'update')
{
	$sqldocum = $mysqli->query("update ".$prefixsql."it_docum_lines set documentacion = '".$ftxtdocumentacion."', iduser = '".$_COOKIE["lnxuserid"]."', fmodificado = '".$fechahoy."' where id = '".$fhiddocumlinea."' ");
    $sqldocum = $mysqli->query("update ".$prefixsql."it_docum set idtercero = '".$flsttercero."' , titulo = '".$ftxttitulo."', fmodificado = '".$fechahoy."', iditcat = '".$flstcategoria."' where id = '".$fiddocum."' ");
    
    $url_atras = "index.php?module=lnxit&section=docum&action=view&id=".$fiddocum."#item".$fhiddocumlinea;

    if($fchkficheroborrar > 0 || is_uploaded_file($_FILES['fileficherito']['tmp_name']))
    {
        if(is_uploaded_file($_FILES['fileficherito']['tmp_name']))
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$fiddocum."' and idlinea1 = '".$fhiddocumlinea."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $idficheroborrar = $rowaux["idfichero"];
        }
        //Si se ha marcado la opción de eliminar el fichero adjunto
        if($flstdelaction == '1')
        {
            $sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$idficheroborrar."' and module = 'lnxit_docum' and idlinea0 = '".$fiddocum."'");
        }


        if($flstdelaction == '2')
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$fiddocum."' and idlinea1 = '".$fhiddocumlinea."' "); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $idlineaficheroloc = $rowaux["id"];

            $sqlficheros = $mysqli->query("update ".$prefixsql."ficheros_loc set idlinea1 = '0' where id = '".$idlineaficheroloc."' ");
        }

    }

    if (is_uploaded_file($_FILES['fileficherito']['tmp_name']))
    {
        // Ruta archivos $lnxrutaficheros /lnxgest/files/
        $extension = end(explode(".", $_FILES['fileficherito']['name']));
        
        $extension = strtolower($extension);
        
        $dirano = "Y".date('Y');
        $dirmes = "M".date('m');
        
        $fechasubida = date("Y-m-d H:i:s");
                
        $rutafichero = $lnxrutaficheros.$dirano;
        
        if (file_exists($rutafichero))
        {
            //si existe la carpeta de la serie no hace nada
        }else
        {
            //como NO existe la carpeta de las serie se crea la carpeta correspondiente
            
            $oldmask = umask(0);
            //mkdir($rutafichero, 7777, true);
            mkdir($rutafichero, 0777);
            umask($oldmask);
        }
        
        $rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;
        
        if (file_exists($rutafichero))
        {
            //si existe la carpeta de la serie no hace nada
        }else
        {
            //como NO existe la carpeta de las serie se crea la carpeta correspondiente
            
            $oldmask = umask(0);
            //mkdir($rutafichero, 7777, true);
            mkdir($rutafichero, 0777);
            umask($oldmask);
        }
        
        $dirsubida = $dirano."/".$dirmes;
        
        $fichero_nombre = $_FILES['fileficherito']['name'];
        $ficherotm = $_FILES['fileficherito']['type'];
        
        $sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza, dirfichero, fsubido, iduser) VALUES ('xxx', '".$fichero_nombre."', '".$extension."', '".$ftxttitulo."', '".$ficherotm."', '0', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."')");

        $sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
        $row = mysqli_fetch_assoc($sqlficheros);
        $dbcontador = $row["contador"];
        
        $fichero_nombrefin = $dbcontador.".".$extension;
        
        $sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

        move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

        //insertamos el registro ficheros_loc localizacion
        $sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$dbcontador."', 'lnxit_docum', '".$fiddocum."', '".$fhiddocumlinea."', '0', '".$ftxttitulo."', '0', '0')");

    }
    else 
    {
        if($flstficheritos > 0)    
        {

            $sqlfichero = $mysqli->query("select count(*) as contador from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$fiddocum."' and idlinea1 = '".$fhiddocumlinea."' "); 
            $rowfichero = mysqli_fetch_assoc($sqlfichero);
            $existefichero = $rowfichero["contador"];



            if($existefichero == '0')
            {
                $sqlficheros = $mysqli->query("update ".$prefixsql."ficheros_loc set idlinea1 = '".$fhiddocumlinea."' where id = '".$flstficheritos."'");
            }

            
        }
    }

}
if ($fhaccion == 'delete' && $fiddocum > 0)
{
    $sqldocum = $mysqli->query("delete from ".$prefixsql."it_docum where id = '".$fiddocum."'");
    $sqldocum = $mysqli->query("delete from ".$prefixsql."it_docum_lines where iddocum = '".$fiddocum."'");
    $url_atras = "index.php?module=lnxit&section=docum";

    //Eliminamos todos los archivos adjuntados a la dopcumentación
    $cnssql= $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$fiddocum."'");	
    while($col = mysqli_fetch_array($cnssql))
    {
        $idficheroborrar = $col["idfichero"];

        $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idficheroborrar."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbf_fichero = $rowaux["fichero"];
        $dbf_ruta = $rowaux["dirfichero"];

        $fichero_borrar = $lnxrutaficheros.$dbf_ruta."/".$dbf_fichero;
        unlink($fichero_borrar);

        $sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$idficheroborrar."'");
        $sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$idficheroborrar."'");
        
    }



}
if ($fhaccion == 'delpage')
{
    $sqldocum = $mysqli->query("delete from ".$prefixsql."it_docum_lines where id = '".$fhiddocumlinea."'");
    $url_atras = "index.php?module=lnxit&section=docum&action=view&id=".$fiddocum;

    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$fiddocum."' and idlinea1 = '".$fhiddocumlinea."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $idficheroborrar = $rowaux["idfichero"];
    if($idficheroborrar > 0)
    {
        //si hay fichero vinculado, lo eliminamos
        $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idficheroborrar."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbf_fichero = $rowaux["fichero"];
        $dbf_ruta = $rowaux["dirfichero"];

        $fichero_borrar = $lnxrutaficheros.$dbf_ruta."/".$dbf_fichero;
        unlink($fichero_borrar);
        
        $sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$idficheroborrar."'");
        $sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$idficheroborrar."'");

    }


}


header("Location: ".$url_atras);


?>