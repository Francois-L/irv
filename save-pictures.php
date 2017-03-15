<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$sendPicture = !empty($_POST['sendPicture']) ? $_POST['sendPicture'] : NULL;



 //Ton traitement de tri
if(!empty($_POST['sendPicture']) and !empty($_POST['sendDate'])) {
	$req = $bdd->prepare("INSERT INTO illdo(image) VALUES('$sendPicture')");
	$req ->execute(array ($_POST['sendPicture']));
}
else {
  die("il n'y a pas d'image en entrée :/");
}

exit(0);
