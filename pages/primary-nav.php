<nav id="primary_nav">
    <ul>
        <li class="nav_dashboard active"><a href="./index.php">Inicio</a></li>
        <li class="nav_graphs"><a href="./index.php?d=stock">Inventario</a></li>
        <li class="nav_uielements"><a href="./index.php?d=report">Reporte</a></li>
        <?php
        if(@!empty($permiso) && $permiso == 1):
        ?>
        <li class="nav_pages"><a href="./index.php?d=admin">Administración</a></li>
        <?php
        endif;
        ?>
        <li class="nav_graphs"><a href="./charts.html">Graphs</a></li>
        <li class="nav_forms"><a href="./forms.html">Forms</a></li>
        <li class="nav_typography"><a href="./typography.html">Typography</a></li>
        <li class="nav_uielements"><a href="./ui_elements.html">UI Elements</a></li>
        <li class="nav_pages"><a href="./pages.html">Pages</a></li>
    </ul>
</nav>