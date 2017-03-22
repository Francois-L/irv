<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		

$request = $bdd->query('SELECT objectif, DATE_FORMAT(date, "%d/%m/%Y") AS datetri, ID FROM illdo ORDER BY date DESC');

while ($donnees = $request->fetch()) 
{
	echo '<div id="box_' . $donnees['ID'] . '" class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<p id="objectifdate-' . $donnees['ID'] .'" data-id-objectifdate="'. $donnees['ID'] .'">' . $donnees['objectif'] . '<br />' . $donnees['datetri'] . '</p>
		<ul id="menubox-'. $donnees['ID'] .'" data-id-menubox="'. $donnees['ID'] .'" style="display:none">
			<li id="over-'. $donnees['ID'] .'" data-id-over="'. $donnees['ID'] .'">Terminé</li>
					
					<form id="my_form" method="post" action="save-pictures.php" enctype="multipart/form-data">
					<input type="file" name="image" accept="image/*">
					<button type="submit">OK</button>
					</form>
					
			<li id="delete-'. $donnees['ID'] .'" data-id-delete="'. $donnees['ID'] .'">Supprimer</li>
		</ul>
	<img id="working'. $donnees['ID'] .'" src="logo.png" /></div>';
}
