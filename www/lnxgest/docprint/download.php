<?php
$formatodoc = $_GET["formato"];
$fihcerofodt = $_GET["fichero"];

if ($_COOKIE["lnxuserid"] > '0')
{

    function lnx_user_tempdir($lnxuserid)
    {
        require("../core/cfpc.php");
        $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$lnxuserid."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $nomuser = $rowaux["username"];

        $direcotriotemporalusuario = $lnxrutaficherostemp."usr/".$nomuser."/";

        return $direcotriotemporalusuario;
    }
    

    $directoriousuario = lnx_user_tempdir($_COOKIE["lnxuserid"]);
    $fichero_origen = $directoriousuario.$fihcerofodt;
        $ficheroconvertido = "fichero.".$formatodoc;
    $fichero_salida = $directoriousuario.$ficheroconvertido;
    
    shell_exec('sudo /lnxgest/scripts/libreofficeconverter.sh ' . $fichero_salida .' '.$fichero_origen.' '.$formatodoc);


    //Muestra el archivo resultante

    header('Content-disposition: attachment; filename="'.$ficheroconvertido.'"');

    readfile($fichero_salida);



}

?>

