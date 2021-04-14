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
                eliminar();
                agregar_tablaM();
                update_dir()
                ?>
        </form>  

        <form class="formCO" method="POST" action="modif_ord.php">
            <h2 class="h2CO">Eliminar Artículos</h2>
            <p class="pCO" type="Eliminar Articulo" >
            <input class="inputCO" type="text" name ='eArticulo' placeholder="Indique el nombre del artículo" required></input>
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="eliminarB" class="buttonBigCO btn">Eliminar Artículo</button>
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
            <input class="inputCO" type="number" name='ordenCompra' placeholder="Ingrese el número de órden de compra" required></input>
            </p>
            <p class="pCO" type="Fecha de Órden de Compra:">
            <input class="inputCO" type="date" name ='fechaOrden' required></input>
            </p>
            <p class="pCO" type="Artículo:">
            <input class="datal " name="nombreClienteDT" name ='descripcion' type="search" list="articulos" size="25" class="datal" placeholder="Ingrese el nombre de un artículo" required value="<?php echo htmlspecialchars($_SESSION['articuloDT'] ?? '', ENT_QUOTES); ?>">
            <?php
            tabla_articulos();
            ?> 
            </p>
            <p class="pCO" type="Cantidad:">
            <input class="inputCO" type="number" name ='cantidad' placeholder="Indique la cantidad en unidad 1x1000" required value="<?php echo htmlspecialchars($_SESSION['precio'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Precio:" >
            <input class="inputCO" type="number" name ='costo' placeholder="Indique el precio en pesos" required></input>
            </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button name ="calcularP"class="buttonBigCO btn">Recalcular Precio </button>
                </div>
            <p class="pCO" type="Fecha Solicitada:">
            <input class="inputCO" type="date" name ='fechaSolicitud' required></input>
            </p>
            <p class="pCO" type="Observaciones de la Orden:">
            <textarea class="textareaCO" name="Observaciones" rows="3" placeholder="¿Tiene alguna observación sobre el la órden?"required></textarea>
            </p>
            <br>
            <p class="pCO center">
            </p>

        

        <form class="formCO" method="POST" action="modif_ord.php" id="forma">
                <h2>Confirmar Órden</h2>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group">
                <button type="submit" name="guardar" class="buttonBigCO btn" >Guardar</button>
                <button type ="submit" name= "cancelar" class="buttonBigCO btn">Cancelar</button>
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

    <?php

function agregar_tablaM(){
    if(isset($_POST['buscar'])){
        $folio=$_SESSION['folio']=$_POST['folio'];
        $conexion=conecta_servidor();
        $query="SELECT * FROM reporteOrden WHERE folio='$folio'";
        $sql=mysqli_query($conexion,$query);
        $reg=mysqli_fetch_object($sql);
        
        if ($reg==mysqli_fetch_array($sql)){
            echo "Folio inexistente en base de datos"; //----Agregar CSS bonito
            return("error");
        }else{
            $_SESSION['idCliente'] = $reg->idCliente;
            $_SESSION['dirEnt']= $reg->dirEnt;
            
        }
    }
    if( isset($_POST['agregarArt']) && isset($_SESSION['folio']) ){

        $idOrden                                    ="0001";
        $idCompania                                 ="0003";
        $folio                                      =$_SESSION['folio'];
        $numFact                                    =1234;
        $ordenBaan                                  =1234;
        $idCliente                                  =$_SESSION['idCliente'];
        $_SESSION['cliente'] = $nombreCliente       =$_POST['nombreCliente'];
        $_SESSION['dirEnt']  =$dirEnt               =$_SESSION['dirEnt'];
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
            $_SESSION['queries']="INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$total','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
        
        }
            
        else{
            $_SESSION['queries'] .= "INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$total','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
        }
        echo "Se ha agregado el articulo a la orden"; 
    }
    
    //update_tableM();
    
}

