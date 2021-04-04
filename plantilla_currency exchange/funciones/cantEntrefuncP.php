<?php

include_once "util_pcP.php";
$idcomp_error = $idord_error = $folio_error = $fmov_error = $hora_error = $sec_error = $tiporeg_error = $cant_error = $idart_error = $pos_error = ""; 
$idcomp = $idord = $folio = $success = $option = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idord"])){
        $idord_error = "Se requiere el ID orden.";
    }
    else{
        $idord = test_input($_POST["idord"]);
    }
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["fmov"])){
        $fmov_error = "Se requiere la fecha de movimiento.";
    }
    else{
        $fmov = test_input($_POST["fmov"]);
    }
    if (empty($_POST["hora"])){
        $hora_error = "Se requiere la hora.";
    }
    else{
        $hora = test_input($_POST["hora"]);
    }
    if (empty($_POST["sec"])){
        $sec_error = "Se requiere la secuencia.";
    }
    else{
        $sec = test_input($_POST["sec"]);
    }
    if (empty($_POST["tiporeg"])){
        $tiporeg_error = "Se requiere el tipo de Reg.";
    }
    else{
        $tiporeg = test_input($_POST["tiporeg"]);
    }
    if (empty($_POST["cant"])){
        $cant_error = "Se requiere la cantidad.";
    }
    else{
        $cant = test_input($_POST["cant"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["pos"])){
        $pos_error = "Se requiere la posición.";
    }
    else{
        $pos = test_input($_POST["pos"]);
    }

    if ($idcomp_error == "" and $idord_error == "" and $folio_error == "" and $fmov_error == "" and $hora_error == "" and $sec_error == "" and $tiporeg_error == "" and $cant_error == "" and $idart_error == "" and $pos_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO CantEntregada VALUES ('$idcomp','$idord','$folio','$fmov','$hora','$sec','$tiporeg','$cant','$idart','$pos');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idord"])){
        $idord_error = "Se requiere el ID de orden.";
    }
    else{
        $idord = test_input($_POST["idord"]);
    }
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    
    if ($idcomp_error == "" and $idord_error == "" and $folio_error == "" and $idart_error == ""){
        $query="DELETE FROM CantEntregada WHERE idCompania='$idcomp' AND idOrden='$idord' AND folio='$folio' AND idArticulo='$idart'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idord"])){
        $idord_error = "Se requiere el ID de orden.";
    }
    else{
        $idord = test_input($_POST["idord"]);
    }
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["fmov"])){
        $fmov_error = "Se requiere la fecha de movimiento.";
    }
    else{
        $fmov = test_input($_POST["fmov"]);
    }
    if (empty($_POST["hora"])){
        $hora_error = "Se requiere la hora.";
    }
    else{
        $hora = test_input($_POST["hora"]);
    }
    if (empty($_POST["sec"])){
        $sec_error = "Se requiere la secuencia.";
    }
    else{
        $sec = test_input($_POST["sec"]);
    }
    if (empty($_POST["tiporeg"])){
        $tiporeg_error = "Se requiere el tipo de Reg.";
    }
    else{
        $tiporeg = test_input($_POST["tiporeg"]);
    }
    if (empty($_POST["cant"])){
        $cant_error = "Se requiere la cantidad.";
    }
    else{
        $cant = test_input($_POST["cant"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["pos"])){
        $pos_error = "Se requiere la posición.";
    }
    else{
        $pos = test_input($_POST["pos"]);
    }
    
    if ($idcomp_error == "" and $idord_error == "" and $folio_error == "" and $fmov_error == "" and $hora_error == "" and $sec_error == "" and $tiporeg_error == "" and $cant_error == "" and $idart_error == "" and $pos_error == ""){
        $query="UPDATE CantEntregada SET fechaMov='$fmov', hora='$hora', secuencia='$sec', tipoReg='$tiporeg', cantidad='$cant', posicion='$pos' WHERE idCompania='$idcomp' AND idOrden='$idord' AND folio='$folio' AND idArticulo='$idart'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
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
        $query="SELECT * FROM CantEntregada WHERE idCompania='$idcomp'";
        $result = mysqli_query($conection, $query);
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM CantEntregada";
    $result = mysqli_query($conection, $query);
    $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
