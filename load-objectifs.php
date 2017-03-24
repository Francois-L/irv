<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		

$request = $bdd->query('SELECT objectif, image, DATE_FORMAT(date, "%d/%m/%Y") AS datetri, ID FROM illdo ORDER BY date DESC');

while ($donnees = $request->fetch()) 
{
	echo '<div id="box_' . $donnees['ID'] . '" class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<p id="objectifdate-' . $donnees['ID'] .'" data-id-objectifdate="'. $donnees['ID'] .'" style="cursor:pointer">' . $donnees['objectif'] . '<br />' . $donnees['datetri'] . '</p>
		<img id="working'. $donnees['ID'] .'" src="uploads/'. $donnees['image'] .'" class="bcg-dl"/>
		<ul id="menubox-'. $donnees['ID'] .'" data-id-menubox="'. $donnees['ID'] .'" style="display:none" class="menu-objectif">
			<li id="over-'. $donnees['ID'] .'" data-id-over="'. $donnees['ID'] .'">Terminé</li>
				<form id="uploadimage-'. $donnees['ID'] .'" method="post" action="save-pictures.php" enctype="multipart/form-data">
				<input type="file" id="file-'. $donnees['ID'] .'">
				<input type="submit" id="submit-'. $donnees['ID'] .'" value="Envoyer" class="submit" /></form>
			<li id="delete-'. $donnees['ID'] .'" data-id-delete="'. $donnees['ID'] .'">Supprimer</li>
		</ul>
	</div>';
}