function update_dir(){

    if(isset($_SESSION['dirEnt'])){
        $dirEnt=$_SESSION['dirEnt'];
        $conexion=conecta_servidor();
        $query="SELECT * FROM dirent WHERE dirEnt='$dirEnt'";
        $sql=mysqli_query($conexion,$query);
        $reg=mysqli_fetch_object($sql);

        if ($reg==mysqli_fetch_array($sql)){
            echo "Folio inexistente en base de datos"; //----Agregar CSS bonito
            return("error");
        }else{
            $_SESSION['direccion'] = "$reg->dirEnt, $reg->nombreEntrega, $reg->direccion, $reg->municipio, $reg->estado, $reg->telefono, $reg->observaciones, $reg->codPost, $reg->codRuta, $reg->pais, $reg->rfc";
            $dire=explode(",",$_SESSION['direccion']);


            $_SESSION['direntC'] =$dire[0];
            $_SESSION['nomEC'] =$dire[1];
            $_SESSION['direccionC'] =$dire[2];
            $_SESSION['municipioC'] =$dire[3];
            $_SESSION['estadoC'] =$dire[4];
            $_SESSION['telefonoC'] =$dire[5];
            $_SESSION['obsC'] =$dire[6];
            $_SESSION['CPC'] =$dire[7];
            $_SESSION['CRC'] =$dire[8];
            $_SESSION['paisC'] =$dire[9]; 
            $_SESSION['RFCC'] =$dire[10];
            
            
        }
    }
    

}

function eliminar(){
    
    if((!isset($_SESSION['folio'])) && isset($_POST['eliminarB'])){
        echo "Error, no se ha buscado orden con número de folio";
    }
    
    if(isset($_POST['eArticulo']) && isset($_SESSION['folio']) && isset($_POST['eliminarB'])){
        
        $folio=$_SESSION['folio'];
        $articulo=$_POST['eArticulo'];
        
        $conn = conecta_servidor();
        $query="DELETE FROM reporteorden WHERE folio='$folio' AND descripcion='$articulo'";
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
        
    echo
    "
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
                <th class='th-orden' scope='col'>Fecha-Solicitud</th>
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
        while ($reg=mysqli_fetch_object($sql)){
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
                    </tr>
            ";
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

//TABLA ARTICULOS
function tabla_articulos(){
    if(isset($_SESSION['idCliente'])){
        
        $idCliente=$_SESSION['idCliente'];
        $conexion=conecta_servidor();
        $query="SELECT ArticuloExistente.descripcion FROM ArticuloExistente INNER JOIN ArticuloVendido WHERE  ArticuloExistente.idArticulo= ArticuloVendido.idArticulo AND idCliente = '$idCliente'" ;
        $sql=mysqli_query($conexion,$query);
        if (mysqli_affected_rows($conexion)==0){
            echo "Error, id cliente o el idlista es inexistente en base de datos";
        }
        echo "<datalist id='articulos'>";
        while ($reg=mysqli_fetch_object($sql)){
            echo "<option>$reg->descripcion";

        }
        echo "</datalist>";

        
    }
    
    
    
           
}
// PRECIO
function calcularPrecio(){
    if(isset($_POST['calcularP']) && isset($_POST['cantidad'])  || (isset($_POST['agregarArt']) && isset($_POST['cantidad'])) ){
        
        $precio_articulo=obtenerPrecio();
        
        $_SESSION['precio']=strval( intval($_POST['cantidad']) * $precio_articulo);
    }
}

function obtenerPrecio(){
    if(isset($_SESSION['idCliente'])){

        $idArticulo=obtenerIdArticulo();
        $idLista=$_SESSION['idLista'];  
        $conn=conecta_servidor();
        $query="SELECT descuento,precio FROM listaPrecio WHERE idLista ='$idLista' AND idArticulo ='$idArticulo' ";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            echo "Error, no existe artiuclo con tal idLista o idArticulo";
            return(NULL);
        }else{
            
            return (floatval($reg->precio)  - (floatval($reg->descuento) * floatval($reg->precio) ));
        }
    }
    
}

?>


</body>

</html>