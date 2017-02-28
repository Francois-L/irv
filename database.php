<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		

?>
<?php 
session_start();



$send1 = !empty($_POST['send1']) ? $_POST['send1'] : NULL;
$send2 = !empty($_POST['send2']) ? $_POST['send2'] : NULL;
 
//Ton traitement de tri

$req = $bdd->prepare("INSERT INTO illdo(objectif) VALUES('$send1')");
$req ->execute(array($_POST['send1']));

?>

 <?php                                                     
   exit(0);
   mysql_close();
?>
