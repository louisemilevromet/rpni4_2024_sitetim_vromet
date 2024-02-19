import data from "../json/messagesContactValidation.json" assert { type: "json" };

let validation = {
  //conserve la référence de l'élément de formulaire
  refFormulaire: null,
  //conserse le tableau des messages d'erreur
  tErreurs: data,
  //tableau des validités des champs
  tValide: [],

  /**
   * Méthode d'initialisation de la validation du formulaire
   */
  initialiser: function () {
    //si le javascript et activé, la classe js est placée dans le body indiquant au CSS qu'il est actif
    document.body.className = "js";

    //obtient la référence de la balise <form> en utilisant la classe formulaire
    this.refFormulaire = document.getElementById("form");

    //empêche la validation html quand il y a du javascript
    this.refFormulaire.setAttribute("novalidate", "novalidate");

    //défini les écouteurs d'événement des boutons submit et reset
    this.refFormulaire.addEventListener(
      "submit",
      this.validerFormulaire.bind(this)
    );
    this.refFormulaire.addEventListener(
      "reset",
      this.effacerFormulaire.bind(this)
    );

    //défini les écouteurs blur des éléments de texte du formulaire
    this.refFormulaire
      .querySelector("#nom")
      .addEventListener("blur", this.validerChampTexte.bind(this));
    this.refFormulaire
      .querySelector("#courriel")
      .addEventListener("blur", this.validerChampTexte.bind(this));

    this.refFormulaire
      .querySelector("#telephone")
      .addEventListener("blur", this.validerChampTexte.bind(this));
    this.refFormulaire
      .querySelector("#sujet")
      .addEventListener("blur", this.validerChampTexte.bind(this));
    this.refFormulaire
      .querySelector("#message")
      .addEventListener("blur", this.validerChampTexte.bind(this));
    this.refFormulaire
      .querySelector("#humain")
      .addEventListener("blur", this.validerCheckbox.bind(this));

    this.tValide["nom"] = false;
    this.tValide["courriel"] = false;
    this.tValide["telephone"] = false;
    this.tValide["sujet"] = false;
    this.tValide["message"] = false;
    this.tValide["humain"] = false;
  },

  activerTelephone: function (e) {
    if (e.target.value === "4") {
      document.querySelector(".form__telephone-container").style.display =
        "flex";
      document.querySelector(".form__consentement-container").style.display =
        "flex";
    }
  },

  /**
   * Méthode de validation des champs de texte
   * @param evenement
   */
  validerChampTexte: function (evenement) {
    //champ invalide par défaut
    let valide = false;
    //objet du DOM déclancheur, initialise un objet jQuery
    let objCible = evenement.currentTarget;

    //retrouve le regexp de l'objet du DOM en lisant l'attribut pattern
    let strChaineExp = new RegExp(objCible.getAttribute("pattern"));
    //valide si pas vide
    if (this.validerSiVide(objCible) === true) {
      //si vide, afficher le message d'erreur
      this.afficherChampErreur(
        objCible,
        this.tErreurs[objCible.getAttribute("name")]["erreurs"]["vide"]
      );
    } else {
      if (objCible.hasAttribute("pattern")) {
        //si pas vide, tester le pattern
        if (strChaineExp.test(objCible.value)) {
          //si pattern ok
          valide = true;
          //effacer le champ d'erreur
          this.effacerChampErreur(objCible);
        } else {
          //si pattern invalide afficher message détaillé
          this.afficherChampErreur(
            objCible,
            this.tErreurs[objCible.getAttribute("name")]["erreurs"]["pattern"]
          );
        }
      } else {
        this.effacerChampErreur(objCible);
        valide = true;
      }
    }
    //modifier le tableau des validitées
    this.modifierTableauValidation(objCible.getAttribute("name"), valide);
  },

  /**
   * Méthode de validation des champs checkbox
   * @param evenement
   */

  validerCheckbox: function (evenement) {
    let objCible = evenement.currentTarget;
    let valide = false;
    if (objCible.checked) {
      this.modifierTableauValidation(objCible.getAttribute("name"), true);
      valide = true;
      //effacer le champ d'erreur
      this.effacerChampErreur(objCible);
    } else {
      this.modifierTableauValidation(objCible.getAttribute("name"), false);
      //si vide, afficher le message d'erreur
      this.afficherChampErreur(
        objCible,
        this.tErreurs[objCible.getAttribute("name")]["erreurs"]["vide"]
      );
    }
    //modifier le tableau des validitées
    this.modifierTableauValidation(objCible.getAttribute("name"), valide);
  },

  /**
   * Méthode de validation finale du formulaire et d'envoi
   * @param evenement
   */
  validerFormulaire: function (evenement) {
    //Par defaut, le formulaire est considé comme valide
    let valide = true;
    //Pour chacun des champs présent dans le tableau de validation
    for (let champ in this.tValide) {
      //Si un champ est invalide
      if (this.tValide[champ] === false) {
        //cible l'objet du DOM fautif
        let objCible = this.refFormulaire.querySelector("#" + champ);
        //ici deux possibilité de message, vide ou pattern
        if (this.validerSiVide(objCible) === true) {
          this.afficherChampErreur(
            objCible,
            this.tErreurs[objCible.getAttribute("name")]["erreurs"]["vide"]
          );
        } else {
          if (objCible.hasAttribute("pattern")) {
            let strChaineExp = new RegExp(objCible.getAttribute("pattern"));
            if (strChaineExp.test(objCible.value)) {
              //affiche que l'entrée n'est pas du bon format
              this.afficherChampErreur(
                objCible,
                this.tErreurs[objCible.getAttribute("name")]["erreurs"][
                  "pattern"
                ]
              );
            }
          } else {
            //effacer le champ d'erreur
            this.effacerChampErreur(objCible);
          }
        }
        //Le formulaire contient des champs invalide, et n'est donc pas prêt à l'envoi
        valide = false;
      }
    }

    // si le formulaire n'est pas valide, on annule la soumission du formulaire de l'événement submit
    if (valide === false) {
      evenement.preventDefault();
    }
  },

  //Méthodes utilitaires**********************************
  /**
   * Méthode de validation de champs si vide
   * @param objCible
   * @returns {boolean}
   */
  validerSiVide: function (objCible) {
    let valide = false; //false = champ vide
    if (objCible.value === "" || !objCible.checked) {
      valide = true; //si false, champ contient quelque chose
    }
    return valide;
  },

  /**
   * Méthode d'affichage des messages d'erreur
   * @param objCible
   * @param message
   */
  afficherChampErreur: function (objCible, message) {
    let nom = "err_" + objCible.getAttribute("id");
    document.getElementById(nom).innerHTML = message;
    objCible.classList.add("erreur");
  },

  /**
   * Méthode d'effacement des messages d'erreur
   * @param objCible
   */
  effacerChampErreur: function (objCible) {
    let nom = "err_" + objCible.getAttribute("id");
    document.getElementById(nom).innerHTML = "";
    objCible.classList.remove("erreur");
  },

  /**
   * Méthode de d'inscription de l'état des champs dans le tableau de validation
   * @param nomChamp
   * @param valide
   */
  modifierTableauValidation: function (nomChamp, valide) {
    this.tValide[nomChamp] = valide;
  },

  /**
   * Méthode d'effacement des message d'erreur et de remise à zéro des champs du formulaire
   */
  effacerFormulaire: function () {
    let liste = document.querySelectorAll(".formulaire__erreur");
    liste.forEach(function (objetCible) {
      objetCible.innerHTML = "";
      objetCible.parentNode.classList.remove("formulaire__item--erreur");
    });
    this.tValide["prenom"] = false;
    this.tValide["nom"] = false;
    this.tValide["courriel"] = false;
    this.tValide["sujet"] = false;
    this.tValide["message"] = false;
  },
};
//Fin méthodes utilitaires**********************************

//*******************
// Écouteurs d'événements
//*******************
window.addEventListener("load", validation.initialiser.bind(validation));

//Si le destinataire est 4, affiche le champ téléphone
document.getElementById("destinataire").addEventListener("change", (e) => {
  validation.activerTelephone(e);
  if (e.target.value !== "4") {
    document.querySelector(".form__telephone-container").style.display = "none";
    document.querySelector(".form__consentement-container").style.display =
      "none";
  }
});
