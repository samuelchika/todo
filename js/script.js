function passCheck(){
	var pass = document.getElementById('password').value;
	var confirmPass = document.getElementById('confirm_password').value;

	if(pass == confirm_password){
		var yes = TRUE; 
	}else{
		var yes = FALSE;
		var text = document.getElementById($loginError);
		var error = "<div class=\"alert alert-danger\">";
			error += "<p class=\"text-center\" >Password Miss Match</p>";
			error += "</div>";
		text.innerHTML = error;
	}
	return yes;
}

				
			