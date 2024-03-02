<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Projets;
use App\Modeles\Textes;

class ControleurProjets
{
    public function __construct()
    {
    }

    public function index()
    {

        for ($i = 1; $i < 4; $i++) {
            if (isset($_GET['annee' . $i])) {
                if ($_GET['annee' . $i] == "on") {
                    $annee = $i;
                    $projets = Projets::trouverParAnnée($annee);
                } else {
                    $projets = Projets::trouverTout();
                }
            }
        };



        $tDonnes = array(
            "titrePage" => "projets",
            "projets" => $projets,
        );
        echo App::getBlade()->run('projets.index', $tDonnes);
    }

    public function fiche()
    {
    }
}
