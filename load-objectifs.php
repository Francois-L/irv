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

$request = $bdd->query('SELECT objectif, date, ID FROM illdo ORDER BY ID DESC');

while ($donnees = $request->fetch()) 
{
	echo '<div id="box_' . $donnees['ID'] . '" class="col-xs-6 col-sm-4 col-md-3 col-lg-3"><p id="dynamicValue1-' . $donnees['ID'] . '">' . $donnees['objectif'] . '</p><p id="dynamicValue2-' . $donnees['ID'] . '">' . $donnees['date'] . '</p><li id="over-'. $donnees['ID'] .'">Terminé</li><li id="delete-'. $donnees['ID'] .'" data-id-objectif="'. $donnees['ID'] .'">Supprimer</li><img id="working'. $donnees['ID'] .'" src="logo.png" /></div>';
}
