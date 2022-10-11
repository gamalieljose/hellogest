
<div class="grupotabs" style="height: 30px;">
    <a class="btn_tab_sel" id="btn_tab_principal" href="javascript:muestra_tab_principal();">Principal</a>

    <a class="btn_tab" id="btn_tab_categorias" href="javascript:muestra_tab_categorias();">Categorias</a>

    <a class="btn_tab" id="btn_tab_buscar" href="javascript:muestra_tab_buscar();">Buscar Producto</a>
</div>


<div class="tab-content">
    <div id="tab-principal">

<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tpv_cfg_home where idterminal = '".$dbidterminal."' order by orden");
while($col = mysqli_fetch_array($ConsultaMySql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$col["idproducto"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbconcepto = $rowaux["concepto"];
    $dbcodventa = $rowaux["codventa"];
    echo '<a href="index.php?module=tpv&section=tpv&action=add&id='.$idtpv.'&idproducto='.$col["idproducto"].'"><div class="contenedor_producto"><p>'.$dbconcepto.'</p><p>'.$dbcodventa.'</p></div></a>';

}    

?>
        
        
        
        
    </div>
  <div id="tab-categorias" style="display: none;">
      
      <div id="muestracategorias">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."productos_tipo order by tipo");
while($col = mysqli_fetch_array($ConsultaMySql))
{
    
    echo '<a href="javascript:muestracat('.$col["id"].');">       
    <div class="contenedor_categorias">'.$col["tipo"].'</div>
    </a>';

}    

?> 
     </div> 
      <table width="100%">
          <tr class="maintitle"><td>Productos</td></tr>
      </table>
      
          
      
      
      <div id="productosrs"> </div>
    
      
  </div>
  <div id="tab-buscar" style="display: none;">
      <p><a href="javascript:muestrakbqwerty('txtbuscarproducto');" ><img src="modules/tpv/img/keyboard.jpg" /></a> 
          <input type="text" value="" onkeypress="buscaproductos()" name="txtbuscarproducto" id="txtbuscarproducto" style="width: Calc(100% - 32px);" placeholder="Introduzca el nombre o codigo de venta del producto" /></p>
      
      <div id="resultadobusqueda"></div>

  </div>
</div>



