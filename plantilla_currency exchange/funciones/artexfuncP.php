<?php

include_once "util_pcP.php";
$idart_error = $idcomp_error = $desc_error = $coststa_error = ""; 
$idart = $idcomp = $desc = $success = $coststa = $success = $option = $exist = $btnsn = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
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
        $query="INSERT INTO ArticuloExistente (idArticulo, idCompania, descripcion, costoEstandar, estatus) VALUES ('$idart','$idcomp','$desc','$coststa', true);";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM ArticuloExistente WHERE idArticulo='$idart' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta del artículo.";
                $idart = $idcomp = $desc = $coststa= "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El ID del artículo ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta del artículo.";
                    $idart = $idcomp = $desc = $coststa= "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $idart = $idcomp = $desc = $coststa= "";
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    
    if ($idart_error == ""){
        $query="SELECT * FROM ArticuloExistente WHERE idArticulo='$idart' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del artículo.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE ArticuloExistente SET estatus=false WHERE idArticulo='$idart' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del artículo.";
            }
        }
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere el dato actualizado.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    if (empty($_POST["coststa"])){
        $coststa_error = "Se requiere el dato actualizado.";
    }
    else{
        $coststa = test_input($_POST["coststa"]);
    }
    
    if ($idart_error == "" and $idcomp_error == "" and $desc_error == "" and $coststa == ""){
        $query="SELECT * FROM ArticuloExistente WHERE idArticulo='$idart' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del artículo.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE ArticuloExistente SET idCompania='$idcomp', descripcion='$desc', costoEstandar='$coststa' WHERE idArticulo='$idart' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos del artículo.";
            }
        }
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }

    if ($idcomp_error == ""){
        $option = "Consultas por ID de Artículo";
        $query="SELECT * FROM ArticuloExistente WHERE idArticulo='$idart' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM ArticuloExistente WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idart = $idcomp = $desc = $coststa= "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere el dato actualizado.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    if (empty($_POST["coststa"])){
        $coststa_error = "Se requiere el dato actualizado.";
    }
    else{
        $coststa = test_input($_POST["coststa"]);
    }
    
    if ($idart_error == "" and $idcomp_error == "" and $desc_error == "" and $coststa == ""){
        $query="SELECT * FROM ArticuloExistente WHERE idArticulo='$idart' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del artículo.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE ArticuloExistente SET idCompania='$idcomp', descripcion='$desc', costoEstandar='$coststa', estatus=true WHERE idArticulo='$idart'";
                $sql=mysqli_query($conection,$query);
                $success = "Alta y actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos del artículo.";
            }
        }
        $idart = $idcomp = $desc = $coststa= "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idart = $idcomp = $desc = $coststa= "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}