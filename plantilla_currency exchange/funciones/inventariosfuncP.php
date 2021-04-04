<?php

include_once "util_pcP.php";
$idcomp_error = $idalm_error = $idart_error = $stock_error = ""; 
$idcomp = $idalm = $idart = $stock = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el stock.";
    }
    else{
        $stock = floatval(test_input($_POST["stock"]));
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == "" and $stock_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO Inventario VALUES ('$idcomp','$idalm','$idart','$stock');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta del inventario.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idcomp = $idalm = $idart = $stock = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == ""){
        $query="DELETE FROM Inventario WHERE idCompania='$idcomp' AND idAlmacen='$idalm' AND idArticulo='$idart'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idcomp = $idalm = $idart = $stock = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el stock.";
    }
    else{
        $stock = floatval(test_input($_POST["stock"]));
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == "" and $stock_error == ""){
        $query="UPDATE Inventario SET  stock='$stock' WHERE idCompania='$idcomp' AND idAlmacen='$idalm' AND idArticulo='$idart'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idcomp = $idalm = $idart = $stock = "";
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
        $option = "Consultas por ID de la compañia";
        $query="SELECT * FROM Inventario WHERE idCompania='$idcomp'";
        $result = mysqli_query($conection, $query);
        $idcomp = $idalm = $idart = $stock = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Inventario";
    $result = mysqli_query($conection, $query);
    $idcomp = $idalm = $idart = $stock = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}