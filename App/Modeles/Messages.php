<?php
//Classe modèle
declare(strict_types=1);

namespace App\Modeles;

use \PDO;

use App\App;

class Messages
{
    private int $id = 0;
    private string $prenom_nom = "";
    private string $courriel = "";
    private string $telephone = "";
    private string $consentement = "";
    private string $sujet = "";
    private string $contenu = "";
    private string $dateheure_creation = "";
    private int $responsable_id = 0;



    public function __construct()
    {
    }

    public function inserer(): void
    {
        $chaineSQL = 'INSERT INTO messages (prenom_nom, courriel)
        VALUES (:prenom_nom, :courriel)';

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':prenom_nom', $this->prenom_nom, PDO::PARAM_STR);
        $requetePreparee->bindParam(':courriel', $this->courriel, PDO::PARAM_STR);

        // Exécuter la requête
        $requetePreparee->execute();
    }

    public function setNom(string $prenom_nom): void
    {
        $this->prenom_nom = $prenom_nom;
    }

    public function setCourriel(string $courriel): void
    {
        $this->courriel = $courriel;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function setConsentement(string $consentement): void
    {
        $this->consentement = $consentement;
    }

    public function setSujet(string $sujet): void
    {
        $this->sujet = $sujet;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function setDateheure_creation(string $dateheure_creation): void
    {
        $this->dateheure_creation = $dateheure_creation;
    }
}
