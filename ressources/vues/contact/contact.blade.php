@extends('gabarit')

@section('contenu')
    <div class="form-container">
        <form action="index.php?controleur=contact&action=inserer" method="POST" novalidate class="form">
            @if (isset($tValidation['retroactions']) && $tValidation['retroactions'] !== '')
                <div class="container-erreur_message">
                    <span class="erreur__message">{{ $tValidation['retroactions'] }}</span>
                </div>
            @endif

            <div class="form__nom-container">
                <label for="nom">Nom complet *</label>
                @if (isset($tValidation['nom']['message']) && $tValidation['nom']['message'] !== '')
                    <span class="erreur__message">
                        {{ $tValidation['nom']['message'] }}
                    </span>
                @endif
                <input type="text" name="nom" id="nom" required
                    class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['nom']['valeur']) ? $tValidation['nom']['valeur'] : '' }}">
            </div>

            <div class="form__courriel-container">
                <label for="courriel">Courriel</label>
                @if (isset($tValidation['courriel']['message']) && $tValidation['courriel']['message'] !== '')
                    <span class="erreur__message">
                        {{ $tValidation['courriel']['message'] }}
                    </span>
                @endif
                <input type="text" name="courriel" id="courriel" required
                    class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['courriel']['valeur']) ? $tValidation['courriel']['valeur'] : '' }}">
            </div>

            <div class="form__destinataire-container">
                <label for="destinataire" class="screen-reader-only">Destinataire</label>
                <select name="destinataire" id="destinataire" required>
                    @foreach ($tResponsables as $Responsable)
                        <option value="{{ $Responsable->getId() }}"> {{ $Responsable->getPrenomNom() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form__telephone-container">
                <label for="telephone">Téléphone</label>
                @if (isset($tValidation['telephone']['message']) && $tValidation['telephone']['message'] !== '')
                    <span class="erreur__message">
                        {{ $tValidation['telephone']['message'] }}
                    </span>
                @endif
                <input
                    class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}"
                    type="tel" name="telephone" id="telephone"
                    value="{{ isset($tValidation['telephone']['valeur']) ? $tValidation['telephone']['valeur'] : '' }}">
            </div>

            <div class="form__sujet-container">
                <label for="sujet">Sujet</label>
                @if (isset($tValidation['sujet']['message']) && $tValidation['sujet']['message'] !== '')
                    <span class="erreur__message">
                        {{ $tValidation['sujet']['message'] }}
                    </span>
                @endif
                <input type="text" name="sujet" id="sujet" required
                    class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['sujet']['valeur']) ? $tValidation['sujet']['valeur'] : '' }}">
            </div>

            <div class="form__message-container">
                <label for="message">Message</label>
                @if (isset($tValidation['message']['message']) && $tValidation['message']['message'] !== '')
                    <span class="erreur__message">
                        {{ $tValidation['message']['message'] }}
                    </span>
                @endif
                <input type="text" name="message" id="message" required
                    class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}"
                    value="{{ isset($tValidation['message']['valeur']) ? $tValidation['message']['valeur'] : '' }}">
            </div>

            <div class="form__consentement-envoyer-container">
                <div class="form__consentement-container-plus-erreur">
                    <div class="form__consentement-container">
                        <?php
                        $acceptationConsentement = isset($tValidation['consentement']['valeur']) ? $tValidation['consentement']['valeur'] : null;
                        ?>
                        <input name="consentement" id="consentement" type="checkbox" <?php echo $acceptationConsentement === 'on' ? 'checked' : ''; ?> required
                            class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}">

                        <label for="consentement"> J'accepte les consentements</label>

                    </div>

                    @if (isset($tValidation['consentement']['message']) && $tValidation['consentement']['message'] !== '')
                        <div class="form__consentement-erreur">
                            <span class="erreur__message">
                                {{ $tValidation['consentement']['message'] }}
                            </span>
                        </div>
                    @endif

                </div>
                <div class="form__envoyer-container">
                    <button type="submit">Envoyer</button>
                </div>
            </div>

            <div class="form__humain-container-plus-erreur">
                <div class="form__humain-container">
                    <?php
                    $estHumain = isset($tValidation['humain']['valeur']) ? $tValidation['humain']['valeur'] : null;
                    ?>
                    <input name="humain" id="humain" type="checkbox" <?php echo $estHumain === 'on' ? 'checked' : ''; ?> required
                        class="{{ isset($tValidation['nom']['valide']) && $tValidation['nom']['valide'] === false ? 'erreur' : '' }}">
                    <label for="humain"> Êtes vous un robot ?</label>
                </div>


                @if (isset($tValidation['humain']['message']) && $tValidation['humain']['message'] !== '')
                    <div class="form__humain-erreur">
                        <span class="erreur__message">
                            {{ $tValidation['humain']['message'] }}
                        </span>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection

<?php
if (isset($_SESSION['tValidation'])) {
    unset($_SESSION['tValidation']);
}
?>
