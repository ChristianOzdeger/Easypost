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
    <h1>Enregistrer un colis</h1>
    
    <form action="{{ url('/register') }}" method="post">
        @csrf
        <label for="address_dep">Adresse de départ</label>
        <input type="text" name="address_dep" placeholder="1 rue d'Uzès"></br>
        
        <label for="address_arr">Adresse d'arrivée</label>
        <input type="text" name="address_arr" placeholder="38 rue Jean Jaurès"></br>

        <label for="weight">Poids du colis (en gramme)</label>
        <input type="number" name="weight"></br>

        <button type="submit">Envoyer</button>
    </form>
    
    @if (isset($message))
        <p>{{ $message }}</p>
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
    
    <a href="{{ url('/') }}">Retour</a>
</body>
</html>