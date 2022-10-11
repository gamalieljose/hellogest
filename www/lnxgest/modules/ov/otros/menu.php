<style>
.contenedorboton
{
	width: 250px;
	height: 80px;
	border-style: solid;
	border-width: 2px;
	float: left;
	padding: 2px;
	margin-right: 5px;
}
@media screen and (max-width: 991px)
{
	.contenedorboton
	{
		width: 100%;
		height: auto;
		border-style: solid;
		border-width: 2px;
		float: none;
		padding: 2px;
		margin-top: 5px;
		
	}
}

</style>
<?php
$iddocumento = $_GET["id"];

$tbl_bloquear = $prefixsql.$lnxinvoice;
if(lnx_check_bloqueo($tbl_bloquear, $iddocumento, $_COOKIE["lnxuserid"]) > 0)
{
  //Bloqueado
  $cssboxbloqueo = "display: inline;";
  $cssbotonbloqueo = "display: none;";
  $LNXERP_bloqueado = "YES";
}
else 
{
  //sin bloquear
  $cssboxbloqueo = "display: none;";
  $cssbotonbloqueo = "display: inline;";
  $LNXERP_bloqueado = "NO";
}
?>
<script type="text/javascript">
$(document).ready(function() {

    lnxbloquea(); //Ejecutamos script nada más abrir el registro

    function lnxbloquea() {

      var bloquea_tabla = "<?php echo $tbl_bloquear; ?>";
      var bloquea_idregistro = "<?php echo $iddocumento; ?>";

      $.post("core/lock.php", { lnxtabla: bloquea_tabla, lnxregistro: bloquea_idregistro}, function(data){

        response = JSON.parse(data);
        document.getElementById('msgbloqueo').innerHTML = response["rssimple"];

        if(response["rseditable"] == "NO")
        {         
          document.getElementById('boxbloqueo').style.display = "inline";
        }
        if(response["rseditable"] == "YES")
        {         
          document.getElementById('boxbloqueo').style.display = "none"; 
        }
      
      });
       
    }
    setInterval(lnxbloquea, 5000);
});
</script>
<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>
<?php
$idfv = $_GET["id"];


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);

$dbcodigoint = $rowprincipal["codigoint"];
$dbeditfv = $rowprincipal["editfv"];
$dbidserie = $rowprincipal["idserie"];





//averiguamos si es la ultima de su serie
$cnsprincipal= $mysqli->query("SELECT max(codigoint) as codigomax from ".$prefixsql.$lnxinvoice." where idserie = '".$dbidserie."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigo = $row["codigomax"];

if($dbcodigo == $dbcodigoint && $dbcodigoint > 0){$pasarborrador = "SI";}else{$pasarborrador = "NO";}


?>

<div class="row">
	<div class="col maintitle" align="left">
		Operaciones Habituales
	</div>
</div>

<div class="row">
	<div class="col" align="center">

	
<?php
if ($dbcodigoint == 0)
{

	if($LNXERP_bloqueado == "NO")
	{
		$url_boton = 'index.php?module='.$lnxinvoice.'&section=main&action=edit&id='.$idfv;
	}
	else
	{
		$url_boton = '#';
	}

echo '<a href="'.$url_boton.'" ><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-user-tag"></i>
	
	Cambiar serie y cliente
	</div>
</div>
</a>';
}


if ($dbeditfv == 0 && $dbcodigoint == 0)
{
	if($LNXERP_bloqueado == "NO")
	{
		$url_boton = 'index.php?module='.$lnxinvoice.'&section=borrafactura&id='.$idfv;
	}
	else
	{
		$url_boton = '#';
	}
echo '<a href="'.$url_boton.'"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-trash"></i>
	
	Eliminar documento
	</div>
</div>
</a>';
}


if (($dbeditfv == 0 && $dbcodigoint > 0 )|| ($dbeditfv > 0 && $dbcodigoint == 0) )
{
if($dbeditfv > 0){$lbl_textomdoficar = "Dejar de modificar";}else{$lbl_textomdoficar = "Modificar";}

	if($LNXERP_bloqueado == "NO")
	{
		$url_boton = 'index.php?module='.$lnxinvoice.'&section=editfv&id='.$idfv;
	}
	else
	{
		$url_boton = '#';
	}

echo '<a href="'.$url_boton.'"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-edit"></i>
	
	'.$lbl_textomdoficar.'
	</div>
</div>
</a>';

}

if ($pasarborrador == 'SI')
{
	//Si ya no esta como borrador pero es la ultima factura de la serie, que se pueda editar

	if($LNXERP_bloqueado == "NO")
	{
		$url_boton = 'index.php?module='.$lnxinvoice.'&section=convertborrador&id='.$idfv;
	}
	else
	{
		$url_boton = '#';
	}

echo '<a href="'.$url_boton.'"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-edit"></i>
	
	Convertir a Borrador
	</div>
</div>
</a>';

	
}


?>
	

	</div>
</div>


 


<div class="row">
	<div class="col maintitle" align="left">
		Utilidades
	</div>
</div>

<div class="row">
	<div class="col" align="center">
	
	
<?php	
if($LNXERP_bloqueado == "NO")
{
	$url_boton = 'index.php?module='.$lnxinvoice.'&section=validarf&id='.$idfv;
}
else
{
	$url_boton = '#';
}

echo '<a href="'.$url_boton.'"><div class="contenedorboton" align="center">'; 

?>
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-copy"></i>
	
	Copiar documento
	</div>
</div>
</a>

<?php	

if ($dbcodigoint == 0)
	{
		if($LNXERP_bloqueado == "NO")
		{
			$url_boton = 'index.php?module='.$lnxinvoice.'&section=otros&action=ctax&id='.$idfv;
		}
		else
		{
			$url_boton = '#';
		}
echo '<a href="'.$url_boton.'"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-money-bill"></i>
	
	Cambiar impuestos en todas las lineas
	</div>
</div>
</a>';
	
	}
	?>
	
	 

	</div>
</div>


