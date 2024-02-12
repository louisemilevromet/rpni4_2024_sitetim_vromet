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

    // public static function validerChampRadios($unChampRadio, $identifiant)
    // {
    //     $contenuBruteFichierJson = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesInscriptionValidation.json");
    //     // Convertir en tableau associatif
    //     $tMessagesJson = json_decode($contenuBruteFichierJson, true);
    //     $message = '';
    //     $estValide = false;

    //     if (isset($unChampRadio)) {
    //         $estValide = true;
    //     } else {
    //         $estValide = false;
    //         $message = $tMessagesJson[$identifiant]['vide'];
    //         header('Location: index.php?controleur=contact&action=creer');
    //     }
    //     $identifiant = array(
    //         'valeur' => $_POST[$identifiant],
    //         'valide' => $estValide,
    //         'message' => $message
    //     );
    //     return $identifiant;
    //     exit();
    // }

    // public static function validerCheckbox($unCheckbox, $identifiant)
    // {
    //     $contenuBruteFichierJson = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesInscriptionValidation.json");
    //     // Convertir en tableau associatif
    //     $tMessagesJson = json_decode($contenuBruteFichierJson, true);
    //     $message = '';
    //     $estValide = false;

    //     if (isset($unCheckbox)) {
    //         $estValide = true;
    //     } else {
    //         $estValide = false;
    //         $message = $tMessagesJson[$identifiant]['vide'];
    //         header('Location: index.php?controleur=inscription&action=creer');
    //     }
    //     $identifiant = array(
    //         'valeur' => $_POST[$identifiant],
    //         'valide' => $estValide,
    //         'message' => $message
    //     );
    //     return $identifiant;
    //     exit();
    // }
}
