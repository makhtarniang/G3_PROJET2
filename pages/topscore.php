<!DOCTYPE html>
<html>
<head>
	<title>top score</title>
</head>
<body>
	<?php
include("../connexion/connection_base.php");
$sql = "SELECT * FROM joueur";
$rs = $db->query($sql);
$res = $rs->fetchAll(PDO::FETCH_OBJ);

// Obtient une liste de colonnes
foreach ($contenu as $key => $row) {
    $score[$key]  = $row['score'];
}

// Tri les données par score décroissant, 
// Ajoute $contenu en tant que premier paramètre, pour trier par la clé commune
array_multisort($score, SORT_DESC,$contenu);
	?>
<table>				
	<tr>
	<?php
	for ($i=0; $i < 5 ; $i++) { 
		if ($contenu[$i]['role']=="joueur") {
	?>
			<td><?php echo $contenu[$i]['prenom'];?></td>
			<td><?php echo $contenu[$i]['nom'];?></td>
			<td><?php echo $contenu[$i]['score']." pts ";?></td>
	</tr>
	<?php
		}
	}
	?>			
	</table>

</body>
</html>