<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
include("../connexion/connection_base.php");
$sql = "SELECT * FROM joueur";
$rs = $db->query($sql);
$res = $rs->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title> liste questions </title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style2.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="contener">
		<div class="haut">
			<div> <img class="img1" src="../asset/img/Images/logo-QuizzSA.png"></div>
			<div> <center><h2 class="text1"> Le plaisir de jouer</h2> </center></div>
		</div>
		<div class="bande">
			<div class="roundeImage">
						<img style=" width: 60px;height: 60px;border-radius: 50%;"src="../asset/img/<?php echo $_SESSION['user']['image'] ?>">
						<?php echo $_SESSION['user']['prenom'] ?><?php echo $_SESSION['user']['nom'] ?>
					</div>
			<div><center><h4 class="text2">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>JOUER ET TESTER VOTRE NIVEAU DE<br>CULTURE G&Eacute;N&Eacute;RALE</h4> </center> </div>
			<div class="logout"><button><a href="logout.php" onclick="return(confirm('voulez vous deconnecter?'));"> Deconnexion</a></button></div>
		</div>
		<div class="form">
			<div class="form_cont">
			<div class="form_cont1">
				<div class="affich_result">
					<?php echo "Votre score final est de ".$_SESSION['ST']." pts";?>
				</div>
				<div>
					<?php
					$tabb=array();
					$tabVrai=array();
					$tabFaux=array();
					// Recuperer toutes les questions dont les reponses sont bonnes 
					foreach ($_SESSION['score'] as $key => $value) {
						array_push($tabb, $key);
					}
					// Si la question se trouve dans $tabb, je le mets dans $tabVrai sinon dans $tabFaux;
					foreach ($_SESSION['tab'] as $key => $value) {
						if (in_array($value['question'], $tabb)) {
							array_push($tabVrai, $value['question']);
						}else{
							array_push($tabFaux, $value['question']);
						}
					}
					?>
					<table>
						<td> Questions</td>
						<td> Reponses</td>
						<td> Corrections</td>
						<?php
					foreach ($_SESSION['tab'] as $key => $value) {
						?>
						<tr>
						<?php
						if (in_array($value['question'], $tabVrai)) {
							?>
							<td style="width: 140px"> <?php echo $value['question'] ?></td>
							<td style="background-color: green"> correcte</td>
							<td>
								<?php
								if ($value['type']=="type texte") {
									echo $value['reponse'];
								}else if($value['type']=="type radio"){
									foreach ($value['reponse'] as $key => $value) {
										if($value=="true"){
											echo '<input type="radio" checked="checked">';
											echo $key;
											echo "<br>";
										}else{
											echo '<input type="radio">';
											echo $key;
											echo "<br>";
										}
									}
								}else if($value['type']=="type checkbox"){
									foreach ($value['reponse'] as $key => $value) {
										if($value=="true"){
											echo '<input type="checkbox" class="ch" checked="checked">';
											echo $key;
											echo "<br>";
										}else{
											echo '<input type="checkbox" class="ch">';
											echo $key;
											echo "<br>";
										}
									}
								}
								?>
							</td>
							<?php
						}else{
							?>
							<td style="width: 140px"> <?php echo $value['question'] ?></td>
							<td style="background-color: red"> mauvaise</td>
							<td style="background-color: green;width: 120px">
								<?php
								if ($value['type']=="type texte") {
									echo $value['reponse'];
								}else if($value['type']=="type radio"){
									foreach ($value['reponse'] as $key => $value) {
										if($value=="true"){
											echo '<input type="radio" checked="checked">';
											echo $key;
											echo "<br>";
										}else{
											echo '<input type="radio">';
											echo $key;
											echo "<br>";
										}
									}
								}else if($value['type']=="type checkbox"){
									foreach ($value['reponse'] as $key => $value) {
										if($value=="true"){
											echo '<input type="checkbox" class="ch" checked="checked">';
											echo $key;
											echo "<br>";
										}else{
											echo '<input type="checkbox" class="ch">';
											echo $key;
											echo "<br>";
										}
									}
								}
								?>
							</td>
							<?php
						}
						?>
						</tr>
						<?php
					}
					?>
					</table>
				</div>
			</div>
			<div class="form_cont2">
               	<div><a class="topscore" href="?page=topscore"> Top score </a></div>
                <div><a class="ombre" href="?page=scorej"> meilleur score </a></div>
            </ul>
                <?php
        if (isset($_GET['page'])) {
            include($_GET['page'].'.php');
        }
        else{
            include("topscore.php");
        } 
        ?>
			</div>
			<div>
				<form method="post">
					<button type="submit" name="jeux" style="margin-top: 10px;position: relative;height: 25px"> Rejouer</button>
				</form>
				<?php /*
					if (isset($_POST['jeux'])) {
						$_SESSION['tab']=array();
						$_SESSION['score']=array();
						for($i=0;count($_SESSION['tab'])<$point['pointFixe'];$i++) {
							$r=$tab[mt_rand(0,count($tab)-1)];
							if(in_array($r, $_SESSION['tab'])){
							}else{
								array_push($_SESSION['tab'], $r);
							}
						}
						header('location:interface_joueur.php');
					}*/
				?>
			</div>
			</div>
		</div>
	</div>
</body>
</htm5>

