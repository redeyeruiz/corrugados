<?php 
session_start();
include('php/utilerias.php');
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: ".redirect('login'));
    die();
}elseif(!verificacion_permiso($_SESSION['usuario'], 'Reportes')){
    $_SESSION['mens_error'] = "No cuenta con el permiso para entrar a esta página.";
    header("Location: ".redirect('inicio'));
    die();
}


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
    <!-- Javascript-->
    <script type="text/javascript" src="js/busquedas.js"></script>

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
                 <div class="search-box">
                    <input type="text" class="search-txt" placeholder="Search">
                    <a class="search-btn">
                        <img src="images/search_icon.png" alt="#" />
                    </a>
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
                        <h3>Contact</h3>
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
                           <h2><span class="theme_color"></span>Reporte de todas las ordenes</h2>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    
    <div class= "login-space">
        <p>
        Fecha de orden Desde: <span><input class="user" type="date" id="f_desde"></span> 
        Hasta: <span><input class="user" type="date" id="f_hasta"></span>
        </p>

        <p>
        Folio Baan Desde: <span><input class="user" type="text" id="b_desde"></span> 
        Hasta: <span><input class="user" type="text" id="b_hasta"></span>
        </p>

        <p>
        Cliente Desde: <span><input class="user" type="text" id="c_desde"></span> 
        Hasta: <span><input class="user" type="text" id="c_hasta"></span>
        </p>

        <p>
        Artículo Desde: <span><input class="user" type="text" id="a_desde"></span> 
        Hasta: <span><input class="user" type="text" id="a_hasta"></span>
        <span><button class="capturar-button" onclick="orden_filtro();">Filtrar</button></span>
        </p>
    </div>

    <!-- contact_form -->
    <div class="section contact_form">
        <iframe class="ordenesEP" src="ordenesEP.html" title="ordenesEP"></iframe>
        <?php
		function orden_filtro(){
			$f_desde=$_GET['f_desde'];
			$f_hasta=$_GET['f_hasta'];
			$b_desde=$_GET['b_desde'];
			$b_hasta=$_GET['b_hasta'];
			$c_desde=$_GET['c_desde'];
			$c_hasta=$_GET['c_hasta'];
			$a_desde=$_GET['a_desde'];
			$a_hasta=$_GET['a_hasta'];
			$conn=conecta_servidor();
			$query="SELECT * FROM reporteorden WHERE fechaOrden BETWEEN '$f_desde' AND '$f_hasta' AND ordenBaan BETWEEN '$b_desde' AND '$b_hasta' AND idCliente BETWEEN '$c_desde' AND '$c_hasta' AND idArticulo BETWEEN '$a_desde' AND '$a_hasta'";
			echo $query;
			$sql=mysqli_query($conn,$query);
			//$reg=mysqli_fetch_object($sql);		
			if (mysqli_affected_rows($conn)==0){
                msg("Folio Inexistente", "rojo");
            }
			echo
            "<br><br><br>
            <h1 class='h1-orden'>Busqueda de orden</h1>
            <div class='tbl-header-orden'>
                <table class='table-orden' cellpadding='0' cellspacing='0'>
                <thead>
                    <tr>
                        <th class='th-orden' scope='col'>Fecha de Orden</th>
                        <th class='th-orden' scope='col'>Orden Baan</th>
                        <th class='th-orden' scope='col'>ID cliente</th>
                        <th class='th-orden' scope='col'>ID articulo</th>
                        
                    </tr>
                </thead>
                </table>
            </div>
            <div class='tbl-content-orden'>
                    <table class='table-orden' cellpadding='0' cellspacing='0'>
                    <tbody>";


			while ($reg=mysqli_fetch_object($sql)){

				/*if ($reg==mysqli_fetch_array($sql)){
					msg("Folio Inexistente", "rojo");
				}*/
				$fechaOrden=$reg->fechaOrden;
				$ordenBaan=$reg->ordenBaan;
				$idCliente=$reg->idCliente;
				$idArticulo=$reg->idArticulo;
				echo
			
				"       <tr>
					<td class='td-orden'>$fechaOrden</td>
					<td class='td-orden'>$ordenBaan</td>
					<td class='td-orden'>$idCliente</td>
					<td class='td-orden'>$idArticulo</td>

					</tr>
			";

			}
			/*if ($reg==mysqli_fetch_array($sql)){
				msg("Folio Inexistente", "rojo");
			}
			else{

				formulario($fol, $reg->ordenBaan, $reg->idCliente, $reg->nombreCliente);
				msg("Consulta realizada", "verde");
			}
			*/
			
			
		}
        ?>
    </div>
    <!-- end contact_form -->
   
    <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
            <div class="row">
               <div class="col-md-12 white_fonts">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="full">
                                <img class="img-responsive" src="images/footer_logo.png" alt="#" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="full">
                                <h3>Quick Links</h3>
                            </div>
                            <div class="full">
                                <ul class="menu_footer">
                                    <li><a href="catalogos.html">> Catálogos</a></li>
                                    <li><a href="about.html">> About</a></li>
                                    <li><a href="exchange.html">> Exchange</a></li>
                                    <li><a href="operaciones.html">> operaciones</a></li>
                                    <li><a href="new.html">> New</a></li>
                                    <li><a href="contact.html">> Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="full">
                                <div class="footer_blog full white_fonts">
                             <h3>Newsletter</h3>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                             <div class="newsletter_form">
                                <form action="catalogos.html">
                                   <input type="email" placeholder="Your Email" name="#" required="">
                                   <button>Submit</button>
                                </form>
                             </div>
                         </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="full">
                                <div class="footer_blog full white_fonts">
                             <h3>Contact us</h3>
                             <ul class="full">
                               <li><img src="images/i5.png"><span>London 145<br>United Kingdom</span></li>
                               <li><img src="images/i6.png"><span>demo@gmail.com</span></li>
                               <li><img src="images/i7.png"><span>+12586954775</span></li>
                             </ul>
                         </div>
                            </div>
                        </div>
					</div>
                </div>
			 </div>
        </div>
    </footer>
    <!-- End Footer -->

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