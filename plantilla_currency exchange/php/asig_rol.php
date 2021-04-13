<?php

include_once "utilerias.php";
$id_user_error = $rol_error = ""; 
$id_user = $rol = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
   	if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    
    if ($id_user_error == "" and $rol_error == ""){
        $query="UPDATE Usuario SET rol='$rol', estatus='1' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de rol al Usuario.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $id_user = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }
    
    if ($id_user_error == ""){
        $query="UPDATE Usuario SET estatus='0' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del Rol.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $id_comp = $rol = $rol_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol a asignar.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if ($id_user_error == "" and $rol_error == ""){
        $query="UPDATE Usuario SET rol='$rol' WHERE idUsuario='$id_user'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos del Rol.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $id_comp = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if ($id_user_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM Usuario WHERE idUsuario='$id_user' and estatus='1'";
        $result = mysqli_query($conection, $query);
        $id_user = $rol = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Usuario";
    $result = mysqli_query($conection, $query);
    $id_user = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
