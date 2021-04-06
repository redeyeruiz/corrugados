<?php
    function menu(){
        switch($_SESSION['rol']){
        case 'ADM':?>
            <li><a class="nav-link" href="inicio.php">Inicio</a></li>
            <li><a class="nav-link" href="admin.php">Administración</a></li>
            <li><a class="nav-link" href="catalogos.php">Catálogos</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Reportes</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break; 
        case 'ADMA':?>
            <li><a class="nav-link" href="inicio.php">Inicio</a></li>
            <li><a class="nav-link" href="admin.php">Administración</a></li>
            <li><a class="nav-link" href="catalogos.php">Catálogos</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Reportes</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break; 
        case 'AGE':?>
            <li><a class="nav-link" href="inicio.php">Inicio</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break;
        case 'CST':
        case 'CXC':
        case 'DIR':
        case 'EMB':
        case 'IMG':
        case 'PLN':
        case 'REA':
        case 'FAC':
        case 'VTA':
        case 'PRE':?>
            <li><a class="nav-link" href="inicio.php">Inicio</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Reportes</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break; 
        } 
    }
?>