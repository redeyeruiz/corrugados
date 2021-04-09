<?php
	function redirect($pagina){
		switch($pagina){
			case 'admin':         return 'http://localhost/corrugados/plantilla_currency%20exchange/admin.php';
			case 'agentes':       return 'http://localhost/corrugados/plantilla_currency%20exchange/agentes.php';
			case 'almacenes':     return 'http://localhost/corrugados/plantilla_currency%20exchange/almacenes.php';
			case 'artExistentes': return 'http://localhost/corrugados/plantilla_currency%20exchange/artExistentes.php';
			case 'artVendidos':   return 'http://localhost/corrugados/plantilla_currency%20exchange/artVendidos.php';
			case 'asig_permisos': return 'http://localhost/corrugados/plantilla_currency%20exchange/asig_permisos.php';
			case 'asig_roles':    return 'http://localhost/corrugados/plantilla_currency%20exchange/almacenes.php';
			case 'cantEntre':     return 'http://localhost/corrugados/plantilla_currency%20exchange/cantEntre.php';
			case 'catalogos':     return 'http://localhost/corrugados/plantilla_currency%20exchange/catalogos.php';
			case 'cliente':       return 'http://localhost/corrugados/plantilla_currency%20exchange/cliente.php';
			case 'companias':     return 'http://localhost/corrugados/plantilla_currency%20exchange/companias.php';
			case 'dir_ent':       return 'http://localhost/corrugados/plantilla_currency%20exchange/dir_ent.php';
			case 'facturas':      return 'http://localhost/corrugados/plantilla_currency%20exchange/facturas.php';
			case 'inicio':        return 'http://localhost/corrugados/plantilla_currency%20exchange/inicio.php';
			case 'inventarios':   return 'http://localhost/corrugados/plantilla_currency%20exchange/inventarios.php';
			case 'listasprecio':  return 'http://localhost/corrugados/plantilla_currency%20exchange/listasprecio.php';
			case 'login':         return 'http://localhost/corrugados/plantilla_currency%20exchange/login.php';
			case 'parametrosAD':  return 'http://localhost/corrugados/plantilla_currency%20exchange/parametrosAD.php';
			case 'parametrosFTP': return 'http://localhost/corrugados/plantilla_currency%20exchange/parametrosFTP.php';
			case 'rol_frame':     return 'http://localhost/corrugados/plantilla_currency%20exchange/rol_frame.php';
			case 'roles':         return 'http://localhost/corrugados/plantilla_currency%20exchange/roles.php';
			case 'usuario_frame': return 'http://localhost/corrugados/plantilla_currency%20exchange/usuario_frame.php';
			
			
		}
	}

	function menu(){
        switch($_SESSION['rol']){
        case 'ADM':?>
            <li><a class="nav-link" href=<?php echo redirect('inicio'); ?>>Inicio</a></li>
            <li><a class="nav-link" href=<?php echo redirect('admin'); ?>>Administración</a></li>
            <li><a class="nav-link" href=<?php echo redirect('catalogos'); ?>>Catálogos</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Reportes</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break; 
        case 'ADMA':?>
            <li><a class="nav-link" href=<?php echo redirect('inicio'); ?>>Inicio</a></li>
            <li><a class="nav-link" href=<?php echo redirect('admin'); ?>>Administración</a></li>
            <li><a class="nav-link" href=<?php echo redirect('catalogos'); ?>>Catálogos</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Reportes</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break; 
        case 'AGE':?>
            <li><a class="nav-link" href=<?php echo redirect('inicio'); ?>>Inicio</a></li>
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
            <li><a class="nav-link" href=<?php echo redirect('inicio'); ?>>Inicio</a></li>
            <li><a class="nav-link" href="#">Operaciones</a></li>
            <li><a class="nav-link" href="#">Reportes</a></li>
            <li><a class="nav-link" href="#">Contacto</a></li>
            <?php break; 
        } 
    }

	function conecta_servidor(){
		$conexion=mysqli_connect("localhost","root","","papelescorrugados");
		return $conexion;
	}

	function msg($mensaje, $color){
		echo "<table border='3' width='60%'> ";
		if ($color=="rojo") echo "<tr bgcolor='red' align='center'>";
		if ($color=="amarillo") echo "<tr bgcolor='yellow' align='center'>";
		if ($color=="verde") echo "<tr bgcolor='green' align='center'>";
		echo "
				<td><font color='white' size='6'><b>$mensaje</b></font></td>
					</tr>
					<tr align='center'>
						<td><font color='blue' size='6'><b>Para continuar selecciona los botones del menú</b></font></td>
					</tr>
			</table>
		";
	}
?>