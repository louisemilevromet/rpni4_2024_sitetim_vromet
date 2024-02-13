<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Messages;
use App\Modeles\Responsables;
use App\Modeles\Validateur;

class ControleurContact
{

    public function __construct()
    {
    }


    public function creer(): void
    {
        $tValidation = $_SESSION['tValidation'];
        $_SESSION['tValidation'] = null;

        $tDonnees = array(
            "tResponsables" => Responsables::trouverTout(),
            "tValidation" => $tValidation,
            "titrePage" => "contact"
        );

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
        // Regex sujet/message
        $regexSujet = "/^.+$/";

        $tNom = Validateur::validerChampTexte($_POST['nom'], $regexNom, 'nom');
        $tCourriel = Validateur::validerChampTexte($_POST['courriel'], $regexCourriel, 'courriel');
        $tTelephone = Validateur::validerChampTexte($_POST['telephone'], $regexTelephone, 'telephone');
        $tSujet = Validateur::validerChampTexte($_POST['sujet'], $regexSujet, 'sujet');
        $tMessage = Validateur::validerChampTexte($_POST['contenu'], $regexSujet, 'message');
        $tConsentement = Validateur::validerCheckbox($_POST['consentement'], 'consentement');

        $tValidation = array(
            'nom' => $tNom,
            'courriel' => $tCourriel,
            'destinataire' => $_POST['destinataire'],
            'telephone' => $tTelephone,
            'sujet' => $tSujet,
            'message' => $tMessage,
            'consentement' => $tConsentement
        );

        $_SESSION['tValidation'] = $tValidation;


        $newMessages = new Messages();
        $newMessages->setNom($_POST['nom']);
        $newMessages->setCourriel($_POST['courriel']);
        $newMessages->setTelephone($_POST['telephone']);
        $newMessages->setConsentement(isset($_POST["consentement"]) ? true : false);
        $newMessages->setSujet($_POST['sujet']);
        $newMessages->setMessage($_POST['contenu']);
        $newMessages->setDateheure_creation(date('Y-m-d H:i:s'));
        $newMessages->setDestinataire(intval($_POST['destinataire']));
        $newMessages->inserer();
    }
}
