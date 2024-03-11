@extends('gabarit')

@section('contenu')
    <div class="container-entete">
        {!! $projet->getDescription() !!}
    </div>
    <div class="container-left">
        <h2>TECHNOLOGIES UTILISÉES</h2>

        <?php $array = explode(', ', $projet->getTechnologies()); ?>
        <div class="techs-container">
            @foreach ($array as $techno)
                <div class="techs">
                    <p>{{ $techno }}</p>
                    @if (file_exists('./liaisons/images/technos/' . $techno . '.png'))
                        <img class="img-techno" src="./liaisons/images/technos/{{ $techno }}.png">
                    @else
                        <img class="img-techno" src="https://placehold.co/50x50">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-right">
        <h2 style="width: 80%; text-align: end; text-transform: uppercase;">AUTRES PROJETS DE
            {{ $projet->getDimplomeAssocié()->getPrenom() }}
            {{ $projet->getDimplomeAssocié()->getNom() }}</h2>
    </div>

    <div class="container-projets-associes">
        <ul class="container-images__ul-projet">
            @foreach ($projet->getDimplomeAssocié()->getProjetsAssociés() as $projetAssocie)
                @if ($projetAssocie->getId() !== $projet->getId())
                    <li class="container-images__container">
                        <div class="container-images__infos">
                            <h3 style="text-transform: uppercase;   font-size: clamp(1rem, 3vw, 3rem); font-style: bold;">
                                {{ $projetAssocie->getTitre() }}</h3>
                            <p>
                                @if ($projetAssocie->getCoursAssociés()->getAnnee() == 1)
                                    {{ $projetAssocie->getCoursAssociés()->getAnnee() }}<sup>ère</sup> année
                                @else
                                    {{ $projetAssocie->getCoursAssociés()->getAnnee() }}<sup>e</sup> année
                                @endif
                            </p>
                            <p>{!! $projetAssocie->getTechnologies() !!}</p>
                            <p>
                                @foreach ($projetAssocie->getAxesCoursAssociés() as $axescours)
                                    @foreach ($axescours->getAxesAssociées() as $axes)
                                        {!! $axes->getNom() !!}
                                    @endforeach
                                @endforeach
                            </p>
                            <p><a href="index.php?controleur=projets&action=fiche&id={{ $projetAssocie->getId() }}">
                                    Voir le projet</a>
                            <p>
                        </div>
                        @if (file_exists(
                                './liaisons/images/projets_recadrer/' .
                                    $projetAssocie->getDiplomeId() .
                                    '_' .
                                    $projetAssocie->getId() .
                                    '_01__w700.png'))
                            <img class="img-projet"
                                src="./liaisons/images/projets_recadrer/{{ $projetAssocie->getDiplomeId() }}_{{ $projetAssocie->getId() }}_01__w700.png">
                        @else
                            <img class="img-projet" src="https://placehold.co/618x348">
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>

    </div>

    @if ($projet->getEtapesAssociées() !== [])
        <div class="container-projet__etapes">
            <h2>ÉTAPES</h2>

            @foreach ($projet->getEtapesAssociées() as $etape)
                {!! $etape->getNom() !!}
            @endforeach
        </div>
    @endif

@endsection
