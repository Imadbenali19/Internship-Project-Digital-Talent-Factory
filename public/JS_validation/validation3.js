var vername=/^[A-Z a-z-éçàèâ' ]{3,150}$/;
var verdesc=/^[A-Z a-z-éçàèâî'"’,\(\)\.\.\. ]{3,}$/;

function validNom(){
	if(!vername.test(document.getElementById("NomSpec").value)){
		event.preventDefault();
		document.getElementById("s1").innerHTML="Nom non valide!";
		document.getElementById("s1").style.color="red";
	}else{
		document.getElementById("s1").innerHTML="Nom valide!";
		document.getElementById("s1").style.color="green";
	}
}

function validSpecialite(){
	if(!verdesc.test(document.getElementById("DescriptionSpec").value) && document.getElementById("DescriptionSpec").value!=""){
		event.preventDefault();
        document.getElementById("s2").innerHTML="Description non valide!";
		document.getElementById("s2").style.color="red";
	}else if(document.getElementById("DescriptionSpec").value==""){
		document.getElementById("s2").innerHTML="Description non saisie!";
		document.getElementById("s2").style.color="yellow";
	}else{
		document.getElementById("s2").innerHTML="Description valide!";
		document.getElementById("s2").style.color="green";
	}
}

function valid(){
	validNom();
	validSpecialite();
}