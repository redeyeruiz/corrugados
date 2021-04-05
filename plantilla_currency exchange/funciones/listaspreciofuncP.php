<?php

include_once "util_pcP.php";
$idcomp_error = $idlis_error = $idart_error = $desc_error = $prec_error = $olmp_error = $lvldesc_error = $fcad_error = $finicio_error = $impdesc_error = ""; 
$idcomp = $idlis = $idart = $success = $option = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idlis"])){
        $idlis_error = "Se requiere el ID de lista.";
    }
    else{
        $idlis = test_input($_POST["idlis"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID de artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere el descuento.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    if (empty($_POST["prec"])){
        $prec_error = "Se requiere el precio.";
    }
    else{
        $prec = test_input($_POST["prec"]);
    }
    if (empty($_POST["olmp"])){
        $olmp_error = "Se requiere la cantidad Olmp.";
    }
    else{
        $olmp = test_input($_POST["olmp"]);
    }
    if (empty($_POST["lvldesc"])){
        $lvldesc_error = "Se requiere el nivel de descuento.";
    }
    else{
        $lvldesc = test_input($_POST["lvldesc"]);
    }
    if (empty($_POST["fcad"])){
        $fcad_error = "Se requiere la fecha de caducidad.";
    }
    else{
        $fcad = test_input($_POST["fcad"]);
    }
    if (empty($_POST["finicio"])){
        $finicio_error = "Se requiere la fecha de inicio.";
    }
    else{
        $finicio = test_input($_POST["finicio"]);
    }
    if (empty($_POST["impdesc"])){
        $impdesc_error = "Se requiere el importe de descuento.";
    }
    else{
        $impdesc = test_input($_POST["impdesc"]);
    }

    if ($idcomp_error == "" and $idlis_error == "" and $idart_error == "" and $desc_error == "" and $prec_error == "" and $olmp_error == "" and $lvldesc_error == "" and $fcad_error == "" and $finicio_error == "" and $impdesc_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query="INSERT INTO ListaPrecio VALUES ('$idcomp','$idlis','$idart','$desc','$prec','$olmp','$lvldesc','$fcad','$finicio','$impdesc');";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el alta.";
        }
        else{
            $success = "Alta realizada con éxito.";
        }
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["idlis"])){
        $idlis_error = "Se requiere el ID de lista.";
    }
    else{
        $idlis = test_input($_POST["idlis"]);
    }
    
    if ($idlis_error == ""){
        $query="DELETE FROM ListaPrecio WHERE idLista='$idlis'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en la baja de la lista.";
        }
        else{
            $success = "Baja realizada con éxito.";
        }
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID del la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idlis"])){
        $idlis_error = "Se requiere el ID de lista.";
    }
    else{
        $idlis = test_input($_POST["idlis"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID de artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere el descuento.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    if (empty($_POST["prec"])){
        $prec_error = "Se requiere el precio.";
    }
    else{
        $prec = test_input($_POST["prec"]);
    }
    if (empty($_POST["olmp"])){
        $olmp_error = "Se requiere la cantidad Olmp.";
    }
    else{
        $olmp = test_input($_POST["olmp"]);
    }
    if (empty($_POST["lvldesc"])){
        $lvldesc_error = "Se requiere el nivel de descuento.";
    }
    else{
        $lvldesc = test_input($_POST["lvldesc"]);
    }
    if (empty($_POST["fcad"])){
        $fcad_error = "Se requiere la fecha de caducidad.";
    }
    else{
        $fcad = test_input($_POST["fcad"]);
    }
    if (empty($_POST["finicio"])){
        $finicio_error = "Se requiere la fecha de inicio.";
    }
    else{
        $finicio = test_input($_POST["finicio"]);
    }
    if (empty($_POST["impdesc"])){
        $impdesc_error = "Se requiere el importe de descuento.";
    }
    else{
        $impdesc = test_input($_POST["impdesc"]);
    }
    if ($idcomp_error == "" and $idlis_error == "" and $idart_error == "" and $desc_error == "" and $prec_error == "" and $olmp_error == "" and $lvldesc_error == "" and $fcad_error == "" and $finicio_error == "" and $impdesc_error == ""){
        $query="UPDATE ListaPrecio SET idCompania='$idcomp', idArticulo='$idart', descuento='$desc', precio='$prec', cantOlmp='$olmp', nivelDscto='$lvldesc', fechaCaducidad='$fcad', fechaInicio='$finicio', impDesc='$impdesc' WHERE idLista='$idlis'";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $success = "Error en el actualización de datos.";
        }
        else{
            $success = "Actualización realizada con éxito.";
        }
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
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
        $query="SELECT * FROM ListaPrecio WHERE idCompania='$idcomp'";
        $result = mysqli_query($conection, $query);
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM ListaPrecio";
    $result = mysqli_query($conection, $query);
    $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
