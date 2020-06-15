<?php
define("ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW",5);

function getDb(){
	$c = mysqli_connect('localhost','root','','miniprojet_qcm_quizz_sa') or die(mysqli_error($c));
	return $c;
}