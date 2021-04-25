<?php
    session_start();
    //include('php/utilerias2.php');
    include('php/capturarOrdenFunciones.php');
    cancelar();
    
    clientValues();
    calcularPrecio();
    
    update_dir();
    setOrdenCompra();
    guardar();
    
    
    include('php/utilerias.php');
    if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: ".redirect('login'));
    die();
    }elseif(!verificacion_permiso($_SESSION['usuario'], 'Capturar Orden')){
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(window).on("load resize ", function() {
	    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
	    $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();

        window.onload = function() {
        var selItem = sessionStorage.getItem("SelItem");  
        $('#articulos_l').val(selItem);
        }
        $('#articulos_l').change(function() { 
            var selVal = $(this).val();
            sessionStorage.setItem("SelItem", selVal);
        });
    </script>

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
                        <h3></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    
   <!-- section 
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
    end section -->


    <!-- Iframe -->
    <section class="bodyCO">

    <form class="formCO" method="POST" action="capturarOrden_frame.php">


            

        <form class="formCO" method="POST" action="capturarOrden_frame.php">

            <h2 class="h2CO">Captura de Órdenes de Venta</h2>
            <!--Agregar Validaciones de Longitud
                Quitar flechas de los input number--> 
            <p class="pCO" type="Seleccione al Cliente:">

            <input class="datal" name="nombreClienteDT" type="search" list="nombres" size="25" class="datal" required value="<?php echo htmlspecialchars($_SESSION['nombreClienteDT'] ?? '', ENT_QUOTES); ?>">
			
            <?php 
				tabla_clientes();
			?>

            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button class="buttonBigCO btn" type="submit" name ="nombreClienteB" id="reloader">Buscar cliente </button>
            </div>
            
            
            <div id= "content">
            
			
            <?php 
                checarStock();
                checarFechaCaducidad();
				tabla_dir();      
			?>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="" class="buttonBigCO btn" >Usar esta Dirección</button>
            </div>
                      
            </div>

        </form>
        <form class="formCO" method="POST" action="capturarOrden_frame.php">
        <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="Número de Dirección de Entrega:">
                    <input  disabled class="inputCO" type="text" name='dirEnt' placeholder="i.e. 123" value="<?php echo htmlspecialchars($_SESSION['direntC'] ?? '', ENT_QUOTES); ?>" >
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Nombre de Entrega:">
                    <input  disabled class="inputCO" type="text" name='nombreEntrega' placeholder="Ingrese el nombre de entrega" required value="<?php echo htmlspecialchars($_SESSION['nomEC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Dirección:">
                    <input  disabled class="inputCO" type="text" name='direccion' placeholder="Ingrese calle y número" required value="<?php echo htmlspecialchars($_SESSION['direccionC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="Municipio:">
                    <input  disabled class="inputCO" type="text" name='municipio' placeholder="Ingrese el municipio" required value="<?php echo htmlspecialchars($_SESSION['municipioC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Estado:">
                    <input   disabled class="inputCO" type="text" name='estado' placeholder="Ingrese el estado" required value="<?php echo htmlspecialchars($_SESSION['estadoC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Teléfono:">
                    <input  disabled class="inputCO" type="text" name='telefono' placeholder="Ingrese el télefono" required 
                    value="<?php echo htmlspecialchars($_SESSION['telefonoC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="Observaciones:">
                    <input  disabled class="inputCO" type="text" name='observaciones' placeholder="Ingrese alguna observación" required value="<?php echo htmlspecialchars($_SESSION['obsC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Código Postal:">
                    <input  disabled class="inputCO" type="text" name='cosPost' placeholder="Ingrese el código postal" required value="<?php echo htmlspecialchars($_SESSION['CPC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Código de Ruta:">
                    <input disabled class="inputCO" type="text" name='codRuta' placeholder="Ingrese el código de ruta" required value="<?php echo htmlspecialchars($_SESSION['CRC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
            </div>
                
            <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="País:">
                    <input  disabled class="inputCO" type="text" name='pais' placeholder="Ingrese el país" required value="<?php echo htmlspecialchars($_SESSION['paisC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="RFC:">
                    <input  disabled class="inputCO" type="text" name='rfc' placeholder="Ingrese el RFC" required value="<?php echo htmlspecialchars($_SESSION['RFCC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                </div>
            </div> 

            


            <p class="pCO" type="Folio Órden de Compra:">
            <input  disabled class="inputCO" type="number" name='folio' placeholder=" Folio de órden de compra"  value="<?php echo htmlspecialchars($_SESSION['folio'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Orden Compra:">
            <?php campoOrdenCompra() ?>
            </p>
            <p class="pCO" type="Fecha de Órden de Compra:">
            <input   class="inputCO" type="date" name ='fechaOrden' required value="<?php echo htmlspecialchars($_POST['fechaOrden'] ?? '', ENT_QUOTES); ?>" min="<?php echo date("Y-m-d"); ?>"></input>
            </p>
            <p class="pCO" type="Artículo:">
            
            <select id='articulos_l' class='datal' name ='descripcion' list='articulos' required value="<?php echo htmlspecialchars($_POST['descripcion'] ?? '', ENT_QUOTES); ?>">
            <?php
            
            tabla_articulos();
            ?>
            </p>
            <p class="pCO" type="Cantidad:">
            <input class="inputCO" type="number" name ='cantidad' placeholder="Indique la cantidad en unidad 1x1000" required min="1" value="<?php echo htmlspecialchars($_POST['cantidad'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Precio:" >
            <input disabled class="inputCO" type="number" name ='precio' placeholder="Precio en pesos" required value="<?php echo htmlspecialchars($_SESSION['precioT'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button name ="calcularP"class="buttonBigCO btn" formnovalidate>Recalcular Precio </button>
                </div>
            <p class="pCO" type="Fecha Solicitada:">
            <input class="inputCO" type="date" name ='fechaSolicitud' required value="<?php echo htmlspecialchars($_POST['fechaSolicitud'] ?? '', ENT_QUOTES); ?>" min="<?php echo date("Y-m-d"); ?>"></input>
            </p>
            <p class="pCO" type="Observaciones de la Orden:">
            <textarea class="textareaCO" name="Observaciones" rows="3" placeholder="¿Tiene alguna observación sobre el la órden?"required></textarea>
            </p>
            <br>
            <p class="pCO center">
            </p>

              
            <form class="" method="POST" action="capturarOrden_frame.php">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="agregarArt" class="buttonBigCO btn" >Agregar Articulo</button>
                
                </div>

                <?php
                require_once('php/utilerias.php');
                agregar_tabla();
                ?>

                
            </form>

                <form class="formCO" method="POST" action="capturarOrden_frame.php">
                    <h2 class="h2CO">Confirmar Órdenes</h2>

                    <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="guardar" class="buttonBigCO btn " >Guardar</button>
                            <button type ="submit" name= "cancelar" class="buttonBigCO btn justify-content-md">Cancelar</button>
                        
                    </div>
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
                    <p class="crp">© Papeles Corrugados: Innovación de Empaques</p>
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
