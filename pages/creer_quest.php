<?php
  include_once "../connexion/connection.php";
  $conn=connect();
  $f="SELECT *FROM question";
  $exe=mysqli_query($conn,$f) or die (mysqli_error($conn));
  if(isset($_POST['gender'])){
	  extract($_POST);
  //ecriture de la requete sql
  $sql="INSERT INTO question(id)
  VALUES('$id')";
  //execution de la requete
  $exe1=mysqli_query($conn,$sql) or die (mysqli_error($conn));
  if($exe1==true){
  echo ("Insertion rèussite");
  }
  else{
  echo ("Insertion n'est pas valider");
  }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>page creation Question</title>
</head>
<link rel="stylesheet" type="text/css" href="../asset/css/style1.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/styleImg.css">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!---------  library for icon     -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<body>

<?php
/*session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}*/

session_start();
require ('../lib/password.php');
?>
<?php include('comm.php') ?>
			<div class="for">
				<div class="question">
					<form method="post" id="Myform">
						<strong><label style="margin-left: 2px"> Questions</label></strong>
						<textarea type="text" name="area" id="area"></textarea>
						<p><strong><label style="margin-left: 5px"> Nbre de Points </label></strong>
						<input class="input_quest A" type="number" name="NP" id="NP"></p>
						<p><strong><label style="margin-left: 2px"> Type de reponse </label></strong>
						<select name="choix" class="B" id="typeR" onclick="choix(this.value)">
							<option > votre choix </option>
							<option value="radio"> radio </option>
							<option value="checkbox"> checkbox </option>
							<option value="saisie"> saisie de texte </option>
						</select>
						<input type="button" value="+" style="width: 25px;height: 25px;position: absolute;margin-top: 0.5px;margin-left: 0px" onclick="add()"></p>
						<strong><span id="error" style="font-size: 13px"></span><br></strong>
						<button type="submit" name="valider" style="float: right;">Enregistrer</button>
						<div id="inputs">
							<div class="row" id="rep_0"></div>
							
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php include('fonction.php') ?>

<?php 
if (isset($_POST['valider']) && isset($_POST['rep']) && is_num($_POST['NP']) && isset($_POST['area'])) {
	if ($_POST['type']=="type texte") {
		$base1=array();
		$base1['id']=$_POST['area'];
		$base1['libelle']=$_POST['NP'];
		$base1['type']=$_POST['type'];
		$base1['nombre']=$_POST['rep'];
		?>
			<script type="text/javascript">
				alert('Question ajoutée avec succes');
			</script>
		<?php
		file_put_contents('../asset/json/question.json',$tab);
	}else if($_POST['type']!="type texte" && isset($_POST['check'])){
		if(isset($_POST['check'])){

			$recup=array();
			for ($i=0; $i <count($_POST['rep']) ; $i++) { 
				$recup[$_POST['ref'][$i]]=$_POST['rep'][$i];
			}
			
		$tabl=array();
		foreach ($recup as $key => $value) {
			if (in_array($key,$_POST['check'] )) {
				$tabl[$value]="true";
			}else{
				$tabl[$value]="false";
			}
		}
		// for ($i=0; $i <count($recup) ; $i++) { 
		// 		if (in_array($i+1,$_POST['check'] )) {
		// 			$tabl[$_POST['rep'][$i]]="true";
		// 		}else{
		// 			$tabl[$_POST['rep'][$i]]="false";
		// 		}
		// }
	$base1=array();
		$base1['id']=$_POST['area'];
		$base1['libelle']=$_POST['NP'];
		$base1['type']=$_POST['type'];
		$base1['nombre']=$tabl;
	}
	?>
		<script type="text/javascript">
			alert('Question ajoutée avec succes');
		</script>
	<?php
}else{
	?>
		<script type="text/javascript">
			alert('veillez selectionner au moins une reponse');
		</script>
	<?php
}

}else if(isset($_POST['valider']) && (empty($_POST['rep']) || empty($_POST['check']))){
	?>
	<script type="text/javascript">
		alert('veuilez ajouter au moins une Question');
	</script>
	<?php
}

?>
<script>
	function choix(element){
		if (element=='radio') {
			addradio();
		}else if(element=='checkbox'){
			addcheckbox();
		}else if(element=='saisie'){
			addtexte();
		}
		return choix;
	}

  	var rep = 0;
	function addradio(){
		rep++
		if (rep<=7) {
			var divInputs=document.getElementById('inputs');
			var newInput = document.createElement("div");
			newInput.setAttribute('class','row');
			newInput.setAttribute('id','rep_'+rep);
			newInput.innerHTML =`<label class="lab">Réponse `+rep+` </label> <input class="inputrep" type="text" name="rep[]" id="texte" required>
			<input type="radio" name="check[]" value="`+(rep)+`" id="simple" required><input type="hidden" name="type" value="type radio"><img src="../asset/img/Images/Icones/ic-supprimer.png" onclick="delet(${rep})"><input class="inputrep" type="hidden" name="ref[]" value="`+rep+`" id="texte" required>`;
			divInputs.appendChild(newInput);
		}
		
	}
	var rep = 0;
	function addcheckbox(){
		rep++
		if (rep<=10) {
			var divInputs=document.getElementById('inputs');
			var newInput = document.createElement("div");
			newInput.setAttribute('class','row');
			newInput.setAttribute('id','rep_'+rep);
			newInput.innerHTML =`<label class="lab">Réponse`+rep+` </label> <input class="inputrep" type="text" name="rep[]" id="texte" required>
			<input type="checkbox" name="check[]" value="`+(rep)+`" id="check"><input type="hidden" name="type" value="type checkbox"><img src="../asset/img/Images/Icones/ic-supprimer.png" onclick="delet(${rep})"><input class="inputrep" type="hidden" name="ref[]" value="`+rep+`" id="texte" required>`;
			divInputs.appendChild(newInput);
		}
		
	}
	var rep = 0;
	function addtexte(){
		rep++
		if (rep<=1) {
			var divInputs=document.getElementById('inputs');
			var newInput = document.createElement("div");
			newInput.setAttribute('class','row');
			newInput.setAttribute('id','rep_'+rep);
			newInput.innerHTML =`<label class="lab">Réponse `+rep+` </label> <input class="inputrep" type="text" name="rep" id="texte" required><input type="hidden" name="type" value="type texte"><img src="../asset/img/Images/Icones/ic-supprimer.png" onclick="delet(${rep})">`;
			divInputs.appendChild(newInput);
		}
		
	}
	function delet(n){
		var target=document.getElementById('rep_'+n);
		target.remove();

	}

	function add(){

		var type=document.getElementById("typeR");
		if (type.value=='checkbox') {
			return addcheckbox();
		}else if (type.value=='radio'){
			return addradio();
		}else if  (type.value=='saisie'){
			return addtexte();
		}
	}
</script>
<script type="text/javascript">
		let Myform = document.getElementById('Myform');
		 let myregex= /^[1-9]+$/;
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('area');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		let audio=new Audio('music.m4a');
		 		audio.play();
		 		e.preventDefault();
		 	}
		 });
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('NP');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		// let audio=new Audio('music.m4a');
		 		audio.play();
		 		e.preventDefault();
		 	}else if (myregex.test(Myinput.value) ==false) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "le nombre de point doit etre sup à 0";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		// let audio=new Audio('np.m4a');
		 		audio.play();
		 		e.preventDefault();
		 	}
		 });
</script>
	
</body>
</html>