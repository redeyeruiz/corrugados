<?php
    session_start();
    /*switch($_SESSION['rol']){
        case 'FAC':$rolFAC=true;
        case 'CXC':$rolCXC=true;
        case 'PRE':$rolPRE=true;
        case 'CST':$rolCST=true;
        case 'ING':$rolING=true;
        case 'PLN':$rolPLN=true;
        case 'FEC':$rolFEC=true;
    }
   
$rolFAC=true;
    $rolCXC=false;
    $rolPRE=false;
    $rolCST=false;
    $rolING=false;
    $rolPLN=false;
    $rolFEC=false;
    
    */

    $rolFAC=true;
    $rolCXC=true;
    $rolPRE=true;
    $rolCST=true;
    $rolING=true;
    $rolPLN=true;
    $rolFEC=true;
    valoresBloqueados();
    valoresLibres();
    actualizar();

    
    
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

        function refreshPage(){
            window.location.reload();
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

    <form class="formCO100" method="POST" action="bloqueo_Clientes.php" >
    <div class="container">
        <div class="row">

            <div class="col-sm">
                <p class="h2CO">Libres<p>
                <div class="divscroll btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                    <?php
                        //cancelar();
                        agregarLibres();
                        
                    ?>
                </div>
            </div>
            <div class="col-sm align-self-center text-center">
                <div class="btn-group-vertical d-grid gap-2">
                    <button type="submit" onclick="refreshPage()" name="agregar" class="buttonBigCO btn " >>> Agregar >></button>
                    <button type="submit" onclick="refreshPage()" name="quitar" class="buttonBigCO btn " ><< Quitar <<</button>
                    
                    
                </div>
            </div>

            <div class="col-sm">
                <p class="h2CO">Bloqueados<p>
                <div class="divscroll btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                    <?php
                        agregarBloqueados();
                    ?>
                </div>
                
            </div>
        </div>
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

    <?php
    
    

    function valoresLibres(){
        $conexion=mysqli_connect("localhost","root","","papelescorrugados"); //conecta_servidor();
        $query="SELECT * FROM cliente WHERE bloqueo='0' ORDER BY nombreCliente ASC;";
        $sql=mysqli_query($conexion,$query);
        $count=0;
        while ($reg=mysqli_fetch_object($sql)){
            $GLOBALS["idClienteL" . $count] = $reg->idCliente;
            $count++;

        }

    }

    function valoresBloqueados(){
        $conexion=mysqli_connect("localhost","root","","papelescorrugados"); //conecta_servidor();
        $query="SELECT * FROM cliente WHERE bloqueo='1' ORDER BY nombreCliente ASC;";
        $sql=mysqli_query($conexion,$query);
        $count=0;
        while ($reg=mysqli_fetch_object($sql)){
            $GLOBALS["idClienteB" . $count] = $reg->idCliente;
            $count++;

        }

    }

    function agregarLibres(){
            
        $conexion=mysqli_connect("localhost","root","","papelescorrugados"); //conecta_servidor();
        $query="SELECT * FROM cliente WHERE bloqueo='0' ORDER BY nombreCliente ASC;";
        $sql=mysqli_query($conexion,$query);
        
        $count=0;
        while ($reg=mysqli_fetch_object($sql)){
            $GLOBALS["idClienteL" . $count] = $reg->idCliente;
            echo"
            <input type='hidden' name='libre$count' value='0'>
            <input type='checkbox' class='btn-check check-with-label' id='libre$count' name='libre$count' value='1' autocomplete='off' hidden>
            <label class='btn label-for-check ' for='libre$count'>$reg->nombreCliente</label>
            
            ";

            $count++;

        }
        

        
    }

    function agregarBloqueados(){
        $conexion=mysqli_connect("localhost","root","","papelescorrugados"); //conecta_servidor();
        $query="SELECT * FROM cliente WHERE bloqueo='1' ORDER BY nombreCliente ASC;";
        $sql=mysqli_query($conexion,$query);
        $count=0;
        while ($reg=mysqli_fetch_object($sql)){
            $GLOBALS["idClienteB" . $count] = $reg->idCliente;
            echo"
            <input type='hidden' name='bloqueado$count' value='1'>
            <input type='checkbox' class='btn-check check-with-label' id='bloqueado$count' name='bloqueado$count' value='0' autocomplete='off' hidden>
            <label class='btn label-for-check ' for='bloqueado$count'>$reg->nombreCliente</label>
            
            ";
            $count++;
        }
    }

    

    function error($msg){
        return $msg;
    }


    //guardar e insertar a la DB
    
        function actualizar(){
            //error_reporting(E_ERROR | E_WARNING | E_PARSE);
            $conn = mysqli_connect("localhost","root","","papelescorrugados");
    
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            else{
                if(isset($_POST["agregar"])){
                    $query="SELECT * FROM cliente WHERE bloqueo='0'";
                    $sql=mysqli_query($conn,$query);
                    $counter=0;
                    while ($reg=mysqli_fetch_object($sql)){
                        $id1 = $GLOBALS["idClienteL" . $counter];
                        $v1 = $_POST["libre" . $counter];
                        $query="UPDATE cliente SET bloqueo='$v1' WHERE idCliente='$id1' ";
                        mysqli_query($conn,$query);
                        $counter++;
                    }

                    $_SESSION["action"]="Agregar";
                    

                }

                // ----------
                
                if(isset($_POST["quitar"])){
                    $query="SELECT * FROM cliente WHERE bloqueo='1'";
                    $sql=mysqli_query($conn,$query);
                    $counter=0;
                    while ($reg=mysqli_fetch_object($sql)){
                        $id1 = $GLOBALS["idClienteB" . $counter];
                        $v1 = $_POST["bloqueado" . $counter];
                        $query="UPDATE cliente SET bloqueo='$v1' WHERE idCliente='$id1' ";
                        mysqli_query($conn,$query);
                        $counter++;
                    }
                    $_SESSION["action"]="Quitar";
                    

                   

                }

            mysqli_close($conn);      
            
            
            
            
                
            }
        }
    
        
    
            
            
    

    //cancelar una orden
    function cancelar(){
            if(isset($_SESSION['agregar'])) {
                unset($_SESSION['agregar']);
            }
        
            if(isset($_SESSION['quitar'])) {
                unset($_SESSION['quitar']);
            }   
            
        
        
    }
    // Cambiar nombre de la tabla en los queries
    // Cambiar la condición para actualizar los registros
    // Cambiar 

      
    ?>


</body>

</html>