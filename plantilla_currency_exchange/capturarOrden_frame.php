<?php
    session_start();
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <!-- <li><a href="mailto:exchang@gmail.com"><img src="images/mail_icon.png" alt="#" />exchang@gmail.com</a></li> -->
                            <li><a href="#">&nbsp</a></li>
                            <li><a href="tel:exchang@gmail.com"><img src="images/user_logo.png" width="30" height="30"alt="#" />Usuario</a></li>
                            <li><a class="join_bt" href="#">Cerrar sesión</a></li>
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
                        <li><a class="nav-link" href="inicio.html">Inicio</a></li>
                        <li><a class="nav-link" href="admin.html">Administración</a></li>
                        <li><a class="nav-link" href="catalogos.html">Catálogos</a></li>
                        <li><a class="nav-link" href="operaciones.html">Operaciones</a></li>
                        <li><a class="nav-link" href="reportes.html">Reportes</a></li>
                        
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
                        <h3></h3>
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
                           <h2><span class="theme_color"></span>Capturar Orden</h2>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->


    <!-- Iframe -->
    <section class="bodyCO">

        <form class="formCO" method="POST" action="capturarOrden_frame.php">

            <h2 class="h2CO">Captura de Órdenes de Venta</h2>

            <p class="pCO" type="Cliente:">
            <input class="inputCO" type="text" name='nombreCliente' placeholder="Ingrese el nombre del cliente" required>
            </p>
            <p class="pCO" type="Dirección de Entrega:">
            <input class="inputCO" type="text" name='dirEnt' placeholder="Ingrese la dirección de entrega" required></input>
            </p>
            <p class="pCO" type="Órden de Compra:">
            <input class="inputCO" type="number" name='ordenCompra' placeholder="Ingrese el número de órden de compra" required></input>
            </p>
            <p class="pCO" type="Fecha de Órden de Compra:">
            <input class="inputCO" type="date" name ='fechaOrden' required></input>
            </p>
            <p class="pCO" type="Artículo:">
            <input class="inputCO" type="text" name ='descripcion' placeholder="Ingrese el nombre de un artículo" required></input>
            </p>
            <p class="pCO" type="Cantidad:">
            <input class="inputCO" type="number" name ='cantidad' placeholder="Indique la cantidad en unidad 1x1000" required></input>
            </p>
            <p class="pCO" type="Precio:" >
            <input class="inputCO" type="number" name ='costo' placeholder="Indique el precio en pesos" required></input>
            <button class="buttonCO">Recalcular Precio</button><br><br>
            </p>
                
            <p class="pCO" type="Fecha Solicitada:">
            <input class="inputCO" type="date" name ='fechaSolicitud' required></input>
            </p>
            <p class="pCO" type="Observaciones de la Orden:">
            <textarea class="textareaCO" name="Observaciones" rows="3" placeholder="¿Tiene alguna observación sobre el la órden?"required></textarea>
            </p>
            <br>
            <p class="pCO center">

            </p>
            <br><br>

            <form class="formCO" method="POST" action="capturarOrden_frame.php">
                        <button type="submit" name="agregarArt" class="buttonBigCO" >Agregar Articulo</button>
                        <button type="submit" name="guardar" class="buttonBigCO" >Guardar</button>
                        <button class="buttonBigCO">Cancelar</button>
            </form>

        </form>

       
        

    </section>
    <!-- end cIframe -->
   
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
                                    <li><a href="reportes.html">> New</a></li>
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


	<?php

    /* && isset($_POST['dirEnt']) && isset($_POST['ordenCompra']) 
        && isset($_POST['cantidad']) && isset($_POST['costo']) && isset($_POST['descripcion']) 
        && isset($_POST['fechaOrden']) && isset($_POST['fechaSolicitud']) 
        && isset($_POST['Observaciones'])*/
    echo "primer echo <br>"; 
    if( isset($_POST['agregarArt']) ){
        echo "segundo echo <br>"; 

        $idOrden="0001";
        $idCompania="0003";
        $folio=1;
        $numFact=1234;
        $ordenBaan=1234;
        $idCliente=1234;
        $nombreCliente=$_POST['nombreCliente'];
        $dirEnt=$_POST['dirEnt'];
        $idArticulo="idtest";
        $ordenCompra= $_POST['ordenCompra'];
        $cantidad=$_POST['cantidad'];
        $precio=34;
        $decripcion=$_POST['descripcion'];
        $fechaOrden=$_POST['fechaOrden'];
        $fechaSolicitud=$_POST['fechaSolicitud'];
        $fechaEntrega="un dia";
        $entregado=0;
        $acumulado=0;
        $total=0;
        $costo=$_POST['costo'];
        $moneda="MXP";
        $Observaciones=$_POST['Observaciones'];

        
        if(!isset($_SESSION['queries'])){
            $_SESSION['queries']="INSERT INTO ReporteOrden VALUES('$idOrden','$idCompania','
            $folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt
            ','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','
            $fechaOrden','$fechaSolicitud','$fechaEntrega','$entregado','$acumulado','
            $total','$costo','$moneda','$Observaciones)";
        
        }
        
            

            
        
        else{
            $_SESSION['queries'] .= "INSERT INTO ReporteOrden VALUES('$idOrden','$idCompania','
            $folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt
            ','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','
            $fechaOrden','$fechaSolicitud','$fechaEntrega','$entregado','$acumulado','
            $total','$costo','$moneda','$Observaciones)";
        }
        echo "antes del echo queries <br>"; 
        echo $_SESSION['queries']; 

        
            
        

    }

    if(isset($_POST["guardar"])){
        echo "guardar";
    }
    ?>  
</body>

</html>