<?php

declare(strict_types=1);

namespace App;

use App\Controleurs\ControleurContact;
use App\Controleurs\ControleurSite;
use \PDO;
use eftec\bladeone\BladeOne;

class App
{
    private static ?PDO $refPdo = null;
    private static ?BladeOne $refBlade = null;


    public function __construct()
    {
        // Configuration initiale
        error_reporting(E_ALL | E_STRICT);
        date_default_timezone_set('America/Montreal');

        // Routage de la requête URL
        $this->routerRequete();
    }

    public static function getServeur(): string
    {
        // Vérifier la nature du serveur (local VS production)
        $env = 'null';
        if ((substr($_SERVER['HTTP_HOST'], 0, 9) == 'localhost') ||
            (substr($_SERVER['HTTP_HOST'], 0, 7) == '199.202')
        ) {
            $env = 'serveur-local';
        } else {
            $env = 'serveur-production';
        }
        return $env;
    }

    public static function getPDO()
    {
        if (App::$refPdo == null) {
            if (App::getServeur() === 'serveur-local') {
                $serveur = (php_uname('s') === 'Darwin') ? 'localhost' : 'localhost:8889';
                $utilisateur = 'root';
                $motDePasse = 'root';
                $nomBd = '24_rpni4_site_tim';
                $chaineDSN = "mysql:dbname=$nomBd;host=$serveur"; // Data source name
            } else if (App::getServeur() === 'serveur-production') {
                //timunix3;
                $serveur = 'localhost';
                $utilisateur = '';
                $motDePasse = '';
                $nomBd = '';
            }
            $chaineDSN = "mysql:dbname=$nomBd;host=$serveur"; // Data source name
            $pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
            // Changement d'encodage des caractères UTF-8
            $pdo->exec("SET NAMES utf8");
            // Affectation des attributs de la connexion : Obtenir des rapports d'erreurs et d'exception avec errorInfo()
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            App::$refPdo = $pdo;
        }
        return App::$refPdo;
    }

    public static function getBlade(): BladeOne
    {
        // Retourne l'objet BladeOne et si nécessaire l'instancie
        // https://packagist.org/packages/eftec/bladeone
        if (App::$refBlade === null) {
            $cheminDossierVues = '../ressources/vues';
            $cheminDossierCache = '../ressources/cache';
            App::$refBlade = new BladeOne($cheminDossierVues, $cheminDossierCache, BladeOne::MODE_AUTO);
        }
        return App::$refBlade;
    }


    public function routerRequete(): void
    {
        // Anatomie d'une URL. Exemple pour accéder à la page à propos:
        // Exemple:    http://localhost:8888/index.php?controleur=site&action=apropos

        session_start();
        // Valeurs par défaut
        $urlControleur = 'site';
        $urlAction = 'accueil';

        // Instance de l'objet controleur
        $objControleur = null;

        // Déterminer le controleur responsable de traiter la requête
        if (isset($_GET['controleur'])) {
            $urlControleur = $_GET['controleur'];
        }

        // Déterminer l'action du controleur
        if (isset($_GET['action'])) {
            $urlAction = $_GET['action'];
        }

        // Instantier le bon controleur selon la page demandée
        if ($urlControleur === 'site') {
            $objControleur = new ControleurSite();
            switch ($urlAction) {
                case 'accueil':
                    $objControleur->accueil();
                    break;
                case 'projets':
                    $objControleur->projets();
                    break;
                case 'stages':
                    $objControleur->stages();
                    break;
                default:
                    echo 'Erreur 404 - Action invalide';
            }
        }
        if ($urlControleur === 'contact') {
            $objControleur = new ControleurContact();
            switch ($urlAction) {
                case 'creer':
                    $objControleur->creer();
                    break;
                case 'inserer':
                    $objControleur->inserer();
                    break;
                default:
                    echo 'Erreur 404 - Action invalide';
            }
        } else {
            echo 'Erreur 404 - Controleur invalide';
        }
    }
}
