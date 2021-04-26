<?php
include('php/utilerias2.php');
function folioValue(){
    if(isset($_POST['buscar'])){
        $folio=$_SESSION['folio']=$_POST['folio'];
        $conexion=conecta_servidor();
        $query="SELECT * FROM reporteOrden WHERE folio='$folio'";
        $sql=mysqli_query($conexion,$query);
        $reg=mysqli_fetch_object($sql);
        unset($_SESSION['ordenT']);
        
        if ($reg==mysqli_fetch_array($sql)){
            warningMssg("Folio inexistente en base de datos");
            //echo "Folio inexistente en base de datos"; //----Agregar CSS bonito
            return("error");
        }else{
            $_SESSION['idCliente'] = $reg->idCliente;
            $_SESSION['dirEnt']= $reg->dirEnt;
            $_SESSION['idCompania']= $reg->idCompania;
            $_SESSION['idOrden']= $reg->idOrden;
            $_SESSION['fechaSolicitud']= $reg->fechaSolicitud;
            $_SESSION['fechaOrden']= $reg->fechaOrden;
            $_SESSION['moneda']= $reg->moneda;
            $_SESSION['ordenCompra']=$reg->ordenCompra;
            echo "fecha Orden : " . $_SESSION['fechaOrden'];
            
            
            
        }
    }
}

function agregar_tablaM(){
    
   
    if( isset($_POST['agregarArt']) && isset($_SESSION['folio']) && $_SESSION['precioT'] != "0"){

        $idOrden                                    =$_SESSION['idOrden'];
        $idCompania                                 =$_SESSION['idCompania'];
        $folio                                      =$_SESSION['folio'];
        $numFact                                    ="NULL";
        $ordenBaan                                  ="0";
        $idCliente                                  =$_SESSION['idCliente'];
        $nombreCliente                              =$_SESSION['nombreCliente'];
        $_SESSION['dirEnt']  =$dirEnt               =$_SESSION['dirEnt'];
        $idArticulo                                 =$_SESSION['idArticulo'];
        $ordenCompra                                =$_SESSION['ordenCompra'];
        $_SESSION['cantidad']=$cantidad             =floatval($_POST['cantidad']);
        $precio                                     =$_SESSION['precio_articulo'];
        $_SESSION['descripcion'] =$decripcion       =$_POST['descripcion'];
        $fechaOrden                                 =$_SESSION['fechaOrden'];
        $fechaSolicitud                             =$_SESSION['fechaSolicitud'];
        $fechaEntrega                               ="NULL";
        $entregado                                  =0;
        $acumulado                                  =0;
        $total                                      =$_SESSION['precioT'];
        $costo                                      =$_SESSION['costo'];
        $moneda                                     =$_SESSION['moneda'];
        $Observaciones                              =$_POST['Observaciones'];
        $producido=0;
        $estatus=0;
        ordenTotal($_SESSION['precioT']);
        

        if(!isset($_SESSION['queries'])){
            $_SESSION['queries']="INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
        
        }
            
        else{
            $_SESSION['queries'] .= "INSERT INTO reporteorden VALUES('$idOrden','$idCompania','$folio','$numFact','$ordenBaan','$idCliente','$nombreCliente','$dirEnt','$idArticulo','$ordenCompra','$cantidad','$precio','$decripcion','$fechaOrden','$fechaSolicitud','$fechaEntrega','0','0','0','0','0','0','0','$producido','$entregado','$acumulado','$total','$costo','$moneda','$Observaciones','$estatus')|";
        }
        echo "Se ha agregado el articulo a la orden"; 
    }
    
    
}

function update_dir(){

    if(isset($_SESSION['dirEnt'])){
        $dirEnt=$_SESSION['dirEnt'];
        $conexion=conecta_servidor();
        $query="SELECT * FROM dirent WHERE dirEnt='$dirEnt'";
        $sql=mysqli_query($conexion,$query);
        $reg=mysqli_fetch_object($sql);

        if ($reg==mysqli_fetch_array($sql)){
            echo "Folio inexistente en base de datos"; //----Agregar CSS bonito
            return("error");
        }else{
            $_SESSION['direccion'] = "$reg->dirEnt, $reg->nombreEntrega, $reg->direccion, $reg->municipio, $reg->estado, $reg->telefono, $reg->observaciones, $reg->codPost, $reg->codRuta, $reg->pais, $reg->rfc";
            $dire=explode(",",$_SESSION['direccion']);


            $_SESSION['direntC'] =$dire[0];
            $_SESSION['nomEC'] =$dire[1];
            $_SESSION['direccionC'] =$dire[2];
            $_SESSION['municipioC'] =$dire[3];
            $_SESSION['estadoC'] =$dire[4];
            $_SESSION['telefonoC'] =$dire[5];
            $_SESSION['obsC'] =$dire[6];
            $_SESSION['CPC'] =$dire[7];
            $_SESSION['CRC'] =$dire[8];
            $_SESSION['paisC'] =$dire[9]; 
            $_SESSION['RFCC'] =$dire[10];
            
            
        }
    }
    

}
    //Elimiar
