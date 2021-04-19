<?php 
session_start();
include('php/utilerias.php');
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: ".redirect('login'));
    die();
}/*elseif(!($_SESSION['rol']=='ADM'||$_SESSION['rol']=='ADMA')){
    $_SESSION['mens_error'] = "No cuenta con el permiso para entrar a esta página.";
    header("Location: ".redirect('inicio'));
    die();
}*/
include('php/utilerias2.php');
unsetAll()
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
    <title>Exchange Currency - Responsive HTML5 Template</title>
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
                        <a class="navbar-brand" href="index.html"><img src="images/papeles_corrugados.png" width="300" height="100" alt="image"></a>
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
                        <?php menu() ?>                        
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
    <div class="section inner_page_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title">
                        <h3>Operaciones</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    
   <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                           <h2><span class="theme_color"></span>Operaciones</h2>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Agregar submenu con permisos para operaciones *** -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="images/busqueda.png"alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="buscarOrdenes_frame.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Busqueda de Ordenes</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="images/carrito.png" alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="capturarOrden_frame.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Capturar Orden</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                        <img class="img-responsive" src="images/consulta.png" alt="#" />
                        <div class="overlay"><a class="main_bt transparent" href="autorizarOrden.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Autorizar Orden</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                        <img class="img-responsive" src="images/modificar.png" alt="#" />
                        <div class="overlay"><a class="main_bt transparent" href="capturarOrden_frame.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Consultar Ordenes</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="images/estatus.png"alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="modif_ord.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Modificar Ordenes</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="images/search_store.png"  alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="statusOrden.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Consultar Estatus</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="images/factura.jpg" alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="busqueda_articulos_frame.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Buscar Articulos</h3>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="images/bajaCliente" alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="bloqueo_Clientes.php">acceder</a></div>
                       <div class="blog_details">
                         <h3>Baja de clientes</h3>
                       </div>
                    </div>
                </div>
                



             </div>
        </div>
    </div>
    <!-- end section -->


    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© Copyrights 2019 design by html.design</p>
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