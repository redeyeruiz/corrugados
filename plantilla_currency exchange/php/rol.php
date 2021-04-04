<!DOCTYPE html>
<html>
<head>
	<title>Rol</title>
</head>
<body><center>
	<?php  
		include_once("utilerias.php");
		$op=$_GET['op'];
		if ($op == "altas") alta_rol();
		if ($op == "bajas") baja_rol();
		if ($op == "consultas") consulta_rol();
		if ($op == "actualiza") actualiza_rol();
		if ($op === "reporte") reporte_rol();

		function alta_rol(){
			$rol = $_GET['rol'];
			$id_comp = $_GET['id_comp'];
			$conexion=conecta_servidor();
			$query="INSERT INTO rol VALUES ('$id_comp','$rol')";
			$sql=mysqli_query($conexion,$query);
			if (!$sql){
				msg("Error, el Rol se duplica en la base de datos","rojo");
			}
			else{
				msg("El registro se ha grabado correctamente","verde");
			}
		}

		function baja_rol(){
			$rol = $_GET['rol'];
			$conexion = conecta_servidor();
			$query="DELETE FROM rol WHERE rol ='$rol'";
			$sql=mysqli_query($conexion,$query);
			if (!$sql){
				msg("Error, el Rol inexistente en la base de datos","rojo");
			}
			else{
				msg("El registro se ha eliminado correctamente","verde");
			}
		}

		function formulario($id_comp, $rol){
			echo "
				<table border='0' width='50%' align='center'>
					<tr>
                        <td>
                            <p align='center'><b>ID Compañía</b></p>
                        </td>
                        <td align='center'>
                            <input style='border:3px solid #ff880e' name='id_comp' type='text' size='50' maxlength='50' class='campo' value='$id_comp' disabled>
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

		function consulta_rol(){
			$id_comp = $_GET['id_comp'];
			$conexion=conecta_servidor();
			$query="SELECT * FROM rol WHERE idCompania ='$id_comp'";
			$sql=mysqli_query($conexion,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, ID Usuario inexistente en base de datos","rojo");
			}
			else{
				msg("Consulta realizada","verde");
				formulario($id_comp,$reg->rol);
			}
		}

		function actualiza_rol(){
			$id_comp = $_GET['id_comp'];
			$rol = $_GET['rol'];
			$conexion=conecta_servidor();
			$query="UPDATE rol SET rol='$rol' WHERE idCompania='$id_comp'";
			$sql=mysqli_query($conexion,$query);
			if (mysqli_affected_rows($conexion)==0){
				msg("Error, ID Compañía inexistente en la base de datos","rojo");
			}
			else{
				msg("El cambio ha sido realizado","verde");
			}
		}

		function reporte_rol(){
			$conexion=conecta_servidor();
			$query="SELECT * FROM rol ORDER BY idCompania";
			$sql=mysqli_query($conexion,$query);
			echo "
				<table border='3' width='80%'>
				<tr align='center' bgcolor='#A1C1F3'>
					<td colspan='2'>
						<p class='texto20'>Listado de Compañía ordenado por ID</p>
					</td>
				</tr>
			";
			$cont=0;
			while ($reg=mysqli_fetch_object($sql)){
				echo "<tr>";
					echo "
						<td align='center'><font color='blue'><b>$reg->idCompania</b></font></td>
						<td align='center'><font color='blue'><b>$reg->rol</b></font></td>
					";
				echo "</tr>";
				$cont++;
			}
			echo "
				<tr align='center' bgcolor='#A1C1F3'> 
					<td colspan='5'>
						<p class='texto20'>Total de Compañías = $cont</p>
					</td>
				</tr>
			";
			echo "</table>";
		}
	?>
</center></body>
</html>