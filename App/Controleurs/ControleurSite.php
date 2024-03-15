<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Diplomes;
use App\Modeles\Temoignages;
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
        $texteId19 = Textes::trouverParId(19)->getTexte();
        $texteId20 = Textes::trouverParId(20)->getTexte();
        $texteId21 = Textes::trouverParId(21)->getTexte();
        $texteId22 = Textes::trouverParId(22);
        $texteId23 = Textes::trouverParId(23)->getTexte();
        $axes = Textes::trouverAxes();

        // Témoingnage
        $temoignages = Temoignages::trouverTroisAleatoires();


        $tDonnes = array(
            "titrePage" => "techniques d'intégration multimédia",
            "texteId8" => $texteId8,
            "texteId10" => $texteId10,
            "texteId11" => $texteId11,
            "texteId19" => $texteId19,
            "texteId20" => $texteId20,
            "texteId21" => $texteId21,
            "texteId22" => $texteId22,
            "texteId23" => $texteId23,
            "axes" => $axes,
            "temoignages" => $temoignages
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

    public function diplome(): void
    {
        $id = $_GET['id'];
        $diplome = Diplomes::trouverParId($id);
        $titre = $diplome->getPrenom() . ' ' . $diplome->getNom();


        $tDonnes = array(
            "titrePage" => "$titre",
            "diplome" => $diplome,
        );
        echo App::getBlade()->run('diplomes.fiche', $tDonnes);
    }
}
