var nuevapantalla;

function cambiopantalla(tiempo, dirurl) 
{
  
  tiempo = tiempo * 1000;
  
  nuevapantalla = dirurl;
  
  setTimeout("prcesocambiopantalla()", tiempo);
  
  
  
}

function prcesocambiopantalla(dirurl) 
{
	window.location.replace(nuevapantalla);
}