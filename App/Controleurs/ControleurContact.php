<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Messages;
use App\Modeles\Validateur;

class ControleurContact
{

    public function __construct()
    {
    }


    public function creer(): void
    {
        // À compléter...
        $tValidation = $_SESSION['tValidation'];
        $tDonnees = ["tValidation" => $tValidation];
        echo App::getBlade()->run("contact.creer", $tDonnees);
    }


    public function inserer(): void
    {
        // Regex Nom
        $regexNom = "/^[a-zA-ZÀ-ÿ'-]+$/u";
        // Regex email
        $regexCourriel = "/^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$/u";
        // Regex telephone
        $regexTelephone = "/^\d{10}$/";
        // Regex sujet
        $regexSubject = "/^.+$/";

        $tNom = Validateur::validerChampTexte($_POST['nom'], $regexNom, 'nom');
        $tCourriel = Validateur::validerChampTexte($_POST['courriel'], $regexCourriel, 'courriel');
        $tTelephone = Validateur::validerChampTexte($_POST['telephone'], $regexTelephone, 'telephone');

        $tValidation = array(
            'nom' => $tNom,
            'courriel' => $tCourriel,
            'telephone' => $tTelephone
        );

        $_SESSION['tValidation'] = $tValidation;

        $newMessages = new Messages();
        $newMessages->setNom($_POST['nom']);
        $newMessages->setCourriel($_POST['courriel']);
        $newMessages->inserer();
    }
}
