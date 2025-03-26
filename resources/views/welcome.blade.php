<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easypost</title>
</head>
<body>
    <a href="{{ url('/') }}">
        <img src="/images/logo.jpg" width="200px;" alt="Image d'un colis">
    </a>
    <h1>Easypost</h1>
    <p>Bienvenue chez Easypost. Le leader de la livraison de colis en France.</p>

    @if (0 < $nbParcels)
        <p>Il y'a actuellement {{ $nbParcels }} colis en traitement.</p>
    @else
        <p>Il n'y a aucun colis en traitement.</p>
    @endif

    <a href="{{ url('/register') }}">Enregistrer un colis</a>
    <a href="{{ url('/tracking') }}">Suivre un colis</a>
</body>
</html>