    function agregar_art()
    {
        
        
        var idOrden= document.getElementById("idOrden");
        var idCompania=document.getElementById("idCompania");
        var folio=document.getElementById("folio");
        var numFact=document.getElementById("numFact");
        var ordenBaan=document.getElementById("ordenBaan");
        var idCliente=document.getElementById("idCliente");
        var nombreCliente=document.getElementById("nombreCliente");
        var dirEnt=document.getElementById("dirEnt");
        var idArticulo=document.getElementById("idArticulo");
        var ordenCompra=document.getElementById("ordenCompra");
        var cantidad=document.getElementById("cantidad");
        var precio=document.getElementById("precio");
        var decripcion=document.getElementById("precio");
        var fechaOrden=document.getElementById("fechaOrden");
        var fechaSolicitud=document.getElementById("fechaSolicitud");
        var fechaEntrega=document.getElementById("fechaEntrega");
        var entregado=document.getElementById("entregado");
        var acumulado=document.getElementById("acumulado");
        var total=document.getElementById("total");
        var costo=document.getElementById("costo");
        var moneda=document.getElementById("moneda");
        var Observaciones=document.getElementById("Observaciones");

        if(typeof(Storage) !== "undefined"){
            if(sessionStorage.queries){
                sessionStorage.queries = sessionStorage.queries+"INSERT INTO ReporteOrden VALUES('"+idOrden+','+idCompania+','+folio+','+numFact+','+
                                                                ordenBaan+','+idCliente+','+nombreCliente+','+dirEnt+','+
                                                                idArticulo+','+ordenCompra+','+cantidad+','+precio+','+decripcion+','+
                                                                fechaOrden+','+fechaSolicitud+','+fechaEntrega+','+entregado+','+acumulado+','+
                                                                total+','+costo+','+moneda+','+Observaciones+")|";
            }
            else{
                sessionStorage.queries="INSERT INTO ReporteOrden VALUES('"+idOrden+','+idCompania+','+folio+','+numFact+','+
                                        ordenBaan+','+idCliente+','+nombreCliente+','+dirEnt+','+
                                        idArticulo+','+ordenCompra+','+cantidad+','+precio+','+decripcion+','+
                                        fechaOrden+','+fechaSolicitud+','+fechaEntrega+','+entregado+','+acumulado+','+
                                        total+','+costo+','+moneda+','+Observaciones+")|";
            }
    
        }
      
        
        document.getElementById("idOrden").innerHTML="";
        document.getElementById("idCompania").innerHTML="";
        document.getElementById("folio").innerHTML="";
        document.getElementById("numFact").innerHTML="";
        document.getElementById("ordenBaan").innerHTML="";
        document.getElementById("idCliente").innerHTML="";
        document.getElementById("nombreCliente").innerHTML="";
        document.getElementById("dirEnt").innerHTML="";
        document.getElementById("idArticulo").innerHTML="";
        document.getElementById("ordenCompra").innerHTML="";
        document.getElementById("cantidad").innerHTML="";
        document.getElementById("precio").innerHTML="";
        document.getElementById("precio").innerHTML="";
        document.getElementById("fechaOrden").innerHTML="";
        document.getElementById("fechaSolicitud").innerHTML="";
        document.getElementById("fechaEntrega").innerHTML="";
        document.getElementById("entregado").innerHTML="";
        document.getElementById("acumulado").innerHTML="";
        document.getElementById("total").innerHTML="";
        document.getElementById("costo").innerHTML="";
        document.getElementById("moneda").innerHTML="";
        document.getElementById("Observaciones").innerHTML="";
        
    }

    function guardar(){
        

        document.getElementById("idOrden").innerHTML="";
        document.getElementById("idCompania").innerHTML="";
        document.getElementById("folio").innerHTML="";
        document.getElementById("numFact").innerHTML="";
        document.getElementById("ordenBaan").innerHTML="";
        document.getElementById("idCliente").innerHTML="";
        document.getElementById("nombreCliente").innerHTML="";
        document.getElementById("dirEnt").innerHTML="";
        document.getElementById("idArticulo").innerHTML="";
        document.getElementById("ordenCompra").innerHTML="";
        document.getElementById("cantidad").innerHTML="";
        document.getElementById("precio").innerHTML="";
        document.getElementById("precio").innerHTML="";
        document.getElementById("fechaOrden").innerHTML="";
        document.getElementById("fechaSolicitud").innerHTML="";
        document.getElementById("fechaEntrega").innerHTML="";
        document.getElementById("entregado").innerHTML="";
        document.getElementById("acumulado").innerHTML="";
        document.getElementById("total").innerHTML="";
        document.getElementById("costo").innerHTML="";
        document.getElementById("moneda").innerHTML="";
        document.getElementById("Observaciones").innerHTML="";

        if(typeof(Storage) !== "undefined"){
            if(sessionStorage.queries){
                sessionStorage.queries = "";
            }
        }
        
    }



function get_queries(){

    if(typeof(Storage) !== "undefined"){
        if(sessionStorage.queries){
           document.getElementById("queries").value=sessionStorage.queries;
        }
        else{
            return(null)
        }

    }
}