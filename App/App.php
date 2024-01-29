<?php
declare(strict_types=1);
namespace App;


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

    public static function getPDO():PDO
    {
        // Retourne l'objet de connexion et si nécessaire l'instancie
        $pdo = null;
        if (!isset(App::$refPdo)){
            if($_SERVER['SERVER_NAME'] == 'localhost') {
                // Paramètres de connexion d'un BD local dans MAMP
                $serveur = 'localhost';
                $utilisateur = 'root';
                $motDePasse = 'root'; // Pas mettre de mot de passe avec XAMP
                $nomBd = 'maBdRpni4'; // À modifier...
            }else{
                // Paramètres de connexion d'une BD sur le serveur TIMUNIX
                // À modifier...
                $serveur = 'localhost';
                $utilisateur = '24_rpni4_33'; // À modifier...
                $motDePasse = 'sdf34jkh48$tu'; // À modifier...
                $nomBd = '24_rpni4_33'; // À modifier...
            }
            $chaineDSN = "mysql:dbname=$nomBd;host=$serveur";    // Data source name

            // Tentative de connexion
            $pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
            // Changement d'encodage des caractères UTF-8
            $pdo->exec("SET NAMES utf8");
            // Affectation des attributs de la connexion : Obtenir des rapports d'erreurs et d'exception avec errorInfo()
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }else{
            $pdo = App::$refPdo;
        }
        return $pdo;
    }

    public static function getBlade():BladeOne
    {
        // Retourne l'objet BladeOne et si nécessaire l'instancie
        // https://packagist.org/packages/eftec/bladeone
        if(App::$refBlade === null){
            $cheminDossierVues = '../ressources/vues';
            $cheminDossierCache = '../ressources/cache';
            App::$refBlade = new BladeOne($cheminDossierVues,$cheminDossierCache,BladeOne::MODE_AUTO);
        }
        return App::$refBlade;
    }


    public function routerRequete():void
    {
        // Anatomie d'une URL. Exemple pour accéder à la page à propos:
        // Exemple:    http://localhost:8888/index.php?controleur=site&action=apropos

        // Valeurs par défaut
        $urlControleur = 'site';
        $urlAction = 'accueil';

        // Instance de l'objet controleur
        $objControleur = null;

        // Déterminer le controleur responsable de traiter la requête
        if (isset($_GET['controleur'])){
            $urlControleur = $_GET['controleur'];
        }

        // Déterminer l'action du controleur
        if (isset($_GET['action'])){
            $urlAction = $_GET['action'];
        }

        // Instantier le bon controleur selon la page demandée
        if ($urlControleur === 'site'){
            $objControleur = new ControleurSite();
            switch ($urlAction) {
                case 'accueil':
                    $objControleur->accueil();
                    break;
                case 'apropos':
                    $objControleur->apropos();
                    break;
                default:
                    echo 'Erreur 404 - Action invalide';
            }
        }else{
                echo 'Erreur 404 - Controleur invalide';
            }
        }

}