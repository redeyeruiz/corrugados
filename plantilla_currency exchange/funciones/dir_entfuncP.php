<?php

include_once "util_pcP.php";
$idcomp_error = $idcli_error = $dirent_error = $noment_error = $dir_error = $mun_error = $est_error = $tel_error = $obs_error = $codp_error = $codr_error = $pais_error = $rfc_error = ""; 
$idcomp = $idcli = $dirent = $success = $option = $noment = $dir = $mun = $est = $tel = $obs = $codp = $codr = $pais = $rfc = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcli"])){
        $idcli_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcli = test_input($_POST["idcli"]);
    }
    if (empty($_POST["dirent"])){
        $dirent_error = "Se requiere la dirección de entrega.";
    }
    else{
        $dirent = test_input($_POST["dirent"]);
    }
    if (empty($_POST["noment"])){
        $noment_error = "Se requiere el nombre de entrega.";
    }
    else{
        $noment = test_input($_POST["noment"]);
    }
    if (empty($_POST["dir"])){
        $dir_error = "Se requiere una dirección.";
    }
    else{
        $dir = test_input($_POST["dir"]);
    }
    if (empty($_POST["mun"])){
        $mun_error = "Se requiere el municipio.";
    }
    else{
        $mun = test_input($_POST["mun"]);
    }
    if (empty($_POST["est"])){
        $est_error = "Se requiere el estado.";
    }
    else{
        $est = test_input($_POST["est"]);
    }
    if (empty($_POST["tel"])){
        $tel_error = "Se requiere el teléfono.";
    }
    else{
        $tel = test_input($_POST["tel"]);
    }
    if (empty($_POST["obs"])){
        $obs_error = "Se requieren observaciones.";
    }
    else{
        $obs = test_input($_POST["obs"]);
    }
    if (empty($_POST["codp"])){
        $codp_error = "Se requiere el código postal.";
    }
    else{
        $codp = test_input($_POST["codp"]);
    }
    if (empty($_POST["codr"])){
        $codr_error = "Se requiere el código de ruta.";
    }
    else{
        $codr = test_input($_POST["codr"]);
    }
    if (empty($_POST["pais"])){
        $pais_error = "Se requiere el país.";
    }
    else{
        $pais = test_input($_POST["pais"]);
    }
    if (empty($_POST["rfc"])){
        $rfc_error = "Se requiere el RFC.";
    }
    else{
        $rfc = test_input($_POST["rfc"]);
    }

    if ($idcomp_error == "" and $idcli_error == "" and $dirent_error == "" and $noment_error == "" and $dir_error == "" and $mun_error == "" and $est_error == "" and $tel_error == "" and $obs_error == "" and $codp_error == "" and $codr_error == "" and $pais_error == "" and $rfc_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO DirEnt VALUES ('$idcomp','$idcli','$dirent','$noment','$dir','$mun','$est','$tel','$obs','$codp','$codr','$pais','$rfc');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta de la dirección de entrega.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idcomp = $idcli = $dirent = $noment = $dir = $mun = $est = $tel = $obs = $codp = $codr = $pais = $rfc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcli"])){
        $idcli_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcli = test_input($_POST["idcli"]);
    }
    
    if ($idcomp_error == "" and $idcli_error == ""){
        $query="DELETE FROM DirEnt WHERE idCompania='$idcomp' AND idCliente='$idcli'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja de la dirección de entrega.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idcomp = $idcli = $dirent = $noment = $dir = $mun = $est = $tel = $obs = $codp = $codr = $pais = $rfc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcli"])){
        $idcli_error = "Se requiere el ID del cliente.";
    }
    else{
        $idcli = test_input($_POST["idcli"]);
    }
    if (empty($_POST["dirent"])){
        $dirent_error = "Se requiere la dirección de entrega.";
    }
    else{
        $dirent = test_input($_POST["dirent"]);
    }
    if (empty($_POST["noment"])){
        $noment_error = "Se requiere el nombre de entrega.";
    }
    else{
        $noment = test_input($_POST["noment"]);
    }
    if (empty($_POST["dir"])){
        $dir_error = "Se requiere una dirección.";
    }
    else{
        $dir = test_input($_POST["dir"]);
    }
    if (empty($_POST["mun"])){
        $mun_error = "Se requiere el municipio.";
    }
    else{
        $mun = test_input($_POST["mun"]);
    }
    if (empty($_POST["est"])){
        $est_error = "Se requiere el estado.";
    }
    else{
        $est = test_input($_POST["est"]);
    }
    if (empty($_POST["tel"])){
        $tel_error = "Se requiere el teléfono.";
    }
    else{
        $tel = test_input($_POST["tel"]);
    }
    if (empty($_POST["obs"])){
        $obs_error = "Se requieren observaciones.";
    }
    else{
        $obs = test_input($_POST["obs"]);
    }
    if (empty($_POST["codp"])){
        $codp_error = "Se requiere el código postal.";
    }
    else{
        $codp = test_input($_POST["codp"]);
    }
    if (empty($_POST["codr"])){
        $codr_error = "Se requiere el código de ruta.";
    }
    else{
        $codr = test_input($_POST["codr"]);
    }
    if (empty($_POST["pais"])){
        $pais_error = "Se requiere el país.";
    }
    else{
        $pais = test_input($_POST["pais"]);
    }
    if (empty($_POST["rfc"])){
        $rfc_error = "Se requiere el RFC.";
    }
    else{
        $rfc = test_input($_POST["rfc"]);
    }
    
    if ($idcomp_error == "" and $idcli_error == "" and $dirent_error == "" and $noment_error == "" and $dir_error == "" and $mun_error == "" and $est_error == "" and $tel_error == "" and $obs_error == "" and $codp_error == "" and $codr_error == "" and $pais_error == "" and $rfc_error == ""){
        $query="UPDATE DirEnt SET dirEnt='$dirent', nombreEntrega='$noment', direccion='$dir', municipio='$mun', estado='$est', telefono='$tel', observaciones='$obs', codPost='$codp', codRuta='$codr', pais='$pais', rfc='$rfc' WHERE idCompania='$idcomp' AND idCliente='$idcli'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idcomp = $idcli = $dirent = $noment = $dir = $mun = $est = $tel = $obs = $codp = $codr = $pais = $rfc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }

    if ($idcomp_error == ""){
        $option = "Consultas por ID de Compañía";
        $query="SELECT * FROM DirEnt WHERE idCompania='$idcomp'";
        $result = mysqli_query($conection, $query);
        $idcomp = $idcli = $dirent = $noment = $dir = $mun = $est = $tel = $obs = $codp = $codr = $pais = $rfc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM DirEnt";
    $result = mysqli_query($conection, $query);
    $idcomp = $idcli = $dirent = $noment = $dir = $mun = $est = $tel = $obs = $codp = $codr = $pais = $rfc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

