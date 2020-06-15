<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lister des Admins</title>
</head>
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
include("../connexion/connection_base.php");
$sql = "SELECT * FROM users ";
$rs = $db->query($sql);
$res = $rs->fetchAll(PDO::FETCH_OBJ);
?>
<?php include('comm.php') ?>
<style type="text/css">
	.Lj{
		background: linear-gradient( white, rgb(81,191,208));
	}
	.BLj{
		background-color:green;
	}
	.m2Lj{
				width: 20%;
				height: 43px;
				float: right;
				background-image: url('../asset/img/Icones/ic-liste-active.png');
				background-repeat: no-repeat;
				margin-top: 10px;
			}
</style>
		<div id="form">		
	<div class="questio">
  <form method="post">
  <table class="table" border="1">
    <tr class="thead">
        <th>NOM</th>
        <th>PRENOM</th>
        <th>Login</th>
        <th>ACTIONS</th>
	</tr>
	<?php foreach ($res as $re): ?>
        <tr>
            <td><?= $re->nom ?></td>
            <td><?= $re->prenom ?></td>
            <td><?= $re->login ?></td>
            <td>
                <a href="supprimerAdmin.php"><img style="width: 60px; height:30px ;margin-right:3px" src="../asset/img/edit.jpg"></a>
                <a href=""><img style="width: 60px; height:30px ;margin-right:3px" src="../asset/img/sup.jpg"></a>
            </td>
		</tr>
            <?php endforeach; ?>
	           </table>		
	            <?php
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