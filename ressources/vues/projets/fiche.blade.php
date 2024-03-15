@extends('gabarit')
<script type="module" src="./liaisons/js/projets.js" defer></script>

@section('contenu')
    <div class="container-entete"
        style="flex-direction: column; align-items: center; gap: 8rem; margin-left: 3rem; margin-right: 3rem;">
        <div class="container-images__ul-projet">
            @for ($i = 1; $i <= 7; $i++)
                @if (is_file(
                        './liaisons/images/projets_recadrer/' .
                            $projet->getDiplomeId() .
                            '_' .
                            $projet->getId() .
                            '_0' .
                            $i .
                            '__w700.png'))
                    <img class="img-projet"
                        src="./liaisons/images/projets_recadrer/{{ $projet->getDiplomeId() }}_{{ $projet->getId() }}_0{{ $i }}__w700.png"
                        alt="Image du projet {{ $projet->getTitre() }}">
                @endif
            @endfor
        </div>
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
            <a href="index.php?controleur=site&action=diplome&id={{ $projet->getDimplomeAssocié()->getId() }}">
                {{ $projet->getDimplomeAssocié()->getPrenom() }}
                {{ $projet->getDimplomeAssocié()->getNom() }} </a>
        </h2>
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
        <div class="container-left">
            <h2>ÉTAPES</h2>
        </div>


        <div class="container-etapes">
            @foreach ($projet->getEtapesAssociées() as $etape)
                <div class="container-etapes__element">
                    <div class="container-etapes__infos" style="">
                        <h2 style="font-size: clamp(2rem, 3vw, 3rem);">{!! $etape->getNom() !!}</h2>
                        {!! $etape->getDescription() !!}
                    </div>

                    @if (file_exists(
                            './liaisons/images/projets_recadrer/' .
                                $projet->getDiplomeId() .
                                '_' .
                                $projet->getId() .
                                '_e' .
                                $etape->getId() .
                                '__w700.png'))
                        <img class="img-projet"
                            src="./liaisons/images/projets_recadrer/{{ $projet->getDiplomeId() }}_{{ $projet->getId() }}_e{{ $etape->getId() }}__w700.png">
                    @else
                        <img class="img-projet" src="https://placehold.co/618x348">
                    @endif
                </div>
            @endforeach
        </div>
    @endif

@endsection
