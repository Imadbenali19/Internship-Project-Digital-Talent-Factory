var vername=/^[A-Z a-z-éçàèâ' ]{3,100}$/;
var verpassword=/^[a-zA-Z0-9?.@-_]{3,}$/;

function validNom(){
	if(!vername.test(document.getElementById("name").value)){
		event.preventDefault();
		document.getElementById("s1").innerHTML="Nom non valide!";
		document.getElementById("s1").style.color="red";
	}else{
		document.getElementById("s1").innerHTML="Nom valide!";
		document.getElementById("s1").style.color="green";
	}
}

function validPassword(){
	if(!verpassword.test(document.getElementById("password").value)){
		event.preventDefault();
		document.getElementById("s2").innerHTML="Mot de passe non valide!";
		document.getElementById("s2").style.color="red";
	}else{
		document.getElementById("s2").innerHTML="Mot de passe valide!";
		document.getElementById("s2").style.color="green";
	}
}

function validConfPassword(){
	if(document.getElementById("password").value!=document.getElementById("confirmation").value || document.getElementById("confirmation").value=="" ){
		event.preventDefault();
		document.getElementById("s3").innerHTML="Mots de passe différents!";
		document.getElementById("s3").style.color="red";
	}else{
		document.getElementById("s3").innerHTML="Mots de passe pareils!";
		document.getElementById("s3").style.color="green";
	}
}

function valid(){
	validNom();
	validPassword();
    validConfPassword();
}