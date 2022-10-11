<script src="core/com/js_productos-codnom.js"></script>
<script type="text/javascript">
function validarform() 
{
    var valoridserie = document.getElementById('lstproducto').value;
    
    if(valoridserie > '0')
    {
        document.getElementById("frmnewproductr").submit(); 
    }
    else
    {
        alert("Seleccione un producto válido");
    }
    
    
    
}
</script>
<?php
$idterminal = $_GET["id"];
?>
<form name="frmnewproductr" id="frmnewproductr" method="POST" action="index.php?module=tpv&section=cfgtermproduct&action=save">
<input type="hidden" name="hidterminal" value="<?php echo $idterminal; ?>" />
<input type="hidden" name="haccion" value="new" />
<div class="row">
    <div class="col maintitle" align="left">
        Agragar producto al inicio del terminal
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Producto
    </div>
    <div class="col" align="left">
       <input type="text" value="" name="txtbuscaproducto" id="txtbuscaproducto" maxlength="50" placeholder="Escriba el nombre o codigo del producto a buscar" class="campoencoger"/></br> 
       
       <select name="lstproducto" id="lstproducto" class="campoencoger">
           <option value="0">Seleccione un producto</option>
       </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" onclick="validarform();" value="Guardar" type="button"> 

<?php echo ' <a class="btncancel" href="index.php?module=tpv&section=cfgtermproduct&id='.$idterminal.'">Cancelar</a>'; ?>


</div>

</form>