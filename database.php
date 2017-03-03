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

$request = $bdd->query('SELECT objectif, date FROM illdo');

while ($donnees = $request->fetch())
{
	echo ' Objectif : ' . $donnees['objectif'] . ' - Date de fin : ' . $donnees['date'] . '<br />';
}



?>
 <?php                                                     
   exit(0);
   mysql_close();
?>


<?php 
session_start();


$send1 = !empty($_POST['send1']) ? $_POST['send1'] : NULL;
$send2 = !empty($_POST['send2']) ? $_POST['send2'] : NULL;

 //Ton traitement de tri

$req = $bdd->prepare("INSERT INTO illdo(objectif, date) VALUES('$send1', '$send2')");
$req ->execute(array($_POST['send1'], $_POST['send2']));

var_dump($_POST);
?>

 <?php                                                     
   exit(0);
   mysql_close();
?>
