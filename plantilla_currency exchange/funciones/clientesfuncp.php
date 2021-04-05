<?php

include_once "util_pcP.php";
$idcomp_error = $idcliente_error = $idrep_error = $idlist_error = $idalma_error = $nom_error = $status_error = $analista_error = $divisa_error = $limitcre_error = $salorden_error = $salfac_error =  ""; 
$idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }

    if (empty($_POST["idlist"])){
        $idlist_error = "Se requiere el ID de la lista de precios.";
    }
    else{
        $idlist = test_input($_POST["idlist"]);
    }

    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el ID del almacén";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el Nombre del Cliente";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["status"])){
        $status_error = "Se requiere el Status del Cliente";
    }
    else{
        $status = test_input($_POST["status"]);
    }

    if (empty($_POST["analista"])){
        $analista_error = "Se requiere el Analista";
    }
    else{
        $analista = test_input($_POST["analista"]);
    }

    if (empty($_POST["divisa"])){
        $divisa_error = "Se requiere la Divisa";
    }
    else{
        $divisa = test_input($_POST["divisa"]);
    }

    if (empty($_POST["limitcre"])){
        $limitcre_error = "Se requiere el limite de credito";
    }
    else{
        $limitcre = test_input($_POST["limitcre"]);
    }

    if (empty($_POST["salorden"])){
        $salorden_error = "Se requiere el Saldo de la Orden";
    }
    else{
        $salorden = test_input($_POST["salorden"]);
    }

    if (empty($_POST["salfac"])){
        $salfac_error = "Se requiere el Saldo de la Factura";
    }
    else{
        $salfac = test_input($_POST["salfac"]);
    }


    if ($idcomp_error == "" and $idcliente_error == "" and $idrep_error == "" and $idlist_error == "" and $idalma_error == "" and $nom_error == "" and $status_error == "" and $analista_error == "" and $divisa_error == "" and $limitcre_error == "" and $salorden_error == "" and $salfac_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO Cliente VALUES ('$idcliente','$idcomp','$idrep','$idlist','$idalma','$nom','$status','$analista','$divisa','$limitcre','$salorden','$salfac','0');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta del cliente.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
    }
}


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if ($idcomp_error == "" and $idcliente_error == ""){
        $query="DELETE FROM Cliente WHERE idCliente='$idcliente'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja de la compañía.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if (empty($_POST["idrep"])){
        $idrep_error = "Se requiere el ID del representante.";
    }
    else{
        $idrep = test_input($_POST["idrep"]);
    }

    if (empty($_POST["idlist"])){
        $idlist_error = "Se requiere el ID de la lista de precios.";
    }
    else{
        $idlist = test_input($_POST["idlist"]);
    }

    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el ID del almacén";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    
    if (empty($_POST["nom"])){
        $nom_error = "Se requiere el Nombre del Cliente";
    }
    else{
        $nom = test_input($_POST["nom"]);
    }

    if (empty($_POST["status"])){
        $status_error = "Se requiere el Status del Cliente";
    }
    else{
        $status = test_input($_POST["status"]);
    }

    if (empty($_POST["analista"])){
        $analista_error = "Se requiere el Analista";
    }
    else{
        $analista = test_input($_POST["analista"]);
    }

    if (empty($_POST["divisa"])){
        $divisa_error = "Se requiere la Divisa";
    }
    else{
        $divisa = test_input($_POST["divisa"]);
    }

    if (empty($_POST["limitcre"])){
        $limitcre_error = "Se requiere el limite de credito";
    }
    else{
        $limitcre = test_input($_POST["limitcre"]);
    }

    if (empty($_POST["salorden"])){
        $salorden_error = "Se requiere el Saldo de la Orden";
    }
    else{
        $salorden = test_input($_POST["salorden"]);
    }

    if (empty($_POST["salfac"])){
        $salfac_error = "Se requiere el Saldo de la Factura";
    }
    else{
        $salfac = test_input($_POST["salfac"]);
    }
    
    if ($idcomp_error == "" and $idcliente_error == "" and $idrep_error == "" and $idlist_error == "" and $idalma_error == "" and $nom_error == "" and $status_error == "" and $analista_error == "" and $divisa_error == "" and $limitcre_error == "" and $salorden_error == "" and $salfac_error == ""){
        $query="UPDATE Cliente SET idCompania='$idcomp', idRepresentante='$idrep', idLista='$idlist', idAlmacen='$idalma', nombreCliente'$nom', estatusCliente='$status', analista='$analista', divisa='$divisa', limCredito='$limitcre', saldoOrden='$salorden', saldoFactura='$salfac' WHERE idCliente='$idcliente'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos del cliente.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }

    if ($idcliente_error == ""){
        $option = "Consultas por Id del Cliente";
        $query="SELECT * FROM Cliente WHERE idCliente='$idcliente'";
        $result = mysqli_query($conection, $query);
        $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Cliente";
    $result = mysqli_query($conection, $query);
    $idcomp = $idcliente = $idrep = $idlist = $idalma = $nom = $status = $analista = $divisa = $limitcre = $salorden = $salfac ="";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}