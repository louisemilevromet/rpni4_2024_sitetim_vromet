<script src="./liaisons/js/accueil.js" defer></script>
<script src="./liaisons/js/links.js" defer></script>

@extends('gabarit')

@section('title')
    Accueil
@endsection

@section('contenu')
    <div class="container">
        <div class="container-entete">
            <div class="container-entete__element">
                <video class="video" controls poster="./liaisons/images/Video_pic.png">
                    <source src="./liaisons/images/Vromet_TIM_Final.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <h3 class="h3-accueil"> {!! $texteId11 !!} </h3>
            </div>
        </div>
    </div>
    <div class="container-left">
        <h2>AXES DE LA FORMATION</h2>

        <div
            style="display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    gap: 3rem;">
            @foreach ($axes as $axe)
                <div class="container-left__axes-container">
                    <div class="container-left__axes-container__pourcent">
                        {{ $axe->getPourcentage() }}
                    </div>
                    <div class="container-left__axes-container__titre">
                        <h3 style="font-size: clamp(2.2rem, 2.2vw, 6rem);"> {{ $axe->getTitre() }} </h3>
                    </div>
                    <div class="container-left__axes-container__texte">
                        {{ $axe->getTexte() }}
                    </div>
                    <ul class="container-left__axes-container__liste">
                        {!! $axe->getListe() !!}
                    </ul>

                </div>
            @endforeach
        </div>
    </div>

    <div class="container-right">
        <h2>BOURSES</h2>
        {!! $texteId10 !!}
    </div>

    <div class="container-left">
        <h2>ÉTUDIANT D'UN JOUR</h2>
        {!! $texteId8 !!}
        <button style="width: fit-content;"
            onclick="openLinks('https://www.csfoy.ca/etudiante-et-etudiant-dun-jour/etudiante-et-etudiant-dun-jour-formulaire/')">Remplir
            le formulaire d'inscription</button>
    </div>

    <div class="container">
        <div class="container__stages">
            <div class="container__container-stages">
                <div class="container__container-stages-finaux">
                    <div class="line"> </div>
                    <div class="container__container-contenu">
                        <div class="container__container-titre" id="div-prof">
                            <h2 style="font-size: clamp(2rem, 5vw, 4rem);">PROFESSION</h2>
                            <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="profession-svg"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 122.88 120.64" style="enable-background:new 0 0 122.88 120.64"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M108.91,54.03c1.63-1.55,3.74-2.31,5.85-2.28c2.11,0.03,4.2,0.84,5.79,2.44l0.12,0.12c1.5,1.58,2.23,3.6,2.2,5.61 c-0.03,2.01-0.82,4.02-2.37,5.55c-17.66,17.66-35.61,35.13-53.4,52.68c-0.05,0.07-0.1,0.13-0.16,0.19 c-1.63,1.55-3.76,2.31-5.87,2.28c-2.11-0.03-4.21-0.85-5.8-2.45l-0.26-0.27C37.47,100.43,19.87,82.98,2.36,65.46 C0.82,63.93,0.03,61.93,0,59.92c-0.03-2.01,0.7-4.03,2.21-5.61l0.15-0.15c1.58-1.57,3.66-2.38,5.76-2.41 c2.1-0.03,4.22,0.73,5.85,2.28l47.27,47.22L108.91,54.03L108.91,54.03z M106.91,2.26c1.62-1.54,3.73-2.29,5.83-2.26 c2.11,0.03,4.2,0.84,5.79,2.44l0.12,0.12c1.5,1.57,2.23,3.6,2.21,5.61c-0.03,2.01-0.82,4.02-2.37,5.55 C101.2,31.01,84.2,48.87,67.12,66.39c-0.05,0.07-0.11,0.14-0.17,0.21c-1.63,1.55-3.76,2.31-5.87,2.28 c-2.11-0.03-4.21-0.85-5.8-2.45C38.33,48.94,21.44,31.36,4.51,13.83l-0.13-0.12c-1.54-1.53-2.32-3.53-2.35-5.54 C2,6.16,2.73,4.14,4.23,2.56l0.15-0.15C5.96,0.84,8.05,0.03,10.14,0c2.1-0.03,4.22,0.73,5.85,2.28l45.24,47.18L106.91,2.26 L106.91,2.26z" />
                                </g>
                            </svg>
                        </div>
                        <div class="container__container-info" id="profession-info">
                            {!! $texteId19 !!}
                            {!! $texteId20 !!}
                            {!! $texteId21 !!}
                        </div>
                    </div>
                </div>

                <div class="container__container-stages-ate">
                    <div class="line"> </div>
                    <div class="container__container-contenu">
                        <div class="container__container-titre" id="div-uni">
                            <h2 style="font-size: clamp(2rem, 5vw, 4rem);">PROGRAMMES <br> UNIVERSITAIRES</h2>
                            <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="uni-svg"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 122.88 120.64" style="enable-background:new 0 0 122.88 120.64"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M108.91,54.03c1.63-1.55,3.74-2.31,5.85-2.28c2.11,0.03,4.2,0.84,5.79,2.44l0.12,0.12c1.5,1.58,2.23,3.6,2.2,5.61 c-0.03,2.01-0.82,4.02-2.37,5.55c-17.66,17.66-35.61,35.13-53.4,52.68c-0.05,0.07-0.1,0.13-0.16,0.19 c-1.63,1.55-3.76,2.31-5.87,2.28c-2.11-0.03-4.21-0.85-5.8-2.45l-0.26-0.27C37.47,100.43,19.87,82.98,2.36,65.46 C0.82,63.93,0.03,61.93,0,59.92c-0.03-2.01,0.7-4.03,2.21-5.61l0.15-0.15c1.58-1.57,3.66-2.38,5.76-2.41 c2.1-0.03,4.22,0.73,5.85,2.28l47.27,47.22L108.91,54.03L108.91,54.03z M106.91,2.26c1.62-1.54,3.73-2.29,5.83-2.26 c2.11,0.03,4.2,0.84,5.79,2.44l0.12,0.12c1.5,1.57,2.23,3.6,2.21,5.61c-0.03,2.01-0.82,4.02-2.37,5.55 C101.2,31.01,84.2,48.87,67.12,66.39c-0.05,0.07-0.11,0.14-0.17,0.21c-1.63,1.55-3.76,2.31-5.87,2.28 c-2.11-0.03-4.21-0.85-5.8-2.45C38.33,48.94,21.44,31.36,4.51,13.83l-0.13-0.12c-1.54-1.53-2.32-3.53-2.35-5.54 C2,6.16,2.73,4.14,4.23,2.56l0.15-0.15C5.96,0.84,8.05,0.03,10.14,0c2.1-0.03,4.22,0.73,5.85,2.28l45.24,47.18L106.91,2.26 L106.91,2.26z" />
                                </g>
                            </svg>
                        </div>
                        <div class="container__container-info" id="uni-info">
                            {!! $texteId22->getTexte() !!}
                            {!! $texteId22->getListe() !!}
                        </div>
                    </div>
                </div>

                <div class="container__container-stages-ate">
                    <div class="line"> </div>
                    <div class="container__container-contenu">
                        <div class="container__container-titre" id="div-type">
                            <h2 style="font-size: clamp(2rem, 5vw, 4rem);">TYPE <br> D'EMPLOYEURS</h2>
                            <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="type-svg"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 122.88 120.64" style="enable-background:new 0 0 122.88 120.64"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M108.91,54.03c1.63-1.55,3.74-2.31,5.85-2.28c2.11,0.03,4.2,0.84,5.79,2.44l0.12,0.12c1.5,1.58,2.23,3.6,2.2,5.61 c-0.03,2.01-0.82,4.02-2.37,5.55c-17.66,17.66-35.61,35.13-53.4,52.68c-0.05,0.07-0.1,0.13-0.16,0.19 c-1.63,1.55-3.76,2.31-5.87,2.28c-2.11-0.03-4.21-0.85-5.8-2.45l-0.26-0.27C37.47,100.43,19.87,82.98,2.36,65.46 C0.82,63.93,0.03,61.93,0,59.92c-0.03-2.01,0.7-4.03,2.21-5.61l0.15-0.15c1.58-1.57,3.66-2.38,5.76-2.41 c2.1-0.03,4.22,0.73,5.85,2.28l47.27,47.22L108.91,54.03L108.91,54.03z M106.91,2.26c1.62-1.54,3.73-2.29,5.83-2.26 c2.11,0.03,4.2,0.84,5.79,2.44l0.12,0.12c1.5,1.57,2.23,3.6,2.21,5.61c-0.03,2.01-0.82,4.02-2.37,5.55 C101.2,31.01,84.2,48.87,67.12,66.39c-0.05,0.07-0.11,0.14-0.17,0.21c-1.63,1.55-3.76,2.31-5.87,2.28 c-2.11-0.03-4.21-0.85-5.8-2.45C38.33,48.94,21.44,31.36,4.51,13.83l-0.13-0.12c-1.54-1.53-2.32-3.53-2.35-5.54 C2,6.16,2.73,4.14,4.23,2.56l0.15-0.15C5.96,0.84,8.05,0.03,10.14,0c2.1-0.03,4.22,0.73,5.85,2.28l45.24,47.18L106.91,2.26 L106.91,2.26z" />
                                </g>
                            </svg>
                        </div>
                        <div class="container__container-info" id="type-info">
                            {!! $texteId23 !!}
                        </div>
                    </div>
                    <div class="line"> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cours"
        style="padding-bottom: 14rem;
    display: flex;
    flex-direction: row;
    gap: 3rem;
    align-items: center;
