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
    <script>
        $(window).on("load resize ", function() {
	    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
	    $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();

        function togglevFac(source) {
            checkboxes = document.getElementsByName('vFac');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevCXC(source) {
            checkboxes = document.getElementsByName('vCXC');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevPRE(source) {
            checkboxes = document.getElementsByName('vPRE');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevCST(source) {
            checkboxes = document.getElementsByName('vCST');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevING(source) {
            checkboxes = document.getElementsByName('vING');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevPLN(source) {
            checkboxes = document.getElementsByName('vPLN');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function togglevFEC(source) {
            checkboxes = document.getElementsByName('vFEC');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function toggleAll(source) {
            togglevFac(source);
            togglevCXC(source);
            togglevPRE(source);
            togglevCST(source);
            togglevING(source);
            togglevPLN(source);
            togglevFEC(source);
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

    <form class="formCO100" method="POST" action="autorizarOrden.php" >

        <h2 class="h2CO">Autorizar Orden</h2>
        
        <div class="input-group mb-3">
            <p class="pCO" type="Número de Órden:">
            <input class="inputCO" type="text" name='folio' placeholder="Ingrese el folio de la órden" >
            <button type="submit" name="buscar" class="buttonBigCO btn btn-outline-secondary">Buscar</button>
            </p>    
        </div>

        <?php
                require_once('php/utilerias.php');
                agregar_tablaM();
            ?>

        <div class="input-group mb-3">
            
            <button type="btn" name="autorizarOrden" class="buttonBigCO btn btn-outline-secondary" onclick="toggleAll(this)">Autorizar Órden</button>

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
    function agregar_tablaM(){
        if(isset($_POST['buscar'])){
            $folio=$_SESSION['folio']=$_POST['folio'];
            $conexion=conecta_servidor();
            $query="SELECT * FROM reporteorden WHERE folio='$folio'";
            $sql=mysqli_query($conexion,$query);
            $reg_al=mysqli_fetch_object($sql);
            
            if ($reg_al==mysqli_fetch_array($sql)){
                echo "Folio inexistente en base de datos"; //----Agregar CSS bonito
                return("error");
            }

        }
        if( isset($_POST['agregarArt']) && isset($_SESSION['folio']) ){

            $idOrden                                    ="0001";
            $idCompania                                 ="0003";
            $folio                                      =$_SESSION['folio'];
            $numFact                                    =1234;
            $ordenBaan                                  =1234;
            $idCliente                                  =1234;
            $_SESSION['cliente'] = $nombreCliente       =$_POST['nombreCliente'];
            $_SESSION['dirEnt']  =$dirEnt               =$_POST['dirEnt'];
            $idArticulo                                 ="idtest";
            $ordenCompra                                = $_POST['ordenCompra'];
            $_SESSION['cantidad']=$cantidad             =$_POST['cantidad'];
            $_SESSION['precio']=$precio                 =34;
            $_SESSION['descripcion'] =$decripcion       =$_POST['descripcion'];
            $_SESSION['fechaOrden'] =$fechaOrden        =$_POST['fechaOrden'];
            $_SESSION['fechaSolicitud'] =$fechaSolicitud=$_POST['fechaSolicitud'];
            $fechaEntrega                               ="un dia";
            $entregado                                  =0;
            $acumulado                                  =0;
            $total                                      =0;
            $costo                                      =$_POST['costo'];
            $moneda                                     ="MXP";
            $Observaciones                              =$_POST['Observaciones'];

            if(!isset($_SESSION['queries'])){
                $_SESSION['queries']="INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones')|";
            
            }
                
            else{
                $_SESSION['queries'] .= "INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones')|";
            }
            echo "Se ha agregado el articulo a la orden"; 
        }
        
        update_tableM();
        
    }

    function eliminar(){
        
        if((!isset($_SESSION['folio'])) && isset($_POST['eliminarB'])){
            echo "Error, no se ha buscado orden con número de folio";
        }
        
        if(isset($_POST['eArticulo']) && isset($_SESSION['folio']) && isset($_POST['eliminarB'])){
            
            $folio=$_SESSION['folio'];
            $articulo=$_POST['eArticulo'];
            
            $conn = conecta_servidor();
            $query="DELETE FROM reporteorden WHERE folio='$folio' AND idArticulo='$articulo'";
            $sql=mysqli_query($conn,$query);
            
            if (mysqli_affected_rows($conn)==0){
            echo "Error, no existe la relación folio-articulo";
            }
            else{
                unset($_SESSION['queries']);
                echo "el articulo ha sido eliminado";
            }

        }
        
    }


    function update_tableM(){
        
        //Inicio de encabezados de tabla
        echo"
        <h1 class='h1-orden'>Artículos Agregados</h1>
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
                    <th class='th-orden' scope='col'>Fecha-Solicitud</th>";
        
        //Encabezados por Rol
        if(true){
            echo"<th class='th-orden' scope='col'>vFac
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vFac' onClick='togglevFac(this)'>
            </div>
            </th>";
        }

        if(true){
            echo"<th class='th-orden' scope='col'>vCXC
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vCXC' onClick='togglevCXC(this)'>
            </div>
            </th>";
        }

        if(true){
            echo"<th class='th-orden' scope='col'>vPRE
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vPRE' onClick='togglevPRE(this)'>
            </div>
            </th>";
        }

        if(true){
            echo"<th class='th-orden' scope='col'>vCST
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vCST' onClick='togglevCST(this)'>
            </div>
            </th>";
        }

        if(true){
            echo"<th class='th-orden' scope='col'>vING
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vING' onClick='togglevING(this)'>
            </div>
            </th>";
        }

        if(true){
            echo"<th class='th-orden' scope='col'>vPLN
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vPLN' onClick='togglevPLN(this)'>
            </div>
            </th>";
        }

        if(true){
            echo"<th class='th-orden' scope='col'>vFEC
            <div class='form-check'>
            <input class='form-check-input' type='checkbox' name='vFEC' onClick='togglevFEC(this)'>
            </div>
            </th>";
        }

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
            $query="SELECT * FROM reporteorden WHERE folio='$folio'";
            $sql=mysqli_query($conexion,$query);
            $count=0;
            while ($reg=mysqli_fetch_object($sql)){
                
                echo
                "       <tr id=$count>
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
                        
                // Validaciones por rol
                if(true){
                    echo"<td class='td-orden'>vFac$count
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vFac$count' name='vFac'>
                    </div>
                    </td>";
                }

                if(true){
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vCXC$count' name='vCXC'>
                    </div>
                    </td>";
                }

                if(true){
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vPRE$count' name='vPRE'>
                    </div>
                    </td>";
                }

                if(true){
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vCST$count' name='vCST'>
                    </div>
                    </td>";
                }

                if(true){
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vING$count' name='vING'>
                    </div>
                    </td>";
                }

                if(true){
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vPLN$count' name='vPLN'>
                    </div>
                    </td>";
                }

                if(true){
                    echo"<td class='td-orden'>
                    <div class='form-check'> 
                    <input class='form-check-input' type='checkbox' id='vFEC$count' name='vFEC'>
                    </div>
                    </td>";
                }

                echo"</tr>";
                $count++;
            }
        }

        /* session table*/
        if(isset($_SESSION['queries'])){
            $queries=explode("|",$_SESSION['queries'],-1);

            for($i=0;$i<count($queries);$i++){
                $query= explode("'",$queries[$i]);

                $cliente        = $query[13];
                $dirEnt         = $query [15];
                $ordenCompra    = $query [19];
                $fechaOrden     = $query [27];
                $idArticulo     = $query [17];
                $descripcion    = $query [25];
                $cantidad       = $query [21];
                $precio         = $query [23];
                $fechaSolicitud = $query [29];

                // Inicio de registro
                echo
                "       <tr>
                            <td class='td-orden'>$cliente</td>
                            <td class='td-orden'>$dirEnt</td>
                            <td class='td-orden'>$ordenCompra</td>
                            <td class='td-orden'>$fechaOrden</td>
                            <td class='td-orden'>$idArticulo</td>
                            <td class='td-orden'>$descripcion</td>
                            <td class='td-orden'>$cantidad</td>
                            <td class='td-orden'>$precio</td>
                            <td class='td-orden'>$fechaSolicitud</td>
                        </tr>
                            ";
                
            }
        }
        echo"
                    </tbody>
                    </table>
        </div>";
    }

    function error($msg){
        return $msg;
    }

    //guardar e insertar a la DB
    if(isset($_POST["guardar"])){

        $conn = conecta_servidor();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        if(isset($_SESSION['queries'])){
            $queries=explode("|",$_SESSION['queries'],-1);

            for($i=0;$i<count($queries);$i++){
                $query=$queries[$i];
                mysqli_query($conn, $query);
            }
        
        }
        unset($_SESSION['queries']);
        unset($_SESSION['folio']);
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


        
    ?>


</body>

</html>