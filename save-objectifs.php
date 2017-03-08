<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


$sendObjectif = !empty($_POST['sendObjectif']) ? $_POST['sendObjectif'] : NULL;
$sendDate = !empty($_POST['sendDate']) ? $_POST['sendDate'] : NULL;

 //Ton traitement de tri
if(!empty($_POST['sendObjectif']) and !empty($_POST['sendDate'])) {
	$req = $bdd->prepare("INSERT INTO illdo(objectif, date) VALUES('$sendObjectif', '$sendDate')");
	$req ->execute(array ($_POST['sendObjectif'], $_POST['sendDate']));
}


exit(0);
