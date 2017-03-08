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

if (!empty($id)) { 
  $req=$bdd->prepare("DELETE FROM `illdo` WHERE id=:idObjectif");
  $req->bindParam(":idObjectif",$id);
  $req->execute();
} else {
  die("il n'y a pas d'id en entrée :/");
}


exit(0);
