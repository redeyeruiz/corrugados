<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<?php
session_start();
include('php/utilerias2.php');

include('php/utilerias.php');
if(!isset($_SESSION['conectado'])){
$_SESSION['mens_error'] = "Por favor inicie sesión.";
header("Location: ".redirect('login'));
die();
}elseif(!verificacion_permiso($_SESSION['usuario'], 'Autorizar Orden')){
    $_SESSION['mens_error'] = "No cuenta con el permiso para entrar a esta página.";
    header("Location: ".redirect('inicio'));
    die();
}
?>

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
    <!-- Javascript-->
    <script type="text/javascript" src="js/busquedas.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>





<?php
    
    function msg($mensaje, $color){
        echo "<table border='3' width='60%'> ";
        if ($color=="rojo") echo "<tr bgcolor='red' align='center'>";
        if ($color=="amarillo") echo "<tr bgcolor='yellow' align='center'>";
        if ($color=="verde") echo "<tr bgcolor='green' align='center'>";
        echo "
                    <td><font color='white' size='6'><b>$mensaje</b></font></td>
                </tr>
                <tr align='center'>
                    <td><font color='blue' size='6'><b>Para continuar selecciona los botones del menú</b></font></td>
                </tr>
            </table>
        ";
    }
?>

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->

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
                        <h3>Contact</h3>
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
                           <h2><span class="theme_color"></span>Reportes Generales</h2>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    
    <div class= "login-space">
        <p>
        <p>
        Cliente <span><input class="user" type="text" id="cliente"></span> 
        Articulo <span><input class="user" type="text" id="articulo"></span> 
        Fecha <span><input class="user" type="date" id="fecha"></span> 
        </p>
        <span><button class="capturar-button" onclick="pedidoVSurtido();">Pedido vs Surtido</button></span>
        <span><button class="capturar-button" onclick="unidadVentas();">Unidad de Ventas</button></span>
        <span><button class="capturar-button" onclick="ventasPorCli();">Ventas por Cliente</button></span>
        <span><button class="capturar-button" onclick="ventasPorAr();">Ventas por Articulo</button></span>
        <span><button class="capturar-button" onclick="ventasPorMes();">Ventas por Mes-Año</button></span>
        <span><button class="capturar-button" onclick="compaVentaFecha();">Comparativo de Ventas por Fechas</button></span>
        <br><br><br>
            <h1 class='h1-orden'>Graficas</h1>
            <div class="container">   
        <canvas id="myChart"></canvas>
        </div>

    <div class="container">   
        <canvas id="myChart2"></canvas>
    </div>
    
    <?php

if(isset($_GET['op'])){
    $op = $_GET['op'];

    if($op == "PVS") pedidoSurtido();
    if($op == "UDV") uniDeVentas();
    if($op == "VPC") ventasPorClientes();
    if($op == "VPA") ventasPorArticulos();
    if($op == "VPM") VentasPorMesAno();
    if($op == "CVF") comparaVentaFecha();

}else{
    pedidoSurtido();
}




function pedidoSurtido(){
    $folios="";
    $pedido="";
    $surtido="";
    $conn=conecta_servidor();
    $query="SELECT * FROM reporteorden where ordenBaan != 0 ";
    echo $query;
    $sql=mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn)==0){
        msg("Folio Inexistente", "rojo");
    }
    while ($reg=mysqli_fetch_object($sql)){
        $folio=$reg->folio;
        $folios.=",".$folio;
        $cantidad=$reg->cantidad;
        $entregado=$reg->entregado;
        $pedido.=",".$cantidad;
        $surtido.=",".$entregado;
    }

    $pedido=substr($pedido,1);
    $surtido=substr($surtido,1);
    $folio=substr($folios,1);

    echo $pedido;

    echo "<div class='titulo-graf'> Pedido y Suritdo </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'cantidad',
                    data:[$pedido, $surtido],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";
}

function uniDeVentas(){
    $folios="";
    $kilos="";
    $dineros="";
    $conn=conecta_servidor();
    $query="SELECT * FROM reporteorden where ordenBaan != 0 ";
    echo $query;
    $sql=mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn)==0){
        msg("Folio Inexistente", "rojo");
    }
    while ($reg=mysqli_fetch_object($sql)){
        $folio=$reg->folio;
        $folios.=",".$folio;
        $cantidad=$reg->cantidad;
        $precio=$reg->precio;
        $kilos.=",".$cantidad;
        $dineros.=",".$precio;
    }

    $pedido=substr($kilos,1);
    $precio=substr($dineros,1);
    $folio=substr($folios,1);

    echo $pedido;

    echo "<div class='titulo-graf'> Unidad de Venta en Kilos  </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'cantidad/kilos',
                    data:[$kilos],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";

    echo "<div class='titulo-graf'> Unidad de Ventas En Pesos </div><canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart2').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'precio',
                    data:[$dineros],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";
}

