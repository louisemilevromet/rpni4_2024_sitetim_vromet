@extends('gabarit')

@section('contenu')
    <div class="container">

        <form action="index.php?controleur=contact&action=inserer" method="POST" class="form" id="form">
            @if (isset($tValidation['retroactions']) && $tValidation['retroactions'] !== '')
                <div class="container-retro_message">
                    <span class="retro__message-correct">{{ $tValidation['retroactions'] }}</span>
                </div>
            @endif

            <div class="container-erreur_messageJS" id="container-erreur_message">
                <span id="err_retro"></span>
            </div>

            <div class="form__nom-container">
                <label for="nom" id="label-nom">Nom complet *</label>
                @if (isset($tValidation['nom']['message']) && $tValidation['nom']['message'] !== '')
                    <span class="err_nom">
                        {{ $tValidation['nom']['message'] }}
                    </span>
                @endif

                <span id="err_nom"></span>

                <input type="text" name="nom" id="nom" pattern="^[a-zA-ZÀ-ÿ -/']+$" required
                    class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['nom']['valeur']) ? $tValidation['nom']['valeur'] : '' }}">
            </div>

            <div class="form__courriel-container">
                <label for="courriel">Courriel</label>
                @if (isset($tValidation['courriel']['message']) && $tValidation['courriel']['message'] !== '')
                    <span class="err_courriel">
                        {{ $tValidation['courriel']['message'] }}
                    </span>
                @endif

                <span id="err_courriel"></span>

                <input type="text" name="courriel" id="courriel" pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,4})+)$"
                    required
                    class="{{ isset($tValidation['courriel']['valide']) && $tValidation['courriel']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['courriel']['valeur']) ? $tValidation['courriel']['valeur'] : '' }}">
            </div>

            <div class="form__destinataire-container">
                <label for="destinataire" class="screen-reader-only">Destinataire</label>
                <select name="destinataire" id="destinataire">
                    @foreach ($tResponsables as $Responsable)
                        <option value="{{ $Responsable->getId() }}"> {{ $Responsable->getPrenomNom() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form__telephone-container">
                <label for="telephone">Téléphone</label>
                @if (isset($tValidation['telephone']['message']) && $tValidation['telephone']['message'] !== '')
                    <span class="err_telephone">
                        {{ $tValidation['telephone']['message'] }}
                    </span>
                @endif

                <span id="err_telephone"></span>

                <input id="telephone" pattern="[0-9]{10}" type="text" name="telephone"
                    class="{{ isset($tValidation['telephone']['valide']) && $tValidation['telephone']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['telephone']['valeur']) ? $tValidation['telephone']['valeur'] : '' }}">
            </div>

            <div class="form__sujet-container">
                <label for="sujet">Sujet</label>
                @if (isset($tValidation['sujet']['message']) && $tValidation['sujet']['message'] !== '')
                    <span class="err_sujet">
                        {{ $tValidation['sujet']['message'] }}
                    </span>
                @endif

                <span id="err_sujet"></span>


                <input type="text" name="sujet" id="sujet" pattern="^[a-zA-ZÀ-ÿ]+$" required
                    class="{{ isset($tValidation['sujet']['valide']) && $tValidation['sujet']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['sujet']['valeur']) ? $tValidation['sujet']['valeur'] : '' }}">
            </div>

            <div class="form__message-container">
                <label for="message">Message</label>
                @if (isset($tValidation['message']['message']) && $tValidation['message']['message'] !== '')
                    <span class="err_message">
                        {{ $tValidation['message']['message'] }}
                    </span>
                @endif

                <span id="err_message"></span>

                <input type="text" name="message" id="message" required
                    class="{{ isset($tValidation['message']['valide']) && $tValidation['message']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['message']['valeur']) ? $tValidation['message']['valeur'] : '' }}">
            </div>


            <div class="form__consentement-container-plus-erreur">
                <div class="form__consentement-container">
                    <?php
                    $acceptationConsentement = isset($tValidation['consentement']['valeur']) ? $tValidation['consentement']['valeur'] : null;
                    ?>
                    <input name="consentement" id="consentement" type="checkbox" <?php echo $acceptationConsentement === 'on' ? 'checked' : ''; ?>
                        class="{{ isset($tValidation['consentement']['valide']) && $tValidation['consentement']['valide'] === false ? 'erreur' : '' }}">

                    <label for="consentement"> J'autorise l'utilisation de mon numéro de téléphone avec le responsable «
                        Étudiant d'un jour ». </label>

                </div>

                @if (isset($tValidation['consentement']['message']) && $tValidation['consentement']['message'] !== '')
                    <div class="form__consentement-erreur">
                        <span class="err_consentement">
                            {{ $tValidation['consentement']['message'] }}
                        </span>
                    </div>
                @endif

                <span id="err_consentement"></span>

            </div>


            <div class="form__humain-container-plus-erreur">
                <div class="form__humain-container">
                    <?php
                    $estHumain = isset($tValidation['humain']['valeur']) ? $tValidation['humain']['valeur'] : null;
                    ?>
                    <input name="humain" id="humain" type="checkbox" <?php echo $estHumain === 'on' ? 'checked' : ''; ?>
                        class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}">
                    <label for="humain"> Êtes vous un robot ?</label>
                </div>

                @if (isset($tValidation['humain']['message']) && $tValidation['humain']['message'] !== '')
                    <div class="form__humain-erreur">
                        <span class="err_humain">
                            {{ $tValidation['humain']['message'] }}
                        </span>
                    </div>
                @endif

                <span id="err_humain"></span>
            </div>

            <div class="form__envoyer-container">
                <button type="submit" id="submit">Envoyer</button>
            </div>
        </form>
    </div>
@endsection

<?php
if (isset($_SESSION['tValidation'])) {
    unset($_SESSION['tValidation']);
}

?>