function eliminarArt(){
    if(isset($_POST['eArticulo']) && isset($_SESSION['folio']) && isset($_POST['eliminarB'])){
        
        $folio=$_SESSION['folio'];
        $articulo=$_POST['eArticulo'];

        $conn = conecta_servidor();
        $query="SELECT total FROM reporteorden WHERE folio='$folio' AND descripcion='$articulo'";
        $sql=mysqli_query($conn,$query);
        
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            
            
            echo "Error, no existe la relación folio-articulo";
        }else{
            
            $precioT=$reg->total;
            echo "precioooot : ".$precioT."\n";
            
            if (executeQuery(conecta_servidor(),"DELETE FROM reporteorden WHERE folio='$folio' AND descripcion='$articulo'")){
                echo "el articulo ha sido eliminado";
                if (executeQuery(conecta_servidor(),"UPDATE orden SET total= total-'$precioT'  WHERE folio ='$folio'")){
                    echo "se ha refrescado el total de la orden";
                }else{
                    echo "Error, no existe la relación folio-articulo";
                }
            }else{
                echo "Error, no existe la relación folio-articulo";
            }
            
        }

        
        
        /*
        $conn = conecta_servidor();
        $query="DELETE FROM reporteorden WHERE folio='$folio' AND descripcion='$articulo'";
        $sql=mysqli_query($conn,$query);
        
        if (mysqli_affected_rows($conn)==0){
           echo "Error, no existe la relación folio-articulo";
        }
        else{
            unset($_SESSION['queries']);
            echo "el articulo ha sido eliminado";
        }
        */

        //UPDATE orden SET total= $total  WHERE folio ='$folio'

    }
}

function eliminar(){
    
    if((!isset($_SESSION['folio'])) && isset($_POST['eliminarB'])){
        echo "Error, no se ha buscado orden con número de folio";
    }
    
    eliminarArt();
    

}

function update_tableM(){
        
    echo
    "
    <h1 class='h1-orden'>Artículos Agregados</h1>
    <div class='tbl-header-orden'>
        <table class='table-orden' cellpadding='0' cellspacing='0'>
        <thead>
            <tr>
            <th class='th-orden' scope='col'>Folio</th>
            <th class='th-orden' scope='col'>Cliente</th>
            <th class='th-orden' scope='col'>Direccion de Entrega</th>
            <th class='th-orden' scope='col'>Orden de compra</th>
            <th class='th-orden' scope='col'>Fecha-Orden</th>
            <th class='th-orden' scope='col'>Articulo</th>
            <th class='th-orden' scope='col'>Descripción</th>
            <th class='th-orden' scope='col'>Cantidad</th>
            <th class='th-orden' scope='col'>Precio</th>
            <th class='th-orden' scope='col'>Total</th>
            <th class='th-orden' scope='col'>Fecha-Solicitud</th>
            </tr>
        </thead>
        </table>
    </div>
    <div class='tbl-content-orden'>
            <table class='table-orden' cellpadding='0' cellspacing='0'>
            <tbody>";

    /* SQL table*/
    if(isset($_SESSION['folio'])){
       

    
        $folio=$_SESSION['folio'];
        $conexion=conecta_servidor();
        $query="SELECT * FROM reporteorden WHERE folio='$folio'";
        $sql=mysqli_query($conexion,$query);
        while ($reg=mysqli_fetch_object($sql)){
            echo
            "       <tr>
                        <td class='td-orden'>$reg->folio</td>
                        <td class='td-orden'>$reg->nombreCliente</td>
                        <td class='td-orden'>$reg->dirEnt</td>
                        <td class='td-orden'>$reg->ordenCompra</td>
                        <td class='td-orden'>$reg->fechaOrden</td>
                        <td class='td-orden'>$reg->idArticulo</td>
                        <td class='td-orden'>$reg->descripcion</td>
                        <td class='td-orden'>$reg->cantidad</td>
                        <td class='td-orden'>$reg->precio</td>
                        <td class='td-orden'>$reg->total</td>
                        <td class='td-orden'>$reg->fechaSolicitud</td>
                    </tr>
            ";
            
            
            
            
            
        }
        
    }

    /* session table*/
    if(isset($_SESSION['queries'])){
        $queries=explode("|",$_SESSION['queries'],-1);

        for($i=0;$i<count($queries);$i++){
            $query= explode("'",$queries[$i]);

            $folio          =$query[5];
            $cliente        = $query[13];
            $dirEnt         = $query [15];
            $ordenCompra    = $query [19];
            $fechaOrden     = $query [27];
            $idArticulo     = $query [17];
            $descripcion    = $query [25];
            $cantidad       = $query [21];
            $precio         = $query [23];
            $precioT         = $query [53];
            $fechaSolicitud = $query [29];


            echo

            "       <tr>
                        <td class='td-orden'>$folio</td>
                        <td class='td-orden'>$cliente</td>
                        <td class='td-orden'>$dirEnt</td>
                        <td class='td-orden'>$ordenCompra</td>
                        <td class='td-orden'>$fechaOrden</td>
                        <td class='td-orden'>$idArticulo</td>
                        <td class='td-orden'>$descripcion</td>
                        <td class='td-orden'>$cantidad</td>
                        <td class='td-orden'>$precio</td>
                        <td class='td-orden'>$precioT</td>
                        <td class='td-orden'>$fechaSolicitud</td>
                    </tr>
                ";
        }
    }
    echo"
                </tbody>
                </table>
    </div>";
}

