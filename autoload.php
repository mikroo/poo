<?php
function chargerClasse($classe)
{
	require $classe . '.php'; // On inclut la classe correspondate au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

// $perso = new Personnage(45,4); // Instanciation de la classe Personnage qui n'est pas déclarée dans ce fichier.