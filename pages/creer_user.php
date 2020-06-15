<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> creation usesr </title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style1.css">
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
</head>
<body>
	<div class="contener">
		<div class="haut">
			<div> <img class="img1" src="../asset/img/Images/logo-QuizzSA.png"></div>
			<div> <center><h2 class="text1"> Binvenue sur la page d'inscription Admin</h2> </center></div>
		</div>
		<div class="form_joueur">
			<div class="form_joueur1">
				<strong style="margin-left: 2vw"> S'INSCRIRE</strong><br>
				<h5 style="margin-left: 2vw;margin-top: 0vw;opacity: 0.5;font-size: 10px" >Pour tester votre niveau de culture générale</h5>
				<div class="inscrire1">
				<form method="post" enctype="multipart/form-data" id="Myform">
					<strong><span id="error" style="font-size: 13px"></span><br></strong>
					<label class="label" for="prenom">Prenom</label>
					<p><input type="text" name="prenom" id="prenom"></p><br>
					<label class="label" for="nom">Nom</label>
					<p><input type="text" name="nom" id="nom"></p><br>
					<label class="label" for="login">Login</label>
					<p><input type="text" name="username" id="username"></p><br>
					<label class="label" for="password">Password</label>
					<p><input type="password" name="password" id="password" style="border:3px solid rgb(178,227,234);"></p><br>
					<label class="label" for="conf">Confirmer Password</label>
					<p><input type="password" name="Confirmer" id="conf" style="border:3px solid rgb(178,227,234);"></p><br>
					<label class="label">Avatar</label>
					<input style="width: 7vw;border:2px solid rgb(178,227,234)" type="file" id="photo" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
					<input type="hidden" name="role" value="joueur">
					<input type="hidden" name="score" value=0>
					<button type="submit" name="register" value="Register">Cr&eacute;er compte</button>
				</form>
			</div>
		</div>
		<div class="form_joueur2">
			<div style="width: 100%;height: 130px">
				<div class="image_joueur">
						<img id="blah"  width="120" height="120" style="border-radius:50%"/>
					</div>
			</div>
		</div>
		</div>
	</div>
	<?php
#	include('scripte!.php');
if (isset($_POST['valid'])) {
	$n=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
	for ($i=0; $i <count($contenu) ; $i++) { 
		if ($_POST['login']==$contenu[$i]['login']) {
			
			exit;
		}
	}
	if ($n=="jpg" || $n=="png"|| $n=="jpeg") {
		inscription();
	}else{
		?>
			<center><h2>extension non valide !</h2></center>
		<?php
	}
}
?>

<script src="pages/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>
<?php

//register.php

/**
 * Demarer une session.
 */
#session_start();
/**
 * Inclure la librairie de verification et cryptage de mot de pass.
 */
require '../lib/password.php';
/**
 * Inclure le fichier de connection MYSQL.
 */
require '../connexion/connection_base.php';
// verifiez le click sur le bouton
if(isset($_POST['register'])){
    //Recupération des valeurs des champs saisie
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $prenom = !empty($_POST['prenom']) ? trim($_POST['prenom']) : null;
    $nom = !empty($_POST['nom']) ? trim($_POST['nom']) : null;
    $role = 'user';
    //Construction de la requete préparée pour verifier si le login est deja utilisé ou pas.
    $sql = "SELECT COUNT(login) AS num FROM users WHERE login = :username";
    $stmt = $db->prepare($sql);

    //Binder(remplacer) les parametres par leur valeurs.
    $stmt->bindValue(':username', $username);

    //Executer la requete.
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

     //Verifier si le username est deja utilisé.
    if($row['num'] > 0){
		die('Cet user existe déja!');
		
    }

    //Hasher le mot de passe grace à notre librairie avant de l'enregistrer.
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

    //Preparer notre requete d'insertion
    $sql = "INSERT INTO users (prenom, nom, login, password, role) VALUES (:prenom, :nom, :username, :password, :role)";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':prenom', $prenom);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':role', $role);

    $result = $stmt->execute();
    if($result){
        // Rediriger l'utilisateur apres son inscription
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = time();
        header('location:liste_Admin.php');
    }

}

?>