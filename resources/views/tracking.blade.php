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
    <h1>Suivre un colis</h1>

    <form action="{{ url('/tracking') }}" method="post">
        @csrf
        <label for="tracking_number">Veuillez renseigner un numéro de suivi</label>
        <input type="text" name="tracking_number">

        <button type="submit">Envoyer</button>
    </form>

    @if (isset($parcel))
        <p>
            Votre colis n°{{ $parcel->tracking_number }} a été trouvé. Son statut actuel est : {{ $parcel->tracking_status }}.
        </p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    @if(session('error'))
       <p>
           {{ session('error') }}
       </p>
    @endif

    <a href="{{ url('/') }}">Retour</a>
</body>
</html>