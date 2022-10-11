<?php

?>

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


<a href="#"><div class="contenedorboton" align="center">
        <div style="font-size:20px; color:blue; flota: left;">
          <i class="fas fa-trash"></i>

        Gastos por usuario
        </div>
</div>
</a>


<a href="index.php?module=hr&section=gastos&inf=1"><div class="contenedorboton" align="center">
        <div style="font-size:20px; color:blue; flota: left;">
          <i class="fas fa-trash"></i>

        Gastos por vehiculo
        </div>
</div>
</a>

