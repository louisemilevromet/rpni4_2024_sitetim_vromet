<script src="./liaisons/js/links.js" defer></script>

@extends('gabarit')

@section('contenu')
    <div class="container">
        <div class="container-entete">
            <div class="container-entete__element">
                @if (is_file('./liaisons/images/diplomes/' . $diplome->getId() . '.jpg'))
                    <img class="img-diplome" src="./liaisons/images/diplomes/{{ $diplome->getId() }}.jpg"
                        alt="{{ $diplome->getPrenom() . ' ' . $diplome->getNom() }}">
                @else
                    <img class="img-diplome" src="https://placehold.co/300x300"
                        alt="{{ $diplome->getPrenom() . ' ' . $diplome->getNom() }}">
                @endif
                <div class="container-diplome__infos">
                    <p style="width: 100%"> {!! $diplome->getPresentation() !!} </p>
                    <a style="width: fit-content;" href="mailto: {!! $diplome->getCourriel() !!}"> {!! $diplome->getCourriel() !!} </a>
                    <button style="width: fit-content"
                        onclick="openLinks('{{ $diplome->getLinkedin() }}')">Linkedin</button>
                    <ul>
                        <li>Intéret Conception : {{ $diplome->getInteretConception() }}/10</li>
                        <li>Intéret Médias : {{ $diplome->getInteretMedias() }}/10</li>
                        <li>Intéret Intégration : {{ $diplome->getInteretIntegration() }}/10</li>
                        <li>Intégration Programmation : {{ $diplome->getInteretProgrammation() }}/10</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
