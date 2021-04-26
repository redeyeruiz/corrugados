<?php

include_once "util_pcP.php";
$folio_error = $idart_error = $idalma_error = $idcomp_error = $idcliente_error = $newrep_error = $stock_error = $codavi_error = $udvta_error = ""; 
$folio = $idart = $idalma = $idcomp = $idcliente = $newrep = $stock = $codavi = $udvta = $coststa = $success = $option = $exist = $btnsn = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del artículo.";
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
        $codavi_error = "Se requiere un código de aviso.";
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
        $query="INSERT INTO ArticuloVendido (folio, idArticulo, idAlmacen, idCompania, idCliente, newRep, stock, codAviso, udVta, estatus) VALUES ('$folio','$idart','$idalma','$idcomp','$idcliente','$newrep','$stock','$codavi','$udvta', true);";
        $query2="SELECT stock FROM inventario WHERE idArticulo = '$idart' AND idAlmacen = '$idalma';";
        $resultao=mysqli_query($conection,$query2);
        $row = mysqli_fetch_array($resultao);
        $quantity = $row['stock'];
        //echo $quantity;
        $stock2=($quantity-$stock);
        $query3="UPDATE inventario SET stock='$stock2' WHERE idArticulo = '$idart' AND idAlmacen = '$idalma';";
        $sql2=mysqli_query($conection,$query3);
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM ArticuloVendido WHERE folio='$folio' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta del artículo.";
                $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El folio ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta del artículo.";
                    $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_bajas"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del artículo para la baja.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    
    if ($idrep_error == ""){
        $query="SELECT * FROM ArticuloVendido WHERE folio='$folio' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del artículo.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE ArticuloVendido SET estatus=false WHERE folio='$folio' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del artículo.";
            }
        }
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el dato para actualizar.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato actualizado.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el dato actualizado.";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }
    if (empty($_POST["newrep"])){
        $newrep_error = "Se requiere el dato actualizado.";
    }
    else{
        $newrep = test_input($_POST["newrep"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el dato actualizado.";
    }
    else{
        $stock = test_input($_POST["stock"]);
    }
    if (empty($_POST["codavi"])){
        $codavi_error = "Se requiere el dato actualizado.";
    }
    else{
        $codavi = test_input($_POST["codavi"]);
    }
    if (empty($_POST["udvta"])){
        $udvta_error = "Se requiere el dato actualizado.";
    }
    else{
        $udvta = test_input($_POST["udvta"]);
    }
    
    if ($folio_error == "" and $idart_error == "" and $idalma_error == "" and $idcomp_error == "" and $idcliente_error == "" and $newrep_error == "" and $stock_error == "" and $codaviso_error == "" and $udvta_error == ""){
        $query="SELECT * FROM ArticuloVendido WHERE folio='$folio' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del artículo.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE ArticuloVendido SET idCompania='$idcomp', idAlmacen='$idalma', idArticulo='$idart', idCliente='$cliente', newRep='$newrep', stock='$stock', codAviso='$codavi', udVta='$udvta' WHERE folio='$folio' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos del artículo.";
            }
        }
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el folio del artículo.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }

    if ($folio_error == ""){
        $option = "Consultas por ID de Artículo";
        $query="SELECT * FROM ArticuloVendido WHERE folio='$folio' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM ArticuloVendido WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el dato para actualizar.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato actualizado.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["idalma"])){
        $idalma_error = "Se requiere el dato actualizado.";
    }
    else{
        $idalma = test_input($_POST["idalma"]);
    }
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idcliente"])){
        $idcliente_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcliente = test_input($_POST["idcliente"]);
    }
    if (empty($_POST["newrep"])){
        $newrep_error = "Se requiere el dato actualizado.";
    }
    else{
        $newrep = test_input($_POST["newrep"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el dato actualizado.";
    }
    else{
        $stock = test_input($_POST["stock"]);
    }
    if (empty($_POST["codavi"])){
        $codavi_error = "Se requiere el dato actualizado.";
    }
    else{
        $codavi = test_input($_POST["codavi"]);
    }
    if (empty($_POST["udvta"])){
        $udvta_error = "Se requiere el dato actualizado.";
    }
    else{
        $udvta = test_input($_POST["udvta"]);
    }
    
    if ($folio_error == "" and $idart_error == "" and $idalma_error == "" and $idcomp_error == "" and $idcliente_error == "" and $newrep_error == "" and $stock_error == "" and $codaviso_error == "" and $udvta_error == ""){
        $query="SELECT * FROM ArticuloVendido WHERE folio='$folio' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del artículo.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE ArticuloVendido SET idCompania='$idcomp', idAlmacen='$idalma', idArticulo='$idart', idCliente='$cliente', newRep='$newrep', stock='$stock', codAviso='$codavi', udVta='$udvta', estatus=true WHERE folio='$folio'";
                $sql=mysqli_query($conection,$query);
                $success = "Alta y actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos del artículo.";
            }
        }
        $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $folio = $idart = $idalma = $idcomp = $cliente = $newrep = $stock = $codavi = $udvta = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}