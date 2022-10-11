<?php
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if ($_GET["section"] == '' )
{
        $menuseleccionado = 'caret-right';
}
else
{
        $menuseleccionado = 'warehouse';
}
echo '<li class="nav-item" data-toggle="tooltip" style="background-color: #04B45F;" data-placement="right" title="Backup">';            echo '<a class="nav-link" href="index.php?module=backup">';
        echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Backup</span>';
echo '</a>';
echo '</li>';

?>