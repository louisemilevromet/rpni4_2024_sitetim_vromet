<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;

class ControleurSite
{
    public function __construct()
    {
    }

    public function accueil(): void
    {
        echo App::getBlade()->run('accueil');
    }

    public function projets(): void
    {
        echo 'Projets';
    }

    public function stages(): void
    {
        echo 'Stages';
    }

    public function contact(): void
    {
        echo 'Contact';
    }
}
