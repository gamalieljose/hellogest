
<div align="center" id="divcargando">


<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Reindexando...</td></tr>
<tr><td align="center">
<p><img src="img/loading.gif" /> <b>Reindexando ficheros</b>, este proceso puede variar varios minutos...</p>
</td></tr>
</table>

</div>


<?php
$minchr = $_POST["txtminchr"];
$maxchr = $_POST["txtmaxchr"];
$vecesrepiteparaok = $_POST["txtrepite"];

$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_config where opcion = 'KW_MINCAR'");
$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_config where opcion = 'KW_MAXCAR'");
$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_config where opcion = 'KW_MINREP'");

$sqlaux = $mysqli->query("insert into ".$prefixsql."ficheros_config (opcion, valor) values ('KW_MINCAR', '".$minchr."')");
$sqlaux = $mysqli->query("insert into ".$prefixsql."ficheros_config (opcion, valor) values ('KW_MAXCAR', '".$maxchr."')");
$sqlaux = $mysqli->query("insert into ".$prefixsql."ficheros_config (opcion, valor) values ('KW_MINREP', '".$vecesrepiteparaok."')");


if ($_POST["optreindexa"] == "todos" || $_POST["optreindexa"] == "nuevos")
{
    if ($_POST["optreindexa"] == "todos" )
    {
        $cnssql= $mysqli->query("delete from ".$prefixsql."ficheros_keyword WHERE idfichero > 0");	
    }
    else 
    {
        $sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_keyword where palabrasclave = ''");
    }

    shell_exec("php scripts/cron/docskeywords.php");
}

header( "refresh:2;url=index.php?module=ficheros" );
?>