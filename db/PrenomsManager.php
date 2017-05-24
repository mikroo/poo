<?php 
class PrenomsManager
{
	private $_db; // Instance de PDO

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(Prenom $user)
	{
		// Préparation de la requête d'insertion.
		// Assignation de valeur pour le nom de l'utilisateur
		// Exécution de la requête.
	}

	public function delete(Prenom $user)
	{
		// Exécute une requête de type DELETE.
	}

	public function get($id)
	{
		// Exécute une requête de type SELECT avec clause WHERE, et retourne un objet Prenom
	}

	public function getList()
	{
		// Retourne la liste de tous les prenoms
	}

	public function update(Prenom $user)
	{
		// Prépare une requete de type UPDATE.
		// Assignation des valeurs à la requete.
		// Exécution de la requete.
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}