">
        <h2>GRILLE DE COURS</h2>
        <button onclick="openLinks('https://timcsf.ca/liaisons/pdf/grille_cours_TIM.pdf')">Télécharger</button>
        <button
            onclick="openLinks('https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps')">Voir
            en ligne</button>
    </div>

    <div class="container-right">
        <h2>INSCRIPTION</h2>
        <p>Les demandes d'admission au programme TIM sont reçues avant le 1er mars de chaque année (1er tour),le 1er mai (2e
            tour) , le 1er juin (3e tour) et le 1er août(4e tour).</p>
        <button onclick="openLinks('https://www.sracq.qc.ca/')">Inscription en ligne</button>
    </div>

    <div class="container-left">
        <h2>TÉMOIGNAGES DES ANCIENS</h2>
    </div>

    <div class="container-temoignages">
        @foreach ($temoignages as $temoignage)
            <div class="container-temoignage">
                <div class="container-temoignage__image">
                    <img style="width: 75%; border-radius: 4px;"
                        src="./liaisons/images/temoignages/{{ $temoignage->getId() }}.png"
                        alt="{{ $temoignage->getTemoin() }}">
                </div>
                <div class="container-temoignage__texte">
                    <h3> {{ $temoignage->getTemoin() }} </h3>
                    <p> {{ $temoignage->getTemoignage() }} </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
