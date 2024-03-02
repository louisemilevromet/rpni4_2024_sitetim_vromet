<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

use App\App;

class Cours
{
    private int $id = 0;
    private string $nom = "";
    private int $session = 0;
    private int $annee = 0;

    public function __construct()
    {
    }

    public static function trouverCoursParId($unId): Cours
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM cours WHERE id = ' . $unId;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Cours');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $cour = $requetePreparee->fetch();
        return $cour;
    }

    public static function trouverCoursParAnnee($uneAnnee): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM cours WHERE annee = ' . $uneAnnee;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Cours');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $cours = $requetePreparee->fetchAll();
        return $cours;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getSession(): int
    {
        return $this->session;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function getProjetsAssociés()
    {
        return Projets::trouverParAnnée($this->annee);
    }

    public function setAnnee($uneAnnee)
    {
        $this->annee = $uneAnnee;
    }
}
