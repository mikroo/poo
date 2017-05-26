<?php 
class Prenom
{
	private $_id;
	private $_prenom;

	// Ajouter un constructeur
	public function __construct($donnees)
	{
		$this->hydrate($donnees);
	}

	// Un tableau de données doit être passé à la fonction (d'où le préfixe array)
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value) 
		{
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
		/*
		if(isset($donnees['id']))
		{
			$this->setId($donnees['id'])
		}

		if(isset($donnees['prenom']))
		{
			$this->setPrenom($donnees['prenom']);
		}
		*/
	}


	// Liste des getters
	public function id()
	{
		return $this->_id;
	}

	public function prenom()
	{
		return $this->_prenom;
	}

	// Liste des setters
	public function setId($id)
	{
		// On convertit l'argument en nombre entier
		// Si c'en était déjà un, rien ne changera.
		// Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
		$id = (int) $id;

		// On vérifie ensuite si ce nombre est bien strictement positif.
		if($id > 0)
		{
			$this->_id = $id;
		}
	}

	public function setPrenom($prenom)
	{
		// On vérifie qu'il s'agit bien d'une chaine de caractères.
		if(is_string($prenom))
		{
			$this->_prenom = $prenom;
		}
	}
}