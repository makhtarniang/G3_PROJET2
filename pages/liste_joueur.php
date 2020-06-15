<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lister des jouers</title>
</head>
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<body>
<?php
include("../connexion/connection_base.php");
$sql = "SELECT * FROM joueur";
$rs = $db->query($sql);
$res = $rs->fetchAll(PDO::FETCH_OBJ);
?>
<?php include('comm.php') ?>

		<div id="form">		
		<div class="centre"><h2>LISTE DES JOUEUR</h2></div>
	<div class="questio">
  <form method="post">
  <table class="table" border="1">
    <tr class="thead">
        <th>NOM</th>
        <th>PRENOM</th>
        <th>SCORE</th>
        <th>ACTIONS</th>
	</tr>
	<?php foreach ($res as $re): ?>
        <tr>
            <td><?= $re->nom ?></td>
            <td><?= $re->prenom ?></td>
            <td><?= $re->score ?></td>
            <td>
                <a href=""><img style="width: 60px; height:30px ;margin-right:3px" src="../asset/img/edit.jpg"></a>
                <a href="supprimer_joueur.php"><img style="width: 60px; height:30px ;margin-right:3px" src="../asset/img/sup.jpg"></a>
            </td>
		</tr>
            <?php endforeach; ?>
	           </table>		
	            <?php
					//Recuperation des joueur dans un tableau new
				/*	$new=array();
					for ($i=0; $i < count($contenu) ; $i++) { 
						if ($contenu[$i]['role']=="joueur") {
							array_push($new, $contenu[$i]);
						}
					}*/
					if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($new)) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+13;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>13) {
						$debut=$_SESSION['fin']-26;
						$fin=$_SESSION['fin']-13;
					}else{
						$debut=0;
						$fin=13;
					}
					
					$_SESSION['fin']=$fin;
						?>	
					</table>
				</div>
				<?php
				if (isset($_POST['suivant']) OR $_SESSION['fin']>=25) {
					echo "<button  name='precedent'> Precedent</button> ";
				}
				?>
				<?php
				$new=0;
				if ($_SESSION['fin']< count($new)) {
					echo "<button class='bttn' name='suivant' style='float:right'> suivant</button> ";
				}
				?>
				</form>
			</div>
		</div>
	</div>
	</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>