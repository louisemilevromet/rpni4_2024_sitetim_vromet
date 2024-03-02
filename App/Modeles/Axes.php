<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

use App\App;

class Axes
{
    private int $id = 0;
    private string $nom = "";

    public function __construct()
    {
    }

    public static function trouverAxesParId($unId): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM axes WHERE id = ' . $unId;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Axes');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $axes = $requetePreparee->fetchAll();
        return $axes;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}
