@extends('gabarit')

@section('contenu')
    <div class="container">

        <div class="container-projet__entete">
            {!! $projet->getDescription() !!}
        </div>

    </div>
    <div class="container-projet__tech">
        <h2>Technologies utilisées</h2>

        {!! $projet->getTechnologies() !!}
    </div>

    @if ($projet->getEtapesAssociées() !== [])
        <div class="container-projet__etapes">
            <h2>Étapes</h2>

            @foreach ($projet->getEtapesAssociées() as $etape)
                {!! $etape->getNom() !!}
            @endforeach
        </div>
    @endif

@endsection
