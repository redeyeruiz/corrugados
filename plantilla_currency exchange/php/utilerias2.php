<?php
function conecta_servidor(){

    return $conexion=mysqli_connect("localhost","root","","papelescorrugados");
    
}

function unsetAll(){
    unset($_SESSION['queries']);
    unset($_SESSION['direntC']);
    unset($_SESSION['nomEC']);
    unset($_SESSION['direccionC']);
    unset($_SESSION['municipioC']);
    unset($_SESSION['estadoC']);
    unset($_SESSION['telefonoC']);
    unset($_SESSION['obsC']);
    unset($_SESSION['CRC']);
    unset( $_SESSION['paisC']); 
    unset($_SESSION['RFCC']);
    unset($_SESSION['inputID']);
    unset($_SESSION['idCompania']);
    unset($_SESSION['IDorden']);
    unset($_SESSION['CPC']);
    unset($_SESSION['ordenCompra']);
    unset($_SESSION['idCliente']);
    unset($_SESSION['folio']);        
    unset($_SESSION['numOrdenes']);

    unset($_SESSION['nombreClienteDT']);
    unset($_SESSION['dirCompleta']);
    unset($_SESSION['precio']);
    unset($_POST['nombreClienteDT']);
    unset($_POST['descripcion']);
    unset($_POST['cantidad']);
    unset($_SESSION['precioT']);
    unset($_SESSION['ordenT']);
    
    //modificar orden unsetAll


 
    unset($_SESSION['descripcion']);


    unset($_SESSION['dirEnt']);

    unset($_SESSION['idOrden']);
    unset($_SESSION['saldoOrden']);         
}

function executeQuery($conn,$query){


    $sql=mysqli_query($conn,$query);
        
    if (mysqli_affected_rows($conn)==0){
        return FALSE;
    }
    else{
        return TRUE;
    }
}
function warningMssg($message)

{
    echo "<div class= 'alert alert-warning'>" .
    "<strong>Warning!  </strong>". " $message"   .
        "</div>";
}
function checarFechaCaducidad()
{
    if(isset($_SESSION['idLista']) && isset($_SESSION['idArticulo']))
    {
        
        $idLista=$_SESSION['idLista'];
        $idArticulo=$_SESSION['idArticulo'];
        $conexion=conecta_servidor();
        $query="SELECT fechaCaducidad FROM listaprecio WHERE idLista='$idLista' AND idArticulo='$idArticulo'";
        $sql=mysqli_query($conexion,$query);
        $reg=mysqli_fetch_object($sql);
        
        
        if ($reg==mysqli_fetch_array($sql)){
            warningMssg("ID Lista inexistente o ID Lista no tiene fecha de caducidad");
            //echo "Folio inexistente en base de datos"; //----Agregar CSS bonito
            return("error");
        }else{
            $fechaCaducidad=$reg->fechaCaducidad;
            $fechaActual = date("Y-m-d"); 
            
            if ($fechaActual > $fechaCaducidad) {
                warningMssg("ha caducado la vigencia de precio para el articulo ".  $_SESSION['idArticulo']." en la Lista de Precios : ".$idLista);
            }else{
                return FALSE;
            }
            
        }
    }
    
    
}

function diasDesde($comienzo)
{
    $comienzo = strtotime($comienzo);
    $final = strtotime(date("Y-m-d"));

    return($diasDesde = ceil(abs($final - $comienzo) / 86400));
}

?>