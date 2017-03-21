<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$sendObjectif = !empty($_POST['sendObjectif']) ? $_POST['sendObjectif'] : NULL;

$sendDate = !empty($_POST['sendDate']) ? $_POST['sendDate'] : NULL;


 //Ton traitement de tri
if(!empty($_POST['sendObjectif']) and !empty($_POST['sendDate'])) {
	$query = "INSERT INTO illdo(objectif, date) VALUES('$sendObjectif', '$sendDate')";
	$req = $bdd->prepare($query);
	$req ->execute(array ($_POST['sendObjectif'], $_POST['sendDate']));

	// Retourner l'identifiant du nouvel objectif en base de donnée
    $output = [
		'id' => $bdd->lastInsertId()
	];
	// Le retourner en JSON
	echo json_encode($output);
	
}


exit(0);
