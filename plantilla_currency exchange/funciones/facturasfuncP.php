<?php

include_once "util_pcP.php";
$numfact_error = $idcomp_error = $idord_error = $idart_error = $idcli_error = $fol_error = $ent_error = $trans_error = $fechaf_error = ""; 
$numfact = $idcomp = $idord = $success = $option = $idart = $idcli = $fol = $ent = $trans = $fechaf = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["numfact"])){
        $numfact_error = "Se requiere el número de factura.";
    }
    else{
        $numfact = test_input($_POST["numfact"]);
    }
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
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idcli"])){
        $idcli_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcli = test_input($_POST["idcli"]);
    }
    if (empty($_POST["fol"])){
        $fol_error = "Se requiere el folio.";
    }
    else{
        $fol = test_input($_POST["fol"]);
    }
    if (empty($_POST["ent"])){
        $ent_error = "Se requiere el número de entrega.";
    }
    else{
        $ent = test_input($_POST["ent"]);
    }
    if (empty($_POST["trans"])){
        $trans_error = "Se requiere el tipo de transporte.";
    }
    else{
        $trans = test_input($_POST["trans"]);
    }
    if (empty($_POST["fechaf"])){
        $fechaf_error = "Se requiere la fecha de facturación.";
    }
    else{
        $fechaf = test_input($_POST["fechaf"]);
    }

    if ($numfact_error == "" and $idcomp_error == "" and $idord_error == "" and $idart_error == "" and $idcli_error == "" and $fol_error == "" and $ent_error == "" and $trans_error == "" and $fechaf_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO Factura VALUES ('$numfact','$idcomp','$idord','$idart','$idcli','$fol','$ent','$trans','$fechaf');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de la factura.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $numfact = $idcomp = $idord = $idart = $idcli = $fol = $ent = $trans = $fechaf = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["numfact"])){
        $numfact_error = "Se requiere el número de factura.";
    }
    else{
        $numfact = test_input($_POST["numfact"]);
    }
    
    if ($numfact_error == ""){
        $query="DELETE FROM Factura WHERE numFact='$numfact'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja de la factura.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $numfact = $idcomp = $idord = $idart = $idcli = $fol = $ent = $trans = $fechaf = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["numfact"])){
        $numfact_error = "Se requiere el número de factura.";
    }
    else{
        $numfact = test_input($_POST["numfact"]);
    }
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
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idcli"])){
        $idcli_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcli = test_input($_POST["idcli"]);
    }
    if (empty($_POST["fol"])){
        $fol_error = "Se requiere el folio.";
    }
    else{
        $fol = test_input($_POST["fol"]);
    }
    if (empty($_POST["ent"])){
        $ent_error = "Se requiere el número de entrega.";
    }
    else{
        $ent = test_input($_POST["ent"]);
    }
    if (empty($_POST["trans"])){
        $trans_error = "Se requiere el tipo de transporte.";
    }
    else{
        $trans = test_input($_POST["trans"]);
    }
    if (empty($_POST["fechaf"])){
        $fechaf_error = "Se requiere la fecha de facturación.";
    }
    else{
        $fechaf = test_input($_POST["fechaf"]);
    }
    
    if ($numfact_error == "" and $idcomp_error == "" and $idord_error == "" and $idart_error == "" and $idcli_error == "" and $fol_error == "" and $ent_error == "" and $trans_error == "" and $fechaf_error == ""){
        $query="UPDATE Factura SET idCompania='$idcomp', idOrden='$idord', idArticulo='$idart', idCliente='$idcli', folio='$fol', entrega='$ent', tipoTrans='$trans', fechaFac='$fechaf'WHERE numFact='$numfact'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $numfact = $idcomp = $idord = $idart = $idcli = $fol = $ent = $trans = $fechaf = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["numfact"])){
        $numfact_error = "Se requiere el número de factura.";
    }
    else{
        $numfact = test_input($_POST["numfact"]);
    }

    if ($numfact_error == ""){
        $option = "Consultas por Número de Factura";
        $query="SELECT * FROM Factura WHERE numFact='$numfact'";
        $result = mysqli_query($conection, $query);
        $numfact = $idcomp = $idord = $idart = $idcli = $fol = $ent = $trans = $fechaf = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Factura";
    $result = mysqli_query($conection, $query);
    $numfact = $idcomp = $idord = $idart = $idcli = $fol = $ent = $trans = $fechaf = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}