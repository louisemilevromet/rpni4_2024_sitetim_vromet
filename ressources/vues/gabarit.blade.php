<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Technique d'intégration multiédia</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./liaisons/css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
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
