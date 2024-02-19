<?php

declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Messages;
use App\Modeles\Responsables;
use App\Modeles\Validateur;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;


class ControleurContact
{

    public function __construct()
    {
    }


    public function creer(): void
    {
        if (isset($_SESSION['tValidation']))
            $tValidation = $_SESSION['tValidation'];
        else
            $tValidation = array(
                'nom' => '',
                'courriel' => '',
                'destinataire' => '',
                'telephone' => '',
                'sujet' => '',
                'message' => '',
                'consentement' => '',
                'humain' => '',
                'retroactions' => ''
            );


        // Tableau que j'envoie à la vue contact
        $tDonnees = array(
            "tResponsables" => Responsables::trouverTout(),
            "tValidation" => $tValidation,
            "titrePage" => "contact"
        );

        echo App::getBlade()->run("contact.creer", $tDonnees);
    }


    public function inserer(): void
    {


        // Regex nom
        $regexNom = "/^[a-zA-ZÀ-ÿ\- ]+$/u";
        // Regex email
        $regexCourriel = "/^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$/u";
        // Regex telephone
        $regexTelephone = "/^\d{10}$/";
        // Regex sujet/message
        $regexSujet = "/^.+$/";

        if (isset($_POST['telephone']) && $_POST['telephone'] != '') {
            $tTelephone = Validateur::validerChampTexte($_POST['telephone'], $regexTelephone, 'telephone');
        } else {
            $tTelephone = array('valide' => true, 'valeur' => '');
        }

        if (isset($_POST['consentement']) && $_POST['consentement'] != '') {
            $tConsentement = Validateur::validerCheckbox($_POST['consentement'], 'consentement');
        } else {
            $tConsentement = array('valide' => true, 'valeur' => '');
        }

        $tNom = Validateur::validerChampTexte($_POST['nom'], $regexNom, 'nom');
        $tCourriel = Validateur::validerChampTexte($_POST['courriel'], $regexCourriel, 'courriel');
        $tSujet = Validateur::validerChampTexte($_POST['sujet'], $regexSujet, 'sujet');
        $tMessage = Validateur::validerChampTexte($_POST['message'], $regexSujet, 'message');
        $tHumain = Validateur::validerCheckbox($_POST['humain'], 'humain');
        $tRetroactions = Validateur::validerTousChamps($_POST['nom'], $_POST['courriel'], $tTelephone, $_POST['sujet'], $_POST['message'], $tConsentement, $_POST['humain']);

        $tValidation = array(
            'nom' => $tNom,
            'courriel' => $tCourriel,
            'destinataire' => $_POST['destinataire'],
            'telephone' => $tTelephone,
            'sujet' => $tSujet,
            'message' => $tMessage,
            'consentement' => $tConsentement,
            'humain' => $tHumain,
            'retroactions' => $tRetroactions
        );

        // Associer le tableau de validation à la session
        $_SESSION['tValidation'] = $tValidation;



        // Si tout est valide, on insère dans la base de données
        if ($tNom['valide'] && $tCourriel['valide'] && $tTelephone['valide'] && $tSujet['valide'] && $tMessage['valide'] && $tConsentement['valide'] && $tHumain['valide']) {
            $newMessages = new Messages();
            $newMessages->setNom($_POST['nom']);
            $newMessages->setCourriel($_POST['courriel']);
            $newMessages->setTelephone($_POST['telephone']);
            $newMessages->setConsentement(isset($_POST["consentement"]) ? true : false);
            $newMessages->setSujet($_POST['sujet']);
            $newMessages->setMessage($_POST['message']);
            $newMessages->setDateheure_creation(date('Y-m-d H:i:s'));
            $newMessages->setDestinataire(intval($_POST['destinataire']));
            $newMessages->inserer();

            // On envoie un courriel si tout est valide
            $this->envoyerCourriel();

            // Supprimer les tableau de tValidation de la session
            unset($_SESSION['tValidation']['nom']);
            unset($_SESSION['tValidation']['courriel']);
            unset($_SESSION['tValidation']['destinataire']);
            unset($_SESSION['tValidation']['telephone']);
            unset($_SESSION['tValidation']['sujet']);
            unset($_SESSION['tValidation']['message']);
            unset($_SESSION['tValidation']['consentement']);
            unset($_SESSION['tValidation']['humain']);
        }
    }

    // Function qui envoie un courriel
    private function envoyerCourriel()
    {

        $courriel = new Email();
        $courriel->from('webwiseconsolidate@gmail.com')
            ->to('webwiseconsolidate@gmail.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($_POST['sujet'])
            ->text($_POST['message']);

        $transport = Transport::fromDsn('smtp://webwiseconsolidate@gmail.com:pcfzjwkbtgqgujmy@smtp.gmail.com:587');
        $mailer = new Mailer($transport);
        $bilan = 'OK';
        try {
            // Essayer d'envoyer...
            $mailer->send($courriel);
        } catch (TransportExceptionInterface $e) {
            // Si ça ne fonctionne pas...
            $bilan = 'ERREUR';
        }
        return $bilan;
    }
}
