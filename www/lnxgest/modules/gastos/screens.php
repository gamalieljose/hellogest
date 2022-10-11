<?php

if ($_GET["section"] == 'cfg_tg' && $_GET["action"] == ''){$displaytitle = "Tipo de gastos";}
if ($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'new'){$displaytitle = "Nuevo tipo de gasto";}
if ($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'edit'){$displaytitle = "Editando tipo de gasto";}
if ($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'del'){$displaytitle = "Eliminar tipo de gasto";}


if($_GET["section"] == 'cfg' && $_GET["action"] == ''){$displaytitle = "Configuración de gastos";}

if($_GET["section"] == 'gastos' && $_GET["action"] == ''){$displaytitle = "Listado de gastos";}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'new'){$displaytitle = "Nuevo gasto";}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'edit'){$displaytitle = "Editando gasto";}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'del'){$displaytitle = "Eliminar gasto";}

if($_GET["section"] == 'flota' && $_GET["action"] == ''){$displaytitle = "Flota de vehiculos";}
if($_GET["section"] == 'flota' && $_GET["action"] == 'new'){$displaytitle = "Nuevo vehiculo";}
if($_GET["section"] == 'flota' && $_GET["action"] == 'edit'){$displaytitle = "Editando vehiculo";}
if($_GET["section"] == 'flota' && $_GET["action"] == 'del'){$displaytitle = "Eliminar vehiculo";}


if($_GET["section"] == 'viajes' && $_GET["action"] == ''){$displaytitle = "Viajes";}
if($_GET["section"] == 'viajes' && $_GET["action"] == 'new'){$displaytitle = "Nuevo Viaje";}
if($_GET["section"] == 'viajes' && ($_GET["action"] == 'view' || $_GET["action"] == 'edit'))
{

    $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."viajes where id = '".$_GET["iddoc"]."' ");
    $row = mysqli_fetch_assoc($cnsaux);
    

    $displaytitle = "Gestión de Viaje - ".$row["codigo"];
}


?>
