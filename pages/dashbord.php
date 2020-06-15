<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
$bd=file_get_contents("../asset/json/question.json");
$tab=json_decode($bd,true);
?>
<?php include('comm.php') ?>

<!-- <style type="text/css">
			.ch{
				border:2px solid green;
			}
			.Lq{
				background: linear-gradient( white, rgb(81,191,208));
			}
			.BLq{
				background-color: green;
			}
			.m2Lq{
				width: 20%;
				height: 43px;
				float: right;
				background-image: url('../asset/img/Icones/ic-liste-active.png');
				background-repeat: no-repeat;
				margin-top: 10px;
			}

		</style> -->
<div class="form2">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="doughnut-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("doughnut-chart"), {
 type: 'doughnut',
  data: { 
  labels: ["Africa", "Asia", "Europe", "Latin America", "North America"], 
  datasets: [ 
  { label: "Population (millions)", 
  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"], 
  data: [2478,5267,734,784,433] 
	} 
		] 
			}, 
			options: 
			{ title: 
				{ display: true, 
					text: 'Predicted world population (millions) in 2050' 
				} 
			} 
		});
</script>
</div>

</body>
</html>
