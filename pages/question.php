<?php/*
session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
	$bd=file_get_contents("../asset/json/base.json");
	$obj=json_decode($bd,false);
	$bd=file_get_contents("../asset/json/question.json");
	$tab=json_decode($bd,true);
	$bd=file_get_contents("../asset/json/nombre.json");
	$point=json_decode($bd,true);*/
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
					<form method="post">
						<button type="submit" name="jeux"> Demarrer</button>
					</form>
					<?php
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
					}

		if (isset($_SESSION['tab'])){
		?>
			<form method="post">
				<?php // permet de quitter le jeux ?>
				
			<table> 
			<?php
			if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($_SESSION['tab'])) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+1;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>1) {
						$debut=$_SESSION['fin']-2;
						$fin=$_SESSION['fin']-1;
					}else{
						$debut=0;
						$fin=1;
					}
			$_SESSION['j']=$debut+1;
			for ($i=$debut; $i <$fin ; $i++) {
				if ($i<count($_SESSION['tab'])) {
				?>
				<div class="affich_quest">
				<strong><p>Question <?php echo $_SESSION['j']."/".count($_SESSION['tab']).":<br>";?><?php echo "".$_SESSION['tab'][$i]['question']; ?> </p></strong>
				</div>
				<div style="float: right;width: 40px;height: 20px; background-color: rgb(242,242,242);text-align: center;margin-top: 5px">
					<?php echo $_SESSION['tab'][$i]['point']."pts" ?>
				</div>
				<?php
				echo "<br>";
				if($_SESSION['tab'][$i]['type']=="type checkbox"){
					$jj=0;
					foreach ($_SESSION['tab'][$i]['reponse'] as $key => $value) {
							echo '<input type="checkbox" name="reponse[]" value="'.$jj.'" style="border:2px solid rgb(57,221,214);">';
							echo '<input type="hidden" name="type" value="type checkbox">';
							echo '<input type="hidden" name="val[]" value="'.$value.'">';
							echo '<input type="hidden" name="point" value="'.$_SESSION['tab'][$i]['point'].'">';
							echo '<input type="hidden" name="quest" value="'.$_SESSION['tab'][$i]['question'].'">';
							echo $key; echo "<br>";
							$jj++;
					}	
				}else if($_SESSION['tab'][$i]['type']=="type radio"){
							$_SESSION['rep']=array();
							$j=0;
					foreach ($_SESSION['tab'][$i]['reponse'] as $key => $value) {
							echo '<input type="radio" name="reponse[]" value="'.$j.'" style="border:2px solid rgb(57,221,214);">';
							echo '<input type="hidden" name="type" value="type radio">';
							echo '<input type="hidden" name="val[]" value="'.$value.'">';
							echo '<input type="hidden" name="point" value="'.$_SESSION['tab'][$i]['point'].'">';
							echo '<input type="hidden" name="quest" value="'.$_SESSION['tab'][$i]['question'].'">';
							echo $key; echo "<br>" ;
							$j++;
					}
				}else if($_SESSION['tab'][$i]['type']=="type texte"){
					?>
					<input type="texte" style="width:200px" name="reponse">
					<input type="hidden" name="type" value="type texte">
					<?php echo '<input type="hidden" name="Bonn_rep" value="'.$_SESSION['tab'][$i]['reponse'].'">'; ?>
					<?php echo '<input type="hidden" name="point" value="'.$_SESSION['tab'][$i]['point'].'">'; ?>
					<?php echo '<input type="hidden" name="quest" value="'.$_SESSION['tab'][$i]['question'].'">';?>
					<?php
					echo "<br>";
				}
				// $_SESSION['quest']=$_SESSION['tab'][$i]['question'];

				$_SESSION['j']++;
				}
			}
			$_SESSION['fin']=$fin;
			
				if (isset($_POST['suivant']) OR $_SESSION['fin']>1) {
					echo "<button  name='precedent' style='float:left'> Precedent</button> ";
					
				}
				if ($_SESSION['fin']< count($_SESSION['tab'])) {
					echo "<button  name='suivant' style='float:right'> suivant</button> ";
				}
				if ($_SESSION['fin']== count($_SESSION['tab'])) {
					echo "<button  name='Terminer' style='float:right'> Terminer</button> ";
				}

			?>
		</table>
			</form>
		<?php
		}
		?>
		<?php
		//****************************************************
