<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Projets;
use App\Modeles\Textes;

class ControleurSite
{
    public function __construct()
    {
    }

    public function accueil(): void
    {
        $tDonnes = array(
            "titrePage" => "techniques d'intégration multimédia"
        );
        echo App::getBlade()->run('accueil', $tDonnes);
    }

    public function projets(): void
    {
        $projets = Projets::trouverTout();
        $tDonnes = array(
            "titrePage" => "projets",
            "projets" => $projets,
        );
        echo App::getBlade()->run('projets', $tDonnes);
    }

    public function stages(): void
    {
        // On récupère les textes de la base de données
        $textes = Textes::trouverTout();

        // On récupère le texte de la base de données pour les id 24, 25 et 26
        $texteId24 = Textes::trouverParId(24)->getTexte();
        $texteId25 = Textes::trouverParId(25)->getTexte();
        $texteId26 = Textes::trouverParId(26)->getTexte();


        $tDonnes = array(
            "titrePage" => "les stages",
            "textes" => $textes,
            "texteId24" => $texteId24,
            "texteId25" => $texteId25,
            "texteId26" => $texteId26
        );
        echo App::getBlade()->run('stages', $tDonnes);
    }

    public function contact(): void
    {
        echo App::getBlade()->run('contact.contact');
    }
}
