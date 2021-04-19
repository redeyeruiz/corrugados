<?php

include_once "util_pcP.php";
$idcomp_error = $idord_error = $folio_error = $fmov_error = $hora_error = $sec_error = $tiporeg_error = $cant_error = $idart_error = $pos_error = ""; 
$idcomp = $idord = $folio = $success = $option = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = $exist = $btnsn = "";

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
        $query="INSERT INTO CantEntregada (idCompania, idOrden, folio, fechaMov, hora, secuencia, tipoReg, cantidad, idArticulo, posicion, estatus) VALUES ('$idcomp','$idord','$folio','$fmov','$hora','$sec','$tiporeg','$cant','$idart','$pos', true);";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM CantEntregada WHERE idCompania='$idcomp' and idArticulo='$idart' and idOrden='$idord' and folio='$folio' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta.";
                $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Una cantidad entregada con los ID's y folio ingresados ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta.";
                    $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
        }
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
        $query="SELECT * FROM CantEntregada WHERE idCompania='$idcomp' and idArticulo='$idart' and idOrden='$idord' and folio='$folio' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE CantEntregada SET estatus=false WHERE idCompania='$idcomp' AND idArticulo='$idart' AND idOrden='$idord' AND folio='$folio' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja.";
            }
        }
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idord"])){
        $idord_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idord = test_input($_POST["idord"]);
    }
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el dato para actualizar.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["fmov"])){
        $fmov_error = "Se requiere el dato actualizado.";
    }
    else{
        $fmov = test_input($_POST["fmov"]);
    }
    if (empty($_POST["hora"])){
        $hora_error = "Se requiere el dato actualizado.";
    }
    else{
        $hora = test_input($_POST["hora"]);
    }
    if (empty($_POST["sec"])){
        $sec_error = "Se requiere el dato actualizado.";
    }
    else{
        $sec = test_input($_POST["sec"]);
    }
    if (empty($_POST["tiporeg"])){
        $tiporeg_error = "Se requiere el dato actualizado.";
    }
    else{
        $tiporeg = test_input($_POST["tiporeg"]);
    }
    if (empty($_POST["cant"])){
        $cant_error = "Se requiere el dato actualizado.";
    }
    else{
        $cant = test_input($_POST["cant"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["pos"])){
        $pos_error = "Se requiere el dato actualizado.";
    }
    else{
        $pos = test_input($_POST["pos"]);
    }
    
    if ($idcomp_error == "" and $idord_error == "" and $folio_error == "" and $fmov_error == "" and $hora_error == "" and $sec_error == "" and $tiporeg_error == "" and $cant_error == "" and $idart_error == "" and $pos_error == ""){
        $query="SELECT * FROM CantEntregada WHERE idCompania='$idcomp' and idArticulo='$idart' and idOrden='$idord' and folio='$folio' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE CantEntregada SET fechaMov='$fmov', hora='$hora', secuencia='$sec', tipoReg='$tiporeg', cantidad='$cant', posicion='$pos' WHERE idCompania='$idcomp' AND idArticulo='$idart' AND idOrden='$idord' AND folio='$folio' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos.";
            }
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
        $query="SELECT * FROM CantEntregada WHERE idCompania='$idcomp' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM CantEntregada WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idord"])){
        $idord_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idord = test_input($_POST["idord"]);
    }
    if (empty($_POST["folio"])){
        $folio_error = "Se requiere el dato para actualizar.";
    }
    else{
        $folio = test_input($_POST["folio"]);
    }
    if (empty($_POST["fmov"])){
        $fmov_error = "Se requiere el dato actualizado.";
    }
    else{
        $fmov = test_input($_POST["fmov"]);
    }
    if (empty($_POST["hora"])){
        $hora_error = "Se requiere el dato actualizado.";
    }
    else{
        $hora = test_input($_POST["hora"]);
    }
    if (empty($_POST["sec"])){
        $sec_error = "Se requiere el dato actualizado.";
    }
    else{
        $sec = test_input($_POST["sec"]);
    }
    if (empty($_POST["tiporeg"])){
        $tiporeg_error = "Se requiere el dato actualizado.";
    }
    else{
        $tiporeg = test_input($_POST["tiporeg"]);
    }
    if (empty($_POST["cant"])){
        $cant_error = "Se requiere el dato actualizado.";
    }
    else{
        $cant = test_input($_POST["cant"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["pos"])){
        $pos_error = "Se requiere el dato actualizado.";
    }
    else{
        $pos = test_input($_POST["pos"]);
    }
    
    if ($idcomp_error == "" and $idord_error == "" and $folio_error == "" and $fmov_error == "" and $hora_error == "" and $sec_error == "" and $tiporeg_error == "" and $cant_error == "" and $idart_error == "" and $pos_error == ""){
        $query="SELECT * FROM CantEntregada WHERE idCompania='$idcomp' and idArticulo='$idart' and idOrden='$idord' and folio='$folio' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE CantEntregada SET fechaMov='$fmov', hora='$hora', secuencia='$sec', tipoReg='$tiporeg', cantidad='$cant', posicion='$pos', estatus=true WHERE idCompania='$idcomp' AND idArticulo='$idart' AND idOrden='$idord' AND folio='$folio'";
                $sql=mysqli_query($conection,$query);
                $success = "Alta y actualización realizada con éxito.";
            }
            else{
                $success = "Error en la actualización de datos.";
            }
        }
        $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idcomp = $idord = $folio = $fmov = $hora = $sec = $tiporeg = $cant = $idart = $pos = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
