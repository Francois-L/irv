<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		


session_start();



$send1 = !empty($_POST['send1']) ? $_POST['send1'] : NULL;
$send2 = !empty($_POST['send2']) ? $_POST['send2'] : NULL;

 //Ton traitement de tri
if(!empty($_POST['send1']) and !empty($_POST['send2'])) {
	$req = $bdd->prepare("INSERT INTO illdo(objectif, date) VALUES('$send1', '$send2')");
	$req ->execute(array ($_POST['send1'], $_POST['send2']));
}

exit(0);
