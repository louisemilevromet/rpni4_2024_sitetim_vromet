<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

use App\App;

class Diplomes
{
    private int $id = 0;
    private string $nom = "";
    private string $prenom = "";
    private string $presentation = "";
    private int $interet_conception = 0;
    private int $interet_medias = 0;
    private int $interet_integration = 0;
    private int $interet_programmation = 0;
    private string $courriel = "";
    private string $linkedin = "";
    private string $site_web = "";

    public function __construct()
    {
    }

    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM diplomes';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Diplomes');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $diplomes = $requetePreparee->fetchAll();
        return $diplomes;
    }

    public static function trouverParId($unId): Diplomes
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM diplomes WHERE id = ' . $unId;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Diplomes');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $diplome = $requetePreparee->fetch();
        return $diplome;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getPresentation(): string
    {
        return $this->presentation;
    }

    public function getInteretConception(): int
    {
        return $this->interet_conception;
    }

    public function getInteretMedias(): int
    {
        return $this->interet_medias;
    }

    public function getInteretIntegration(): int
    {
        return $this->interet_integration;
    }

    public function getInteretProgrammation(): int
    {
        return $this->interet_programmation;
    }

    public function getCourriel(): string
    {
        return $this->courriel;
    }

    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    public function getSiteWeb(): string
    {
        return $this->site_web;
    }

    public function getProjetsAssociés(): array
    {
        return Projets::trouverParDiplomeId($this->id);
    }
}
