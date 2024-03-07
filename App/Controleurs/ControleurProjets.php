<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Axes;
use App\Modeles\Cours;
use App\Modeles\AxesCours;
use App\Modeles\Projets;
use App\Modeles\Textes;

class ControleurProjets
{
    public function __construct()
    {
    }

    public function index()
    {

        $filtres = [
            'axe' => isset($_GET['axe']) ? $_GET['axe'] : null,
            'annee' => isset($_GET['annee']) ? $_GET['annee'] : null,
        ];

        $projets = Projets::trouverParFiltres($filtres);

        $tDonnes = array(
            "titrePage" => "projets",
            "projets" => $projets
        );
        echo App::getBlade()->run('projets.index', $tDonnes);
    }

    public function fiche()
    {
        $id = $_GET['id'];
        $projet = Projets::trouverParId($id);
        $titrePage = $projet->getTitre();

        $tDonnes = array(
            "titrePage" => $titrePage,
            "projet" => $projet
        );

        echo App::getBlade()->run('projets.fiche', $tDonnes);
    }
}
