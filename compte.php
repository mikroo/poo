<?php 
class Compteur
{
	// variable statique
	private static $_compteur = 0;

	public function __construct()
	{
		self::$_compteur++;
	}

	public static function compteur()
	{
		return self::$_compteur;
	}
}

$compteur = new Compteur;

echo Compteur::compteur();