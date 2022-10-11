<?php
$diractual = dirname(__FILE__);

$directorios = explode("/", $diractual);

$iddir = '-1';

foreach ($directorios as $valor) 
{
		$iddir = $iddir + 1;
}

$hastadir = $iddir - 2;
$iddir = '-1';

foreach ($directorios as $valor) 
{
		$iddir = $iddir + 1;
		if($iddir <= $hastadir)
		{
			$nuevodirectorio = $nuevodirectorio.$directorios[$iddir].'/';

		}
}

$dircfpc = $nuevodirectorio."core/cfpc.php";
require($dircfpc);
?>


<h2>Palabras clave de los ficheros</h2>

<?php
//VALOREa POR DEFECTO
/*
$minchr = 3;
$maxchr = 30;
$vecesrepiteparaok = 1;
*/

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_config");
while($row = mysqli_fetch_array($ConsultaMySql))
{
    if($row["opcion"] == "KW_MINCAR"){$minchr = $row["valor"];}
    if($row["opcion"] == "KW_MAXCAR"){$maxchr = $row["valor"];}
    if($row["opcion"] == "KW_MINREP"){$vecesrepiteparaok = $row["valor"];}
}



$arr_extensiones = array();

//en este array añadimos las extensiones permitidas y con que objeto las convertimos a texto
$arr_extensiones["pdf"] = "tesseract";
$arr_extensiones["msg"] = "textoplano";
$arr_extensiones["xml"] = "textoplano";
$arr_extensiones["txt"] = "textoplano";

$arr_temp = array();

foreach ($arr_extensiones as $clave=>$valor) {
$arr_temp[] = "'".$clave."'";
}

$sqlextensiones = implode(", ", $arr_temp);


$idusuario = "0";
if($_COOKIE["lnxuserid"] > 0){$idusuario = $_COOKIE["lnxuserid"];}

$dirtemporal = $lnxrutaficherostemp."usr/".$idusuario."/";



shell_exec("mkdir ".$lnxrutaficherostemp."usr -m 777");

shell_exec("mkdir ".$lnxrutaficherostemp."usr/0 -m 777");

$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_keyword where palabrasclave = ''"); 

