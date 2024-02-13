@extends('gabarit')

@section('contenu')
    <form action="index.php?controleur=contact&action=inserer" method="POST" novalidate>
        <!-- Reste du formulaire -->

        <form action="index.php?controleur=contact&action=inserer" method="POST" novalidate>

            <fieldset class="formSection">
                <fieldset class="ctnForm fNom">
                    <div class="nom">
                        <!-- Nom ---------------------->
                        <p><label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" placeholder="Nom" required
                                value="{{ isset($tValidation['nom']['valeur']) ? $tValidation['nom']['valeur'] : '' }}">
                        </p>
                        <span class="erreur_message">
                            {{ isset($tValidation['nom']['message']) ? $tValidation['nom']['message'] : '' }}
                        </span>
                    </div>


                    <!-- Courriel ---------------------->
                    <p>
                        <label for="courriel" class="screen-reader-only">courriel</label>
                        <input type="text" name="courriel" id="courriel" placeholder="Courriel" required
                            value="{{ isset($tValidation['courriel']['valeur']) ? $tValidation['courriel']['valeur'] : '' }}">
                    </p>
                    <span class="erreur_message">
                        {{ isset($tValidation['courriel']['message']) ? $tValidation['courriel']['message'] : '' }}
                    </span>

                    <!-- Destinataire ---------------------->
                    <p>
                        <label for="destinataire" class="screen-reader-only">Destinataire</label>
                        <select name="destinataire" id="destinataire" required>
                            @foreach ($tResponsables as $Responsable)
                                <option value="{{ $Responsable->getId() }}"> {{ $Responsable->getPrenomNom() }}</option>
                            @endforeach
                        </select>
                    </p>


                    <!-- Téléphone ---------------------->
                    <p>
                        <label for="telephone" class="screen-reader-only">Téléphone</label>
                        <input
                            class="{{ isset($tValidation['telephone']['valide']) && $tValidation['telephone']['valide'] === false ? 'erreur' : '' }}"
                            type="tel" name="telephone" id="telephone" placeholder="Téléphone"
                            value="{{ isset($tValidation['telephone']['valeur']) ? $tValidation['telephone']['valeur'] : '' }}">
                    </p>
                    <p class="erreur__message">
                        {{ isset($tValidation['telephone']['message']) ? $tValidation['telephone']['message'] : '' }}
                    </p>

                    <!-- Sujet ---------------------->
                    <p>
                        <label for="sujet" class="screen-reader-only">Sujet</label>
                        <input type="text" name="sujet" id="sujet" placeholder="Sujet" required
                            value="{{ isset($tValidation['sujet']['valeur']) ? $tValidation['sujet']['valeur'] : '' }}">
                    </p>
                    <span class="erreur_message">
                        {{ isset($tValidation['sujet']['message']) ? $tValidation['sujet']['message'] : '' }}
                    </span>

                    <!-- Message ---------------------->
                    <p>
                        <label for="contenu" class="screen-reader-only">Message</label>
                        <input type="text" name="contenu" id="contenu" placeholder="Message" required
                            value="{{ isset($tValidation['message']['valeur']) ? $tValidation['message']['valeur'] : '' }}">
                    </p>

                    <span class="erreur_message">
                        {{ isset($tValidation['message']['message']) ? $tValidation['message']['message'] : '' }}
                    </span>

                    <!-- Consentement ---------------------->

                    <p>
                        <?php
                        $acceptationConsentement = isset($tValidation['consentement']['valeur']) ? $tValidation['consentement']['valeur'] : null;
                        ?>
                        <input name="consentement" id="consentement" type="checkbox" <?php echo $acceptationConsentement === 'on' ? 'checked' : ''; ?> required>
                        <label for="consentement"> J'accepte les consentements</label>
                    </p>
                    <p class="erreur__message">
                        {{ isset($tValidation['consentement']['message']) ? $tValidation['consentement']['message'] : '' }}
                    </p>

                    @php
                        echo '<pre>';
                        print_r($tValidation);
                        echo '</pre>';
                    @endphp

                    <!-- Bouton Envoyer ---------------------->
                    <p>
                        <button type="submit">Envoyer</button>
                    </p>
                </fieldset>
            </fieldset>
        </form>
    @endsection
