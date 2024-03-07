<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

use App\App;

class Etapes
{

    private int $id = 0;
    private string $nom = "";
    private int $ordre = 0;
    private string $description = "";
    private int $projet_id = 0;

    public function __construct()
    {
    }

    public static function trouverParProjetId($unId): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM etapes WHERE projet_id = ' . $unId;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Etapes');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $etapes = $requetePreparee->fetchAll();
        return $etapes;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getOrdre(): int
    {
        return $this->ordre;
    }

    public function getProjetId(): int
    {
        return $this->projet_id;
    }
}
