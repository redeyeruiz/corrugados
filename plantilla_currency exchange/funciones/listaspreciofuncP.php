<?php

include_once "util_pcP.php";
$idcomp_error = $idlis_error = $idart_error = $desc_error = $prec_error = $olmp_error = $lvldesc_error = $fcad_error = $finicio_error = $impdesc_error = ""; 
$idcomp = $idlis = $idart = $success = $option = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = $exist = $btnsn = "";

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
        $query="INSERT INTO ListaPrecio (idCompania, idLista, idArticulo, descuento, precio, cantOlmp, nivelDscto, fechaCaducidad, fechaInicio, impDesc, estatus) VALUES ('$idcomp','$idlis','$idart','$desc','$prec','$olmp','$lvldesc','$fcad','$finicio','$impdesc', true);";
        $sql=mysqli_query($conection,$query);
        if (!$sql){
            $query="SELECT * FROM ListaPrecio WHERE idLista='$idlis' and estatus=false";
            $exist = mysqli_query($conection, $query);
            if (!$exist){
                $success = "Error en el alta de la lista.";
                $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
            }
            else{
                $row = $exist-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "El ID de lista ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                    $btnsn = "Mostrar";
                }
                else{
                    $success = "Error en el alta de la lista.";
                    $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
                }
            }
        }
        else{
            $success = "Alta realizada con éxito.";
            $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
        }
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
        $query="SELECT * FROM ListaPrecio WHERE idLista='$idlis' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja de la lista.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE ListaPrecio SET estatus=false WHERE idLista='$idlis' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja de la lista.";
            }
        }
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idlis"])){
        $idlis_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idlis = test_input($_POST["idlis"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato actualizado.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere el dato actualizado.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    if (empty($_POST["prec"])){
        $prec_error = "Se requiere el dato actualizado.";
    }
    else{
        $prec = test_input($_POST["prec"]);
    }
    if (empty($_POST["olmp"])){
        $olmp_error = "Se requiere el dato actualizado.";
    }
    else{
        $olmp = test_input($_POST["olmp"]);
    }
    if (empty($_POST["lvldesc"])){
        $lvldesc_error = "Se requiere el dato actualizado.";
    }
    else{
        $lvldesc = test_input($_POST["lvldesc"]);
    }
    if (empty($_POST["fcad"])){
        $fcad_error = "Se requiere el dato actualizado.";
    }
    else{
        $fcad = test_input($_POST["fcad"]);
    }
    if (empty($_POST["finicio"])){
        $finicio_error = "Se requiere el dato actualizado.";
    }
    else{
        $finicio = test_input($_POST["finicio"]);
    }
    if (empty($_POST["impdesc"])){
        $impdesc_error = "Se requiere el dato actualizado.";
    }
    else{
        $impdesc = test_input($_POST["impdesc"]);
    }
    if ($idcomp_error == "" and $idlis_error == "" and $idart_error == "" and $desc_error == "" and $prec_error == "" and $olmp_error == "" and $lvldesc_error == "" and $fcad_error == "" and $finicio_error == "" and $impdesc_error == ""){
        $query="SELECT * FROM ListaPrecio WHERE idLista='$idlis' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en el actualización de datos de la lista.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE ListaPrecio SET idCompania='$idcomp', idArticulo='$idart', descuento='$desc', precio='$prec', cantOlmp='$olmp', nivelDscto='$lvldesc', fechaCaducidad='$fcad', fechaInicio='$finicio', impDesc='$impdesc' WHERE idLista='$idlis' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Actualización realizada con éxito.";
            }
            else{
                $success = "Error en el actualización de datos de la lista.";
            }
        }
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_consultas"])){
    if (empty($_POST["idlis"])){
        $idlis_error = "Se requiere el ID de lista.";
    }
    else{
        $idlis = test_input($_POST["idlis"]);
    }

    if ($idlis_error == ""){
        $option = "Consultas por ID de Lista";
        $query="SELECT * FROM ListaPrecio WHERE idLista='$idlis' AND  estatus=true";
        $result = mysqli_query($conection, $query);
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM ListaPrecio WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato actualizado.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idlis"])){
        $idlis_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idlis = test_input($_POST["idlis"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato actualizado.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["desc"])){
        $desc_error = "Se requiere el dato actualizado.";
    }
    else{
        $desc = test_input($_POST["desc"]);
    }
    if (empty($_POST["prec"])){
        $prec_error = "Se requiere el dato actualizado.";
    }
    else{
        $prec = test_input($_POST["prec"]);
    }
    if (empty($_POST["olmp"])){
        $olmp_error = "Se requiere el dato actualizado.";
    }
    else{
        $olmp = test_input($_POST["olmp"]);
    }
    if (empty($_POST["lvldesc"])){
        $lvldesc_error = "Se requiere el dato actualizado.";
    }
    else{
        $lvldesc = test_input($_POST["lvldesc"]);
    }
    if (empty($_POST["fcad"])){
        $fcad_error = "Se requiere el dato actualizado.";
    }
    else{
        $fcad = test_input($_POST["fcad"]);
    }
    if (empty($_POST["finicio"])){
        $finicio_error = "Se requiere el dato actualizado.";
    }
    else{
        $finicio = test_input($_POST["finicio"]);
    }
    if (empty($_POST["impdesc"])){
        $impdesc_error = "Se requiere el dato actualizado.";
    }
    else{
        $impdesc = test_input($_POST["impdesc"]);
    }
    if ($idcomp_error == "" and $idlis_error == "" and $idart_error == "" and $desc_error == "" and $prec_error == "" and $olmp_error == "" and $lvldesc_error == "" and $fcad_error == "" and $finicio_error == "" and $impdesc_error == ""){
        $query="SELECT * FROM ListaPrecio WHERE idLista='$idlis' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en el actualización de datos de la lista.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $query="UPDATE ListaPrecio SET idCompania='$idcomp', idArticulo='$idart', descuento='$desc', precio='$prec', cantOlmp='$olmp', nivelDscto='$lvldesc', fechaCaducidad='$fcad', fechaInicio='$finicio', impDesc='$impdesc', estatus=true WHERE idLista='$idlis'";
                $sql=mysqli_query($conection,$query);
                $success = "Alta y actualización realizada con éxito.";
            }
            else{
                $success = "Error en el actualización de datos de la lista.";
            }
        }
        $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idcomp = $idlis = $idart = $desc = $prec = $olmp = $lvldesc = $fcad = $finicio = $impdesc = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
