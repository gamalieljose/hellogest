function muestrakbnum(widprecio, widlineadb) 
{
    
    document.getElementById("capa_fondonegro").style.display="inline";
    document.getElementById("tpv_tecladonum").style.display="inline";
    var precio = document.getElementsByName("htxtprecio[]")[widprecio].value;
    
    if (precio == '0' || precio == '0.00'){precio = '';}
    
    document.getElementById("txtteclado").value = precio;  
    document.getElementById("hkbrdlinea").value = widlineadb; 
    
}

function cerrartecladonum() 
{
        
    var precio = document.getElementById("txtteclado").value
    if (precio == '' ){precio = '0';}
    document.getElementById("txtteclado").value = precio;  
    
    document.getElementById("capa_fondonegro").style.display="none";
    document.getElementById("tpv_tecladonum").style.display="none";
        
}

function kbrdenviotecla(wtecla)
{
    var wteclado = document.getElementById("txtteclado").value;
    if (wtecla == "0"){wteclado = wteclado + "0";}
    if (wtecla == "1"){wteclado = wteclado + "1";}
    if (wtecla == "2"){wteclado = wteclado + "2";}
    if (wtecla == "3"){wteclado = wteclado + "3";}
    if (wtecla == "4"){wteclado = wteclado + "4";}
    if (wtecla == "5"){wteclado = wteclado + "5";}
    if (wtecla == "6"){wteclado = wteclado + "6";}
    if (wtecla == "7"){wteclado = wteclado + "7";}
    if (wtecla == "8"){wteclado = wteclado + "8";}
    if (wtecla == "9"){wteclado = wteclado + "9";}
    
    if (wtecla == "comadecimal"){wteclado = wteclado + ".";}
    
    if (wtecla == "borrauno")
    {
    
       
    wteclado = wteclado.substring(0,wteclado.length-1);
       
    
    }
    
    if (wtecla == "borratodo"){wteclado = "";}
        
    document.getElementById("txtteclado").value = wteclado;
    
    
}

function aceptartecladonum() 
{
        
    var precio = document.getElementById("txtteclado").value
    if (precio == '' ){precio = '0';}
    document.getElementById("txtteclado").value = precio;  
    
    document.getElementById("capa_fondonegro").style.display="none";
    document.getElementById("tpv_tecladonum").style.display="none";
    
    var widlineadb = document.getElementById("hkbrdlinea").value;
    if(widlineadb == "0")
    {
        document.getElementsByName("htxtprecio[]")[widlineadb].value = precio;
        calculaimporteins();
    }
    else
    {
        actulineadb('precio', widlineadb, precio);
    }
    
    
}








function muestrakbqwerty(fcampotexto) 
{
     
    document.getElementById("capa_fondonegro").style.display="inline";
    document.getElementById("tpv_tecladoqwerty").style.display="inline";
    var wtexto = document.getElementById(fcampotexto).value;
    document.getElementById("txttecladoqwerty").value = wtexto;  
    document.getElementById("kbdhnombrecampo").value = fcampotexto;
    
}

function cerrartecladoqwerty() 
{
        
    var precio = document.getElementById("txttecladoqwerty").value
    if (precio == '' ){precio = '0';}
    document.getElementById("txtteclado").value = precio;  
    
    document.getElementById("capa_fondonegro").style.display="none";
    document.getElementById("tpv_tecladoqwerty").style.display="none";
        
}

function kbrqwertydenviotecla(wtecla)
{
    var wteclado = document.getElementById("txttecladoqwerty").value;
    if(wtecla == "borrauno")       
    {
        wteclado = wteclado.substring(0,wteclado.length-1);
    }
    else
    {
        wteclado = wteclado + wtecla;     
    }
    
    document.getElementById("txttecladoqwerty").value = wteclado;

}

function activamayus() 
{
    document.getElementById("capa_mayus1").style.display="inline";
    document.getElementById("capa_minus1").style.display="none";
    document.getElementById("capa_mayus2").style.display="inline";
    document.getElementById("capa_minus2").style.display="none";
    document.getElementById("capa_mayus3").style.display="inline";
    document.getElementById("capa_minus3").style.display="none";
}

function desactivamayus() 
{
    document.getElementById("capa_mayus1").style.display="none";
    document.getElementById("capa_minus1").style.display="inline";
    document.getElementById("capa_mayus2").style.display="none";
    document.getElementById("capa_minus2").style.display="inline";
    document.getElementById("capa_mayus3").style.display="none";
    document.getElementById("capa_minus3").style.display="inline";
}

function aceptartecladoqwerty() 
{
    var wtexto = document.getElementById("txttecladoqwerty").value;
    var fcampotexto = document.getElementById("kbdhnombrecampo").value;
    
    document.getElementById(fcampotexto).value = wtexto;  
    cerrartecladoqwerty();
    
    if(fcampotexto == "txtbuscarproducto"){ buscaproductos();}
    
}