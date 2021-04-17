<?php
include('utilerias2.php');
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
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- Javascript-->
    <script type="text/javascript" src="js/busqueda.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php

	echo "entra a php";
	$op=$_GET['op'];
	echo "algo";

	if ($op=="busqueda") busqueda_orden();
	if ($op=="articulo") buscar_articulo();
	if ($op=="tiempo") tiempo_filtro();
	if ($op=="ordenfiltro") orden_filtro();

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



        function formulario($fol, $baan, $client, $nom){
			echo "
				<table border='3' width='70%'>
					<tr bgcolor='#93C2F4'>
						<td colspan='2'> <p class='texto16'>Orden </p> </td>
					</tr>
					<tr>
						<td><p class='texto14'>Folio de orden</p></td>
						<td align='center'><input name='fol' type='text' size='9' class='campo' value='$fol' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Orden Baan</p></td>
						<td align='center'><input name='baan' type='text' size='30' class='campo' value='$baan' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Cliente </p></td>
						<td align='center'><input name='client' type='text' size='30' class='campo' value='$client' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Nombre </p></td>
						<td align='center'><input name='nom' type='text' size='30' class='campo' value='$nom' disabled></td>
					</tr>
				</table>
			";
		}

		function formularioArt($art, $des){
			echo "
				<table border='3' width='70%'>
					<tr bgcolor='#93C2F4'>
						<td colspan='2'> <p class='texto16'>Articulos </p> </td>
					</tr>
					<tr>
						<td><p class='texto14'>Articulo</p></td>
						<td align='center'><input name='fol' type='text' size='20' class='campo' value='$art' disabled></td>
					</tr>
					<tr>
					<td><p class='texto14'>Descripcion</p></td>
					<td align='center'><input name='baan' type='text' size='70' class='campo' value='$des' disabled></td>
				</tr>";
		}

		function reportetiempo($ord, $fech, $FAC, $CXC, $PRE, $CST, $ING, $PLN, $FEC, $TOT){
			echo "
				<table border='3' width='70%'>
					<tr bgcolor='#93C2F4'>
						<td colspan='2'> <p class='texto16'>Articulos </p> </td>
					</tr>
					<tr>
						<td><p class='texto14'>Orden</p></td>
						<td align='center'><input name='ord' type='text' size='20' class='campo' value='$ord' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Fecha de Orden</p></td>
						<td align='center'><input name='fech' type='text' size='70' class='campo' value='$fech' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>FAC</p></td>
						<td align='center'><input name='FAC' type='text' size='20' class='campo' value='$FAC' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>CXC</p></td>
						<td align='center'><input name='CXC' type='text' size='20' class='campo' value='$CXC' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>PRE</p></td>
						<td align='center'><input name='PRE' type='text' size='20' class='campo' value='$PRE' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>CST</p></td>
						<td align='center'><input name='CST' type='text' size='20' class='campo' value='$CST' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>ING</p></td>
						<td align='center'><input name='ING' type='text' size='20' class='campo' value='$ING' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>PLN</p></td>
						<td align='center'><input name='PLN' type='text' size='20' class='campo' value='$PLN' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>FEC</p></td>
						<td align='center'><input name='FEC' type='text' size='20' class='campo' value='$FEC' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Total</p></td>
						<td align='center'><input name='TOT' type='text' size='20' class='campo' value='$TOT' disabled></td>
					</tr>
					"
					;
		}

		function reporteorden($ord, $Baan, $Cli, $nom, $fech, $sol, $ent, $FAC, $CXC, $PRE, $CST, $ING, $PLN, $FEC, $Art, $cant){
			echo "
				<table border='3' width='70%'>
					<tr bgcolor='#93C2F4'>
						<td colspan='2'> <p class='texto16'>Articulos </p> </td>
					</tr>
					<tr>
						<td><p class='texto14'>Orden</p></td>
						<td align='center'><input name='ord' type='text' size='20' class='campo' value='$ord' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Orden Baan</p></td>
						<td align='center'><input name='Baan' type='text' size='20' class='campo' value='$Baan' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Clave de Cliente</p></td>
						<td align='center'><input name='Cli' type='text' size='20' class='campo' value='$Cli' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Nombre del cliente</p></td>
						<td align='center'><input name='nom' type='text' size='20' class='campo' value='$nom' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Fecha de Orden</p></td>
						<td align='center'><input name='fech' type='text' size='70' class='campo' value='$fech' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Fecha de solicitud</p></td>
						<td align='center'><input name='sol' type='text' size='20' class='campo' value='$sol' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Fecha de entrada</p></td>
						<td align='center'><input name='ent' type='text' size='70' class='campo' value='$ent' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>FAC</p></td>
						<td align='center'><input name='FAC' type='text' size='20' class='campo' value='$FAC' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>CXC</p></td>
						<td align='center'><input name='CXC' type='text' size='20' class='campo' value='$CXC' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>PRE</p></td>
						<td align='center'><input name='PRE' type='text' size='20' class='campo' value='$PRE' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>CST</p></td>
						<td align='center'><input name='CST' type='text' size='20' class='campo' value='$CST' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>ING</p></td>
						<td align='center'><input name='ING' type='text' size='20' class='campo' value='$ING' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>PLN</p></td>
						<td align='center'><input name='PLN' type='text' size='20' class='campo' value='$PLN' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>FEC</p></td>
						<td align='center'><input name='FEC' type='text' size='20' class='campo' value='$FEC' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Articulo</p></td>
						<td align='center'><input name='Art' type='text' size='20' class='campo' value='$Art' disabled></td>
					</tr>
					<tr>
						<td><p class='texto14'>Cantidad</p></td>
						<td align='center'><input name='cant' type='text' size='20' class='campo' value='$cant' disabled></td>
					</tr>
					"
					;
		}

        function busqueda_orden(){
			echo "hola :D";
			$fol=$_GET['fol'];
			$conn=conecta_servidor();
			$query="SELECT * FROM reporteorden WHERE folio='$fol'";
			echo $query;
			$sql=mysqli_query($conn,$query);
			
			if (mysqli_affected_rows($conn)==0){
                msg("Folio Inexistente", "rojo");
            }
			echo
            "<br><br><br>
            <h1 class='h1-orden'>Busqueda de orden</h1>
            <div class='tbl-header-orden'>
                <table class='table-orden' cellpadding='0' cellspacing='0'>
                <thead>
                    <tr>
                        <th class='th-orden' scope='col'>Folio de orden</th>
                        <th class='th-orden' scope='col'>Orden Baan</th>
                        <th class='th-orden' scope='col'>ID cliente</th>
                        <th class='th-orden' scope='col'>Nombre</th>
                        
                    </tr>
                </thead>
                </table>
            </div>
            <div class='tbl-content-orden'>
                    <table class='table-orden' cellpadding='0' cellspacing='0'>
                    <tbody>";


			while ($reg=mysqli_fetch_object($sql)){

				/*if ($reg==mysqli_fetch_array($sql)){
					msg("Folio Inexistente", "rojo");
				}*/
				$ordenBaan=$reg->ordenBaan;
				$idCliente=$reg->idCliente;
				$nombreCliente=$reg->nombreCliente;
				echo
			
				"       <tr>
					<td class='td-orden'>$fol</td>
					<td class='td-orden'>$ordenBaan</td>
					<td class='td-orden'>$idCliente</td>
					<td class='td-orden'>$nombreCliente</td>

					</tr>
			";

			}
			/*if ($reg==mysqli_fetch_array($sql)){
				msg("Folio Inexistente", "rojo");
			}
			else{

				formulario($fol, $reg->ordenBaan, $reg->idCliente, $reg->nombreCliente);
				msg("Consulta realizada", "verde");
			}
			*/
		}

		function buscar_articulo(){
			echo "hola :D";
			$cli=$_GET['cliente'];
			$conn=conecta_servidor();
			$query="SELECT * FROM reporteorden WHERE idCliente='$cli'";
			echo $query;
			$sql=mysqli_query($conn,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Folio Inexistente", "rojo");
			}
			else{
				formularioArt($reg->idArticulo, $reg->descripcion);
				msg("Consulta realizada", "verde");
			}
		}

		function tiempo_filtro(){
			$f_desde=$_GET['f_desde'];
			$f_hasta=$_GET['f_hasta'];
			$conn=conecta_servidor();
			$query="SELECT * FROM Orden WHERE fechaOrden BETWEEN '$f_desde' AND '$f_hasta';";
			echo $query;
			$sql=mysqli_query($conn,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Folio Inexistente", "rojo");
			}
			else{
				reportetiempo($reg->idOrden, $reg->fechaOrden, $reg->tFac, $reg->tCXC, $reg->tPRE, $reg->tCST, $reg->tING, $reg->tPLN, $reg->tFEC, $reg->total);
				msg("Consulta realizada", "verde");
			}
		}

		function orden_filtro(){
			$f_desde=$_GET['f_desde'];
			$f_hasta=$_GET['f_hasta'];
			$b_desde=$_GET['b_desde'];
			$b_hasta=$_GET['b_hasta'];
			$c_desde=$_GET['c_desde'];
			$c_hasta=$_GET['c_hasta'];
			$a_desde=$_GET['a_desde'];
			$a_hasta=$_GET['a_hasta'];
			$conn=conecta_servidor();
			$query="SELECT * FROM reporteorden WHERE fechaOrden BETWEEN '$f_desde' AND '$f_hasta' AND ordenBaan BETWEEN '$b_desde' AND '$b_hasta' AND idCliente BETWEEN '$c_desde' AND '$c_hasta' AND idArticulo BETWEEN '$a_desde' AND '$a_hasta'";
			echo $query;
			$sql=mysqli_query($conn,$query);
			//$reg=mysqli_fetch_object($sql);		
			if (mysqli_affected_rows($conn)==0){
                msg("Folio Inexistente", "rojo");
            }
			echo
            "<br><br><br>
            <h1 class='h1-orden'>Busqueda de orden</h1>
            <div class='tbl-header-orden'>
                <table class='table-orden' cellpadding='0' cellspacing='0'>
                <thead>
                    <tr>
                        <th class='th-orden' scope='col'>Fecha de Orden</th>
                        <th class='th-orden' scope='col'>Orden Baan</th>
                        <th class='th-orden' scope='col'>ID cliente</th>
                        <th class='th-orden' scope='col'>ID articulo</th>
                        
                    </tr>
                </thead>
                </table>
            </div>
            <div class='tbl-content-orden'>
                    <table class='table-orden' cellpadding='0' cellspacing='0'>
                    <tbody>";


			while ($reg=mysqli_fetch_object($sql)){

				/*if ($reg==mysqli_fetch_array($sql)){
					msg("Folio Inexistente", "rojo");
				}*/
				$fechaOrden=$reg->fechaOrden;
				$ordenBaan=$reg->ordenBaan;
				$idCliente=$reg->idCliente;
				$nombreCliente=$reg->nombreCliente;
				echo
			
				"       <tr>
					<td class='td-orden'>$fechaOrden</td>
					<td class='td-orden'>$ordenBaan</td>
					<td class='td-orden'>$idCliente</td>
					<td class='td-orden'>$nombreCliente</td>

					</tr>
			";

			}
			/*if ($reg==mysqli_fetch_array($sql)){
				msg("Folio Inexistente", "rojo");
			}
			else{

				formulario($fol, $reg->ordenBaan, $reg->idCliente, $reg->nombreCliente);
				msg("Consulta realizada", "verde");
			}
			*/
			
			
		}
    ?>
</body>
</html>