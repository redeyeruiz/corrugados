<?php

include_once "util_pcP.php";
$idalm_error = $idcomp_error = $desc_error = ""; 
$idalm = $idcomp = $desc = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere una descripción.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    
    if ($idalm_error == "" and $idcomp_error == "" and $desc_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO Almacen VALUES ('$idalm','$idcomp','$desc');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta del almacen.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    
    if ($idalm_error == "" and $idcomp_error == ""){
        $query="DELETE FROM Almacen WHERE idCompania='$idcomp' AND idAlmacen='$idalm'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del almacen.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere una descripción.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    
    if ($idalm_error == "" and $idcomp_error == "" and $desc_error == ""){
        $query="UPDATE Almacen SET descripcion='$desc' WHERE idAlmacen='$idalm' AND idCompania='$idcomp'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if ($idcomp_error == ""){
        $option = "Consultas por ID de Compañía";
        $query="SELECT * FROM Almacen WHERE idCompania='$idcomp'";
        $result = mysqli_query($conection, $query);
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Almacen";
    $result = mysqli_query($conection, $query);
    $idalm = $idcomp = $desc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}