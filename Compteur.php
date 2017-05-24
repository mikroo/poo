<?php 
class Compteur
{
	// Déclaration de la variable $compteur
	private static $_compteur = 0;

	public function __construct()
	{
		// On instancie la variable $compteur qui appartient à la classe (donc utilisation du mot-clé sef).
		self::$_compteur++;
	}

	public static function getCompteur() // Méthode statique qui renverra la valeur du compteur.
	{
		return self::$_compteur;
	}
}

$test1 = new Compteur;
$test1 = new Compteur;
$test1 = new Compteur;

echo Compteur::getCompteur();