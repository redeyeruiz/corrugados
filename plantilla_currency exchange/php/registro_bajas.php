<?php

include_once "utilerias.php";
$id_user_error = $fecha_error = ""; 
$id_user = $fecha = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultar"])){
   	if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["fecha"])){
        $fecha_error = "Se requiere la fecha.";
    }
    else{
        $fecha = test_input($_POST["fecha"]);
    }
    
    if ($id_user_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM Registro_bajas WHERE idUsuario='$id_user' and fecha='$fecha'";
        $result = mysqli_query($conection, $query);
        $id_user = $fecha = "";
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
