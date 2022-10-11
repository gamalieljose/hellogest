<script languague="javascript">
function procesaindexado() {
    div = document.getElementById("divcargando");
    div.style.display = "";

    div = document.getElementById("divformulario");
    div.style.display = "none";

    document.getElementById("frmreindexa").submit();
}
</script>

<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_config");
while($row = mysqli_fetch_array($ConsultaMySql))
{
    if($row["opcion"] == "KW_MINCAR"){$minchr = $row["valor"];}
    if($row["opcion"] == "KW_MAXCAR"){$maxchr = $row["valor"];}
    if($row["opcion"] == "KW_MINREP"){$vecesrepiteparaok = $row["valor"];}
}
?>

<div align="center" id="divformulario">
<form name="frmreindexa" id="frmreindexa" method="POST" action="index.php?module=ficheros&section=icfsave">

<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td colspan="2" class="maintitle">Reindexar</td></tr>
<tr><td align="center" colspan="2">
<p>Para reindexar todos los documentos debe de ejecutar el script <i>docskeywords.php</i>, este proceso es lento, se recomienda ejecutarlo como tarea programada</p>
<p>Ubicación: scripts -> cron -> docskeywords.php</p>
</td></tr>

<tr><td width="70"><input type="number" value="<?php echo $minchr; ?>" name="txtminchr" style="width: 60px;" /> </td><td>Mínimo caracteres a procesar</td></tr>
<tr><td width="70"><input type="number" value="<?php echo $maxchr; ?>" name="txtmaxchr" style="width: 60px;" /> </td><td>Maximo caracteres a procesar</td></tr>
<tr><td width="70"><input type="number" value="<?php echo $vecesrepiteparaok; ?>" name="txtrepite" style="width: 60px;"/> </td><td>Minimo veces se repite una palabra para ser considerada clave</td></tr>

<tr><td colspan="2" align="center" class="maintitle">Tipo reindexación</td></tr>
<tr><td align="center" colspan="2">
<label><input type="radio" name="optreindexa" value="cambios" checked="" /> SOLO GUARDAR CAMBIOS</label></br>
<label><input type="radio" name="optreindexa" value="nuevos" /> Reindexa solo los nuevos</label></br>
<label><input type="radio" name="optreindexa" value="todos" /> Reindexa TODOS los archivos</label></br>
</td></tr>
<tr><td align="center" colspan="2">
<a class="btnsubmit" href="javascript:procesaindexado();">Procesar</a> 
<a class="btncancel" href="index.php?module=ficheros">Cancelar</a>
</td></tr>
</table>
</form>
</div>

<div align="center" id="divcargando" style="display: none;">


	<table style="max-width: 400px; width: 100%;"  class="msgaviso">
	<tr><td class="maintitle">Reindexando...</td></tr>
    <tr><td align="center">
    <p><img src="img/loading.gif" /> <b>Reindexando ficheros</b>, este proceso puede variar varios minutos...</p>
    </td></tr>
	</table>

</div>