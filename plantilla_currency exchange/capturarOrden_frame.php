<?php
    session_start();
    include('php/utilerias2.php');
    cancelar();
    $_SESSION['idRepresentante']="rep1";
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
            <input disabled class="inputCO" type="number" name='ordenCompra' placeholder=" número de órden de compra"  value="<?php echo htmlspecialchars($_SESSION['ordenCompra'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Fecha de Órden de Compra:">
            <input class="inputCO" type="date" name ='fechaOrden' required value="<?php echo htmlspecialchars($_POST['fechaOrden'] ?? '', ENT_QUOTES); ?>" min="<?php echo date("Y-m-d"); ?>"></input>
            </p>
            <p class="pCO" type="Artículo:">
            <select id='articulos_l' class='datal' name ='descripcion' list='articulos' required value="<?php echo htmlspecialchars($_POST['descripcion'] ?? '', ENT_QUOTES); ?>">
            <?php
            tabla_articulos();
            ?>
            </p>
            <p class="pCO" type="Cantidad:">
            <input class="inputCO" type="number" name ='cantidad' placeholder="Indique la cantidad en unidad 1x1000" required value="<?php echo htmlspecialchars($_POST['cantidad'] ?? '', ENT_QUOTES); ?>"></input>
            </p>
            <p class="pCO" type="Precio:" >
            <input disabled class="inputCO" type="number" name ='precio' placeholder="Indique el precio en pesos" required value="<?php echo htmlspecialchars($_SESSION['precio'] ?? '', ENT_QUOTES); ?>"></input>
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
                <button type ="" name= "" class="buttonBigCO btn">Agregar Artículo Existente</button>
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

    <?php
    function setOrdenCompra(){
        if(!isset($_SESSION['folio']) || !isset($_SESSION['ordenCompra'])){
            if(isset($_SESSION['idCliente'])){
                $idCliente=$_SESSION['idCliente'];
                $conn=conecta_servidor();
                $query="SELECT MAX(ordenCompra) AS ordenCompra FROM `orden` WHERE idCliente='$idCliente'";
                $sql=mysqli_query($conn,$query);
                $reg=mysqli_fetch_object($sql);
                if ($reg==mysqli_fetch_array($sql)){
                    
                    echo"no FUNCIONA el max";
                    echo "error no existe tal cliente ('numOrdenes')";
                }else{
                    
                    $_SESSION['ordenCompra']=strval( intval($reg->ordenCompra) +1);
                    
                }

            }    
        }
            
               
            
    }
    
    function agregar_tabla(){
        crearIdOrden();
                
        if( isset($_POST['agregarArt']) && isset($_SESSION['idCompania']) && isset($_SESSION['direntC'])){
    
            setOrdenCompra();
            

            $idOrden                                    =$_SESSION['IDorden'];
            $idCompania                                 =$_SESSION['idCompania'];
            $folio                                      = $_SESSION['ordenCompra'];
            $numFact                                    =1234;
            $ordenBaan                                  =1234;
            $idCliente                                  =$_SESSION['idCliente'];
            $nombreCliente =                            $_SESSION['nombreCliente']; 
            $_SESSION['dirEnt']  =$dirEnt               =$_SESSION['direntC'];
            $idArticulo                                 =$_SESSION['idArticulo'];
            $ordenCompra                                =$_SESSION['ordenCompra'];       
            $_SESSION['cantidad']=$cantidad             =$_POST['cantidad'];
            $precio                                      =$_SESSION['precio'];
            $_SESSION['descripcion'] =$decripcion       =$_POST['descripcion'];
            $_SESSION['fechaOrden'] =$fechaOrden        =$_POST['fechaOrden'];
            $_SESSION['fechaSolicitud'] =$fechaSolicitud=$_POST['fechaSolicitud'];
            $fechaEntrega                               ="NULL";
            $entregado                                  =0;
            $acumulado                                  =0;
            $total                                      =0;
            $costo                                      =$_SESSION['precio'];
            $moneda                                     =$_SESSION['moneda'];
            $Observaciones                              =$_POST['Observaciones'];
            $estatus=0;
            $producido=0;

            if(!isset($_SESSION['queries'])){
                $_SESSION['queries']="INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
            
            }
                
            else{
                $_SESSION['queries'] .= "INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
            }
            
            

            update_table();

        }
        else{
            if(isset($_POST['agregarArt'])){
                echo "falta llenar todos los campode de la forum superior";
            }
            
        }
        
    }

    
     
    //guardar e insertar a la DB
    function guardar(){
        if(isset($_POST["guardar"]) && isset($_SESSION["queries"])   ){

            $conn = conecta_servidor();

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_SESSION['idCliente']) && !isset($_SESSION['numOrdenes'])){
                $idCliente=$_SESSION['idCliente'];
                $query="SELECT MAX(ordenCompra) AS ordenCompra FROM `orden` WHERE idCliente='$idCliente'";
                $sql=mysqli_query($conn,$query);
                $reg=mysqli_fetch_object($sql);
                if ($reg==mysqli_fetch_array($sql)){
                    $_SESSION['ordenCompra']='1';
                    echo "error no existe tal cliente ('numOrdenes')";
                }else{
    
                    
                    $_SESSION['ordenCompra']=strval( intval($reg->ordenCompra) +1);
                    
                }
            }

            
            guardarQueries();

            unsetAll();
            
            

        }
    }
    
    function guardarQueries(){
        if(isset($_SESSION['queries'])){
            $dirent=$_SESSION['direntC'];
            $idOrden=$_SESSION['IDorden'];
            $idCompania=$_SESSION['idCompania'];
            $idCliente=$_SESSION['idCliente'];
            $ordenCompra=$_SESSION['ordenCompra'];
            $fechaOrden=$_SESSION['fechaOrden'];
            $estatus=1;

            $total=120;
            $conn= conecta_servidor();
            $query="INSERT INTO orden VALUES('$idOrden','$idCompania','$idCliente','$ordenCompra','$fechaOrden','$dirent','0','null','null','null','null','null','null','null','$total','0','0','0','0','0','0','0','$estatus')";
            mysqli_query($conn, $query);
            $queries=explode("|",$_SESSION['queries'],-1);

            for($i=0;$i<count($queries);$i++){
                $query=$queries[$i];
                mysqli_query($conn, $query);
            }

            
        
        }

    }


    //cancelar una orden
    function cancelar(){
        if(isset($_POST["cancelar"]) ){
            
            unsetAll();

        } 


    }
        

    function update_table(){
        if(isset($_SESSION['queries'])){
            echo
            "<br><br><br>
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
            echo"
                    </tbody>
                    </table>
            </div>";
            
        }

    }

    //Tabla direccion

    function tabla_dir(){    

        if(isset($_SESSION['saldoOrden'])){
            $saldoOrden= floatval($_SESSION['saldoOrden']);
        
            if($saldoOrden<15000){
                echo " Cliente no tiene suficiente saldo";
                
            }
        }
        
        if(isset($_SESSION['idCliente'])){
    
            $idCliente=$_SESSION['idCliente'];
            
            $conexion=conecta_servidor();
            $query="SELECT * FROM dirent WHERE idCliente = '$idCliente'";
            $sql=mysqli_query($conexion,$query);
            if (mysqli_affected_rows($conexion)==0){
                echo "Error, id cliente inexistente en base de datos o no tiene direcciones asociadas";
            }
            echo "<select id='direcciones' class='datal' name='dirCompleta'>";
            while ($reg=mysqli_fetch_object($sql)){
                
                echo "<option>$reg->dirEnt, $reg->nombreEntrega, $reg->direccion, $reg->municipio, $reg->estado, $reg->telefono, $reg->observaciones, $reg->codPost, $reg->codRuta, $reg->pais, $reg->rfc";

            }
            
            
            echo "</select>";
            


        }
        
        
    

    }
    //tabla clientes
    function tabla_clientes(){    
        
        
        $idRepresentante = $_SESSION['idRepresentante'];
        
        
        $conexion=conecta_servidor();
        $query="SELECT * FROM cliente WHERE idRepresentante = '$idRepresentante' AND bloqueo = 0 AND estatus = 1";
        $sql=mysqli_query($conexion,$query);
        if (mysqli_affected_rows($conexion)==0){
            echo "Error, id cliente inexistente en base de datos";
        }
        echo "<datalist id='nombres'>";
        while ($reg=mysqli_fetch_object($sql)){
            echo "<option>$reg->nombreCliente";

        }
        echo "</datalist>";

        

    }


    //valores del Cliente

    function clientValues(){
        if(isset($_POST['nombreClienteB'])){
            $_SESSION['nombreClienteDT']=$_POST['nombreClienteDT'];
        }
        
        
        if(isset($_SESSION['nombreClienteDT'])){
            
            $datosCliente=explode(",",$_SESSION['nombreClienteDT']);
            $nombreCliente=$datosCliente[0];         
            $conn=conecta_servidor();
            $query="SELECT saldoOrden,divisa,nombreCliente,idCliente,estatus,idLista,saldoOrden,bloqueo,idCompania FROM cliente WHERE nombreCliente = '$nombreCliente'";
            $sql=mysqli_query($conn,$query);
            $reg=mysqli_fetch_object($sql);
            if ($reg==mysqli_fetch_array($sql)){
                $_SESSION['nombreClienteDT'] ="error no existe tal cliente";
            }else{
                $_SESSION['idCliente']=$reg->idCliente;
                $_SESSION['estatus']=$reg->estatus;
                $_SESSION['idLista']=$reg->idLista;
                $_SESSION['saldoOrden']=$reg->saldoOrden;
                $_SESSION['bloqueo']=$reg->bloqueo;
                $_SESSION['idCompania']=$reg->idCompania;
                $_SESSION['nombreCliente']=$reg->nombreCliente;
                $_SESSION['moneda']=$reg->divisa;
                $_SESSION['saldoOrden']=$reg->saldoOrden;
            }
        }

        if(isset($_POST['nombreClienteB'])){
            unset($_SESSION['dirCompleta']);
            unset($_POST['dirCompleta']);
            unset($_SESSION['direntC']);
            unset($_SESSION['nomEC']);
            unset($_SESSION['direccionC']);
            unset($_SESSION['municipioC']);
            unset($_SESSION['estadoC']);
            unset($_SESSION['obsC']);
            unset($_SESSION['CPC']);
            unset($_SESSION['CRC']);
            unset($_SESSION['paisC']);
            unset($_SESSION['RFCC']);
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

            //echo "<select id='articulos_l' class='datal' name ='descripcion' list='articulos' >";
            while ($reg=mysqli_fetch_object($sql)){
                echo "<option>$reg->descripcion";
    
            }
            echo "</select>";

            
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

            $_SESSION['idArticulo']=$idArticulo=obtenerIdArticulo();
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

    function obtenerIdArticulo(){
        $conn=conecta_servidor();
        $descripcion=$_POST['descripcion'];
        $query="SELECT idArticulo FROM ArticuloExistente WHERE descripcion ='$descripcion'";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            return "Error, no hay articulo con tal descripcion";
        }else{
            return $reg->idArticulo;

        }


    }
   //Dirección

    function update_dir(){
        
        if(isset($_POST['dirCompleta']) && strlen($_POST['dirCompleta'])>10 ){
        
            $_SESSION['dirCompleta']=$direccion= $_POST['dirCompleta'];
            $dire=explode(",",$direccion);
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
    function crearIdOrden(){
        if(!isset($_SESSION['IDorden']) && isset($_POST['agregarArt'])){
            $_SESSION['IDorden']=uniqidReal();
        }
        
    }
        
    function uniqidReal($lenght = 32) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";

        return $value;
    }

    
    


    ?>
    


</body>

</html>