<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		

$request = $bdd->query('SELECT objectif, date, ID FROM illdo ORDER BY ID DESC');

while ($donnees = $request->fetch()) 
{
	echo '<div id="box_' . $donnees['ID'] . '" class="col-xs-6 col-sm-4 col-md-3 col-lg-3"><p id="objectif-date-' . $donnees['ID'] .'">' . $donnees['objectif'] . '<br />' . $donnees['date'] . '</p><li id="over-'. $donnees['ID'] .'" data-id-over="'. $donnees['ID'] .'">Terminé</li><li id="delete-'. $donnees['ID'] .'" data-id-objectif="'. $donnees['ID'] .'">Supprimer</li><img id="working'. $donnees['ID'] .'" src="logo.png" /></div>';
}
