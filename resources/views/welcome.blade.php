<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/png">

    <title>Fast Transfert</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,regular,500,700" rel="stylesheet" />
    <!-- personal css -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <section class="main">
        <header>
            <a href="#"><img src="{{ asset('images/logo2.png') }}" alt="Fast Transfert logo" class="logo"></a>
            <div class="toggle"></div>
            <ul class="navigation">
            @auth
                <li>
                    <a href="{{ url('/home') }}">Acceuil</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ Auth::user()->firstname.' '.  Auth::user()->lastname  .'('.Auth::user()->role .')' }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Inscription</a></li>
                @endif
            @endauth
            </ul>
        </header>

        <div class="content">
            <div class="text">
                <h2>Avec FT <br><span>C'est plus simple.</span></h2>
                <p>Envoyez de l'argent de manière rapide, pratique et sûre.
                </p>
                <a href="#" class="startB">Commencez</a>
            </div>

            <div class="slider">
                <div class="slides active">
                @auth
                <div style="color: white">
                <form data-action="{{ route('changes.store') }}" method="POST" enctype="multipart/form-data" id="send-money-form">
                        @csrf
                        <div class="alert d-none" id="alert" role="alert"></div>
                        <div class="progress d-none" id="progressbar">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <br>
                        <div class="row g-3">
                            <div class="col-md-12 col-sm-12">
                            <input  id="receiver_id" name="receiver_id" type="hidden">
                            <select class="form-control" id="receiver" name="receiver" autocomplete="receiver">
                                    <option> -- Selectionner -- </option>
                                    @foreach($users as $user)
                                    <option  value="{{$user}}"> {{$user->firstname. ' '. $user->lastname}} </option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6 col-sm-4">
                                <input type="number" class="form-control" placeholder="Montant" id="amount" required name="amount" aria-label="Montant">
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <input type="text" class="form-control" placeholder="Devise" id="currency" name="currency" aria-label="currency">
                            </div>
                            </div>
                            <div class="row pt-3">
                            <div class="col-md-6 col-sm-4">
                                <button type="submit" class="startB" id="sendB">
                                    <span class="send"> <span id="spinner"></span>{{ __(' Envoyer') }} </span>
                                </button>
                            </div>
                            <div class="col-md-6 col-sm-4">
                            <a href="{{ url('/transactions') }}" class="transaction"> {{ __('Voir mes transactions') }}</a>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
                @else
                <span style="color: white">Vous n'êtes pas encore connecté. </br>Connectez-vous et envoyer de l'argent partout à qui vous voulez.</span>
            @endauth
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/change.js') }}"></script>
    <script src="{{ asset('js/send-money.js') }}"></script>
</body>
</html>