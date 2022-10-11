function muestra_tab_subirarchivo() 
{
	document.getElementById('tab-subirarchivo').style.display = 'inline';
	document.getElementById('tab-buscararchivo').style.display = 'none';
		
    document.getElementById('btn_tab_subirarchivo').className = 'btn_tab_sel';
    document.getElementById('btn_tab_buscararchivo').className = 'btn_tab';

    document.getElementById('hficheroone').value = 'uploadfile';
    
}

function muestra_tab_buscararchivo() 
{
	document.getElementById('tab-subirarchivo').style.display = 'none';
	document.getElementById('tab-buscararchivo').style.display = 'inline';   
	
    document.getElementById('btn_tab_subirarchivo').className = 'btn_tab';
    document.getElementById('btn_tab_buscararchivo').className = 'btn_tab_sel';
    
    document.getElementById('hficheroone').value = 'searchfile';

}


function buscarfichero() 
{

    var sbuscarpor = document.getElementById("lstbuscarporfichero").value;
    var stextobuscar = document.getElementById("txtbuscarfichero").value;
    
    var slstcampoordenarfchr = document.getElementById("lstcampoordenarfchr").value;
    var slstordenfchr = document.getElementById("lstordenfchr").value;
        

    $.ajax({

    type   : 'POST',
    url     : "modules/ficheros/ajax/ajx_one_fichero.php",
    data    : {buscarpor : sbuscarpor, textobuscar : stextobuscar, srhcampo : slstcampoordenarfchr, srhorden : slstordenfchr},

    success : function (resultado) {

    // response = respuesta del servidor.
    response = JSON.parse(resultado);

    var rsficheros = response["rsf"];
    
    document.getElementById('divrsficheros').innerHTML = rsficheros;	
            
    }

    });
    
        
}