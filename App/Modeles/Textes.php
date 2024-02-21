<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \App\App;
use PDO;

class Textes
{
    private int $id = 0;
    private string $titre = "";
    private string $texte = "";
    private int $epic = 0;

    public function __construct()
    {
    }

    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM textes';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Textes');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $textes = $requetePreparee->fetchAll();
        return $textes;
    }

    public static function trouverParId(int $id)
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM textes WHERE id = :id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Textes');
        // Exécuter la requête
        $requetePreparee->execute(array(':id' => $id));
        // Récupérer le résultat
        $texte = $requetePreparee->fetch();
        return $texte;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getTexte(): string
    {
        return $this->texte;
    }

    public function getEpic(): int
    {
        return $this->epic;
    }
}
