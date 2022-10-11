<?php

$cnssql = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where idestado = '0'");
$row = mysqli_fetch_assoc($cnssql);
$totalcerrados = $row["contador"];

$cnssql = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where idestado > '0'");
$row = mysqli_fetch_assoc($cnssql);
$totalabiertos = $row["contador"];


?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<?php
echo "<script type=\"text/javascript\">
      google.load(\"visualization\", \"1\", {packages:[\"corechart\"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tickets', 'Hours per Day'],
          ['Abiertos',     ".$totalabiertos."],
          ['Cerrados',      ".$totalcerrados."]
        ]);

        var options = {
          title: 'Resumen actual de tickets'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>";


?>
    <div id="piechart" style="width: 900px; height: 500px;"></div>


