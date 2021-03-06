<?php 
session_start();
include('php/utilerias.php');
include('php/utilerias2.php');
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
    <div>
        <?php
        if(isset($_GET['op'])){
            $op = $_GET['op'];
        
            if($op == "orden_filt") orden_filtro();
        
        }
		function orden_filtro(){


            if(($_GET['f_desde'] || $_GET['f_hasta']) == ""){
                $Query1=""; 
                $start = false;
            }
            else{
                $f_desde=$_GET['f_desde'];
                $f_hasta=$_GET['f_hasta'];
                $Query1="fechaOrden BETWEEN '$f_desde' AND '$f_hasta'";
                $start = true;
            }
            

            if(($_GET['b_desde'] || $_GET['b_hasta']) == ""){
                $Query2="";
            }
            else{
                $b_desde=$_GET['b_desde'];
                $b_hasta=$_GET['b_hasta'];
                if ($start == false){
                    $Query2="ordenBaan BETWEEN '$b_desde' AND '$b_hasta' ";
                    $start = true;
                }
                else{
                    $Query2=" AND ordenBaan BETWEEN '$b_desde' AND '$b_hasta'";
                } 
            }

            if(($_GET['c_desde'] || $_GET['c_hasta']) == ""){
                $Query3="";
            }
            else{
                $c_desde=$_GET['c_desde'];
                $c_hasta=$_GET['c_hasta'];
                if ($start == false){
                    $Query3="idCliente BETWEEN '$c_desde' AND '$c_hasta' ";
                    $start = true;
                }
                else{
                    $Query3=" AND idCliente BETWEEN '$c_desde' AND '$c_hasta'";
                } 
            }

            if(($_GET['a_desde'] || $_GET['a_hasta']) == ""){
                $Query4="";
            }
            else{
                $a_desde=$_GET['a_desde'];
                $a_hasta=$_GET['a_hasta'];
                if ($start == false){
                    $Query4="idArticulo BETWEEN '$a_desde' AND '$a_hasta' ";    
                    $start = true;
                }
                else{
                    $Query4=" AND idArticulo BETWEEN '$a_desde' AND '$a_hasta'";
                } 
            }
			$conn=conecta_servidor();
			$query="SELECT * FROM reporteorden WHERE $Query1 $Query2 $Query3 $Query4 ";
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
    <!-- End Footer -->



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