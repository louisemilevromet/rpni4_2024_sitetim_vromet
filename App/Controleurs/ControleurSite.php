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

    public function index(): void
    {
        $texteId8 = Textes::trouverParId(8)->getTexte();
        $texteId10 = Textes::trouverParId(10)->getTexte();
        $texteId11 = Textes::trouverParId(11)->getTexte();
        $texteId22 = Textes::trouverParId(22);
        $axes = Textes::trouverAxes();

        $tDonnes = array(
            "titrePage" => "techniques d'intégration multimédia",
            "texteId8" => $texteId8,
            "texteId10" => $texteId10,
            "texteId11" => $texteId11,
            "texteId22" => $texteId22,
            "axes" => $axes
        );
        echo App::getBlade()->run('accueil.index', $tDonnes);
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
        echo App::getBlade()->run('stages.index', $tDonnes);
    }

    public function contact(): void
    {
        echo App::getBlade()->run('contact.contact');
    }
}
