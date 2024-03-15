<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \App\App;
use PDO;

class Temoignages
{
    private int $id = 0;
    private string $temoin = "";
    private string $titre_poste = "";
    private string $entreprise = "";
    private string $url_entreprise = "";
    private string $temoignage = "";
    private int $annee_diplomation = 0;


    public function __construct()
    {
    }


    public static function trouverTroisAleatoires(): array
    {
        $chiffres = array();

        while (count($chiffres) < 3) {
            $randomNumber = random_int(22, 44);

            // Vérifier si le nombre n'est pas déjà dans le tableau
            if (!in_array($randomNumber, $chiffres)) {
                $chiffres[] = $randomNumber;
            }
        }

        // Définir la chaine SQL avec les trois chiffres générés
        $chaineSQL = 'SELECT * FROM temoignages WHERE id IN (' . implode(',', $chiffres) . ')';

        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Temoignages');

        // Exécuter la requête
        $requetePreparee->execute();

        // Récupérer les résultats
        $temoignages = $requetePreparee->fetchAll();

        return $temoignages;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getTemoin(): string
    {
        return $this->temoin;
    }

    public function getTitrePoste(): string
    {
        return $this->titre_poste;
    }

    public function getEntreprise(): string
    {
        return $this->entreprise;
    }

    public function getUrlEntreprise(): string
    {
        return $this->url_entreprise;
    }

    public function getTemoignage(): string
    {
        return $this->temoignage;
    }

    public function getAnneeDiplomation(): int
    {
        return $this->annee_diplomation;
    }
}
