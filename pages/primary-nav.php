<?php
    $active = new Template();
?>
<nav id="primary_nav">
    <ul>
        <!-- <li class="nav_dashboard active"><a href="./index.php">Inicio</a></li> -->
        <li class="nav_graphs <?php echo $active->activeMenu("stock");?>"><a href="./index.php?d=stock">Inventario</a></li>
        <li class="nav_uielements <?php echo $active->activeMenu("report");?>"><a href="./index.php?d=report">Reporte</a></li>
        <?php
        if(@!empty($permiso) && $permiso == 1):
        ?>
        <li class="nav_pages <?php echo $active->activeMenu("admin");?>"><a href="./index.php?d=admin">Administración</a></li>
        <?php
        endif;
        ?>
    </ul>
</nav>