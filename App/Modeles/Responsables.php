<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \App\App;
use PDO;

class Responsables
{
    private int $id = 0;
    private string $responsabilite = "";
    private string $courriel = "";
    private string $prenom = "";
    private string $nom = "";
    private string $telephone = "";

    public function __construct()
    {
    }

    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM responsables';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Responsables');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $responsables = $requetePreparee->fetchAll();
        return $responsables;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getResponsabilite(): string
    {
        return $this->responsabilite;
    }

    public function getCourriel(): string
    {
        return $this->courriel;
    }

    public function getPrenomNom(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }
}
