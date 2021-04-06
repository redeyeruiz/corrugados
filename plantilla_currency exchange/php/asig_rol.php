<?php

session_start();
if(!isset($_SESSION['conectado'])){
    $_SESSION['mens_error'] = "Por favor inicie sesión.";
    header("Location: http://localhost/corrugados/plantilla_currency%20exchange/login.php");
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Asignación de usuario a roles</title>
</head>
<body><center>
	<?php  
		include_once("utilerias.php");

		$op = $_GET['op'];
		if ($op == "altas") alta_asig_rol();
		if ($op == "bajas") baja_asig_rol();
		if ($op == "consulta") consulta_asig_rol();
		if ($op == "actualiza") actualiza_asig_rol();
		if ($op == "reporte") reporte_asig_rol();


		function alta_asig_rol(){
			$id_user = $_GET['id_user'];
			$rol = $_GET['rol'];

			$conexion=conecta_servidor();
			$query="INSERT INTO asig_rol VALUES ('$id_user','$rol')";
			$sql=mysqli_query($conexion,$query);
			if (!$sql){
				msg("Error, el ID Usuario se duplica en la base de datos","rojo");
			}
			else{
				msg("El registro se ha grabado correctamente","verde");
			}
		}

		function baja_asig_rol(){
			$id_user = $_GET['id_user'];

			$conexion=conecta_servidor();
			$query="DELETE FROM asig_rol WHERE idUsuario ='$id_user'";
			$sql=mysqli_query($conexion,$query);
			if (mysqli_affected_rows($conexion)==0){
				msg("Error, ID Usuario inexistente en base de datos","rojo");
			}
			else{
				msg("El registro se ha eliminado correctamente","verde");
			}
		}

		function formulario($id_user, $rol){
			echo "
				<table border='0' width='50%' align='center'>
					<tr>
                        <td>
                            <p align='center'><b>ID Usuario</b></p>
                        </td>
                        <td align='center'>
                            <input style='border:3px solid #ff880e' name='id_user' type='text' size='50' maxlength='50' class='campo' value='$id_user' disabled>
                        </td>
                    </tr>
					<tr>
                        <td>
                            <p align='center'><b>Rol</b></p>
                        </td>
                        <td align='center'>
                            <input style='border:3px solid #ff880e' name='rol' type='text' size='50' maxlength='50' class='campo' value='$rol' disabled>
                        </td>
                    </tr>
  		        </table>
			";
		}

		function consulta_asig_rol(){
			$id_user = $_GET['id_user'];
			$conexion=conecta_servidor();
			$query="SELECT * FROM asig_rol WHERE idUsuario ='$id_user'";
			$sql=mysqli_query($conexion,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, ID Usuario inexistente en base de datos","rojo");
			}
			else{
				msg("Consulta realizada","verde");
				formulario($id_user,$reg->rol);
			}
		}

		function actualiza_asig_rol(){
			$id_user = $_GET['id_user'];
			$rol = $_GET['rol'];
			$conexion=conecta_servidor();
			$query="UPDATE asig_rol SET rol='$rol' WHERE idUsuario='$id_user'";
			$sql=mysqli_query($conexion,$query);
			if (mysqli_affected_rows($conexion)==0){
				msg("Error, ID Usuario inexistente en la base de datos","rojo");
			}
			else{
				msg("El cambio ha sido realizado","verde");
			}
		}

		function reporte_asig_rol(){
			$conexion=conecta_servidor();
			$query="SELECT * FROM asig_rol ORDER BY idUsuario";
			$sql=mysqli_query($conexion,$query);
			echo "
				<table border='3' width='80%'>
				<tr align='center' bgcolor='#A1C1F3'>
					<td colspan='2'>
						<p class='texto20'>Listado de Usuario ordenado por ID</p>
					</td>
				</tr>
			";
			$cont=0;
			while ($reg=mysqli_fetch_object($sql)){
				echo "<tr>";
					echo "
						<td align='center'><font color='blue'><b>$reg->idUsuario</b></font></td>
						<td align='center'><font color='blue'><b>$reg->rol</b></font></td>
					";
				echo "</tr>";
				$cont++;
			}
			echo "
				<tr align='center' bgcolor='#A1C1F3'> 
					<td colspan='2'>
						<p class='texto20'>Total de Usuario = $cont</p>
					</td>
				</tr>
			";
			echo "</table>";
		}
	?>
</center></body>
</html>