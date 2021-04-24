<?php
    session_start();
    include('php/utilerias.php');
    if(!isset($_SESSION['conectado'])){
        $_SESSION['mens_error'] = "Por favor inicie sesión.";
        header("Location: ".redirect('login'));
        die();
    }elseif(!verificacion_permiso($_SESSION['usuario'], 'Modificar Ordenes')){
        $_SESSION['mens_error'] = "No cuenta con el permiso para entrar a esta página.";
        header("Location: ".redirect('inicio'));
        die();
    }
    //include('php/utilerias2.php');
    include('php/modOrdenesFunciones.php');
    
    
    
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
    <!-- Script Table Slidder -->
    <script>
        $(window).on("load resize ", function() {
	    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
	    $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();
            
        }

        
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

    <!-- Iframe -->
    <section class="bodyCO">

        <form class="formCO" method="POST" action="modif_ord.php">
            <h2 class="h2CO">Modificación de Órdenes</h2>
            <p class="pCO" type="Folio:" >
            <input class="inputCO" type="number" name ='folio' placeholder="Indique el folio de la órden" required></input>
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="buscar" class="buttonBigCO btn">Buscar</button>
                </div>
                <?php
                cancelar();
                clientValues();
                calcularPrecio();
                guardar();
                folioValue();
                
                
                
                
                
                
                
                eliminar();
                eliminarOrden();
                
                agregar_tablaM();
                
                update_dir();
                
                update_tableM();
                
                ?>
        </form>  
        
        <form class="formCO" method="POST" action="modif_ord.php">
            <h2 class="h2CO">Eliminar Artículos</h2>
            <p class="pCO" type="Eliminar Articulo" >
            <input class="inputCO" type="text" name ='eArticulo' placeholder="Indique el nombre del artículo" required></input>
            </p>
            

            <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="eliminarB" onClick="go()" class="buttonBigCO btn">Eliminar Artículo</button>
                </div>
                <?php
                require_once('php/utilerias.php');
                
                ?>
        </form>  

        <form class="formCO" method="POST" action="modif_ord.php">
        <div class="row g-3">
        <div class="col-sm">
                    <p class="pCO" type="Número de Dirección de Entrega:">
                    <input disabled class="inputCO" type="text" name='dirEnt' placeholder="i.e. 123" value="<?php echo htmlspecialchars($_SESSION['direntC'] ?? '', ENT_QUOTES); ?>" >
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Nombre de Entrega:">
                    <input class="inputCO" type="text" name='nombreEntrega' placeholder="Ingrese el nombre de entrega" required value="<?php echo htmlspecialchars($_SESSION['nomEC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Dirección:">
                    <input class="inputCO" type="text" name='direccion' placeholder="Ingrese calle y número" required value="<?php echo htmlspecialchars($_SESSION['direccionC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="Municipio:">
                    <input class="inputCO" type="text" name='municipio' placeholder="Ingrese el municipio" required value="<?php echo htmlspecialchars($_SESSION['municipioC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Estado:">
                    <input class="inputCO" type="text" name='estado' placeholder="Ingrese el estado" required value="<?php echo htmlspecialchars($_SESSION['estadoC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Teléfono:">
                    <input class="inputCO" type="text" name='telefono' placeholder="Ingrese el télefono" required 
                    value="<?php echo htmlspecialchars($_SESSION['telefonoC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="Observaciones:">
                    <input class="inputCO" type="text" name='observaciones' placeholder="Ingrese alguna observación" required value="<?php echo htmlspecialchars($_SESSION['obsC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Código Postal:">
                    <input class="inputCO" type="text" name='cosPost' placeholder="Ingrese el código postal" required value="<?php echo htmlspecialchars($_SESSION['CPC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="Código de Ruta:">
                    <input class="inputCO" type="text" name='codRuta' placeholder="Ingrese el código de ruta" required value="<?php echo htmlspecialchars($_SESSION['CRC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
            </div>
                
            <div class="row g-3">
                <div class="col-sm">
                    <p class="pCO" type="País:">
                    <input class="inputCO" type="text" name='pais' placeholder="Ingrese el país" required value="<?php echo htmlspecialchars($_SESSION['paisC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                    <p class="pCO" type="RFC:">
                    <input class="inputCO" type="text" name='rfc' placeholder="Ingrese el RFC" required value="<?php echo htmlspecialchars($_SESSION['RFCC'] ?? '', ENT_QUOTES); ?>">
                    </p>
                </div>
                <div class="col-sm">
                </div>
            </div> 

            


            <p class="pCO" type="Órden de Compra:">
            <input disabled class="inputCO" type="number" name='ordenCompra' placeholder=" Número de órden de compra" required value="<?php echo htmlspecialchars($_SESSION['folio'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Fecha de Órden de Compra:">
            <input disabled class="inputCO" type="date" name ='fechaOrden' required value="<?php echo htmlspecialchars($_SESSION['fechaOrden'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Artículo:">
            <input class="datal "  name ='descripcion' type="search" list="articulos" size="25" class="datal" placeholder="Ingrese el nombre de un artículo" required value="<?php echo htmlspecialchars($_SESSION['descripcion'] ?? '', ENT_QUOTES); ?>">
            <?php
            tabla_articulos();
            ?> 
            </p>
            <p class="pCO" type="Cantidad:">
            <input class="inputCO" type="number" name ='cantidad' placeholder="Indique la cantidad en unidad 1x1000" required  min ="1" value="<?php echo htmlspecialchars($_POST['cantidad'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Precio:" >
            <input disabled class="inputCO" type="number" name ='costo' placeholder="precio en pesos" required value="<?php echo htmlspecialchars($_SESSION['precioT'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button name ="calcularP"class="buttonBigCO btn" formnovalidate >Recalcular Precio </button>
                </div>
            <p class="pCO" type="Fecha Solicitada:">
            <input   class="inputCO" type="date" name ='fechaSolicitud' required value="<?php echo htmlspecialchars($_SESSION['fechaSolicitud'] ?? '', ENT_QUOTES); ?>"  min="<?php echo date("Y-m-d"); ?>"></input>
            </p>
            <p class="pCO" type="Observaciones de la Orden:">
            <textarea class="textareaCO" name="Observaciones" rows="3" placeholder="¿Tiene alguna observación sobre el la órden?"required></textarea>
            </p>
            <br>
            <p class="pCO center">
            </p>

            <button type="submit" name="agregarArt" class="buttonBigCO btn" >agregar articulo</button>

        </form>

        <form class="formCO" method="POST" action="modif_ord.php" id="forma">
                <h2>Confirmar Órden</h2>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="guardar" class="buttonBigCO btn" >Guardar</button>
                <button type ="submit" name= "cancelar" class="buttonBigCO btn">Cancelar</button>
                <button type ="submit" name= "eliminarO" class="buttonBigCO btn">Eliminar Orden</button>
                </div>
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