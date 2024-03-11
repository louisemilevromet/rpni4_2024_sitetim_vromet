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

    public static function trouverParId($unId): Projets
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM projets WHERE id = ' . $unId;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Projets');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $projet = $requetePreparee->fetch();
        return $projet;
    }

    public static function trouverParAnnée($uneAnnee): array
    {
        // Définir la chaine SQL
        $chaineSQL =
            'SELECT DISTINCT projets.id, projets.titre, projets.technologies, projets.description, projets.url, projets.diplome_id, projets.cours_id, cours.session, cours.annee
              FROM projets 
              INNER JOIN cours ON projets.cours_id = cours.id 
              WHERE cours.annee IN ' . $uneAnnee;
        echo $chaineSQL;
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

    public static function trouverParCours($unCours_id): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM projets WHERE cours_id = ' . $unCours_id;
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

    public static function trouverParFiltres(array $filtres): array
    {
        $conditions = [];
        $params = [];

        if (!empty($filtres['axe'])) {
            $conditions[] = 'axes.id = :axe_id';
            $params['axe_id'] = $filtres['axe'];
        }

        if (!empty($filtres['annee'])) {
            $conditions[] = 'cours.annee = :annee';
            $params['annee'] = $filtres['annee'];
        }

        // Définir la chaine SQL
        $chaineSQL = "SELECT DISTINCT projets.*
            FROM projets
            JOIN axes_cours ON projets.cours_id = axes_cours.cours_id
            JOIN axes ON axes.id = axes_cours.axe_id
            JOIN cours ON projets.cours_id = cours.id
            " . (!empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '');

        // echo $chaineSQL;

        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Projets');
        // Exécuter la requête
        $requetePreparee->execute($params);
        // Récupérer le résultat
        $projets = $requetePreparee->fetchAll();

        return $projets;
    }

    public static function trouverParDiplomeId($unDiplome_id): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM projets WHERE diplome_id = ' . $unDiplome_id;
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

    public function getEtapesAssociées(): array
    {
        return Etapes::trouverParProjetId($this->id);
    }

    public function getDimplomeAssocié(): Diplomes
    {
        return Diplomes::trouverParId($this->diplome_id);
    }
}
