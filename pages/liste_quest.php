<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des Questions</title>
</head>
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
</body>
</html>
<?php include('comm.php'); ?>
<?php
include("../connexion/connection_base.php");
$sql = "SELECT * FROM question";
$rs = $db->query($sql);
$res = $rs->fetchAll(PDO::FETCH_OBJ);
?>
<div class="form2">
	<form method="post" id="Myform">
		<label>Nbre de question/Jeu</label><input type="text" name="Nqu" id="Nqu" value="<?php echo $point['nombre']; ?>">
		<input type="submit" style="background-color: rgb(94,145,176);color: white "name="val" value="OK"><br>
	</form>
		<div class="question">
			<form method="post">
				
				<table>
			 <table class="table">
			 <tr class="thead">
				 <th>N</th>
				 <th>QUESTIONS</th>
				 <th>DATE</th>
				 <th>ACTIONS</th>
			 </tr>
			 <?php foreach ($res as $re): ?>
				 <tr>
					 <td><?= $re->id ?></td>
					 <td><?= $re->libelle ?></td>
					 <td><?= $re->date ?></td>
					 <td>
					 <a href=""><img style="width: 60px; height:30px ;margin-right:3px" src="../asset/img/edit.jpg"></a>
                <a href="supprimer_joueur.php"><img style="width: 60px; height:30px ;margin-right:3px" src="../asset/img/sup.jpg"></a>
					 </td>
				 </tr>
					 <?php endforeach; ?>
						</table>
						<?php	
		     	if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($tab)) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+5;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>5) {
						$debut=$_SESSION['fin']-10;
						$fin=$_SESSION['fin']-5;
					}else{
						$debut=0;
						$fin=5;
					}
			$tab=1;
			$_SESSION['fin']=$fin;
				if (isset($_POST['suivant']) OR $_SESSION['fin']>=9) {
					echo "<button  name='precedent' style='float:left;margin-left:-0vw;'> Precedent</button> ";
				}
				?>
				<?php
				if ($_SESSION['fin']< count($tab)) {
					echo "<button class='bttn' name='suivant' style='float:right;margin-top:1.7vw'> suivant</button> ";
				}
			?>
		</table>
			</form>
		</div>
		<strong><span id="error" style="font-size: 13px"></span><br></strong>
	</div>
</div>
</div>
<script type="text/javascript">
		let Myform = document.getElementById('Myform');
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('Nqu');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Champ obligatoires!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}else if (Myinput.value<5) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "le nombre de point doit etre sup ou egale à 5";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}else if(Myinput.value>$bd.lenght ){
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "le nombre de point doit etre sup ou egale à 5";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
				 e.preventDefault();
				 
		 	}
		 });
</script>
<script src="pages/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>