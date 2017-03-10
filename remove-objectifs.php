<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		

 // Suppression


$id = !empty($_POST['id']) ? $_POST['id'] : NULL;

var_dump($id);

if (!empty($id)) { 
	$req=$bdd->prepare('DELETE FROM illdo WHERE ID = :idObjectif');
	$req->bindParam(':idObjectif', id);
	$req->execute();
	echo('supprimé');
} 
	else {
  die("il n'y a pas d'id en entrée :/");
}


exit(0);