$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ficheros WHERE NOT EXISTS (SELECT NULL FROM ".$prefixsql."ficheros_keyword WHERE ".$prefixsql."ficheros_keyword.idfichero = ".$prefixsql."ficheros.id) and lnx_ficheros.dirfichero != 'docprint' and ".$prefixsql."ficheros.extension in (".$sqlextensiones.")");
while($col = mysqli_fetch_array($cnssql))
{
    $idfichero = $col["id"];
    $nomfichero = $col["fichero"];
    $dirfichero = $col["dirfichero"];
    $ficheroext = $col["extension"];
    
    $fichero = $lnxrutaficheros.$dirfichero."/".$nomfichero;
    $ficheroorigen = $fichero;
/*
    if($ficheroext == "pdf"){$procedimientocr = "tesseract";}
    if($ficheroext == "msg"){$procedimientocr = "textoplano";}
    if($ficheroext == "xml"){$procedimientocr = "textoplano";}
    if($ficheroext == "txt"){$procedimientocr = "textoplano";}
*/

    $procedimientocr = $arr_extensiones[$ficheroext];


    $palabrasclave = "";
    
        
    if($procedimientocr == "tesseract")
    {
        

        //Limpiamos el directorio
        $comandoejecutar = "rm ".$dirtemporal."*";
        shell_exec($comandoejecutar);
        
        //exportamos el PDF a un(os) archivo(s) PNG
        $comandoejecutar = "pdftoppm -png ".$ficheroorigen."  ".$dirtemporal.$idfichero."_pdftemp";
        shell_exec($comandoejecutar);

        $palabrasclave = "";

        $directorio = opendir($dirtemporal); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($archivo))//verificamos que NO sea un directorio
            {
                echo "Tesseract: ".$archivo . "<br />";

                $comandoejecutar = "tesseract ".$dirtemporal.$archivo." ".$dirtemporal.$idfichero."_".$archivo;
                shell_exec($comandoejecutar);

                $fichero = $dirtemporal.$idfichero."_".$archivo.".txt";
                $fp = fopen($fichero, "rb");
                $texto = fread($fp, filesize($fichero));
                fclose($fp);
                
                $arvocal = array("á", "à", "ä", "Á", "À", "Ä");
                $texto = str_replace($arvocal, "a", $texto);

                $arvocal = array("é", "è", "ë", "É", "È", "Ë");
                $texto = str_replace($arvocal, "e", $texto);
                
                $arvocal = array("í", "ì", "ï", "Í", "Ì", "Ï");
                $texto = str_replace($arvocal, "i", $texto);

                $arvocal = array("ó", "ò", "ö", "Ó", "Ò", "Ö");
                $texto = str_replace($arvocal, "o", $texto);

                $arvocal = array("ú", "ù", "ü", "Ú", "Ù", "Ü");
                $texto = str_replace($arvocal, "u", $texto);

                $texto = preg_replace("([^A-Za-z0-9 @.,])", "", $texto);
        
                $palabras = explode(" ", $texto);
        
                $textofiltrado = array();
        
                foreach ($palabras as $palabra)
                {
                    if (strlen($palabra) >= $minchr && strlen($palabra) <= $maxchr )
                    {
                        array_push($textofiltrado, strtolower($palabra));
                    }
                }
        
                $valores = array_count_values($textofiltrado);
        
                
                foreach ($valores as $clave => $veces)
                {
                    if($veces >= $vecesrepiteparaok)
                    {
                        $palabrasclave = $palabrasclave.$clave." ";
                    }    
                }


            }
        }

        //$palabrasclave = addslashes($palabrasclave);



        $arr_keywords = explode(" ", $palabrasclave);

        $palabrasclave  = '';

        $result = array();
        foreach ($arr_keywords as $key => $value)
        {
            $result[$value] = $value;
        }

        foreach ($result as $palabra)
        {
            $palabrasclave = $palabrasclave.$palabra." ";
        }
        $arr_keywords = "";

        $palabrasclave = addslashes(substr($palabrasclave, 0, 65500));

        $sqlaux = $mysqli->query("insert into ".$prefixsql."ficheros_keyword (idfichero, palabrasclave) values ('".$idfichero."', '".$palabrasclave."') "); 
        


        $palabrasclave = "";
    }

    



    if($procedimientocr == "textoplano")
    {

        //Limpiamos el directorio
        $comandoejecutar = "rm ".$dirtemporal."*";
        shell_exec($comandoejecutar);
        echo "Texto: ".$ficheroorigen . "<br />";

        $fp = fopen($ficheroorigen, "rb");
        $texto = fread($fp, filesize($ficheroorigen));
        fclose($fp);

        $arvocal = array("á", "à", "ä", "Á", "À", "Ä");
        $texto = str_replace($arvocal, "a", $texto);

        $arvocal = array("é", "è", "ë", "É", "È", "Ë");
        $texto = str_replace($arvocal, "e", $texto);
        
        $arvocal = array("í", "ì", "ï", "Í", "Ì", "Ï");
        $texto = str_replace($arvocal, "i", $texto);

        $arvocal = array("ó", "ò", "ö", "Ó", "Ò", "Ö");
        $texto = str_replace($arvocal, "o", $texto);

        $arvocal = array("ú", "ù", "ü", "Ú", "Ù", "Ü");
        $texto = str_replace($arvocal, "u", $texto);

        $texto = preg_replace("([^A-Za-z0-9 @.,])", "", $texto);

        $palabras = explode(" ", $texto);

        $textofiltrado = array();

        foreach ($palabras as $palabra)
        {
            if (strlen($palabra) >= $minchr && strlen($palabra) <= $maxchr )
            {
                array_push($textofiltrado, strtolower($palabra));
            }
        }

        $valores = array_count_values($textofiltrado);

        $palabrasclave = "";
        foreach ($valores as $clave => $veces)
        {
            if($veces >= $vecesrepiteparaok)
            {
                $palabrasclave = $palabrasclave.$clave." ";
            }    
        }

        $arr_unicos = explode(" ", $palabrasclave);

        $array = array_unique($arr_unicos);

        //$palabrasclave = addslashes($palabrasclave);

        $arr_keywords = explode(" ", $palabrasclave);

        $palabrasclave  = '';

        $result = array();
        foreach ($arr_keywords as $key => $value)
        {
            $result[$value] = $value;
        }

        foreach ($result as $palabra)
        {
            $palabrasclave = $palabrasclave.$palabra." ";
        }
        $arr_keywords = "";

        $palabrasclave = addslashes(substr($palabrasclave, 0, 65500));

        $sqlaux = $mysqli->query("insert into ".$prefixsql."ficheros_keyword (idfichero, palabrasclave) values ('".$idfichero."', '".$palabrasclave."') "); 
        

    }

 

}




?>


