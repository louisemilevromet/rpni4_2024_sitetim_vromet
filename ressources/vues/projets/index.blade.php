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
                        <input type="checkbox" value="on" name="annee1" <?php if (isset($_GET['annee1'])) {
                            echo 'checked';
                        } ?>>1er année</input>
                        <input type="checkbox" value="on" name="annee2" <?php if (isset($_GET['annee2'])) {
                            echo 'checked';
                        } ?>>2e année</input>
                        <input type="checkbox" value="on" name="annee3" <?php if (isset($_GET['annee3'])) {
                            echo 'checked';
                        } ?>>3e année</input>
                    </div>
                </div>
                <div class="container-filtre__triage">
                    <p>Trier par année</p>
                    <div class="container-filtre__infos-2">
                        <button class="triage">Conception</button>
                        <button class="triage">Intégration</button>
                        <button class="triage">Programmation</button>
                        <button class="triage">Médias</button>
                        <button class="triage">Autres</button>
                    </div>
                </div>
            </div>
            <button type="submit">Filtrer</button>
            <button type="reset">Réinitialiser</button>
        </form>
        <div class="container-images">
            <ul>
                @foreach ($projets as $projet)
                    <li>
                        Titre projet : {{ $projet->getTitre() }}
                        id : {{ $projet->getId() }}
                        @foreach ($projet->getAxesCoursAssociés() as $axes_cours)
                            @foreach ($axes_cours->getAxesAssociées() as $axes)
                                <p>Axe : {{ $axes->getNom() }}</p>
                            @endforeach
                        @endforeach
                        <p>Année : {{ $projet->getCoursAssociés()->getAnnee() }}</p>
                    </li>

                    @if (file_exists(
                            './liaisons/images/projets_recadrer/' . $projet->getDiplomeId() . '_' . $projet->getId() . '_01__w700.png'))
                        <div>
                            <img
                                src="./liaisons/images/projets_recadrer/{{ $projet->getDiplomeId() }}_{{ $projet->getId() }}_01__w700.png">
                        </div>
                    @else
                        <div>
                            <img src="https://placehold.co/160x240">
                        </div>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
