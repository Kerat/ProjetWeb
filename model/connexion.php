<?php
$host = "localhost";
$user = "root";
$bdd = "projetWeb";// le nom de votre base de données
$passwd = "";

$co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");


mysqli_set_charset($co,'utf8');
mysqli_query($co,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
?>