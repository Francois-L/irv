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

$request = $bdd->query('SELECT objectif, date, ID FROM illdo');

while ($donnees = $request->fetch()) 
{
	echo ' aa: ' . $donnees['objectif'] . ' - Date de fin : ' . $donnees['date'] . ' - ID : ' . $donnees['ID'] . '<br />';
}
