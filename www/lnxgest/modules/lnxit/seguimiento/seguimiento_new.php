

<?php				   
include("modules/lnxit/tickets/tabs.php");


$ConsultaMySql= $mysqli->query("SELECT id, idtipo, idmant from ".$prefixsql."it_tickets where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$idtipo = $row['idtipo'];
$dbidmant = $row["idmant"];
if ($dbidmant > '0'){$coloractivo = "#5882FA";}else{$coloractivo = "#FFFFFF";}

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tipos where id = '".$idtipo."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$tipoticket = $row['tipo'];



?>

<form name="form1" action="index.php?module=lnxit&section=seguimiento&action=save" method="post">
<input type="hidden" name="haccion" value="new">
<?php
echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">';
?>

<div class="row">
  <div class="col maintitle" align="left">
    Nuevo seguimiento
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Ticket
  </div>
  <div class="col" align="left">
    <h3><?php echo $tipoticket.' '.$_GET["id"]; ?></h3>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Usuario
  </div>
  <div class="col" align="left">
    <select name="lstusuario">
		
	<?php
	$ConsultaMySql= $mysqli->query("SELECT id, display from ".$prefixsql."users order by display");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($_COOKIE["lnxuserid"] == $columna["id"])
		{echo '<option value="'.$columna["id"].'" selected="">'.$columna["display"].'</option>';}
		else
		{echo '<option value="'.$columna["id"].'">'.$columna["display"].'</option>';}
		
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Tiempo dedicado
  </div>
  <div class="col" align="left">
    <select name="slthoras"/>
	<option value="00" selected="">00</option>
	<option value="01" >01</option>
	<option value="02" >02</option>
	<option value="03" >03</option>
	<option value="04" >04</option>
	<option value="05" >05</option>
	<option value="06" >06</option>
	<option value="07" >07</option>
	<option value="08" >08</option>
	<option value="09" >09</option>
	<option value="10" >10</option>
	<option value="11" >11</option>
	<option value="12" >12</option>
	<option value="13" >13</option>
	<option value="14" >14</option>
	<option value="15" >15</option>
	<option value="16" >16</option>
	<option value="17" >17</option>
	<option value="18" >18</option>
	<option value="19" >19</option>
	<option value="20" >20</option>
	<option value="21" >21</option>
	<option value="22" >22</option>
	<option value="23" >23</option>
</select>
h 
<select name="sltminutos"/>
	<option value="00" selected="">00</option>
	<option value="05" >05</option>
	<option value="10" >10</option>
	<option value="15" >15</option>
	<option value="20" >20</option>
	<option value="25" >25</option>
	<option value="30" >30</option>
	<option value="35" >35</option>
	<option value="40" >40</option>
	<option value="45" >45</option>
	<option value="50" >50</option>
	<option value="55" >55</option>
</select>
m <input type="checkbox" value="1" name="chkmantenimiento" checked=""/> Computa en mantenimiento
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Trabajo realizado
  </div>
  <div class="col" align="left">
    <textarea rows="4" cols="50" name="txtseguimiento" style="width: 100%;"></textarea>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=tickets&subsection=list">Cancelar</a>

</div>

</form>

<?php
include("modules/lnxit/seguimiento/seguimiento.php");
?>