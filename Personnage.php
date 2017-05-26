<?php 

class Personnage // Présence du mot-clé class suivi du nom de la classe.
{
	private $_id;
	private $_nom;
	private $_forcePerso;
	private $_degats;
	private $_niveau;
	private $_experience;
	
	// Un tableau de données doit être passé à la fonction (d'où le préfixe "array").
	public function hydrate(array $donnees)
	{	
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}


	// Liste des getters
	public function id() { return $this->_id; }
	public function nom() { return $this->_nom; }
	public function forcePerso() { return $this->_forcePerso; }
	public function degats() { return $this->_degats; }
	public function niveau() { return $this->_niveau; }
	public function experience() { return $this->_experience; }

	// Liste des setters 
	public function setId($id)
	{
		// On convertit l'argument en nombre entier.
		// Si c'en était déjà un, rien ne changera.
		// Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).

		$id = (int) $id;

		// On vérifie ensuite si ce nombre est bien strictement positif.
		if($id > 0)
		{
			// Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
			$this->_id = $id;
		}
	}

	public function setNom($nom)
	{
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		if(is_string($nom) && strlen($nom) <= 30)
		{
			$this->_nom = $nom;
		}
	}

	public function setForcePerso($forcePerso)
	{
		$forcePerso = (int) $forcePerso;
		
		// On vérifie que la force passée est comprise entre 0 et 100.
		if($forcePerso >= 0 && $forcePerso <= 100)
		{
			$this->_forcePerso = $forcePerso;
		}
	}

	public function setDegats($degats)
	{
		$degats = (int) $degats;

		// On vérifie que les dégâts passés sont compris entre 0 et 100
		if($degats >=1 && $degats <= 100)
		{
			$this->_degats = $degats;
		}
	}

	public function setNiveau()
	{
		$niveau = (int) $niveau;
		// On vérifie que le niveau n'est pas négatif.
		if($niveau >= 0)
		{
			$this->_niveau = $niveau;
		}
	}

	public function setExperience($exp)
	{
		$exp = (int) $exp;

		// On vérifie que l'expérience est comprise entre 0 et 100.
		if($exp >= 1 && $exp <= 100)
		{
			$this->_experience = $exp;
		}
	}
}





/*
	// -------------------------------------------------------------

	// Déclaration des attributs et méthodes ici.
	private $_force = 50; // La force du personnage, par défaut à 50
	private $_localisation = "Lyon"; // Sa localisation, par défaut à Lyon.
	private $_experience = 0; // Son expérience, par défaut à 1
	private $_degats = 20; // Ses dégâts, par défaut à 0

	// Déclaration des constantes en rapport avec la force
	const FORCE_PETITE = 20;
	const FORCE_MOYENNE = 50;
	const FORCE_GRANDE = 80;

	// Variable statique PRIVÉE.
	private static $_texteADire = "Je vais tous vous aimer encore !";

	public function __construct($force, $degats) // Constructeur demandant paramètres
	{
		echo "Voici le constructeur !<br />"; // Message s'affichant une fois que tout objet est crée.
		$this->setForce($force); // Initialisation de la force.
		$this->setDegats($degats); // Initialisation des dégâts.
		$this->_experience = 1; // Initialisation de l'expérience à 1
	}

	public function deplacer() // Une méthode qui déplacera le personnage (modifiera sa localisation).
	{

	}

	public function frapper(Personnage $persoAFrapper) // Une méthode qui frappera un personnage (suivant la force qu'il a).
	{
		$persoAFrapper->_degats += $this->_force;
	}

	public function gagnerExperience() // Une méthode augmentant l'attribut $experience du personnage.
	{
		// Cette méthode doit ajouter 1 à l'experience du personnage.
		// On ajoute 1 à notre attribut $_experience
		$this->_experience = $this->_experience + 1;
	}

	public function afficherExperience()
	{
		echo $this->_experience;
	}

	// Mutateur chargé de modifier l'attribut $_force.
	public function setForce($force)
	{
		if(!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
		{
			trigger_error("La force d'un personnage doit être un nombre entier", E_USER_WARNING);
			return;
		}

		if($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
		{
			trigger_error("La force d'un personnage ne peut dépasser 100", E_USER_WARNING);
			return;
		}

		// On vérifie qu'on nous donne bien soit une "FORCE_PETITE", soit "FORCE_MOYENNE", soit "FORCE_GRANDE".
		if(in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
		{
			$this->_force = $force;
		}
	}

	// Mutateur chargé de modifier l'attribut $_experiecne
	public function setExperience($experience)
	{
		if(!is_int($experience)) // S'il s'agit pas d'un nombre entier.
		{
			trigger_error("L'expérience d'un personnage doit être un nombre entier", E_USER_WARNING);
			return;
		}

		if($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100
		{
			trigger_error("L'expérience d'un personnage ne peut dépasser 100", E_USER_WARNING);
			return;
		}

		$this->_experience = $experience;
	}

	// Mutateur chargé de modifier l'attribut dégâts
	public function setDegats($degats)
	{
		if(!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
		{
			trigger_error("Le niveau de dégâts d'un personnage doit être un nombre entier", E_USER_WARNING);
			return;
		}

		$this->_degats = $degats;
	}

	// Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_experience.
	public function force()
	{
		return $this->_force;
	}

	// Ceci est la méthode localisation() : elle se charge de renvoyer la localisation
	public function localisation()
	{
		return $this->_localisation;
	}

	// Ceci est la méthode experience()
	public function experience()
	{
		return $this->_experience;
	}

	// Ceci est la méthode degats
	public function degats()
	{
		return $this->_degats;
	}

	// Notez que le mot-clé static peut être placé avant la visibilité de la méthode (ici c'est public)
	public static function parler()
	{
		echo self::$_texteADire; // On donne le texte à dire.
	}
}


$perso1 = new Personnage(Personnage::FORCE_GRANDE, 0); // Un premier personnage [60 de force, 0 dégâts]
$perso2 = new Personnage(100, 10); // Un second personnage [100 de force, 10 dégâts]

Personnage::parler();
$perso1->parler();



$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(58);

$perso1->frapper($perso2); // $perso1 frappe $perso2
$perso1->gagnerExperience(); // Personnage 1 gagne de l'expérience

$perso2->frapper($perso1); // $perso2 frappe $perso1
$perso2->gagnerExperience(); // Personnage 2 gagne de l'expérience

echo "Le personnage 1 a ", $perso1->force(), " de force, contrairement au personnage 2 qui a ", $perso2->force(), " de force. <br />";
echo "Le personnage 1 a ", $perso1->experience(), " d'expérience, contrairement au personnage 2 qui a ", $perso2->experience(), " d'expérience. <br />";
echo "Le personnage 1 a ", $perso1->degats(), " de dégâts, contrairement au personnage 2 qui a ", $perso2->degats(), " de dégâts. <br />";
// $perso->_experience = $perso->_experience + 1; // Une erreur fatale est levée suit à cette instruction

*/