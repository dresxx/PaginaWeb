	function verpass(){
		var pass = document.getElementById("contrasena");
		if(pass.type == "password"){
			pass.type = "text";
		}else{
			pass.type = "password";
		}
	}
