<?php

include_once "utilerias.php";
$id_user_error = $per_error = $per_af_error = ""; 
$id_user = $per = $per_af = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["per"])){
        $per_error = "Se requiere el Permiso.";
    }
    else{
        $per = test_input($_POST["per"]);
    }
    $estatus = 1;
    
    if ($id_user_error == "" and $per_error == ""){
        $query="INSERT INTO permiso VALUES ('$id_user','$per','$estatus')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de permiso.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $id_comp = $rol = $per_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["per"])){
        $per_error = "Se requiere el Permiso.";
    }
    else{
        $per = test_input($_POST["per"]);
    }
    
    if ($id_user_error == "" and $per_error == ""){
        $query="UPDATE permiso SET estatus='0' WHERE idUsuario='$id_user' and estatus='1' and permiso='$per'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del Permiso.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $id_comp = $per = $per_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if (empty($_POST["per"])){
        $per_error = "Se requiere el Permiso.";
    }
    else{
        $per = test_input($_POST["per"]);
    }

    if (empty($_POST["per_af"])){
        $per_af_error = "Se requiere el Permiso a actualizar.";
    }
    else{
        $per_af = test_input($_POST["per_af"]);
    }

    if ($id_user_error == "" and $per_error == ""){
        $query="UPDATE permiso SET permiso='$per_af' WHERE idUsuario='$id_user' and permiso='$per'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos del Rol.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $id_comp = $rol = $per_af = "";;
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["id_user"])){
        $id_user_error = "Se requiere el ID del Usuario.";
    }
    else{
        $id_user = test_input($_POST["id_user"]);
    }

    if ($id_user_error == "" and $per_error == ""){
        $option = "Consultas por ID del Usuario";
        $query="SELECT * FROM permiso WHERE idUsuario='$id_user'";
        $result = mysqli_query($conection, $query);
        $id_comp = $per = $per_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM permiso";
    $result = mysqli_query($conection, $query);
    $id_comp = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
