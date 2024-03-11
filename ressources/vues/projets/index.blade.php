@extends('gabarit')

@section('contenu')
    <div class="container-projets">
        <form action="index.php?" method="get">

            <input type="hidden" value="projets" name="controleur">
            <input type="hidden" value="index" name="action">

            <div class="container-filtre">
                <h2>Filtres</h2>
                <div class="container-filtre__triage">
                    <p>Trier par année</p>

                    <div class="container-filtre__infos">

                        <input type="radio" value="1" name="annee" id="annee1" <?php
                        if (!isset($_GET['annee'])) {
                            echo 'unchecked';
                        } elseif ($_GET['annee'] == '1') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="annee1" class="annee">
                            <p>1<sup>ère</sup> année</p>
                        </label>

                        <input type="radio" value="2" name="annee" id="annee2" <?php
                        if (!isset($_GET['annee'])) {
                            echo 'unchecked';
                        } elseif ($_GET['annee'] == '2') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="annee2" class="annee">
                            <p>2<sup>e</sup> année</p>
                        </label>

                        <input type="radio" value="3" name="annee" id="annee3" <?php
                        if (!isset($_GET['annee'])) {
                            echo 'unchecked';
                        } elseif ($_GET['annee'] == '3') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="annee3" class="annee">
                            <p>3<sup>e</sup> année</p>
                        </label>


                    </div>
                </div>
                <div class="container-filtre__triage">
                    <p>Trier par Axes</p>
                    <div class="container-filtre__infos-2">

                        <input type="radio" value="1" name="axe" id="axe1" <?php
                        if (!isset($_GET['axe'])) {
                            echo 'unchecked';
                        } elseif ($_GET['axe'] == '1') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="axe1" class="triage">
                            <p>Conception</p>
                        </label>

                        <input type="radio" value="2" name="axe" id="axe2" <?php
                        if (!isset($_GET['axe'])) {
                            echo 'unchecked';
                        } elseif ($_GET['axe'] == '2') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="axe2" class="triage">
                            <p>Intégration</p>
                        </label>

                        <input type="radio" value="3" name="axe" id="axe3" <?php
                        if (!isset($_GET['axe'])) {
                            echo 'unchecked';
                        } elseif ($_GET['axe'] == '3') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="axe3" class="triage">
                            <p>Programmation</p>
                        </label>

                        <input type="radio" value="4" name="axe" id="axe4" <?php
                        if (!isset($_GET['axe'])) {
                            echo 'unchecked';
                        } elseif ($_GET['axe'] == '4') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="axe4" class="triage">
                            <p>Médias</p>
                        </label>

                        <input type="radio" value="5" name="axe" id="axe5" <?php
                        if (!isset($_GET['axe'])) {
                            echo 'unchecked';
                        } elseif ($_GET['axe'] == '5') {
                            echo 'checked';
                        }
                        ?> />

                        <label for="axe5" class="triage">
                            <p>Autre</p>
                        </label>



                    </div>
                </div>
                <div class="container-filtre__submit">
                    <button type="submit">Filtrer</button>
                    <button><a style="color: white; text-decoration: none;"
                            href="index.php?controleur=projets&action=index">Réinitialiser</a></button>

                </div>

            </div>

        </form>
        <div class="container-images">
            <ul class="container-images__ul">
                @foreach ($projets as $projet)
                    <li class="container-images__container">
                        <div class="container-images__infos">
                            <h3 style="text-transform: uppercase;   font-size: clamp(1rem, 3vw, 3rem); font-style: bold;">
                                {{ $projet->getTitre() }}</h3>
                            <p>
                                @if ($projet->getCoursAssociés()->getAnnee() == 1)
                                    {{ $projet->getCoursAssociés()->getAnnee() }}<sup>ère</sup> année
                                @else
                                    {{ $projet->getCoursAssociés()->getAnnee() }}<sup>e</sup> année
                                @endif
                            </p>
                            <p>{!! $projet->getTechnologies() !!}</p>
                            <p>
                                @foreach ($projet->getAxesCoursAssociés() as $axescours)
                                    @foreach ($axescours->getAxesAssociées() as $axes)
                                        {!! $axes->getNom() !!}
                                    @endforeach
                                @endforeach
                            </p>
                            <p><a href="index.php?controleur=projets&action=fiche&id={{ $projet->getId() }}">
                                    Voir le projet</a>
                            <p>
                        </div>
                        @if (file_exists(
                                './liaisons/images/projets_recadrer/' . $projet->getDiplomeId() . '_' . $projet->getId() . '_01__w700.png'))
                            <img class="img-projet"
                                src="./liaisons/images/projets_recadrer/{{ $projet->getDiplomeId() }}_{{ $projet->getId() }}_01__w700.png">
                        @else
                            <img class="img-projet" src="https://placehold.co/618x348">
                        @endif
                    </li>
                    {{-- @foreach ($projet->getAxesCoursAssociés() as $axes_cours)
                        @foreach ($axes_cours->getAxesAssociées() as $axes)
                            <p>Axe : {{ $axes->getNom() }}</p>
                        @endforeach
                    @endforeach
                    <p>Année : {{ $projet->getCoursAssociés()->getAnnee() }}</p> --}}
                @endforeach
            </ul>

        </div>
    </div>
@endsection
