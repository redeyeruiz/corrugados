<?php
session_start();
include('php/utilerias.php');
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: ".redirect('login'));
    die();
}

include("funciones/artvenfuncP.php"); 

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
    <title>Portal Papeles Corrugados</title>
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
                        <a class="navbar-brand" href="inicio.php"><img src="images/papeles_corrugados.png" width="200" height="70" alt="image"></a>
                    </div>
                    <div class="site_information">
                        <ul>
                            <!-- <li><a href="mailto:exchang@gmail.com"><img src="images/mail_icon.png" alt="#" />exchang@gmail.com</a></li> -->
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
<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">--> 
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                                    <ul class="navbar-nav">
                                        <?php menu()?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                       </div>
                </div>
            </div>
        </div>
        </div>

    </header>
    <!-- End header -->

    <!-- Start Banner -->
    <div class="section inner_page_banner" style="background-color: #003DCE">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title">
                        <h3>Catálogos</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color"></span>Articulos Vendidos</h2>
                        </div>
                    </div>
                </div>
            </div>
            <table border="0" width="50%" align="center">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <tr>
                        <td>
                            <p align="center"><b>Folio</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="folio" type="text" size="50" maxlength="10" class="campo" value="<?= $folio ?>">
                            <p><span style="color:#C84810" class="error"><?= $folio_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Articulo</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idart" type="text" size="50" maxlength="10" class="campo" value="<?= $idart ?>">
                            <p><span style="color:#C84810" class="error"><?= $idart_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Almacen</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idalma" type="text" size="50" maxlength="10" class="campo" value="<?= $idalma ?>">
                            <p><span style="color:#C84810" class="error"><?= $idalma_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Compañia</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idcomp" type="text" size="50" maxlength="10" class="campo" value="<?= $idcomp ?>">
                            <p><span style="color:#C84810" class="error"><?= $idcomp_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Cliente</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idcliente" type="text" size="50" maxlength="50" class="campo" value="<?= $idcliente ?>">
                            <p><span style="color:#C84810" class="error"><?= $idcliente_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Nuevo Representante</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="newrep" type="text" size="50" maxlength="50" class="campo" value="<?= $newrep ?>">
                            <p><span style="color:#C84810" class="error"><?= $newrep_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Stock</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="stock" type="text" size="50" maxlength="50" class="campo" value="<?= $stock ?>">
                            <p><span style="color:#C84810" class="error"><?= $stock_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Codigo de Aviso</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="codavi" type="text" size="50" maxlength="3" class="campo" value="<?= $codavi ?>">
                            <p><span style="color:#C84810" class="error"><?= $codavi_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Unidad de Venta</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="udvta" type="text" size="50" maxlength="4" class="campo" value="<?= $udvta ?>">
                            <p><span style="color:#C84810" class="error"><?= $udvta_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row margin-top_30">
                                <div class="col-sm-12">
                                    <div class="full">
                                        <div class="center">
                                            <button name="b_altas" type="submit" style="width:200px" class="btn btn-outline-success">Altas</button>
                                            <button name="b_bajas" type="submit" style="width:200px" class="btn btn-outline-danger">Bajas</button>
                                        </div>
                                        <div class="center">
                                            <button name="b_consultas" type="submit" style="width:200px" class="btn btn-outline-dark">Consultas</button>
                                            <button name="b_actualizar" type="submit" style="width:200px" class="btn btn-outline-info">Actualización</button>
                                            <button name="b_reporte" type="submit" style="width:200px" class="btn btn-outline-dark">Reportes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div align="center" style="color:#475747; font-size:20px;" class="success"><?= $success; ?></div>
                        </td>
                    </tr>
                    <?php
                        if ($btnsn != ""){
                            echo '<tr>
                                    <td colspan="2">
                                        <div class="center">
                                            <button name="confirmoc" type="submit" style="width:200px" class="btn btn-outline-success">Confirmar</button>
                                            <button name="canceloc" type="submit" style="width:200px" class="btn btn-outline-danger">Cancelar</button>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    ?>
                </form>
            </table>
            <?php
                if ($option != ""){
                    echo "<table style='border:3px solid #ff880e' width='80%' align='center'>
                                <tr>
                                    <td style='border:3px solid #ff880e' colspan='9'>
                                        <p align='center' style='color:#475747; font-size:20px;'>". $option. "</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='border:3px solid #ff880e' width='20%' align='center'>Folio</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Id Articulo</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Id Almacen</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Id Compañia</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Id Cliente</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>New Rep</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Stock</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Codigo Aviso</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Unidad Venta</td>
                                </tr>";
                    if ($result-> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            echo "<tr><td style='border:3px solid #ff880e' width='20%'>". $row["folio"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["idArticulo"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["idAlmacen"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["idCompania"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["idCliente"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["newRep"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["stock"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["codAviso"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["udVta"] ."</td></tr>";
                        }
                    }
                    else{
                        echo "<tr><td style='border:3px solid #ff880e' colspan='9'><div align='center' style='color:#475747; font-size:15px;'>No hay resultados.</div>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
        <br>
        &nbsp;
            <div class="center">
                
                <?php

                $conn = mysqli_connect("localhost", "root", "", "papelescorrugados");

                if(isset($_POST["import"])){
                    foreach($_FILES as $file){
                        //echo $file["tmp_name"];
                    }
                    $fileName = $_FILES["file-1"]["tmp_name"];

                    if($_FILES["file-1"]["size"] > 0 ){
                        $file = fopen($fileName, "r");

                        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){

                            $folio = $column[0];
                            $idcomp = $column[1];
                            $idart = $column[2];
                            $idalma = $column[3];
                            $idlciente = $column [4];
                            $newrep = $column [5];
                            $udvta = $column [6];
                            $stock = $column [7];
                            $codavi = $column [8];
                            $estatus = $column [9];
                            
                            $sqlInsert = "INSERT into articulovendido values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "');";
                            echo $sqlInsert;
                            $result = mysqli_query($conn, $sqlInsert);

                        }
                        
                    }
                    if(!empty($result)){
                        echo "CSV Data Importado";
                    }else{
                        echo "No importado";
                    }
                }
                if(isset($_POST["descarga"])){

                        $query="SELECT * FROM articulovendido";
                        $sql=mysqli_query($conn,$query);
                        // 2) Abrir el archivo de tipo texto
                        $arch=fopen("archivos/articulovendido.txt","w"); //w=Borra el contenido previo / "a"=append / "r" = Sólo lectura
                        while ($reg=mysqli_fetch_object($sql)){
                            $linea=$reg->folio.",".$reg->idCompania.",".$reg->idArticulo.",".$reg->idAlmacen.",".$reg->idCliente.",".$reg->newRep.",".$reg->udVta.",".$reg->stock.",".$reg->codAviso.",".$reg->estatus;
                            //echo $linea."<br>"; // Imprime pa prueba
                            fwrite($arch,$linea.PHP_EOL);
                        }
                        fclose($arch);

                        
                }

                ?>


                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div>
                <label>Importa CSV</label>
                <input type="file" name="file-1" accept=".csv , .txt"/>
                <button type="submit" name="import" class="btn btn-secondary btn-sm" >Importar</button>
                <div class="center">
                    <button type="submit" name="descarga" class="btn btn-secondary btn-sm" >Guardar Archivo</button>

                </div>
                    <div class="center">
                        <a href="descarga.php?path=archivos/articulovendido.txt">Descargar Archivo de Texto</a>
                    </div>
                </div>
                </form>
                
                &nbsp;
            </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© Papeles Corrugados: Innovación en empaques.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a> -->

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