<?php

include_once "util_pcP.php";
$idart_error = $idcomp_error = $desc_error = $coststa_error = ""; 
$idart = $idcomp = $desc = $success = $coststa = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del articulo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
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
    if (empty($_POST["coststa"])){
        $coststa_error = "Se requiere un costo estandar.";
    }
    else{
        $coststa = test_input($_POST["coststa"]);
    }
    
    if ($idart_error == "" and $idcomp_error == "" and $desc_error == "" and $coststa_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO articuloexistente VALUES ('$idart','$idcomp','$desc','$coststa');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta del articulo.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del articulo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    
    if ($idart_error == "" and $idcomp_error == ""){
        $query="DELETE FROM articuloexistente WHERE idArticulo='$idart' AND idCompania='$idcomp'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del articulo.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del articulo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
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
    if (empty($_POST["coststa"])){
        $coststa_error = "Se requiere un costo estandar.";
    }
    else{
        $coststa = test_input($_POST["coststa"]);
    }
    
    if ($idart_error == "" and $idcomp_error == "" and $desc_error == "" and $coststa == ""){
        $query="UPDATE articuloexistente SET descripcion='$desc', costoestandar='$coststa' WHERE idArticulo='$idart' AND idCompania='$idcomp'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del articulo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }

    if ($idcomp_error == ""){
        $option = "Consultas por ID de Articulo";
        $query="SELECT * FROM articuloexistente WHERE idArticulo='$idart'";
        $result = mysqli_query($conection, $query);
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM articuloexistente";
    $result = mysqli_query($conection, $query);
    $idart = $idcomp = $desc = $coststa= "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}