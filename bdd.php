<?php 

$db = new PDO('mysql:host=localhost;dbname=test','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// On admet que $db est un objet PDO
$request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM Personnage');

while( $perso = $request->fetch(PDO::FETCH_ASSOC) ){
	echo $perso['nom'], ' a ', $perso['forcePerso'], ' de force, ', $perso['degats'], ' de dégâts, ', $perso['experience'], ' d\'expérience et est au niveau ', $perso['niveau'], '<br />';
}
