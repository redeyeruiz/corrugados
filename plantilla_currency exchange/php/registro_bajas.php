<?php

include_once "utilerias.php";
$id_user_error = $fecha_error = $desc_error = ""; 
$id_user = $fecha = $desc = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_registrar"])){
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

    if (empty($_POST["desc"])){
        $desc_error = "Se requiere la descripción.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    
    if ($id_user_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="INSERT INTO Registro_bajas VALUES ('$id_user', '$fecha', '$desc')";
        $result = mysqli_query($conection, $query);
        $id_user = $fecha = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultar"])){
    
    $id_user = test_input($_POST["id_user"]);
    $fecha = test_input($_POST["fecha"]);
    

    if (empty($fecha) && empty($id_user)){
        $option = "Consulta General";
        $query = "SELECT * FROM Registro_bajas";
        $result = mysqli_query($conection, $query);
        echo mysqli_error($conection);
    }

    if (empty($fecha) && !empty($id_user)){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM Registro_bajas WHERE idUsuario='$id_user'";
        $result = mysqli_query($conection, $query);
        //echo mysqli_error($conection);
        $id_user = $fecha = "";
    }

    if (empty($id_user) && !empty($fecha)){
        $option = "Consultas por Fecha";
        $query="SELECT * FROM Registro_bajas WHERE fechaBaja='$fecha'";
        $result = mysqli_query($conection, $query);
        //echo mysqli_error($conection);
        $id_user = $fecha = "";
    }

    if (!empty($fecha) && !empty($id_user)){
        $option = "Consultas por ID del Usuario y Fecha";
        $query="SELECT * FROM Registro_bajas WHERE idUsuario='$id_user' AND fechaBaja='$fecha'";
        $result = mysqli_query($conection, $query);
        //echo mysqli_error($conection);
        $id_user = $fecha = "";
    }
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
