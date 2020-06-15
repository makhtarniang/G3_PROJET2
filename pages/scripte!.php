<!DOCTYPE html>
<html>
<head>
	<title> scripte</title>
</head>
<body>

<script type="text/javascript">
		 let Myform = document.getElementById('Myform');
		 let myregex= /^[a-zA-Z-\s]+$/;
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('prenom');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}else if (myregex.test(Myinput.value) ==false) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "prenom invalide";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}
		 });

		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('nom');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}else if (myregex.test(Myinput.value) ==false) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "nom invalide";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();

		 	}
		 });

		 Myform.addEventListener('submit', function(e) {
		 	let Myinput1 = document.getElementById('password');
		 	if (Myinput1.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}
		 });

		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('conf');
		 	let Myinput1 = document.getElementById('password');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}else if (Myinput1.value!=Myinput.value) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "les deux password sont differents";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}
		 });

		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('login');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}
		 });
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('photo');
		 	if (Myinput.value == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "veuillez choisir une photo";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}
		 });
	</script>
	
</body>
</html>