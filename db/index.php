<?php
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=test','root','root');
// Lire les informations dans la base de données
$request = $db->query("SELECT id, prenom FROM prenoms");

while($perso = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
	echo $perso['prenom'],'<br />';
}