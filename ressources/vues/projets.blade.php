@extends('gabarit')

@section('contenu')
    <div class="container-projets">
        <div class="container-filtre">
            <h2>Filtres</h2>
            <div class="container-filtre__triage">
                <p>Trier par année</p>
                <div class="container-filtre__infos">
                    <button class="triage">1er année</button>
                    <button class="triage">2e année</button>
                    <button class="triage">3e année</button>
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
        <div class="container-images">
            @foreach ($projets as $projet)
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
        </div>
    </div>
@endsection
