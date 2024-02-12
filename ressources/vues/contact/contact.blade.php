@extends('gabarit')

@section('contenu')
    <form action="index.php?controleur=contact&action=inserer" method="POST" novalidate>

        <fieldset class="formSection">
            <fieldset class="ctnForm fNom">
                <div class="nom">
                    <!-- Nom ---------------------->
                    <p><label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Nom" required
                            value="{{ isset($tValidation['nom']['valeur']) ? $tValidation['nom']['valeur'] : '' }}">
                    </p>
                    <p>
                        {{ isset($tValidation['nom']['message']) ? $tValidation['nom']['message'] : '' }}
                    </p>
                </div>


                <!-- Courriel ---------------------->
                <p>
                    <label for="courriel" class="screen-reader-only">courriel</label>
                    <input type="text" name="courriel" id="courriel" placeholder="Courriel" required
                        value="{{ isset($tValidation['courriel']['valeur']) ? $tValidation['courriel']['valeur'] : '' }}">
                </p>
                <p class="erreur__message">
                    {{ isset($tValidation['courriel']['message']) ? $tValidation['courriel']['message'] : '' }}
                </p>

                <!-- Destinataire ---------------------->
                <p>
                    <label for="destinataire" class="screen-reader-only">Destinataire</label>
                    <select name="destinataire" id="destinataire" required>
                        <option value="">Choisir un destinataire...</option>
                        <option value="professeur1">Professeur 1</option>
                        <option value="professeur2">Professeur 2</option>
                        <option value="professeur3">Professeur 3</option>
                        <option value="professeur4">Professeur 4</option>
                    </select>
                </p>

                <!-- Téléphone ---------------------->
                <p>
                    <label for="telephone" class="screen-reader-only">Téléphone</label>
                    <input
                        class="{{ isset($tValidation['Telephone']['valide']) && $tValidation['Telephone']['valide'] === false ? 'erreur' : '' }}"
                        type="tel" name="telephone" id="telephone" placeholder="Téléphone"
                        value="{{ isset($tValidation['Telephone']['valeur']) ? $tValidation['Telephone']['valeur'] : '' }}">
                </p>
                <p class="erreur__message">
                    {{ isset($tValidation['Telephone']['message']) ? $tValidation['Telephone']['message'] : '' }}
                </p>

                <!-- Sujet ---------------------->
                <p>
                    <label for="sujet" class="screen-reader-only">Sujet</label>
                    <input
                        class="{{ isset($tValidation['Sujet']['valide']) && $tValidation['Sujet']['valide'] === false ? 'erreur' : '' }}"
                        type="text" name="sujet" id="sujet" placeholder="Sujet" required
                        value="{{ isset($tValidation['Sujet']['valeur']) ? $tValidation['Sujet']['valeur'] : '' }}">
                </p>
                <p class="erreur__message">
                    {{ isset($tValidation['Sujet']['message']) ? $tValidation['Sujet']['message'] : '' }}
                </p>

                <!-- Message ---------------------->
                <p>
                    <label for="message" class="screen-reader-only">Message</label>
                    <textarea
                        class="{{ isset($tValidation['Message']['valide']) && $tValidation['Message']['valide'] === false ? 'erreur' : '' }}"
                        name="message" id="message" placeholder="Message" required>{{ isset($tValidation['Message']['valeur']) ? $tValidation['Message']['valeur'] : '' }}</textarea>
                </p>
                <p class="erreur__message">
                    {{ isset($tValidation['Message']['message']) ? $tValidation['Message']['message'] : '' }}
                </p>

                <!-- Consentement ---------------------->
                <p>
                    <label for="consentement" class="screen-reader-only">Consentement</label>
                    <input
                        class="{{ isset($tValidation['Consentement']['valide']) && $tValidation['Consentement']['valide'] === false ? 'erreur' : '' }}"
                        type="checkbox" name="consentement" id="consentement" required>
                    <span>J'accepte les conditions</span>
                </p>
                <p class="erreur__message">
                    {{ isset($tValidation['Consentement']['message']) ? $tValidation['Consentement']['message'] : '' }}
                </p>

                <!-- Rétrocations ---------------------->
                <p>
                    <label for="retrocations" class="screen-reader-only">Rétrocations</label>
                    <textarea
                        class="{{ isset($tValidation['Retrocations']['valide']) && $tValidation['Retrocations']['valide'] === false ? 'erreur' : '' }}"
                        name="retrocations" id="retrocations" placeholder="Rétrocations" required>{{ isset($tValidation['Retrocations']['valeur']) ? $tValidation['Retrocations']['valeur'] : '' }}</textarea>
                </p>
                <p class="erreur__message">
                    {{ isset($tValidation['Retrocations']['message']) ? $tValidation['Retrocations']['message'] : '' }}
                </p>


                <!-- Bouton Envoyer ---------------------->
                <p>
                    <button type="submit">Envoyer</button>
                </p>
            </fieldset>
        </fieldset>
    </form>
@endsection
