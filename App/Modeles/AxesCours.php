<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

use App\App;

class AxesCours
{
    private int $id = 0;
    private int $axe_id = 0;
    private int $cours_id = 0;

    public function __construct()
    {
    }

    public static function trouverAxesCoursParCoursId($unId): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM axes_cours WHERE cours_id = ' . $unId;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\AxesCours');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $axesCours = $requetePreparee->fetchAll();
        return $axesCours;
    }

    public static function trouverAxesCoursParAxeCours($unID): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM axes_cours WHERE axe_id IN ' . $unID;
        echo $chaineSQL;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\AxesCours');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $axesCours = $requetePreparee->fetchAll();
        return $axesCours;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAxeId(): int
    {
        return $this->axe_id;
    }

    public function getCoursId(): int
    {
        return $this->cours_id;
    }

    public function getAxesAssociées(): array
    {
        return Axes::trouverAxesParId($this->axe_id);
    }

    public function getCoursAssociés(): Cours
    {
        return Cours::trouverCoursParId($this->cours_id);
    }

    public function getTousCoursAssociés(): array
    {
        return Cours::trouverTousCoursParId($this->cours_id);
    }
}
