<?php require_once 'db.php';


$request = $bdd->query('SELECT objectif, image, DATE_FORMAT(date, "%d/%m/%Y") AS datetri, ID FROM illdo ORDER BY date DESC');

while ($donnees = $request->fetch()) 
{
	$image = $donnees['image'];
	if(empty($image)) {
		echo '<div id="box_' . $donnees['ID'] . '" class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<p id="objectifdate-' . $donnees['ID'] .'" data-id-objectifdate="'. $donnees['ID'] .'" style="cursor:pointer">' . $donnees['objectif'] . '<br />' . $donnees['datetri'] . '</p>
			<ul id="menubox-'. $donnees['ID'] .'" data-id-menubox="'. $donnees['ID'] .'" style="display:none" class="menu-objectif">
				<li id="over-'. $donnees['ID'] .'" data-id-over="'. $donnees['ID'] .'">Partager</li>
					<form id="uploadimage-'. $donnees['ID'] .'" method="post" enctype="multipart/form-data" class="dropzone">
						<input type="hidden" name="target_id" value="'.$donnees['ID'].'"/>
						<input type="file" name="target_picture">
						<input type="submit" id="submit-'. $donnees['ID'] .'" value="Envoyer" class="submit" />
					</form>
				<li id="delete-'. $donnees['ID'] .'" data-id-delete="'. $donnees['ID'] .'">Supprimer</li>
			</ul>
		</div>';
	}
	else {
		echo '<div id="box_' . $donnees['ID'] . '" class="col-xs-6 col-sm-4 col-md-3 col-lg-3"style="background-image: url(\'uploads/'. $image .'\');">
		<p id="objectifdate-' . $donnees['ID'] .'" data-id-objectifdate="'. $donnees['ID'] .'" style="cursor:pointer">' . $donnees['objectif'] . '<br />' . $donnees['datetri'] . '</p>
			
			<ul id="menubox-'. $donnees['ID'] .'" data-id-menubox="'. $donnees['ID'] .'" style="display:none;" class="menu-objectif">
				<li id="over-'. $donnees['ID'] .'" data-id-over="'. $donnees['ID'] .'">Partager</li>
					<form id="uploadimage-'. $donnees['ID'] .'" class="dropzone" method="post" enctype="multipart/form-data">
					  <input type="hidden" name="target_id" value="'.$donnees['ID'].'"/>
					  <input type="file" name="target_picture">
					  <input type="submit" id="submit-'. $donnees['ID'] .'" value="Envoyer" class="submit" />
					</form>
				<li id="delete-'. $donnees['ID'] .'" data-id-delete="'. $donnees['ID'] .'">Supprimer</li>
			</ul>
			
		</div>';		
	}
}