function error($msg){
    return $msg;
}


//cancelar una orden
function cancelar(){
    if(isset($_POST["cancelar"]) ){
        unsetAll();
    
        if(isset($_SESSION['folio'])) {
            unsetAll();
        }   
        
    }
    
}

//TABLA ARTICULOS
function tabla_articulos(){
        
    if(isset($_SESSION['idCliente'])){
        
        $idCliente=$_SESSION['idCliente'];
        $conexion=conecta_servidor();
        $query="SELECT ArticuloExistente.descripcion FROM ArticuloExistente INNER JOIN ArticuloVendido WHERE  ArticuloExistente.idArticulo= ArticuloVendido.idArticulo AND idCliente = '$idCliente'" ;
        $sql=mysqli_query($conexion,$query);
        if (mysqli_affected_rows($conexion)==0){
            echo "<option> No hay articulos asignados a este cliente";
        }

        //echo "<select id='articulos_l' class='datal' name ='descripcion' list='articulos' >";
        while ($reg=mysqli_fetch_object($sql)){
            echo "<option>$reg->descripcion";

        }
        echo "</select>";

        
    }
    
    
    
           
}
//guardar e insertar a la DB
function guardar(){
    if(isset($_POST["guardar"])){

        $conn = conecta_servidor();
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        if(isset($_SESSION['queries'])){
            $total=$_SESSION['ordenT'];
            $folio=$_SESSION['folio'];
            $_SESSION['queries'] .= "UPDATE orden SET total= total +'$total'  WHERE folio ='$folio'|";
            $queries=explode("|",$_SESSION['queries'],-1);
    
            for($i=0;$i<count($queries);$i++){
                $query=$queries[$i];
                mysqli_query($conn, $query);
            }
            queriesStock($conn);
            unsetAll();
        
        }else{
            warningMssg("no hay nada que guardar");
            //echo "no hay nada que guardar";
        }
        
    }
}
// queries Stock
function queriesStock($conn){

    $queries=explode("|",$_SESSION['queries'],-1);
    $queriesS=array();
    
    for($i=0;$i<count($queries);$i++){
        $query= explode("'",$queries[$i]);
        if($query[0]=="INSERT INTO reporteorden VALUES("){
            
            $idArticulo     = $query [17];
            $cantidad       = $query [21];
            array_push($queriesS,"UPDATE articulovendido SET stock= stock +'$cantidad'   WHERE idArticulo ='$idArticulo'");
            array_push($queriesS,"UPDATE articuloexistente SET stock= stock -'$cantidad'   WHERE idArticulo ='$idArticulo'");
        }
        
    }

    for($i=0;$i<count($queriesS);$i++){
        $query=$queriesS[$i];

        mysqli_query($conn, $query);
        
    }   
}