function ventasPorClientes(){
    $folios="";
    $kilos="";
    $dineros="";
    $cliente=$_GET['cliente'];
    $conn=conecta_servidor();
    $query="SELECT * FROM reporteorden where idCliente=$cliente";
    echo $query;
    $sql=mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn)==0){
        msg("Folio Inexistente", "rojo");
    }
    while ($reg=mysqli_fetch_object($sql)){
        $folio=$reg->folio;
        $folios.=",".$folio;
        $cantidad=$reg->cantidad;
        $precio=$reg->precio;
        $kilos.=",".$cantidad;
        $dineros.=",".$precio;
    }

    $pedido=substr($kilos,1);
    $dineros=substr($dineros,1);
    $folio=substr($folios,1);

    echo $pedido;

    echo "<div class='titulo-graf'> Ventas Por Cliente en Kilos </div> canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'cantidad/kilos',
                    data:[$kilos],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";

    echo " <div class='titulo-graf'> Ventas Por Cliente en Pesos </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart2').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'precio',
                    data:[$dineros],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";
}

function ventasPorArticulos(){
    $folios="";
    $kilos="";
    $dineros="";
    $articulo=$_GET['articulo'];
    $conn=conecta_servidor();
    $query="SELECT * FROM reporteorden where idArticulo=$articulo";
    echo $query;
    $sql=mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn)==0){
        msg("Folio Inexistente", "rojo");
    }
    while ($reg=mysqli_fetch_object($sql)){
        $folio=$reg->folio;
        $folios.=",".$folio;
        $cantidad=$reg->cantidad;
        $precio=$reg->precio;
        $kilos.=",".$cantidad;
        $dineros.=",".$precio;
    }

    $pedido=substr($kilos,1);
    $dineros=substr($dineros,1);
    $folio=substr($folios,1);

    echo $pedido;

    echo " <div class='titulo-graf'> Ventas Por Articulo en Kilos </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'cantidad/kilos',
                    data:[$kilos],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";

    echo " <div class='titulo-graf'> Ventas Por Articulo en Pesos </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart2').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'precio',
                    data:[$dineros],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";
}

function ventasPorMesAno(){
    $folios="";
    $kilos="";
    $dineros="";
    $fecha=$_GET['fecha'];
    $conn=conecta_servidor();
    $query="SELECT * FROM reporteorden where fechaOrden ";
    echo $query;
    $sql=mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn)==0){
        msg("Folio Inexistente", "rojo");
    }
    while ($reg=mysqli_fetch_object($sql)){
        $folio=$reg->folio;
        $folios.=",".$folio;
        $cantidad=$reg->cantidad;
        $precio=$reg->precio;
        $kilos.=",".$cantidad;
        $dineros.=",".$precio;
    }

    $pedido=substr($kilos,1);
    $dineros=substr($dineros,1);
    $folio=substr($folios,1);

    echo $pedido;

    echo "  <div class='titulo-graf'> Ventas Por Mes/Año en Kilos </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'cantidad/kilos',
                    data:[$kilos],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";

    echo " <div class='titulo-graf'> Ventas Por Mes/Año en Pesos </div>  <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart2').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'precio',
                    data:[$dineros],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";
}

function comparaVentaFecha(){
    $folios="";
    $kilos="";
    $dineros="";
    $fecha=$_GET['fecha'];
    $conn=conecta_servidor();
    $query="SELECT * FROM reporteorden where fechaOrden ";
    echo $query;
    $sql=mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn)==0){
        msg("Folio Inexistente", "rojo");
    }
    while ($reg=mysqli_fetch_object($sql)){
        $folio=$reg->folio;
        $folios.=",".$folio;
        $cantidad=$reg->cantidad;
        $precio=$reg->precio;
        $kilos.=",".$cantidad;
        $dineros.=",".$precio;
    }

    $pedido=substr($kilos,1);
    $dineros=substr($dineros,1);
    $folio=substr($folios,1);

    echo $pedido;

    echo " <div class='titulo-graf'> Comparativo de Ventas Por Mes/Año en Kilos </div>  <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'cantidad/kilos',
                    data:[$kilos],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";

    echo " <div class='titulo-graf'> Comparativo de Ventas Por Mes/Año en Pesos </div> <canvas>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
    <script>
        var myChart = document.getElementById('myChart2').getContext('2d');
        var pvsChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels:[$folio],
                datasets:[{
                    label:'precio',
                    data:[$dineros],
                    backgroundColor: ['#004159','#65A8C4','#AACEE2','#8C65D3','#9A93EC','#CAB9F1','#0052A5','413BF7','81CBF9','#00ADCE','#59DBF1','#9EE7FA','#00C590','#59DBF1','#9EE7FA','#00C590','#73EBAE','#B5F9D3', '#C88691','#AD85BA','#95A1C3','#74A18E','#81SFB5','#B2C891','#B99C6B','#E49969','#C9C27F','#949494','#B2B2B2','#D6D6D6','#91967E','#B2AAA4','#D9D5D2'],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWisth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{}
        });
    </script>
    </canvas>";
}
?>
    <!-- contact_form -->
    <!-- end contact_form -->
   
    <!-- Start Footer -->
   

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