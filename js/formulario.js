function calcularprecio(){
		var nombre_pedido = document.getElementById("nombre_pedido");
		var unidades = document.getElementById("unidades").value;
		var show = document.getElementById("precio");
		var visualizarp = document.getElementById("visualizarp");
		var articulo = "";
		var precio = "";
		var precio_final ="";
		
		
		for(i=0; i < nombre_pedido.options.length; i++){
			if(nombre_pedido.options[i].selected){
				articulo = nombre_pedido.options[i].text;
				precio = nombre_pedido.options[i].value;
				console.log(articulo);
				console.log(precio);
			}
		}
		precio_final = parseInt(unidades * precio);
		show.value = precio_final;
		visualizarp.value = articulo;
		console.log(precio_final);
	}
	
	function validartodo() {
		if(!validarnom()){
			return false;
		}
		if(!validarapellido()){
			return false;
		}
		if(!validarcorreo()){
			return false;
		}
		if(!validartel()){
			return false;
		}
		if(!validarpass()){
			return false;
		}
		if(!validarfecha()){
			return false;
		}
		if(!validarusuario()){
			return false;
		}
		return true;
	}

	function validarusuario(){
		var usuario = document.getElementById("usuario");
		var formusuario = /^[0-9a-zA-Z_.-]+$/;
		var longusuario = 4;

		if(usuario.value == ""){
                        alert("Debes de introducir un usuario.");
                        return false;
                }

                if(usuario.value.length < longusuario){
                        alert("El usuario no puede ser mejor a " + longusuario + " caracteres.");
                        return false;
                }
                if(!formusuario.test(usuario.value)){
                        alert("El usuario solo numeros, letras minusculas y mayusculas y [_.-].");
                        return false;
                }
                return true;
        }

	function validarfecha(){
		var texto = document.getElementById("valifecha");
		var texto1 = document.getElementById("veredad");
		var fecha_actual = new Date();
		var nacimiento = document.getElementById("fecha").value;
		var fecha_nacimiento = new Date(nacimiento);
		var diferencia = fecha_actual - fecha_nacimiento;
		if(!nacimiento){
			alert("Debes de introducir tu fecha de nacimiento.");
			return false;
		}
		var edad = Math.floor(diferencia / (1000 * 60 * 60 * 24 * 365));
		console.log("Tienes esta edad: " + edad);
		
		if(edad){
			texto.textContent = "Tienes " + edad + " años";
			texto1.value = edad;
			texto.style.color = "green";
			return true;
			}
	}
	function verpass(){
		var pass = document.getElementById("pass");
		if(pass.type == "password"){
			pass.type = "text";
		}else{
			pass.type = "password";
		}
	}
	
	function validarpass() {
		var contraseña = document.getElementById("pass").value;
		var formpass = /^[0-9a-zA-Z@#$%_.-]+$/;
		var longpass = 8;

		
		if(contraseña.length <= longpass){
			alert("La contraseña es demasiado corta debe de tener mas de " + longpass + " caracteres.");
			return false;
		}
		
		if(!formpass.test(contraseña.value)){
			alert("La contraseña debe solo puede contener numero ,letras y estos signos[@#$%_.-].");
			return false;
		}
		console.log("ok");
		return true;
	}
	
	function validarfortaleza(){
		var pass = document.getElementById("pass").value;
		var texto = document.getElementById("fortaleza");
		var fortaleza = 0;
		 console.log(fortaleza);
		if(/[0-9]/.test(pass)) fortaleza += 20;
		if(/[a-z]/.test(pass)) fortaleza += 20;
		if(/[A-Z]/.test(pass)) fortaleza += 20;
		if (/[@#$%_.-]/.test(pass)) fortaleza += 20;
		
		if(pass.length <= 8){
			texto.textContent = "Debe de tener mas de 8 caracteres.";
			texto.style.color= "red";
		}else {
			if(fortaleza >= 80){
				texto.textContent = "Muy Fuerte";
				texto.style.color = "green";
			}
			else if(fortaleza >= 60){
				texto.textContent = "Fuerte";
				texto.style.color = "Blue";
			}
			else if(fortaleza >= 40){
				texto.textContent = "Medio";
				texto.style.color = "orange";
			}
			else if(fortaleza >= 20){
				texto.textContent = "Debil";
				texto.style.color = "red";
			} 
		}
	}
	function validarnom(){
	var nombre = document.getElementById("nombre");
	var longnom = 45;
	var formanom = /^[a-zA-Z\s]+$/; 
	
		if(nombre.value == ""){
			alert("Debes de introducir un nombre.");
			return false;
		}
	
		if(nombre.value.length > longnom){
			alert("El nombre no puede contener mas de " + longnom + " caracteres.");
			return false;
		}
		if(!formanom.test(nombre.value)){
			alert("El nombre solo puede contener letras y espacios.");
			return false;
		}
		return true;
	}

	function validarapellido(){
		var apellido = document.getElementById("apellido");
		var longape = 45;
		var formape = /^[a-zA-Z\s]+$/; 
	
		if(apellido.value == ""){
			alert("Debes de introducir tus apellidos");
			return false;
		}
		if(!formape.test(apellido.value)){
			alert("El apellido solo puede contener letras y espacios");
			return false;
		}
	
		if(apellido.value.length > longape){
			alert("El apellido no puede tener una longitud superior a " + longape + " caracteres.");
			return false;
		}
		return true;
	}

	function validarcorreo(){
		var correo = document.getElementById("correo");
		var formacorr = /^[0-9a-zA-Z_.-]+@gmail\.(com|es)$/
	
		if(correo.value == ""){
			alert("Debes de introducir un correo.");
			return false;
		}
		if(!formacorr.test(correo.value)){
			alert("El formato del correo debe de ser ejemplo@gmail.com/es");
			return false;
		}
		return true;
	}	
	
	function validartel() {
		var telefono = document.getElementById("telefono");
		var formatelf = /^(6|7)[0-9]+$/;
		var longtelf = 9;
		
		if(telefono.value == ""){
			alert("Debes de introducir un numero de telefono");
			return false;
		}
		if(!formatelf.test(telefono.value)){
			alert("Formato no valido, debe de empezar por 6 o 7 y contener solo numeros.");
			return false;
		}
		
		if(telefono.value.length > longtelf || telefono.value.length < longtelf){
			alert("La longitud del telefono debe de ser de 9 digitos.");
			return false;
		}
		return true;
	}