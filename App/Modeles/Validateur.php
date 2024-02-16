<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \App\App;

class Validateur
{

    public function __construct()
    {
    }

    public static function validerChampTexte($champsTexte, $unRegex, $identifiant)
    {
        $contenuBruteFichierJson = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesContactValidation.json");
        // Convertir en tableau associatif
        $tMessagesJson = json_decode($contenuBruteFichierJson, true);
        $message = '';
        $estValide = false;

        if ($champsTexte == '') {
            $estValide = false;
            $message = $tMessagesJson[$identifiant]['erreurs']['vide'];
            header('Location: index.php?controleur=contact&action=creer');
        } else if (preg_match($unRegex, $champsTexte)) {
            $estValide = true;
        } else {
            $estValide = false;
            $message = $tMessagesJson[$identifiant]['erreurs']['pattern'];
            header('Location: index.php?controleur=contact&action=creer');
        }
        $identifiant = array(
            'valeur' => $champsTexte,
            'valide' => $estValide,
            'message' => $message
        );
        return $identifiant;
        exit();
    }

    public static function validerCheckbox($unCheckbox, $identifiant)
    {
        $contenuBruteFichierJson = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesContactValidation.json");
        // Convertir en tableau associatif
        $tMessagesJson = json_decode($contenuBruteFichierJson, true);
        $message = '';
        $estValide = false;

        if (isset($unCheckbox)) {
            $estValide = true;
        } else {
            $estValide = false;
            $message = $tMessagesJson[$identifiant]['erreurs']['vide'];
            header('Location: index.php?controleur=contact&action=creer');
        }
        $identifiant = array(
            'valeur' => $_POST[$identifiant],
            'valide' => $estValide,
            'message' => $message
        );
        return $identifiant;
        exit();
    }

    public static function validerTousChamps($nom, $courriel, $telephone, $sujet, $message, $consentement, $humain)
    {
        $contenuBruteFichierJson = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesContactValidation.json");
        // Convertir en tableau associatif
        $tMessagesJson = json_decode($contenuBruteFichierJson, true);

        if ($nom == '' && $courriel == '' && $telephone == '' && $sujet == '' && $message == '' && $consentement == false && $humain == false) {
            return $tMessagesJson['retroactions']['courriel']['completer'];
        } else if ($nom != '' && $courriel != '' && $telephone != '' && $sujet != '' && $message != '' && $consentement == true && $humain == true) {
            return $tMessagesJson['retroactions']['courriel']['envoyer'];
        } else {
            return $tMessagesJson['retroactions']['courriel']['avorter'];
        }
    }
}
