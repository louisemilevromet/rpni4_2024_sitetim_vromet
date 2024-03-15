<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Technique d'intégration multiédia</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./liaisons/css/styles.css" />
    <script defer src="./liaisons/js/cursor.js"></script>
    <script type="module" src="./liaisons/js/scroll.js" defer></script>
    {{-- <script defer src="./liaisons/js/color.js"></script> --}}
    <script type="module" src="./liaisons/js/nav.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        /* Masquer le pointeur du curseur sur mobile */
        .cursor-dot,
        .cursor-outline {
            display: none;
        }

        /* Afficher le pointeur du curseur uniquement sur desktop */
        @media (min-width: 768px) {

            .cursor-dot,
            .cursor-outline {
                display: block;
            }
        }
    </style>

</head>

<body>

    <div class="cursor-dot"> </div>
    <div class="cursor-outline"></div>

    <header>
        @include('fragments.hero')
    </header>

    <main>
        @yield('contenu')
    </main>

    <footer>
        @include('fragments.footer')
    </footer>

</body>

</html>
