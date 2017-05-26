<?php 
// Inclusion de autoload
require_once('autoload.php');


// creer un objet
$perso = new Personnage([
	'nom' => 'Victor',
	'forcePerso' => 5,
	'degats' => 0,
	'niveau' => 1,
	'experience' => 0
	]);

$db = new PDO('mysql:host=localhost;dbname=test','root','root');
$manager = new PersonnagesManager($db);

// $manager->add($perso)
$manager->add($perso);