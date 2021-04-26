<?php

include_once "util_pcP.php";
$idcomp_error = $idalm_error = $idart_error = $stock_error = ""; 
$idcomp = $idalm = $idart = $stock = $success = $option = $exist = $btnsn = $val1 = $val2 = $val3 = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_altas"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el ID de la compañía.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el stock.";
    }
    else{
        $stock = floatval(test_input($_POST["stock"]));
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == "" and $stock_error == ""){
        //$conection = mysqli_connect("localhost", "root", "rootroot", "PapelesCorrugados");
        $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
        $val1 = mysqli_query($conection,$query);
        $row = $val1-> fetch_assoc();
        if ($row["estatus"] == "0"){
            $success = "Error en el alta del inventario.";
            $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
        }
        else{
            $query = "SELECT * FROM Almacen WHERE idAlmacen='$idalm'";
            $val2 = mysqli_query($conection,$query);
            $row = $val2-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del inventario.";
                $id_comp_error = "El ID del almacen ingresado no existe en los registros.";
            }
            else{
                $query = "SELECT * FROM Articulo WHERE idArticulo='$idart'";
                $val3 = mysqli_query($conection,$query);
                $row = $val3-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Error en el alta del inventario.";
                    $id_comp_error = "El ID del artículo ingresado no existe en los registros.";
                }
                else{
                    $query="INSERT INTO Inventario (idCompania, idAlmacen, idArticulo, stock, estatus) VALUES ('$idcomp','$idalm','$idart','$stock', true);";
                    $sql=mysqli_query($conection,$query);
                    if (!$sql){
                        $query="SELECT * FROM Inventario WHERE idCompania='$idcomp' and idAlmacen='$idalm' and idArticulo='$idart' and estatus=false";
                        $exist = mysqli_query($conection, $query);
                        if (!$exist){
                            $success = "Error en el alta del inventario.";
                            $idcomp = $idalm = $idart = $stock = "";
                        }
                        else{
                            $row = $exist-> fetch_assoc();
                            if ($row["estatus"] == "0"){
                                $success = "El inventario con los ID's ingresados ya existe en la base de datos pero en modo inactivo.\n¿Quiere cambiar su modo a activo y actualizarlo con los datos que ya ingresó?";
                                $btnsn = "Mostrar";
                            }
                            else{
                                $success = "Error en el alta del inventario.";
                                $idcomp = $idalm = $idart = $stock = "";
                            }
                        }
                    }
                    else{
                        $success = "Alta realizada con éxito.";
                        $idcomp = $idalm = $idart = $stock = "";
                    }
                }
            }
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
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el ID del almacen.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el ID del artículo.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == ""){
        $query="SELECT * FROM Inventario WHERE idCompania='$idcomp' and idAlmacen='$idalm' and idArticulo='$idart' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la baja del inventario.";
        }
        else{
            $row = $exist-> fetch_assoc();
            if ($row["estatus"] == "1"){
                $query="UPDATE Inventario SET estatus=false WHERE idCompania='$idcomp' AND idAlmacen='$idalm' AND idArticulo='$idart' AND estatus=true";
                $sql=mysqli_query($conection,$query);
                $success = "Baja realizada con éxito.";
            }
            else{
                $success = "Error en la baja del inventario.";
            }
        }
        $idcomp = $idalm = $idart = $stock = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_actualizar"])){
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el dato actualizado.";
    }
    else{
        $stock = floatval(test_input($_POST["stock"]));
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == "" and $stock_error == ""){
        $query="SELECT * FROM Inventario WHERE idCompania='$idcomp' and idAlmacen='$idalm' and idArticulo='$idart' and estatus=true";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del inventario.";
        }
        else{
            $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
            $val1 = mysqli_query($conection,$query);
            $row = $val1-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del inventario.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $query = "SELECT * FROM Almacen WHERE idAlmacen='$idalm'";
                $val2 = mysqli_query($conection,$query);
                $row = $val2-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Error en el alta del inventario.";
                    $id_comp_error = "El ID del almacen ingresado no existe en los registros.";
                }
                else{
                    $query = "SELECT * FROM Articulo WHERE idArticulo='$idart'";
                    $val3 = mysqli_query($conection,$query);
                    $row = $val3-> fetch_assoc();
                    if ($row["estatus"] == "0"){
                        $success = "Error en el alta del inventario.";
                        $id_comp_error = "El ID del artículo ingresado no existe en los registros.";
                    }
                    else{
                        $row = $exist-> fetch_assoc();
                        if ($row["estatus"] == "1"){
                            $query="UPDATE Inventario SET stock='$stock' WHERE idCompania='$idcomp' AND idAlmacen='$idalm' AND idArticulo='$idart' AND estatus=true";
                            $sql=mysqli_query($conection,$query);
                            $success = "Actualización realizada con éxito.";
                        }
                        else{
                            $success = "Error en la actualización de datos del inventario.";
                        }
                    }
                }
            }
        }
        $idcomp = $idalm = $idart = $stock = "";
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
        $option = "Consultas por ID de la compañia";
        $query="SELECT * FROM Inventario WHERE idCompania='$idcomp' AND estatus=true";
        $result = mysqli_query($conection, $query);
        $idcomp = $idalm = $idart = $stock = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["b_reporte"])){

    $option = "Reporte";
    $query="SELECT * FROM Inventario WHERE estatus=true";
    $result = mysqli_query($conection, $query);
    $idcomp = $idalm = $idart = $stock = "";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["confirmoc"])){
    
    if (empty($_POST["idcomp"])){
        $idcomp_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idcomp = test_input($_POST["idcomp"]);
    }
    if (empty($_POST["idalm"])){
        $idalm_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idalm = test_input($_POST["idalm"]);
    }
    if (empty($_POST["idart"])){
        $idart_error = "Se requiere el dato para actualizar.";
    }
    else{
        $idart = test_input($_POST["idart"]);
    }
    if (empty($_POST["stock"])){
        $stock_error = "Se requiere el dato actualizado.";
    }
    else{
        $stock = floatval(test_input($_POST["stock"]));
    }
    
    if ($idcomp_error == "" and $idalm_error == "" and $idart_error == "" and $stock_error == ""){
        $query="SELECT * FROM Inventario WHERE idCompania='$idcomp' and idAlmacen='$idalm' and idArticulo='$idart' and estatus=false";
        $exist = mysqli_query($conection, $query);
        if (!$exist){
            $success = "Error en la actualización de datos del inventario.";
        }
        else{
            $query = "SELECT * FROM Compania WHERE idCompania='$idcomp'";
            $val1 = mysqli_query($conection,$query);
            $row = $val1-> fetch_assoc();
            if ($row["estatus"] == "0"){
                $success = "Error en el alta del inventario.";
                $id_comp_error = "El ID de compañía ingresado no existe en los registros.";
            }
            else{
                $query = "SELECT * FROM Almacen WHERE idAlmacen='$idalm'";
                $val2 = mysqli_query($conection,$query);
                $row = $val2-> fetch_assoc();
                if ($row["estatus"] == "0"){
                    $success = "Error en el alta del inventario.";
                    $id_comp_error = "El ID del almacen ingresado no existe en los registros.";
                }
                else{
                    $query = "SELECT * FROM Articulo WHERE idArticulo='$idart'";
                    $val3 = mysqli_query($conection,$query);
                    $row = $val3-> fetch_assoc();
                    if ($row["estatus"] == "0"){
                        $success = "Error en el alta del inventario.";
                        $id_comp_error = "El ID del artículo ingresado no existe en los registros.";
                    }
                    else{
                        $row = $exist-> fetch_assoc();
                        if ($row["estatus"] == "0"){
                            $query="UPDATE Inventario SET stock='$stock', estatus=true WHERE idCompania='$idcomp' AND idAlmacen='$idalm' AND idArticulo='$idart'";
                            $sql=mysqli_query($conection,$query);
                            $success = "Actualización realizada con éxito.";
                        }
                        else{
                            $success = "Error en la actualización de datos del inventario.";
                        }
                    }
                }
            }
        }
        $idcomp = $idalm = $idart = $stock = "";
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["canceloc"])){

    $success = "Se ha cancelado la acción.";
    $idcomp = $idalm = $idart = $stock = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}