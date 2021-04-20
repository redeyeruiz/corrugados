<?php
    session_start();
    include('php/utilerias2.php');
  
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
    $rolFAC=true;
    $rolCXC=false;
    $rolPRE=false;
    $rolCST=false;
    $rolING=false;
    $rolPLN=false;
    $rolFEC=false;


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

        function togglevFac(source) {
            checkboxes = document.getElementsByClassName('vFac');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevCXC(source) {
            checkboxes = document.getElementsByClassName('vCXC');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevPRE(source) {
            checkboxes = document.getElementsByClassName('vPRE');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevCST(source) {
            checkboxes = document.getElementsByClassName('vCST');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevING(source) {
            checkboxes = document.getElementsByClassName('vING');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevPLN(source) {
            checkboxes = document.getElementsByClassName('vPLN');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevFEC(source) {
            checkboxes = document.getElementsByClassName('vFEC');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function toggleAll(source) {
            var boxes = document.getElementsByTagName("input");
            for (var x = 0; x < boxes.length; x++) {
                var obj = boxes[x];
                if (obj.type == "checkbox") {
                if (obj.name != "check")
                    obj.checked = source.checked;
                }
            }
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

    <form class="formCO100" method="POST" action="statusOrden.php" >

        <h2 class="h2CO">Status de Órden</h2>
        <div class="row">
            <div class="input-group col mb-3">
                <p class="pCO" type="Número de Órden:">
                <input class="inputCO" type="text" name='folio' placeholder="Ingrese el número de la órden" >
                <button type="submit" name="buscar" class="buttonBigCO btn btn-outline-secondary">Buscar</button>
                </p>    
            </div>
            <!--
            <div class="input-group col mb-3">
                <p class="pCO" type="ID Cliente:">
                <input class="inputCO" type="text" name='nombre' placeholder="Desde" >
                <input class="inputCO" type="text" name='nombre' placeholder="Hasta" >
                <button type="submit" name="buscarN" class="buttonBigCO btn btn-outline-secondary">Buscar</button>
                </p>    
            </div>
            <div class='alert'></div>
            -->
        </div>
        <?php
            require_once('php/utilerias.php');
            cancelar();
            agregar_tablaM();
            
        ?>


    </form>
    <script>document.getElementsByTagName('input').disabled = true;</script>
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
    
    

    function agregar_tablaM(){
        $GLOBALS['flagGuardar']=false;
        if(isset($_POST['buscar'])){
            $folio=$_SESSION['folio']=$_POST['folio'];
            $conexion=conecta_servidor();
            $query="SELECT * FROM reporteOrden WHERE folio='$folio'";
            $sql=mysqli_query($conexion,$query);
            $reg_al=mysqli_fetch_object($sql);
            
            if ($reg_al==mysqli_fetch_array($sql)){
                echo "<div class='alert alert-warning' role='alert'> Folio inexistente en base de datos </div>";
                return("error");
            }

            } if (isset($_SESSION['folio'])){
                $GLOBALS['flagGuardar']=true;
                echo "<div class='alert alert-info' role='alert'> Folio encontrado en base de datos </div>";

                $folio                                      =$_SESSION['folio'];

                

                    
            }
        
        crearTabla();
        
    }


    function crearTabla(){
        //Inicio de encabezados de tabla ---------------------------------------------------------------------------------------------
        echo"
        <h1 class='h1-orden'>Artículos Agregados </h1>
        
        <div class='tbl-header-orden'>
            <table class='table-orden' cellpadding='0' cellspacing='0'>
            <thead>
                <tr>
                    <th class='th-orden' scope='col'>Cliente</th>
                    <th class='th-orden' scope='col'>Direccion de Entrega</th>
                    <th class='th-orden' scope='col'>Orden de compra</th>
                    <th class='th-orden' scope='col'>Fecha-Orden</th>
                    <th class='th-orden' scope='col'>Articulo</th>
                    <th class='th-orden' scope='col'>Descripción</th>
                    <th class='th-orden' scope='col'>Cantidad</th>
                    <th class='th-orden' scope='col'>Precio</th>
                    <th class='th-orden' scope='col'>Fecha-Solicitud</th>
                    <th class='th-orden' scope='col'>vFac</th>
                    <th class='th-orden' scope='col'>vCXC</th>
                    <th class='th-orden' scope='col'>vPRE</th>
                    <th class='th-orden' scope='col'>vCST</th>
                    <th class='th-orden' scope='col'>vING</th>
                    <th class='th-orden' scope='col'>vPLN</th>
                    <th class='th-orden' scope='col'>vFEC</th>
                    ";
        
        //Encabezados por Rol

        //Fin de encabezados
        echo"
        
                </tr>
            </thead>
            </table>
        </div>
        <div class='tbl-content-orden'>
                <table class='table-orden' cellpadding='0' cellspacing='0'>
                <tbody>";

        /* SQL table*/
        if(isset($_SESSION['folio'])){

            
            $folio=$_SESSION['folio'];
            $conexion=conecta_servidor();
            $query="SELECT * FROM reporteOrden WHERE folio='$folio'";
            $sql=mysqli_query($conexion,$query);
            $count=0;
            while ($reg=mysqli_fetch_object($sql)){
                
                /*
                $GLOBALS[${"idOrden" . $count}] = $reg->idOrden;
                $GLOBALS[${"idCompania" . $count}] = $reg->idCompania;
                $GLOBALS[${"idCliente" . $count}] = $reg->idCliente;
                $GLOBALS[${"idArticulo" . $count}] = $reg->idArticulo;
                */


                $GLOBALS["idOrden" . $count] = $reg->idOrden;
                $GLOBALS["idCompania" . $count] = $reg->idCompania;
                $GLOBALS["idCliente" . $count] = $reg->idCliente;
                $GLOBALS["idArticulo" . $count] = $reg->idArticulo;

                // name para establecer la condición ----------------------------------------------------------------------------------
                echo
                "       <tr>

                            <td class='td-orden'>$reg->nombreCliente</td>  
                            <td class='td-orden'>$reg->dirEnt</td>
                            <td class='td-orden'>$reg->ordenCompra</td>
                            <td class='td-orden'>$reg->fechaOrden</td>
                            <td class='td-orden'>$reg->idArticulo</td>
                            <td class='td-orden'>$reg->descripcion</td>
                            <td class='td-orden'>$reg->cantidad</td>
                            <td class='td-orden'>$reg->precio</td>
                            <td class='td-orden'>$reg->fechaSolicitud</td>

            

                        ";

                    echo"<td class='td-orden'>
                    <div class='form-check'>
                    <input class='vFac form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vFac ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";

                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='vCXC form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vCXC ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";
        
                    echo"<td class='td-orden'>
                    <div class='form-check'>
                    <input class='vPRE form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vPRE ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";
                
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='vCST form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vCST ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";
               
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='vING form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vING ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";

                    echo"<td class='td-orden'>
                    <div class='form-check'>
                    <input class='vPLN form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vPLN ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";

                    echo"<td class='td-orden'>
                    <div class='form-check'>
                    <input class='vFEC form-check-input' type='checkbox' name='myCheck' value='1' ";
                    if($reg->vFEC ==1)echo"checked ";
                    echo"disabled>
                    </div>
                    </td>";
            }

                echo"</tr>";
                $count++;
        }
    

        /* session table*/
        
        echo"
                    </tbody>
                    </table>
        </div>
        ";
        

    }

    function error($msg){
        return $msg;
    }



    //cancelar una orden
    function cancelar(){
        if(isset($_POST["cancelar"]) ){
            if(isset($_SESSION['queries'])) {
                unset($_SESSION['queries']);
            }
        
            if(isset($_SESSION['folio'])) {
                unset($_SESSION['folio']);
            }   
            
        }
        
    }
    // Cambiar nombre de la tabla en los queries
    // Cambiar la condición para actualizar los registros
    // Cambiar 

        
    ?>


</body>

</html>