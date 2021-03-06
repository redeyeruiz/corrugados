<?php

date_default_timezone_set("America/Mexico_City");

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
			case 'cliente':       return 'http://localhost/corrugados/plantilla_currency%20exchange/clientes.php';
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
            case 'registro_bajas':return 'http://localhost/corrugados/plantilla_currency%20exchange/registro_bajas.php';
            case 'operaciones': return 'http://localhost/corrugados/plantilla_currency%20exchange/operaciones.php';
            case 'busqueda ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/buscarOrdenes_frame.php';
            case 'capturar orden': return 'http://localhost/corrugados/plantilla_currency%20exchange/capturarOrden_frame.php';
            case 'autorizar orden': return 'http://localhost/corrugados/plantilla_currency%20exchange/autorizarOrden_frame.php';
            case 'consultar ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/buscarOrdenes_frame.php';
            case 'modificar ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/modif_ord.php';
            case 'consultar estatus': return 'http://localhost/corrugados/plantilla_currency%20exchange/statusOrden.php';
            case 'buscar articulos': return 'http://localhost/corrugados/plantilla_currency%20exchange/busqueda_articulos_frame.php';
            case 'bloqueo clientes': return 'http://localhost/corrugados/plantilla_currency%20exchange/bloqueo_Clientes.php';
            case 'reportes': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportes.php';
            case 'reporte todas ordenes': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportes_ordenes.php';
            case 'reporte promedio tiempo': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportes_frame.php';
            case 'reporte en proc': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportesEnProc.php';
            case 'reporte proc': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportesProcesadas.php';
            case 'reporte graf': return 'http://localhost/corrugados/plantilla_currency%20exchange/reportesGraf.php';
            
        
		}
	}

	function menu(){
        global $conection;
        $query="SELECT * FROM permiso WHERE idUsuario='{$_SESSION['usuario']}' and estatus='1'";
        $result = mysqli_query($conection, $query); ?>
        <li><a class="nav-link" href=<?php echo redirect('inicio'); ?>>Inicio</a></li>
    <?php 
    if ($result-> num_rows > 0){ 
        while ($row = $result-> fetch_assoc()){
            switch($row["permiso"]){
                case 'Administracion': ?>
                    <li><a class="nav-link" href=<?php echo redirect('admin'); ?>>Administraci??n</a></li>
                    <?php break; 
                case 'Catalogos':?>
                    <li><a class="nav-link" href=<?php echo redirect('catalogos'); ?>>Cat??logos</a></li>
                    <?php break; 
                case 'Operaciones':?>
                    <li><a class="nav-link" href=<?php echo redirect('operaciones'); ?>>Operaciones</a></li>
                    <?php break;
                case 'Reportes': ?>
                    <li><a class="nav-link" href=<?php echo redirect('reportes'); ?>>Reportes</a></li>
                    <?php break; 
                }
            }

        } ?>
        <li><a class="nav-link" href="#">Contacto</a></li>
        <?php
    }

    function submenu_adm(){
        global $conection;
        $query="SELECT * FROM permiso WHERE idUsuario='{$_SESSION['usuario']}' and estatus='1'";
        $result = mysqli_query($conection, $query);
        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                switch($row["permiso"]){
                    case 'Usuarios': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/usuario.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('usuario_frame'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Usuarios</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Roles': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/rol.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('rol_frame'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Roles</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Asignacion de Roles': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/asig_rol.jpg" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('asig_roles'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Asignaci??n de Roles</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Asignacion de permisos': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/asig_perm.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('asig_permisos'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Asignaci??n de Permisos</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Parametros Active Directory': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/ad.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('parametrosAD'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Par??metros del Active Directory</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Parametros FTP': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/ftp.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('parametrosFTP'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Par??metros del FTP</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Registro bajas': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/reg_bajas.jpg" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('registro_bajas'); ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Registro de bajas</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                }
            }
        }
        else{
            echo "Ning??n permiso habilitado para ", $_SESSION['usuario'], ".";
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
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-A-companias.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('companias') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Compa????as</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Agentes': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-B-agentes.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('agentes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Agentes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Clientes': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-C-cliente.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('cliente') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Clientes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Articulos Existentes': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-D-articuloexistie.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('artExistentes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Art??culos Existentes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Articulos Vendidos': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-E-listventas.jpg" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('artVendidos') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Art??culos Vendidos</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Listas de Precios': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalagos-F-listprecios.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('listasprecio') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Listas de Precios</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Direcciones de entrega': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-G-dirEntregas.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('dir_ent') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Direcciones de Entrega</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Cantidades entregadas': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalagos-H-cantEntregadas.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('cantEntre') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Cantidades Entregadas</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Facturas': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalagos-I-factura.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('facturas') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Facturas</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Inventarios': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-J-inventario.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('inventarios') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Inventarios</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Almacenes': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/catalogos-K-almacen.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('almacenes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Almacenes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                }
            }
        }
        else{
            echo "Ning??n permiso habilitado para ", $_SESSION['usuario'], ".";
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
                        <div class="col-md-2 col-sm-8 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/busqueda.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('busqueda ordenes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>B??squeda de ??rdenes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Capturar Orden': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/carrito.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('capturar orden') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Capturar Orden</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Autorizar Orden': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/consulta.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('autorizar orden') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Autorizar Orden</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                        
                    case 'Consultar Ordenes': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/consulta.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('consultar ordenes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Consultar ??rdenes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Modificar Ordenes': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/modificar.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('modificar ordenes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Modificar ??rdenes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Consultar Estatus': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/estatus.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('consultar estatus') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Consultar Estatus</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Buscar Articulos': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/estatus.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('buscar articulos') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>B??squeda de Art??culos</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Bloqueo de Clientes': ?>
                        <div class="col-md-2 col-sm-9 col-xl-2">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/bajaCliente.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('bloqueo clientes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Bloqueo de Clientes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                }
            }
        }
        else{
            echo "Ning??n permiso habilitado para ", $_SESSION['usuario'], ".";
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
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/reporte-reTodasOrdenes.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('reporte todas ordenes') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Reporte de Todas las ??rdenes</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Reporte de Promedio de Tiempo': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/reporte-reTiempo.png"alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('reporte promedio tiempo') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Reporte de Promedio de Tiempo</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Reporte de Ordenes Procesadas': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/reporte-procesos.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('reporte proc') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Reporte de ??rdenes Procesadas</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Reporte de Ordenes en Proceso': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/reporte-reProcesos.png" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('reporte en proc') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Reporte de ??rdenes en Proceso</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    case 'Reportes Graficados': ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="full news_blog">
                                <img class="img-responsive" src="images/grafica.jpeg" alt="#" />
                                <div class="overlay"><a class="main_bt transparent" href=<?php echo redirect('reporte graf') ?>>acceder</a></div>
                                <div class="blog_details">
                                    <h3>Reportes Graficados</h3>
                                </div>
                            </div>
                        </div>
                        <?php break;
                    }
            }
        }
        else{
            echo "Ning??n permiso habilitado para ", $_SESSION['usuario'], ".";
        }
    }

    function crea_permiso($id_user, $rol){
        //echo $id_user;
        global $conection;
        $query = "DELETE FROM permiso WHERE idUsuario='$id_user'";
        mysqli_query($conection,$query);
        //echo mysqli_error($conection);
        switch($rol){
            case 'ADM':
                $query = "INSERT INTO Permiso Values('$id_user','Administracion',1),
                                                     ('$id_user','Usuarios',1),
                                                     ('$id_user','Roles',1),
                                                     ('$id_user','Asignacion de Roles',1),
                                                     ('$id_user','Asignacion de permisos',1),
                                                     ('$id_user','Parametros Active Directory',1),
                                                     ('$id_user','Parametros FTP',1),
                                                     ('$id_user','Registro bajas',1),
                                                     ('$id_user','Catalogos',1),
                                                     ('$id_user','Companias',1),
                                                     ('$id_user','Agentes',1),
                                                     ('$id_user','Clientes',1),
                                                     ('$id_user','Articulos Existentes',1),
                                                     ('$id_user','Articulos Vendidos',1),
                                                     ('$id_user','Listas de Precios',1),
                                                     ('$id_user','Direcciones de entrega',1),
                                                     ('$id_user','Cantidades entregadas',1),
                                                     ('$id_user','Facturas',1),
                                                     ('$id_user','Inventarios',1),
                                                     ('$id_user','Almacenes',1),
                                                     ('$id_user','Operaciones',1),
                                                     ('$id_user','Busqueda de Ordenes',1),
                                                     ('$id_user','Capturar Orden',1),
                                                     ('$id_user','Autorizar Orden',1),
                                                     ('$id_user','Autorizacion Facturacion',1),
                                                     ('$id_user','Autorizacion Costos',1),
                                                     ('$id_user','Autorizacion Ingenieria',1),
                                                     ('$id_user','Autorizacion Planeacion',1),
                                                     ('$id_user','Autorizacion Fechas',1),
                                                     ('$id_user','Consultar Ordenes',1),
                                                     ('$id_user','Modificar Ordenes',1),
                                                     ('$id_user','Consultar Estatus',1),
                                                     ('$id_user','Buscar Articulos',1),
                                                     ('$id_user','Bloqueo de Clientes',1),
                                                     ('$id_user','Reportes',1),
                                                     ('$id_user','Reporte de Todas las Ordenes',1),
                                                     ('$id_user','Reporte de Promedio de Tiempo',1),
                                                     ('$id_user','Reporte de Ordenes Procesadas',1),
                                                     ('$id_user','Reporte de Ordenes en Proceso',1),
                                                     ('$id_user','Reportes Graficados',1)";
                mysqli_query($conection, $query);
                //echo mysqli_error($conection);
                break;
            case 'ADC':
                //echo "entra";
                $query = "INSERT INTO Permiso Values('$id_user','Administracion',1),
                                                    ('$id_user','Roles',1),
                                                    ('$id_user','Usuarios',1),
                                                    ('$id_user','Asignacion de Roles',1),
                                                    ('$id_user','Asignacion de permisos',1),
                                                    ('$id_user','Operaciones',1),
                                                    ('$id_user','Busqueda de Ordenes',1)";
                mysqli_query($conection, $query);
                break;
            case 'AGE':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Busqueda de Ordenes',1),
                                                    ('$id_user','Capturar Orden',1),
                                                    ('$id_user','Modificar Ordenes',1),
                                                    ('$id_user','Consultar Ordenes',1),
                                                    ('$id_user','Consultar Estatus',1),
                                                    ('$id_user','Reportes',1),
                                                    ('$id_user','Reporte de Todas las Ordenes',1)";
                mysqli_query($conection, $query);
                break;
            case 'CST':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Autorizar Orden',1),
                                                    ('$id_user','Autorizacion Costos',1),
                                                    ('$id_user','Busqueda de Ordenes',1),
                                                    ('$id_user','Reportes',1),
                                                    ('$id_user','Reporte de Todas las Ordenes',1)";
                mysqli_query($conection, $query);
                break;
            case 'CXC':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Autorizar Orden',1),
                                                    ('$id_user','Bloqueo de Clientes',1),
                                                    ('$id_user','Consultar Estatus',1)";
                mysqli_query($conection, $query);
                echo mysqli_error($conection);
                break;
            case 'DIR':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Busqueda de Ordenes',1),
                                                    ('$id_user','Autorizar Orden',1),
                                                    ('$id_user','Consultar Ordenes',1),
                                                    ('$id_user','Consultar Estatus',1),
                                                    ('$id_user','Autorizar Orden',1),
                                                    ('$id_user','Reportes',1),
                                                    ('$id_user','Reporte de Todas las Ordenes',1),
                                                    ('$id_user','Reporte de Promedio de Tiempo',1),
                                                    ('$id_user','Reporte de Ordenes Procesadas',1),
                                                    ('$id_user','Reporte de Ordenes en Proceso',1)";
                mysqli_query($conection, $query);
                break;
            case 'EMB':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Consultar Ordenes',1),
                                                    ('$id_user','Consultar Estatus',1),
                                                    ('$id_user','Reportes',1),
                                                    ('$id_user','Reporte de Todas las Ordenes',1)";
                mysqli_query($conection, $query);
                break;
            case 'FAC':
                //NA Actualmente
                break;
            case 'FEC':
                //NA Actualmente
                break;
            case 'ING':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Autorizar Orden',1),
                                                    ('$id_user','Autorizacion Ingenieria',1),
                                                    ('$id_user','Busqueda de Ordenes',1),
                                                    ('$id_user','Buscar Articulos',1)";
                mysqli_query($conection, $query);
                break;
            case 'PLN':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Autorizacion Fechas',1),
                                                    ('$id_user','Consultar Ordenes',1),
                                                    ('$id_user','Consultar Estatus',1),
                                                    ('$id_user','Reportes',1),
                                                    ('$id_user','Reporte de Promedio de Tiempo',1)";
                mysqli_query($conection, $query);
                break;
            case 'REA':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','',1)";
                mysqli_query($conection, $query);
                break;
            case 'VTA':
                $query = "INSERT INTO Permiso Values('$id_user','Operaciones',1),
                                                    ('$id_user','Autorizar Orden',1),
                                                    ('$id_user','Consultar Ordenes',1),
                                                    ('$id_user','Consultar Estatus',1),
                                                    ('$id_user','Reportes',1),
                                                    ('$id_user','Reporte de Todas las Ordenes',1)";
                mysqli_query($conection, $query);
                break;
            default:
                break;
        }
    }

    function verificacion_permiso($id_user, $permiso){
        global $conection;
        $miPermiso = false;
        $query = "SELECT * FROM Permiso WHERE idUsuario = '$id_user'";
        $result = mysqli_query($conection, $query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['permiso']==$permiso){
                    $miPermiso = true;
                    break;
                }
            }
        }
        return $miPermiso;
    }

    function registro_baja($row, $id_user){
        global $conection;
        $tiempo = time();
        $dia = date("Y-m-d",$tiempo);
        $row_f = json_encode($row);
        $miQuery = "INSERT INTO Registro_bajas Values('$id_user','$dia','$row_f')";
        mysqli_query($conection, $miQuery);
        //echo mysqli_error($conection);
    }
?>
