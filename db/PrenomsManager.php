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
		$q = $this->_db->prepare('INSERT INTO prenoms(prenom) VALUES(:prenom)');
		$q->bindValue(':prenom', $user->prenom());

		$q->execute();
	}

	public function delete(Prenom $user)
	{
		// Exécute une requête de type DELETE.
		$this->_db->exec('DELETE FROM prenoms WHERE id = ' . $user->id());
	}

	public function get($id)
	{
		// Exécute une requête de type SELECT avec clause WHERE, et retourne un objet Prenom
		$id = (int) $id;

		$q = $this->_db->query('SELECT id, prenom FROM prenoms WHERE id = '. $id);

		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Prenom($donnees);
	}

	public function getList()
	{
		// Retourne la liste de tous les prenoms
		$users = [];

		$q = $this->_db->query('SELECT id, prenom FROM prenoms ORDER BY prenom');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$users[] = new Prenom($donnees);
		}

		return $users;
	}

	public function update(Prenom $user)
	{
		// Prépare une requete de type UPDATE.
		// Assignation des valeurs à la requete.
		// Exécution de la requete.

		$q = $this->_db->prepare('UPDATE prenoms SET prenom = :prenom WHERE id = :id');
		$q->bindValue(':prenom', $user->prenom());
		$q->bindValue(':id', $user->id(), PDO::PARAM_INT);

		$q->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}