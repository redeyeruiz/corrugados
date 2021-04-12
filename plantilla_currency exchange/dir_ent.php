<?php
session_start();
include('php/utilerias.php');
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: ".redirect('login'));
    die();
}

include("funciones/dir_entfuncP.php"); 
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

</head>

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>

    <header class="top-header">
        <div class="header_top">

            <div class="container">
                <div class="row">
                    <div class="logo_section">
                        <a class="navbar-brand" href="inicio.php"><img src="images/papeles_corrugados.png" width="200" height="70" alt="image"></a>
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
                            <h2><span class="theme_color"></span>Direcciones de Entrega</h2>
                        </div>
                    </div>
                </div>
            </div>
            <table border="0" width="50%" align="center">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <tr>
                        <td>
                            <p align="center"><b>ID Compañía</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idcomp" type="text" size="50" maxlength="4" class="campo" value="<?= $idcomp ?>">
                            <p><span style="color:#C84810" class="error"><?= $idcomp_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>ID Cliente</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="idcli" type="text" size="50" maxlength="10" class="campo" value="<?= $idcli ?>">
                            <p><span style="color:#C84810" class="error"><?= $idcli_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Dirección de Entrega</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="dirent" type="text" size="50" maxlength="10" class="campo" value="<?= $dirent ?>">
                            <p><span style="color:#C84810" class="error"><?= $dirent_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Nombre de Entrega</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="noment" type="text" size="50" maxlength="50" class="campo" value="<?= $noment ?>">
                            <p><span style="color:#C84810" class="error"><?= $noment_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Dirección</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="dir" type="text" size="50" maxlength="100" class="campo" value="<?= $dir ?>">
                            <p><span style="color:#C84810" class="error"><?= $dir_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Municipio</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="mun" type="text" size="50" maxlength="30" class="campo" value="<?= $mun ?>">
                            <p><span style="color:#C84810" class="error"><?= $mun_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Estado</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="est" type="text" size="50" maxlength="30" class="campo" value="<?= $est ?>">
                            <p><span style="color:#C84810" class="error"><?= $est_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Télefono</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="tel" type="text" size="50" maxlength="20" class="campo" value="<?= $tel ?>">
                            <p><span style="color:#C84810" class="error"><?= $tel_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Observaciones</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="obs" type="text" size="50" maxlength="100" class="campo" value="<?= $obs ?>">
                            <p><span style="color:#C84810" class="error"><?= $obs_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Código Postal</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="codp" type="text" size="50" maxlength="5" class="campo" value="<?= $codp ?>">
                            <p><span style="color:#C84810" class="error"><?= $codp_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>Código de Ruta</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="codr" type="text" size="50" maxlength="5" class="campo" value="<?= $codr ?>">
                            <p><span style="color:#C84810" class="error"><?= $codr_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>País</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="pais" type="text" size="50" maxlength="3" class="campo" value="<?= $pais ?>">
                            <p><span style="color:#C84810" class="error"><?= $pais_error ?></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center"><b>RFC</b></p>
                        </td>
                        <td align="center">
                            <input style="border:3px solid #ff880e" name="rfc" type="text" size="50" maxlength="20" class="campo" value="<?= $rfc ?>">
                            <p><span style="color:#C84810" class="error"><?= $rfc_error ?></span></p>
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
                </form>
            </table>
            <?php
                if ($option != ""){
                    echo "<table style='border:3px solid #ff880e' width='90%' align='center'>
                                <tr>
                                    <td style='border:3px solid #ff880e' colspan='13'>
                                        <p align='center' style='color:#475747; font-size:20px;'>". $option. "</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='border:3px solid #ff880e' width='4%' align='center'>ID Compañía</td>
                                    <td style='border:3px solid #ff880e' width='8%' align='center'>ID Cliente</td>
                                    <td style='border:3px solid #ff880e' width='8%' align='center'>Dirección de Entrega</td>
                                    <td style='border:3px solid #ff880e' width='8%' align='center'>Nombre Entrega</td>
                                    <td style='border:3px solid #ff880e' width='14%' align='center'>Dirección</td>
                                    <td style='border:3px solid #ff880e' width='10%' align='center'>Municipio</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>Estado</td>
                                    <td style='border:3px solid #ff880e' width='6%' align='center'>Teléfono</td>
                                    <td style='border:3px solid #ff880e' width='12%' align='center'>Observaciones</td>
                                    <td style='border:3px solid #ff880e' width='7%' align='center'>C.P.</td>
                                    <td style='border:3px solid #ff880e' width='4%' align='center'>C.R.</td>
                                    <td style='border:3px solid #ff880e' width='4%' align='center'>País</td>
                                    <td style='border:3px solid #ff880e' width='8%' align='center'>RFC</td>
                                    
                                </tr>";
                    if ($result-> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            echo "<tr><td style='border:3px solid #ff880e' width='4%'>". $row["idCompania"] ."</td><td style='border:3px solid #ff880e' width='8%'>". $row["idCliente"] ."</td><td style='border:3px solid #ff880e' width='8%'>". $row["dirEnt"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='8%'>". $row["nombreEntrega"] ."</td><td style='border:3px solid #ff880e' width='14%'>". $row["direccion"] ."</td><td style='border:3px solid #ff880e' width='10%'>". $row["municipio"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='7%'>". $row["estado"] ."</td><td style='border:3px solid #ff880e' width='6%'>". $row["telefono"] ."</td><td style='border:3px solid #ff880e' width='12%'>". $row["observaciones"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='7%'>". $row["codPost"] ."</td><td style='border:3px solid #ff880e' width='4%'>". $row["codRuta"] ."</td><td style='border:3px solid #ff880e' width='4%'>". $row["pais"] ."</td>";
                            echo "<td style='border:3px solid #ff880e' width='8%'>". $row["rfc"] ."</td></tr>";
                        }
                    }
                    else{
                        echo "<tr><td style='border:3px solid #ff880e' colspan='13'><div align='center' style='color:#475747; font-size:15px;'>No hay resultados.</div>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
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

                            $idcomp = $column[0];
                            $idcliente = $column[1];
                            $nombre = $column[2];
                            $dirent = $column[3];
                            $direc = $column[4];
                            $codpost = $column[5];
                            $muni = $column[6];
                            $esta = $column[7];
                            $pais = $column[8];
                            $codruta = $column[9];
                            $rfc = $column[10];
                            $telefono = $column[11];
                            $obser = $column[12];
                            $estatus = $column[13];

                            $sqlInsert = "INSERT into dirent values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "','" . $column[13] . "','" . $column[14] . "');";
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

                        $query="SELECT * FROM dirent";
                        $sql=mysqli_query($conn,$query);
                        // 2) Abrir el archivo de tipo texto
                        $arch=fopen("archivos/dirent.txt","w"); //w=Borra el contenido previo / "a"=append / "r" = Sólo lectura
                        while ($reg=mysqli_fetch_object($sql)){
                            $linea=$reg->idCompania.",".$reg->idCliente.",".$reg->nombreEntrega.",".$reg->dirEnt.",".$reg->direccion.",".$reg->codPost.",".$reg->municipio.",".$reg->estado.",".$reg->pais.",".$reg->codRuta.",".$reg->rfc.",".$reg->telefono.",".$reg->observaciones.",".$reg->estatus;
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
                        <a href="descarga.php?path=archivos/dirent.txt">Descargar Archivo de Texto</a>
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