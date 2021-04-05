<?php

session_start();
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php");
    die();
}

include("funciones/listaspreciofuncP.php"); 
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

</head>

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>

    <header class="top-header">
        <div class="header_top">

            <div class="container">
                <div class="row">
                    <div class="logo_section">
                        <a class="navbar-brand" href="inicio.php"><img src="images/papeles_corrugados.png" width="200" height="70" alt="image"></a>
                    </div>
                    <div class="site_information">
                        <ul>
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
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                                </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                                <ul class="navbar-nav">
                                    <li><a class="nav-link" href="inicio.php">Inicio</a></li>
                                    <li><a class="nav-link" href="admin.php">Administración</a></li>
                                    <li><a class="nav-link" href="catalogos.php">Catálogos</a></li>
                                    <li><a class="nav-link" href="#">Operaciones</a></li>
                                    <li><a class="nav-link" href="#">Reportes</a></li>
                                    <li><a class="nav-link" href="#">Contacto</a></li>
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
    <!-- End header
    <br/>
    <br/>
     -->

    <!-- Start Banner -->
    <div class="section inner_page_banner" style="background-color: #003DCE">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title">
                        <h3>Catálogos</h3>
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
                            <h2><span class="theme_color"></span>Listas de Precios</h2>
                        </div>
                    </div>
                </div>
            </div>
            <table border="0" width="50%" align="center">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <tr>
                        <td>
                            <p align="center"><b>ID Compañía</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idcomp" type="text" size="50" maxlength="4" class="campo" value="<?= $idcomp ?>">
                            <p><span style="color:#C84810" class="error"><?= $idcomp_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Lista</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idlis" type="text" size="50" maxlength="10" class="campo" value="<?= $idlis ?>">
                            <p><span style="color:#C84810" class="error"><?= $idlis_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Artículo</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idart" type="text" size="50" maxlength="20" class="campo" value="<?= $idart ?>">
                            <p><span style="color:#C84810" class="error"><?= $idart_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Descuento</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="desc" type="number" min="0" step="0.01" class="campo" value="<?= $desc ?>">
                            <p><span style="color:#C84810" class="error"><?= $desc_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Cantidad Olmp.</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="olmp" type="number" min="0" max="9999999999" class="campo" value="<?= $olmp ?>">
                            <p><span style="color:#C84810" class="error"><?= $olmp_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Precio</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="prec" type="number" min="0" step="0.01" class="campo" value="<?= $prec ?>">
                            <p><span style="color:#C84810" class="error"><?= $prec_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Nivel de Descuento</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="lvldesc" type="number" min="0" class="campo" value="<?= $lvldesc ?>">
                            <p><span style="color:#C84810" class="error"><?= $lvldesc_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Importe de Descuento</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="impdesc" type="number" min="0" step="0.01" class="campo" value="<?= $impdesc ?>">
                            <p><span style="color:#C84810" class="error"><?= $impdesc_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Fecha de Inicio</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="finicio" type="date" size="50" maxlength="10" class="campo" value="<?= $finicio ?>">
                            <p><span style="color:#C84810" class="error"><?= $finicio_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Fecha de Caducidad</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="fcad" type="date" size="50" maxlength="10" class="campo" value="<?= $fcad ?>">
                            <p><span style="color:#C84810" class="error"><?= $fcad_error ?></span></p>
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
                                            <button name="b_actualizar" type="submit" style="width:200px" class="btn btn-outline-info">Actualización</button>
                                            <button name="b_reporte" type="submit" style="width:200px" class="btn btn-outline-dark">Reportes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                </form>
            </table>
            <?php
                if ($option != ""){
                    echo "<table style='border:3px solid #ff880e' width='90%' align='center'>
                                <tr>
                                    <td style='border:3px solid #ff880e' colspan='10'>
                                        <p align='center' style='color:#475747; font-size:20px;'>". $option. "</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='border:3px solid #ff880e' width='5%' align='center'>ID Compañía</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>ID Lista</td>
                                    <td style='border:3px solid #ff880e' width='15%' align='center'>ID Artículo</td>
                                    <td style='border:3px solid #ff880e' width='15%' align='center'>Descuento</td>
                                    <td style='border:3px solid #ff880e' width='15%' align='center'>Precio</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>Cantidad Olmp.</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>Nivel Descuento</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>Fecha Caducidad</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>Fecha Inicio</td>
                                    <td style='border:3px solid #ff880e' width='15%' align='center'>Importe Descuento</td>

                                </tr>";
                    if ($result-> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            echo "<tr><td style='border:3px solid #ff880e' width='5%'>". $row["idCompania"] ."</td><td style='border:3px solid #ff880e' width='7%'>". $row["idLista"] ."</td><td style='border:3px solid #ff880e' width='15%'>". $row["idArticulo"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='15%'>". $row["descuento"] ."</td><td style='border:3px solid #ff880e' width='15%'>". $row["precio"] ."</td><td style='border:3px solid #ff880e' width='7%'>". $row["cantOlmp"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='7%'>". $row["nivelDscto"] ."</td><td style='border:3px solid #ff880e' width='7%'>". $row["fechaCaducidad"] ."</td><td style='border:3px solid #ff880e' width='7%'>". $row["fechaInicio"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='15%'>". $row["impDesc"] ."</td></tr>";
                        }
                    }
                    else{
                        echo "<tr><td style='border:3px solid #ff880e' colspan='10'><div align='center' style='color:#475747; font-size:15px;'>No hay resultados.</div>";
                    }
                    echo "</table>";
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

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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