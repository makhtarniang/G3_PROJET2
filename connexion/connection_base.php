<?php
try {
    $dsn = 'mysql:host=localhost;dbname=miniprojet_qcm_quizz_sa';
    $username = 'root';
    $password = "";
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $db = new PDO($dsn, $username, $password, $options);
}
catch (Exception $e) {
    die("Erreur : ".$e->getMessage());
}
?>
<?php
/*base de données alwaysdata*//*
try {
    $dsn = 'mysql:host=mysql-nfd.alwaysdata.net;dbname=miniprojet_qcm_quizz_sa';
   $username = 'makhtar';
    $password = "niang";
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $db = new PDO($dsn, $username, $password, $options);
}
catch (Exception $e) {
    die("Erreur : ".$e->getMessage());
}*/
?>
