<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bootstrap.css') }}"  type="text/css" rel="stylesheet"/>
     <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
</head>
<body>
    <div id="app">
        <div class="container-fluid bg">
  <div class ="row">
    <div class="col-md-4 col-sm-4 col-xs-12"></div>

      <div class="col-md-4 col-sm-4 col-xs-12">
          <!--form start-->
        <form class="form-conatiner " method="POST" action="{{ route('login') }}">
          <h2>Se connecter </h2>
          <br>

              {{ csrf_field() }}

              <!--inpout pour login -->

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Email:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>

              <!--inpout pour mot de passe-->
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="exampleInputPassword1">Mot de passe:</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>

             <!-- checkbox pour remember l'utilisateur -->
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me 
            </label>
          </div>

              <!-- button pour envoyer les donnees -->
          <button type="submit" class="btn btn-primary">Submit</button>

              <!-- lien pour recuperie le mot de passe-->
          <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublier? </a>

        </form>

<!--form end-->

</div>

<div class="col-md-4 col-sm-4 col-xs-12"></div>

</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
