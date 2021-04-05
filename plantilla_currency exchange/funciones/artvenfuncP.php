<?php

include_once "util_pcP.php";
$folio_error = $idart_error = $idalma_error = $idcomp_error = $idcliente_error = $newrep_error = $stock_error = $codavi_error = $udvta_error = ""; 
$folio = $idart = $idalma = $idcomp = $idcliente = $newrep = $stock = $codavi = $udvta = $coststa = $success = $option = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del articulo.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del articulo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el id del almacen.";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del Cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }
    if (empty($_POST["newrep"])){
        $newrep_error = "Se requiere un nuevo representante.";
    }
    else{
        $newrep = test_input($_POST["newrep"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere un stock.";
    }
    else{
        $stock = test_input($_POST["stock"]);
    }
    if (empty($_POST["codavi"])){
        $codavi_error = "Se requiere un codigo de aviso.";
    }
    else{
        $codavi = test_input($_POST["codavi"]);
    }
    if (empty($_POST["udvta"])){
        $udvta_error = "Se requiere una unidad de venta.";
    }
    else{
        $udvta = test_input($_POST["udvta"]);
    }
    
    if ($folio_error == "" and $idart_error == "" and $idalma_error == "" and $idcomp_error == "" and $idcliente_error == "" and $newrep_error == "" and $stock_error == "" and $codavi_error == "" and $udvta_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO articulovendido VALUES ('$folio','$idart','$idalma','$idcomp','$idcliente','$newrep','$stock','$codavi','$udvta');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta del articulo.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del articulo.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    
    if ($folio_error == ""){
        $query="DELETE FROM articulovendido WHERE folio='$folio'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja del articulo.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idalm = $idcomp = $desc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del articulo.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del articulo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el id del almacen.";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el ID del Cliente.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }
    if (empty($_POST["newrep"])){
        $newrep_error = "Se requiere un nuevo representante.";
    }
    else{
        $newrep = test_input($_POST["newrep"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere un stock.";
    }
    else{
        $stock = test_input($_POST["stock"]);
    }
    if (empty($_POST["codavi"])){
        $codavi_error = "Se requiere un codigo de aviso.";
    }
    else{
        $codavi = test_input($_POST["codavi"]);
    }
    if (empty($_POST["udvta"])){
        $udvta_error = "Se requiere una unidad de venta.";
    }
    else{
        $udvta = test_input($_POST["udvta"]);
    }
    
    if ($folio_error == "" and $idart_error == "" and $idalma_error == "" and $idcomp_error == "" and $idcliente_error == "" and $newrep_error == "" and $stock_error == "" and $codaviso_error == "" and $udvta_error == ""){
        $query="UPDATE articulovendido SET idArticulo='$idart', idAlmacen='$idalma', idCompania='$idcomp', idCliente='$idcliente', newRep='$newrep', stock='$stock', codAviso='$codavi', udVta='$udvta' WHERE folio='$folio'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del articulo.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }

    if ($folio_error == ""){
        $option = "Consultas por ID de Articulo";
        $query="SELECT * FROM articulovendido WHERE folio='$folio'";
        $result = mysqli_query($conection, $query);
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM articulovendido";
    $result = mysqli_query($conection, $query);
    $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}