var vername=/^[A-Z a-z-éçàèâ' ]{3,80}$/;
var vertel=/^(06|07)[0-9]{8}$/;
var verlinkedIn=/^[a-zA-Z0-9-/,éçâàè ]{3,}$/;
var verdate=/^(20)(([1-9]{2})|([2-9]{1}[0]))$/;

function validNom(){
	if(!vername.test(document.getElementById("NomEtud").value)){
		event.preventDefault();
		document.getElementById("s1").innerHTML="Nom non valide!";
		document.getElementById("s1").style.color="red";
	}else{
		document.getElementById("s1").innerHTML="Nom valide!";
		document.getElementById("s1").style.color="green";
	}
}

function validPrenom(){
	if(!vername.test(document.getElementById("PrenomEtud").value)){
		event.preventDefault();
		document.getElementById("s2").innerHTML="Prenom non valide!";
		document.getElementById("s2").style.color="red";
	}else{
		document.getElementById("s2").innerHTML="Prenom valide!";
		document.getElementById("s2").style.color="green";
	}
}

function validTel(){
	if(!vertel.test(document.getElementById("TelEtud").value)){
		event.preventDefault();
        document.getElementById("s3").innerHTML="N° Tel non valide!";
		document.getElementById("s3").style.color="red";
	}else{
		document.getElementById("s3").innerHTML="N° Tel valide!";
		document.getElementById("s3").style.color="green";
	}
}

function validLinkedIn(){
	if(!verlinkedIn.test(document.getElementById("LinkedInEtud").value) && document.getElementById("LinkedInEtud").value!=""){
		event.preventDefault();
        document.getElementById("s4").innerHTML="LinkedIn non valide!";
		document.getElementById("s4").style.color="red";
	}else if(document.getElementById("LinkedInEtud").value==""){
		document.getElementById("s4").innerHTML="LinkedIn non saisi!";
		document.getElementById("s4").style.color="yellow";
	}else{
		document.getElementById("s4").innerHTML="LinkedIn valide!";
		document.getElementById("s4").style.color="green";
	}
}

function validDate(){
	if(!verdate.test(document.getElementById("AnneeDeGraduationEtud").value)){
		event.preventDefault();
		document.getElementById("s5").innerHTML="Date non valide!";
		document.getElementById("s5").style.color="red";
	}else{
		document.getElementById("s5").innerHTML="Date valide!";
		document.getElementById("s5").style.color="green";
	}
}


function valid(){
	validNom();
	validPrenom();
    validTel();
    validLinkedIn();
	validDate();
}