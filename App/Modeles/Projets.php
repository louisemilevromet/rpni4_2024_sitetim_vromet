<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

error_reporting(E_ALL & ~E_DEPRECATED);

use \PDO;

use App\App;

class Projets
{
    private int $id = 0;
    private string $titre = "";
    private string $technologies = "";
    private string $description = "";
    private string $url = "";
    private int $diplome_id = 0;
    private int $cours_id = 0;

    public function __construct()
    {
    }

    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM projets';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Projets');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $projets = $requetePreparee->fetchAll();
        return $projets;
    }

    public static function trouverParAnnée($uneAnnee): array
    {
        // Définir la chaine SQL
        $chaineSQL =
            'SELECT DISTINCT projets.id, projets.titre, projets.technologies, projets.description, projets.url, projets.diplome_id, projets.cours_id, cours.session, cours.annee
              FROM projets 
              INNER JOIN cours ON projets.cours_id = cours.id 
              WHERE cours.annee = ' . $uneAnnee;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Projets');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $projets = $requetePreparee->fetchAll();
        return $projets;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getTechnologies(): string
    {
        return $this->technologies;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getDiplomeId(): int
    {
        return $this->diplome_id;
    }

    public function getCoursId(): int
    {
        return $this->cours_id;
    }

    public function getAxesCoursAssociés(): array
    {
        return AxesCours::trouverAxesCoursParCoursId($this->cours_id);
    }

    public function getCoursAssociés(): Cours
    {
        return Cours::trouverCoursParId($this->cours_id);
    }
}