if (isset($_POST['suivant']) && isset($_POST['reponse'])) {
	if($_POST['type']=="type checkbox"){
		$_SESSION['k']=0;
		foreach ($_POST['val'] as $key => $value) {
			if ($value=="true") {
				$_SESSION['k']++;
			}
		}
		$_SESSION['f']=0;
		foreach ($_POST['val'] as $key => $value) {
			if ($value=="false" && in_array($key,$_POST['reponse'])) {
				$_SESSION['f']++;
			}
		}
		$_SESSION['ii']=1;
		foreach ($_POST['val'] as $key => $value) {
			if ($value=="true" && in_array($key,$_POST['reponse'])) {
				if ($_SESSION['ii']==$_SESSION['k'] && $_SESSION['f']==0) {
					$_SESSION['score'][$_POST['quest']]=$_POST['point'];
				}
				$_SESSION['ii']++;
			}else{
				
			}
		}
	}else if($_POST['type']=="type texte"){
		if ($_POST['reponse']==$_POST['Bonn_rep']) {
			$_SESSION['score'][$_POST['quest']]=$_POST['point'];
		}
	}else if ($_POST['type']=="type radio") {
		foreach ($_POST['reponse'] as $key1 => $value1) {
		foreach ($_POST['val'] as $key2 => $value2) {
			if ($value1==$key2 && $value2=='true') {
				$_SESSION['score'][$_POST['quest']]=$_POST['point'];
				break;
			}else{
				
			}
		}
	}
	}
}
//***********************************************************
if (isset($_POST['Terminer'])) {
	if($_POST['type']=="type checkbox"){
		if(isset($_POST['reponse'])){
		$_SESSION['k']=0;
		foreach ($_POST['val'] as $key => $value) {
			if ($value=="true") {
				$_SESSION['k']++;
			}
		}
		$_SESSION['f']=0;
		foreach ($_POST['val'] as $key => $value) {
			if ($value=="false" && in_array($key,$_POST['reponse'])) {
				$_SESSION['f']++;
			}
		}
		$_SESSION['ii']=1;
		foreach ($_POST['val'] as $key => $value) {
			if ($value=="true" && in_array($key,$_POST['reponse'])) {
				if (($_SESSION['ii']==$_SESSION['k']) && $_SESSION['f']==0) {
					$_SESSION['score'][$_POST['quest']]=$_POST['point'];
				}
				$_SESSION['ii']++;
			}else{
				
			}
		}
	}
	}else if($_POST['type']=="type texte"){
		if(isset($_POST['reponse'])){
		if ($_POST['reponse']==$_POST['Bonn_rep']) {
			$_SESSION['score'][$_POST['quest']]=$_POST['point'];
		}
		}
	}else if ($_POST['type']=="type radio") {
		if(isset($_POST['reponse'])){
		foreach ($_POST['reponse'] as $key1 => $value1) {
		foreach ($_POST['val'] as $key2 => $value2) {
			if ($value1==$key2 && $value2=='true') {
				$_SESSION['score'][$_POST['quest']]=$_POST['point'];
				break;
			}else{
				
			}
		}
	}
	}
	}
	$ST=0;
	foreach ($_SESSION['score'] as $key => $value) {
		$ST+=$value;
	}
	$_SESSION['ST']=$ST;
	echo "$ST";
	if ($_SESSION['ST']>$_SESSION['user']['score']){
			foreach ($obj as $key => $value)
			{
				if ($value->role=="joueur" AND $value->login==$_SESSION['user']['login'])
				{
					$value->score=$_SESSION['ST'];
					$obj = json_encode($obj,JSON_PRETTY_PRINT);
					file_put_contents('../asset/json/base.json',$obj);
				}
			}
			$_SESSION['user']['score']=$_SESSION['ST'];
		}
		header('location:resultat.php');
}
//*********************************************************
//*********************************************************
?>

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
			</div>
		</div>
	</div>
</body>
</htm5>

