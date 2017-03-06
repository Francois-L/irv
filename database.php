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
?>

<div id="request">
<?php 
$request = $bdd->query('SELECT objectif, date FROM illdo');

while ($donnees = $request->fetch()) 
{
	echo ' Objectif : ' . $donnees['objectif'] . ' - Date de fin : ' . $donnees['date'] . '<br />';
}
?>

</div>

<?php
$send1 = !empty($_POST['send1']) ? $_POST['send1'] : NULL;
$send2 = !empty($_POST['send2']) ? $_POST['send2'] : NULL;

 //Ton traitement de tri

$req = $bdd->prepare("INSERT INTO illdo(objectif, date) VALUES('$send1', '$send2')");
$req ->execute(array($_POST['send1'], $_POST['send2']));


exit(0);
