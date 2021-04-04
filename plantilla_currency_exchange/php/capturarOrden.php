<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./javascript/utilerias.js"></script>
    <title>Utilerias PHP</title>
</head>
<body>
    <?php
    include_once("utilerias.php");
    $queries= [];


    function agregar_art()
    {
        
        $idOrden=$_GET['idOrden'];
        $idCompania=$_GET['idCompania'];
        $folio=$_GET['idfolio'];
        $numFact=$_GET['numFact'];
        $ordenBaan=$_GET['ordenBaan'];
        $idCliente=$_GET['idCliente'];
        $nombreCliente=$_GET['nombreCliente'];
        $dirEnt=$_GET['dirEnt'];
        $idArticulo=$_GET['idArticulo'];
        $ordenCompra=$_GET['ordenCompra'];
        $cantidad=$_GET['cantidad'];
        $precio=$_GET['precio'];
        $decripcion=$_GET['decripcion'];
        $fechaOrden=$_GET['fechaOrden'];
        $fechaSolicitud=$_GET['fechaSolicitud'];
        $fechaEntrega=$_GET['fechaEntrega'];
        $entregado=$_GET['entregado'];
        $acumulado=$_GET['acumulado'];
        $total=$_GET['total'];
        $costo=$_GET['costo'];
        $moneda=$_GET['moneda'];
        $Observaciones=$_GET['Observaciones'];
        $query="INSERT INTO ReporteOrden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones)";
        
        array_push($queries,$query);
        
    }

    function guardar($queries){
        $conn=conecta_servidor();
        for($i=0;$i<count($queries);$i++){
            $query=queries[$i];
            $sql=mysqli_query($conn,$query);


        };

        $queries= [];

    }

    ?>
    
</body>
</html>




