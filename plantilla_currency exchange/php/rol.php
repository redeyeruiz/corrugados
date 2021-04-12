<?php

include_once "utilerias.php";
$rol_error = $rol_desc_error = ""; 
$rol = $rol_desc = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if (empty($_POST["rol_desc"])){
        $rol_desc_error = "Se requiere la descripción.";
    }
    else{
        $rol_desc = test_input($_POST["rol_desc"]);
    }
    $estatus = 1;
    
    if ($rol_error == "" and $rol_desc_error == ""){
        $query="INSERT INTO rol(rol,descripcion,estatus) VALUES ('$rol','$rol_desc','$estatus')";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de Rol.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $id_comp = $rol = $rol_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if (empty($_POST["rol_desc"])){
        $rol_desc_error = "Se requiere la descripción.";
    }
    else{
        $rol_desc = test_input($_POST["rol_desc"]);
    }
    
    if ($rol_error == "" and $rol_desc_error == ""){
        $query="UPDATE Rol SET estatus='0' WHERE rol='$rol'";

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
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    if (empty($_POST["rol_desc"])){
        $rol_desc_error = "Se requiere la descripción a modificar.";
    }
    else{
        $rol_desc = test_input($_POST["rol_desc"]);
    }
    //echo $rol_af;
    if ($rol_error == "" and $rol_desc_error == ""){
        $query="UPDATE rol SET descripcion='$rol_desc' WHERE rol='$rol'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la actualización de datos del Rol.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $id_comp = $rol = $rol_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if ($rol_error == ""){
        $option = "Consultas por Rol";
        $query="SELECT * FROM Rol WHERE rol='$rol'";
        $result = mysqli_query($conection, $query);
        $rol = $rol_desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Rol";
    $result = mysqli_query($conection, $query);
    $rol = $rol_desc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
