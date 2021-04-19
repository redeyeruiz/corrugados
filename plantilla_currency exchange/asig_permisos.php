<?php

session_start();
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php");
    die();
}

include("php/permisos.php");

?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Portal Papeles Corrugados</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <div class="header_top">

            <div class="container">
                <div class="row">
                    <div class="logo_section">
                        <a class="navbar-brand" href="inicio.php"><img src="images/papeles_corrugados.png" width="200" height="70" alt="image"></a>
                    </div>
                    <div class="site_information">
                        <ul>
                            <!-- <li><a href="mailto:exchang@gmail.com"><img src="images/mail_icon.png" alt="#" />exchang@gmail.com</a></li> -->
                            <li><a href="#">&nbsp</a></li>
                            <li>
                                <a href="#"><img src="images/user_logo.png" width="30" height="30" alt="#" /><?php echo $_SESSION['nombre'] ?></a>
                            </li>
                            <li><a class="join_bt" href="php/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="header_bottom">
            <div class="container">
                <div class="col-sm-12">
                    <div class="menu_orange_section" style="background: #ff880e;">
                        <nav class="navbar header-nav navbar-expand-lg">
                            <div class="menu_section">
<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">--> 
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                                    <ul class="navbar-nav">
                                       <?php menu()?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                       </div>
                </div>
            </div>
        </div>
        </div>

    </header>
    <!-- End header -->

    <!-- Start Banner -->
    <div class="section inner_page_banner" style="background-color: #003DCE">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title">
                        <h3>Administración</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color"></span>Asignación de permisos a usuario</h2>
                        </div>
                    </div>
                </div>
            </div>
            <table border="0" width="50%" align="center">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="datos">
                    <tr>
                        <td>
                            <p align="center"><b>ID Usuario</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="id_user" type="text" size="50" maxlength="20" class="campo" value="<?= $id_user ?>">
                            <p><span style="color:#C84810" class="error"><?= $id_user_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Permisos</b></p>
                        </td>
                        <td style="width:20%">
                            <!--<input style="border:3px solid #ff880e" name="per" type="text" size="50" maxlength="20" class="campo" value="<?= $per ?>">
                            <p><span style="color:#C84810" class="error"><?= $per_error ?></span></p> -->
                            <ul class="treeview">
                                <li>
                                    <input type="checkbox" name="check_list[]" id="check1" value="Administracion">
                                    <label for="tall" class="custom-unchecked"><b><i>Administración</i></b></label>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check2" value="Usuarios">
                                            <label for="tall-1" class="custom-unchecked">Usuarios</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check3" value="Roles">
                                            <label for="tall-2" class="custom-unchecked">Roles</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check4" value="Asignacion de Roles">
                                            <label for="tall-3" class="custom-unchecked">Asignación de roles</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check5" value="Asignacion de permisos">
                                            <label for="tall-1" class="custom-unchecked">Asignación de permisos</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check6" value="Parametros Active Directory">
                                            <label for="tall-2" class="custom-unchecked">Parámetros Active Directory</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check7" value="Parametros FTP">
                                            <label for="tall-3" class="custom-unchecked">Parámetros FTP</label>
                                        </li>
                                    </ul>
                                </li>
                                <li class="last">
                                    <input type="checkbox" name="check_list[]" id="check8" value="Catalogos">
                                    <label for="short" class="custom-unchecked"><b><i>Catálogos</i></b></label>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check9" value="Companias">
                                            <label for="short-1" class="custom-unchecked">Compañías</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check10" value="Agentes">
                                            <label for="short-2" class="custom-unchecked">Agentes</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check11" value="Clientes">
                                            <label for="short-3" class="custom-unchecked">Clientes</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check12" value="Articulos Existentes">
                                            <label for="short-1" class="custom-unchecked">Artículos Existentes</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check13" value="Articulos Vendidos">
                                            <label for="short-2" class="custom-unchecked">Artículos Vendidos</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check14" value="Listas de Precios">
                                            <label for="short-3" class="custom-unchecked">Listas de Precios</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check15" value="Direcciones de entrega">
                                            <label for="short-1" class="custom-unchecked">Direcciones de entrega</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check16" value="Cantidades entregadas">
                                            <label for="short-2" class="custom-unchecked">Cantidades entregadas</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check17" value="Facturas">
                                            <label for="short-3" class="custom-unchecked">Facturas</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check18" value="Inventarios">
                                            <label for="short-1" class="custom-unchecked">Inventarios</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check19" value="Almacenes">
                                            <label for="short-2" class="custom-unchecked">Almacenes</label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <input type="checkbox" name="check_list[]" id="check20" value="Operaciones">
                                    <label for="tall" class="custom-unchecked"><b><i>Operaciones</i></b></label>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check21" value="Busqueda de Ordenes">
                                            <label for="tall-1" class="custom-unchecked">Búsqueda de Órdenes</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check22" value="Capturar Orden">
                                            <label for="tall-2" class="custom-unchecked">Capturar Orden</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check23" value="Autorizar Orden">
                                            <label for="tall-3" class="custom-unchecked">Autorizar Orden</label>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="check_list[]" id="check24" value="Autorizacion Facturacion">
                                                    <label for="tall-2-1" class="custom-unchecked">Autorización Facturación</label>
                                                </li>
                                                <li class="last">
                                                    <input type="checkbox" name="check_list[]" id="check25" value="Autorizacion Cuentas por Cobrar">
                                                    <label for="tall-2-2" class="custom-unchecked">Autorización Cuentas por Cobrar</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="check_list[]" id="check26" value="Autorizacion Costos">
                                                    <label for="tall-2-1" class="custom-unchecked">Autorización Costos</label>
                                                </li>
                                                <li class="last">
                                                    <input type="checkbox" name="check_list[]" id="check27" value="Autorizacion Ingenieria">
                                                    <label for="tall-2-2" class="custom-unchecked">Autorización Ingeniería</label>
                                                </li>
                                                <li class="last">
                                                    <input type="checkbox" name="check_list[]" id="check28" value="Autorizacion Planeacion">
                                                    <label for="tall-2-2" class="custom-unchecked">Autorización Planeación</label>
                                                </li>
                                                <li class="last">
                                                    <input type="checkbox" name="check_list[]" id="check29" value="Autorizacion Fechas">
                                                    <label for="tall-2-2" class="custom-unchecked">Autorización Fechas</label>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check30" value="Consultar Ordenes">
                                            <label for="tall-1" class="custom-unchecked">Consultar Órdenes</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check31" value="Modificar Ordenes">
                                            <label for="tall-2" class="custom-unchecked">Modificar Órdenes</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check32" value="Consultar Estatus">
                                            <label for="tall-3" class="custom-unchecked">Consultar Estatus</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check33" value="Buscar Articulos">
                                            <label for="tall-3" class="custom-unchecked">Buscar Artículos</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check33_3" value="Bloqueo de Clientes">
                                            <label for="tall-3" class="custom-unchecked">Bloqueo de Clientes</label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <input type="checkbox" name="check_list[]" id="check34" value="Reportes">
                                    <label for="tall" class="custom-unchecked"><b><i>Reportes</i></b></label>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check35" value="Reporte de Todas las Ordenes">
                                            <label for="tall-1" class="custom-unchecked">Reporte de Todas las Órdenes</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check36" value="Reporte de Promedio de Tiempo"> 
                                            <label for="tall-2" class="custom-unchecked">Reporte de Promedio de Tiempo</label>
                                        </li>
                                        <li class="last">
                                            <input type="checkbox" name="check_list[]" id="check37" value="Reporte de Ordenes Procesadas">
                                            <label for="tall-3" class="custom-unchecked">Reporte de Órdenes Procesadas</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check_list[]" id="check38" value="Reporte de Ordenes en Proceso">
                                            <label for="tall-1" class="custom-unchecked">Reporte de Órdenes en Proceso</label>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row margin-top_30">
                                <div class="col-sm-12">
                                    <div class="full">
                                        <div class="center">
                                            <button name="b_altas" type="submit" style="width:200px" class="btn btn-outline-success">Altas</button>
                                            <button name="b_bajas" type="submit" style="width:200px" class="btn btn-outline-danger">Bajas</button>
                                        </div>
                                        <div class="center">
                                            <button name="b_consultas" type="submit" style="width:200px" class="btn btn-outline-dark">Consultas</button>
                                            <!--<button name="b_actualizar" type="submit" style="width:200px" class="btn btn-outline-info">Actualización</button>-->
                                            <button name="b_reporte" type="submit" style="width:200px" class="btn btn-outline-dark">Reportes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="center">
                                &nbsp;
                                &nbsp;
                                <!--
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="filebutton">Select File</label>
                                    <div class="col-md-4">
                                        <input type="file" name="file" id="file" class="input-large">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                                    <div class="col-md-4">
                                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                                    </div>
                                </div> 
                                <input type="file" id="selectedFile" style="display: none;" accept=".csv, .txt"/>
                                <input type="button" style="width: 100px;" class="btn btn-secondary btn-sm" value="Cargar" name = "archivo" onclick="document.getElementById('selectedFile').click();"/>
                                &nbsp;
                                <button type="file" style="width: 100px;" class="btn btn-secondary btn-sm">Descargar</button>-->
                            </div>
                            <!--<div id="response"
                                class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
                                <?php if(!empty($message)) { echo $message; } ?>
                            </div>
                            <div class="center">
                            <p id="feedback"></p>
                            </div>-->
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div align="center" style="color:#475747; font-size:20px;" class="success"><?= $success; ?></div>
                        </td>
                    </tr>
                    <?php
                        if ($btnsn != ""){
                            echo '<tr>
                                    <td colspan="2">
                                        <div class="center">
                                            <button name="confirmoc" type="submit" style="width:200px" class="btn btn-outline-success">Confirmar</button>
                                            <button name="canceloc" type="submit" style="width:200px" class="btn btn-outline-danger">Cancelar</button>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    ?>
                </form>
            </table>    
        <?php
                if ($option != ""){
                    echo "<table style='border:3px solid #ff880e' width='60%' align='center'>
                                <tr>
                                    <td style='border:3px solid #ff880e' colspan='3'>
                                        <p align='center' style='color:#475747; font-size:20px;'>". $option. "</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='border:3px solid #ff880e' width='20%' align='center'>ID Usuario</td>
                                    <td style='border:3px solid #ff880e' width='80%' align='center'>Permiso</td>
                                    <td style='border:3px solid #ff880e' width='20%' align='center'>Estatus</td>
                                </tr>";
                    if ($result-> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            echo "</td><td align='center' style='border:3px solid #ff880e' width='20%'>". $row["idUsuario"]."</td><td align='center' style='border:3px solid #ff880e' width='80%'>".$row["permiso"]."</td><td align='center' style='border:3px solid #ff880e' width='30%'>". $row["estatus"]."</td></tr>";
                        }
                    }
                    else{
                        echo "<tr><td style='border:3px solid #ff880e' colspan='6'><div align='center' style='color:#475747; font-size:15px;'>No hay resultados.</div>";
                    }
                    echo "</table>";
                    echo "<p align='center'>*Estado 1 significa Activo y 0 significa Inactivo </p>";
                }
            ?>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© Papeles Corrugados: Innovación en empaques.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a> -->

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cargar.js"></script>
    <script src="js/treeview.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
