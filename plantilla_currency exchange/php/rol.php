<?php

include_once "utilerias.php";
$rol_error = $rol_desc_error = ""; 
$rol = $rol_desc = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere el ID de la Compañía.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }

    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    $estatus = 1;
    
    if ($id_comp_error == "" and $rol_error == ""){
        $query="INSERT INTO rol VALUES ('$id_comp','$rol','$estatus')";
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
    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere el ID de la Compañía.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }

    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }
    
    if ($id_comp_error == "" and $rol_error == ""){
        $query="UPDATE Rol SET estatus='0' WHERE idCompania='$id_comp' and rol='$rol'";

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
    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere el ID de la Compañía.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }

    if (empty($_POST["rol"])){
        $rol_error = "Se requiere el Rol anterior.";
    }
    else{
        $rol = test_input($_POST["rol"]);
    }

    if (empty($_POST["rol_af"])){
        $rol_af_error = "Se requiere el Rol nuevo.";
    }
    else{
        $rol_af = test_input($_POST["rol_af"]);
    }
    echo $rol_af;
    if ($id_comp_error == "" and $rol_error == "" and $rol_af_error == ""){
        $query="UPDATE rol SET rol='$rol_af' WHERE idCompania='$id_comp' and rol='$rol'";
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
    if (empty($_POST["id_comp"])){
        $id_comp_error = "Se requiere el ID de la Compañía.";
    }
    else{
        $id_comp = test_input($_POST["id_comp"]);
    }

    if ($id_comp_error == ""){
        $option = "Consultas por ID de la Compañía";
        $query="SELECT * FROM Rol WHERE idCompania='$id_comp'";
        $result = mysqli_query($conection, $query);
        $id_comp = $rol = $rol_af = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Rol";
    $result = mysqli_query($conection, $query);
    $id_comp = $rol = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
