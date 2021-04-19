<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "PapelesCorrugados";

$conection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	function redirect($pagina){
		switch($pagina){
			case 'admin':         return 'http://localhost/corrugados/plantilla_currency%20exchange/admin.php';
			case 'agentes':       return 'http://localhost/corrugados/plantilla_currency%20exchange/agentes.php';
			case 'almacenes':     return 'http://localhost/corrugados/plantilla_currency%20exchange/almacenes.php';
			case 'artExistentes': return 'http://localhost/corrugados/plantilla_currency%20exchange/artExistentes.php';
			case 'artVendidos':   return 'http://localhost/corrugados/plantilla_currency%20exchange/artVendidos.php';
			case 'asig_permisos': return 'http://localhost/corrugados/plantilla_currency%20exchange/asig_permisos.php';
			case 'asig_roles':    return 'http://localhost/corrugados/plantilla_currency%20exchange/asig_roles.php';
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
            case 'operaciones': return 'http://localhost/corrugados/plantilla_currency%20exchange/operaciones.php';
            case 'busqueda ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/buscarOrdenes_frame.php';
            case 'capturar orden': return 'http://localhost/corrugados/plantilla_currency%20exchange/capturarOrden_frame.php';
            case 'autorizar orden': return 'http://localhost/corrugados/plantilla_currency%20exchange/autorizarOrden_frame.php';
            case 'consultar ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/buscarOrdenes_frame.php';
            case 'modificar ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/modif_ord.php';
            case 'consultar estatus': return 'http://localhost/corrugados/plantilla_currency%20exchange/statusOrden.php';
            case 'buscar articulos': return 'http://localhost/corrugados/plantilla_currency%20exchange/busqueda_articulos_frame.php';
            case 'reportes': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportes.php';
            case 'reporte todas ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportes_ordenes.php';
            case 'reporte promedio tiempo': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportes_frame.php';
			
			
		}
	}

	function menu(){
        switch($_SESSION['rol']){
        case 'ADM':?>
            <li><a class="nav-link" href=<?php echo redirect('inicio'); ?>>Inicio</a></li>
            <li><a class="nav-link" href=<?php echo redirect('admin'); ?>>Administración</a></li>
            <li><a class="nav-link" href=<?php echo redirect('catalogos'); ?>>Catálogos</a></li>
            <li><a class="nav-link" href=<?php echo redirect('operaciones'); ?>>Operaciones</a></li>
            <li><a class="nav-link" href=<?php echo redirect('reportes'); ?>>Reportes</a></li>
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

    function submenu_adm(){
        global $conection;
        $query="SELECT * FROM permiso WHERE idUsuario='{$_SESSION['usuario']}' and estatus='1'";
        $result = mysqli_query($conection, $query);
        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                switch($row["permiso"]){
                    case 'Usuarios': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('usuario_frame'); ?>><div class='full services_blog'>
                                <img class='img-responsive' src='images/s1.png' alt='#' />
                                <h4>Usuarios</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Roles': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('rol_frame'); ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s1.png" alt="#" />
                                <h4>Roles</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Asignacion de Roles': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('asig_roles'); ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s3.png" alt="#" />
                                <h4>Asignación de Roles</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Asignacion de permisos': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('asig_permisos'); ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s4.png" alt="#" />
                                <h4>Asignación de Permisos</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Parametros Active Directory': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('parametrosAD'); ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Parámetros Active Directory</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Parametros FTP': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('parametrosFTP'); ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s3.png" alt="#" />
                                <h4>Parámetros FTP</h4>
                            </div></a>
                        </div>
                        <?php break;
                }
            }
        }
        else{
            echo "Ningún permiso habilitado para ", $_SESSION['usuario'], ".";
        }
    }

    function submenu_cat(){
        global $conection;
        $query="SELECT * FROM permiso WHERE idUsuario='{$_SESSION['usuario']}' and estatus='1'";
        $result = mysqli_query($conection, $query);
        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                switch($row["permiso"]){
                    case 'Companias': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('companias') ?>><div class="full services_blog">
                            <img class="img-responsive" src="images/s1.png" alt="#"/>
                            <h4>Compañías</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Agentes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('agentes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Agentes</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Clientes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('clientes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s3.png" alt="#" />
                                <h4>Clientes</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Articulos Existentes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('artExistentes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s4.png" alt="#" />
                                <h4>Artículos Existentes</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Articulos Vendidos': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('artVendidos') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Artículos Vendidos</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Listas de Precios': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('listasprecio') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s3.png" alt="#" />
                                <h4>Listas de Precios</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Direcciones de entrega': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('dir_ent') ?>><div class="full services_blog">
                            <img class="img-responsive" src="images/s1.png" alt="#" />
                            <h4>Direcciones de Entrega</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Cantidades entregadas': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('cantEntre') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Cantidades Entregadas</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Facturas': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('facturas') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Facturas</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Inventarios': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('inventarios') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Inventarios</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Almacenes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('almacenes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Almacenes</h4>
                            </div></a>
                        </div>
                        <?php break;
                }
            }
        }
        else{
            echo "Ningún permiso habilitado para ", $_SESSION['usuario'], ".";
        }
    }

    function submenu_op(){
        global $conection;
        $query="SELECT * FROM permiso WHERE idUsuario='{$_SESSION['usuario']}' and estatus='1'";
        $result = mysqli_query($conection, $query);
        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                switch($row["permiso"]){
                    case 'Busqueda de Ordenes': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/busqueda.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('busqueda ordenes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Búsqueda de Órdenes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Capturar Orden': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('capturar orden') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Capturar Orden</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Autorizar Orden': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('autorizar orden') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Autorizar Orden</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Consultar Ordenes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('consultar ordenes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Consultar Órdenes</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Modificar Ordenes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('modificar ordenes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Modificar Órdenes</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Consultar Estatus': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('consultar estatus') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Consultar Estatus de Órden</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Buscar Articulos': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('buscar articulos') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Búsqueda de Artículos</h4>
                            </div></a>
                        </div>
                        <?php break;
                    }
            }
        }
        else{
            echo "Ningún permiso habilitado para ", $_SESSION['usuario'], ".";
        }
    }

    function submenu_rep(){
        global $conection;
        $query="SELECT * FROM permiso WHERE idUsuario='{$_SESSION['usuario']}' and estatus='1'";
        $result = mysqli_query($conection, $query);
        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                switch($row["permiso"]){
                    case 'Reporte de Todas las Ordenes': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('reporte todas ordenes') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Reporte de Todas las Órdenes</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Reporte de Promedio de Tiempo': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('reporte promedio tiempo') ?>><div class="full services_blog">
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Reporte de Promedio de Tiempo</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Reporte de Ordenes Procesadas': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('reporte promedio tiempo') ?>><div class="full services_blog"> 
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Reporte de Órdenes Procesadas</h4>
                            </div></a>
                        </div>
                        <?php break;
                    case 'Reporte de Ordenes en Proceso': ?>
                        <div class="col-md-2 col-sm-4 col-xs-8">
                            <a href=<?php echo redirect('reporte promedio tiempo') ?>><div class="full services_blog"> 
                                <img class="img-responsive" src="images/s2.png" alt="#" />
                                <h4>Reporte de Órdenes en Proceso</h4>
                            </div></a>
                        </div>
                        <?php break;
                    }
            }
        }
        else{
            echo "Ningún permiso habilitado para ", $_SESSION['usuario'], ".";
        }
    }
?>