// PRECIO COSTO
function calcularCosto($idArticulo)
    {
        $conn=conecta_servidor();
        $query="SELECT costoEstandar FROM articuloexistente WHERE  idArticulo ='$idArticulo' ";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            echo "Error, no existe artiuclo con tal  idArticulo";
        }else{
            
            return$reg->costoEstandar;
        }

    }
function ordenTotal($strPrecioT){
    if(!isset($_SESSION['ordenT']) ){
        $_SESSION['ordenT']=$strPrecioT;
        /*
        $folio=$_SESSION['folio'];
        $conn=conecta_servidor();
        $query="SELECT total  FROM `orden` WHERE folio =$folio";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            
            echo"no FUNCIONA orden Total";
            echo "error no existe tal folio";
        }else{
            
            $_SESSION['ordenT']=strval($reg->total);
            
            
        }
        */

    }
    else{
        $_SESSION['ordenT']= strval(floatval($_SESSION['ordenT']) + floatval($strPrecioT));
    }

}
function calcularPrecio(){
    if(isset($_POST['calcularP']) && isset($_POST['cantidad'])  || (isset($_POST['agregarArt']) && isset($_POST['cantidad'])) ){
        $precio_articulo=obtenerPrecio();
        echo $precio_articulo;
        $_SESSION['precio_articulo']=strval($precio_articulo);
        
        $_SESSION['precioT']=strval( intval($_POST['cantidad']) * $precio_articulo);
        if(isset($_SESSION['idArticulo'])){
            $_SESSION['costo']=strval( intval($_POST['cantidad']) * calcularCosto($_SESSION['idArticulo']));
        }
    }
}

function obtenerPrecio(){
    
    if(isset($_SESSION['idCliente'])  && isset($_SESSION['idLista']) ){
        
        $_SESSION['idArticulo']=$idArticulo=obtenerIdArticulo();
        
        $idLista=$_SESSION['idLista'];
        echo$idLista;  
        $conn=conecta_servidor();
        $query="SELECT descuento,precio FROM listaPrecio WHERE idLista ='$idLista' AND idArticulo ='$idArticulo' ";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            echo "Error, no existe articulo con tal idLista o idArticulo";
            return(NULL);
        }else{
            
            return (floatval($reg->precio)  - (floatval($reg->descuento) * floatval($reg->precio) ));
        }
    }
    
}

function obtenerIdArticulo(){
    
    $conn=conecta_servidor();
    $descripcion=$_POST['descripcion'];
    $query="SELECT idArticulo FROM ArticuloExistente WHERE descripcion ='$descripcion'";
    $sql=mysqli_query($conn,$query);
    $reg=mysqli_fetch_object($sql);
    if ($reg==mysqli_fetch_array($sql)){
        return "Error, no hay articulo con tal descripcion";
    }else{
        return $reg->idArticulo;
    }


}

function clientValues(){
    
    
    
    if(isset($_SESSION['idCliente'])){
        
        
        $idCliente=$_SESSION['idCliente'];         
        $conn=conecta_servidor();
        $query="SELECT nombreCliente,idCliente,estatus,idLista,saldoOrden,bloqueo,idCompania FROM cliente WHERE idCliente = '$idCliente'";
        $sql=mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if ($reg==mysqli_fetch_array($sql)){
            echo "error no existe tal cliente";
        }else{
            $_SESSION['estatus']=$reg->estatus;
            $_SESSION['idLista']=$reg->idLista;
            $_SESSION['saldoOrden']=$reg->saldoOrden;
            $_SESSION['bloqueo']=$reg->bloqueo;
            $_SESSION['idCompania']=$reg->idCompania;
            $_SESSION['nombreCliente']=$reg->nombreCliente;
        }
    }
    
}
//Eliminar orden
function eliminarOrden(){
    if(isset($_POST['eliminarO']) && isset($_SESSION['folio'])){
        $folio=$_SESSION['folio'];
        
        
        $conn = conecta_servidor();
        $query="DELETE FROM reporteorden WHERE folio='$folio' ";
        $sql=mysqli_query($conn,$query);
        
        if (mysqli_affected_rows($conn)==0){
           $eliminado = 1;
        }
        else{
            unset($_SESSION['queries']);
            unset($_SESSION['ordenT']);
            
        }

        $query="DELETE FROM orden WHERE folio='$folio' ";
        $sql=mysqli_query($conn,$query);
        
        if (mysqli_affected_rows($conn)==0){
           echo "Error, no existe tal orden";
        }
        else{
            unset($_SESSION['queries']);
            echo "la orden ha sido eliminada";
        }

    }
    
}



?>