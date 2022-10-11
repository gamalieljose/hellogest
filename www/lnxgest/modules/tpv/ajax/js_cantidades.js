function calculaimporteins()
{
    var precio = document.getElementsByName("htxtprecio[]")[0].value;
    var unidades = document.getElementsByName("txtunidades[]")[0].value;
    
    if (unidades == "")
    {
        unidades = "1";
        document.getElementsByName("txtunidades[]")[0].value = unidades;
    }
    if (precio == "")
    {
        precio = "0";
        document.getElementsByName("htxtprecio[]")[0].value = precio;
    }
    
    var importe = parseInt(unidades) * parseFloat(precio);
    
    document.getElementById("txtimporte").value = importe;
    
}

function sumaunidad(wcantidad, widlineadb) 
{
       
    var cantidad = document.getElementsByName("txtunidades[]")[wcantidad].value;
    cantidad = parseInt(cantidad) + 1;
    document.getElementsByName("txtunidades[]")[wcantidad].value = cantidad;  
    
    if(widlineadb == "0")
    {
        document.getElementsByName("txtunidades[]")[0].value = cantidad;
        calculaimporteins();
    }
    else
    {
        
        actulineadb('unidades', widlineadb, cantidad);
    }
    
    
    
}

function restaunidad(wcantidad, widlineadb) 
{
    var cantidad = document.getElementsByName("txtunidades[]")[wcantidad].value;
    cantidad = parseInt(cantidad) - 1;
    
    if(cantidad > 0)
    {
        document.getElementsByName("txtunidades[]")[wcantidad].value = cantidad;

        if(widlineadb == "0")
        {
            document.getElementsByName("txtunidades[]")[0].value = cantidad;
            calculaimporteins();
        }
        else
        {
            
            actulineadb('unidades', widlineadb, cantidad);
        }
    }
}


