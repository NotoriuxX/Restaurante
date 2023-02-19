function login(){
	var ema, pass
	
	ema = document.getElementById("correo").value;
	pass = document.getElementById("contraseña").value;

	if(ema == "goku777@gmail.com" && pass == "sayajin"){

		window.location= "Tienda.php";

	}
	else if (ema == "carlitos@gmail.com" && pass == "123"){
		window.location= "ListarRegistros.html";
	}else{
		ValidarCorreo(ema);
        ValidarContraseña(pass);
	}
    
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function ValidarCorreo(casilla){
    //var valor = $("#"+casilla).val();
    if(validateEmail(casilla) == true){
        alert("Cumple con un correo");
    }else{
        alert("No cumple con un correo");
    }
}

function ValidarContraseña(casilla){
    //var valor = $("#"+casilla).val();
    if(casilla.length >= 3){
        alert("La casilla cumple con los caracteres mínimos");
    }else{
        alert("Se debe tener minimo 3 caracteres");
    }
}


