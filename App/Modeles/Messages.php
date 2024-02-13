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
    private bool $consentement = false;
    private string $sujet = "";
    private string $contenu = "";
    private string $dateheure_creation = "";
    private int $responsable_id = 0;



    public function __construct()
    {
    }

    public function inserer(): void
    {
        $chaineSQL = 'INSERT INTO messages (prenom_nom, courriel, telephone, consentement, sujet, contenu, dateheure_creation, responsable_id)
        VALUES (:prenom_nom, :courriel, :telephone, :consentement, :sujet, :contenu, :dateheure_creation, :responsable_id)';

        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        $requetePreparee->bindParam(':prenom_nom', $this->prenom_nom, PDO::PARAM_STR);
        $requetePreparee->bindParam(':courriel', $this->courriel, PDO::PARAM_STR);
        $requetePreparee->bindParam(':telephone', $this->telephone, PDO::PARAM_STR);
        $requetePreparee->bindParam(':consentement', $this->consentement, PDO::PARAM_INT);
        $requetePreparee->bindParam(':sujet', $this->sujet, PDO::PARAM_STR);
        $requetePreparee->bindParam(':contenu', $this->contenu, PDO::PARAM_STR);
        $requetePreparee->bindParam(':dateheure_creation', $this->dateheure_creation, PDO::PARAM_STR);
        $requetePreparee->bindParam(':responsable_id', $this->responsable_id, PDO::PARAM_INT);

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

    public function setDestinataire(int $responsable_id): void
    {
        $this->responsable_id = $responsable_id;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function setConsentement(bool $consentement): void
    {
        $this->consentement = $consentement;
    }

    public function setSujet(string $sujet): void
    {
        $this->sujet = $sujet;
    }

    public function setMessage(string $message): void
    {
        $this->contenu = $message;
    }

    public function setDateheure_creation(string $dateheure_creation): void
    {
        $this->dateheure_creation = $dateheure_creation;
    }
}
