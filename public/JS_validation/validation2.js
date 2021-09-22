var vername=/^[A-Z a-z-éçàèâ'\(\) ]{3,100}$/;
var vertel=/^(05|06|07)[0-9]{8}$/;
var veradr=/^[a-zA-Z0-9-,éçàèâ' ]{2,}$/;
var verville=/^[a-zA-Zéçàè' ]{2,}$/;
var verlinkedIn=/^[a-zA-Z0-9-/,éçàèâ' ]{3,}$/;
var verwebsite=/^(www\.)[a-zA-Z0-9-éçàâè/\.']{3,}(\.[a-z]{1,})$/;

function validNom(){
	if(!vername.test(document.getElementById("NomEcole").value)){
		event.preventDefault();
		document.getElementById("s1").innerHTML="Nom non valide!";
		document.getElementById("s1").style.color="red";
	}else{
		document.getElementById("s1").innerHTML="Nom valide!";
		document.getElementById("s1").style.color="green";
	}
}

function validAdresse(){
	if(!veradr.test(document.getElementById("AdresseEcole").value)){
		event.preventDefault();
        document.getElementById("s2").innerHTML="Adresse non valide!";
		document.getElementById("s2").style.color="red";
	}else{
		document.getElementById("s2").innerHTML="Adresse valide!";
		document.getElementById("s2").style.color="green";
	}
}

function validVille(){
    if(!verville.test(document.getElementById("VilleEcole").value)){
		event.preventDefault();
        document.getElementById("s3").innerHTML="Ville non valide!";
		document.getElementById("s3").style.color="red";
	}else{
		document.getElementById("s3").innerHTML="Ville valide!";
		document.getElementById("s3").style.color="green";
	}
}

function validTel(){
	if(!vertel.test(document.getElementById("TelEcole").value)){
		event.preventDefault();
        document.getElementById("s4").innerHTML="N° Tel non valide!";
		document.getElementById("s4").style.color="red";
	}else{
		document.getElementById("s4").innerHTML="N° Tel valide!";
		document.getElementById("s4").style.color="green";
	}
}

function validLinkedIn(){
	if(!verlinkedIn.test(document.getElementById("LinkedInEcole").value) && document.getElementById("LinkedInEcole").value!=""){
		event.preventDefault();
        document.getElementById("s5").innerHTML="LinkedIn non valide!";
		document.getElementById("s5").style.color="red";
	}else if(document.getElementById("LinkedInEcole").value==""){
		document.getElementById("s5").innerHTML="LinkedIn non saisi!";
		document.getElementById("s5").style.color="yellow";
	}else{
		document.getElementById("s5").innerHTML="LinkedIn valide!";
		document.getElementById("s5").style.color="green";
	}
}

function validSiteWeb(){
	if(!verwebsite.test(document.getElementById("SiteWebEcole").value) && document.getElementById("SiteWebEcole").value!=""){
		event.preventDefault();
        document.getElementById("s6").innerHTML="Site Web non valide!";
		document.getElementById("s6").style.color="red";
	}else if(document.getElementById("SiteWebEcole").value==""){
		document.getElementById("s6").innerHTML="Site Web non saisi!";
		document.getElementById("s6").style.color="yellow";
	}else{
		document.getElementById("s6").innerHTML="Site Web valide!";
		document.getElementById("s6").style.color="green";
	}
}



function valid(){
	validNom();
	validAdresse();
    validVille();
    validTel();
    validLinkedIn();
    validSiteWeb();
}