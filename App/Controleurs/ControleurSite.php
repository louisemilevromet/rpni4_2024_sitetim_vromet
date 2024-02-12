<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
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
        $tDonnes = array(
            "titrePage" => "projets",
        );
        echo App::getBlade()->run('projets', $tDonnes);
    }

    public function stages(): void
    {
        $tDonnes = array(
            "titrePage" => "les stages",
        );
        echo App::getBlade()->run('stages', $tDonnes);
    }

    public function contact(): void
    {
        $tDonnes = array(
            "titrePage" => "contact",
        );
        echo App::getBlade()->run('contact.contact', $tDonnes);
    }
}
