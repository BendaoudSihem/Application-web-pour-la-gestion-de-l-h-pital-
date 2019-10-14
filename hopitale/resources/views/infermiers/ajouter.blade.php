@extends('infermiers.index')

@section('infermier')



    
         <!--from pour ajouter infermier-->
      <div class="col-xs-12"><hr><br></div>
     
       <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Infermier')}}">

           {{ csrf_field() }}

           <!--input pour entrer le nom de infermier -->
        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="nom">Nom:</label>
          <input type="text" class="form-control" name="nom" id="nom" placeholder="Enter nom" value="{{ old('nom') }}" required autofocus>

                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer le prenom de infermier -->
        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="prenom">Prénom:</label>
          <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Enter prenom" value="{{ old('prenom') }}" required autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer le numero de telephone de infermier -->
        <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="tlf">N°telf:</label>
          <input type="text" class="form-control" name="tlf" id="tlf" placeholder="Enter téléphone" value="{{ old('tlf') }}" required autofocus>

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer l'adresse de infermier -->
        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="adresse">Adresse:</label>
          <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Enter adresse" value="{{ old('adresse') }}" required autofocus>

                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer l'adresse mail de medcin -->
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}" accept="[^@]+@yahoo.fr,@gmail.com,@yahoo.com,@gmail.fr" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer la specialité de infermier -->
        <div class="form-group{{ $errors->has('specialite') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="specialite">Specialité:</label>
          <input type="text" class="form-control" name="specialite" id="specialite" placeholder="Enter specialité" value="{{ old('specialite') }}" required autofocus>

                                @if ($errors->has('specialite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specialite') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer le grade de infermier -->
        <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="grade">Grade:</label>
          <input type="text" class="form-control" name="grade" id="grade" placeholder="Enter grade" value="{{ old('grade') }}" required autofocus>

                                @if ($errors->has('grade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer la date de naissance du infermier -->
        <div class="form-group{{ $errors->has('dateNai') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="dateNai">Date de naissance:</label>
          <input type="date" class="form-control" name="dateNai" id="dateNai" max="1998-12-31" min="1950-12-31" value="1950-12-31" >
        </div>

           <!--groupe sanguin d'un medecin' -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="groupesanguin">Groupe sanguin:</label>
          <select class="form-control" name="groupeSanguin" id="groupesanguin">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          </select>
        </div>
        
           <!--input pour entrer le mot de passe de infermier -->
        <div class="form-group{{ $errors->has('psw') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="grade">Mot de passe:</label>
          <input type="password" class="form-control" name="psw" id="grade" placeholder="Mot de passe" required>

                                @if ($errors->has('psw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('psw') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer le sex de infermier -->
        <div class="form-group col-sm-offset-1 col-sm-5">
          <label for="sexe">Sexe:</label><br>
          <label class="radio-inline"><input type="radio" value="Femme" name="sexe">Femme</label>
          <label class="radio-inline"><input type="radio" value="Homme" name="sexe" checked>Homme</label>
        </div>
        
           <!--input pour dit si l'infermier et admin ou pas -->
        <div class="form-group col-sm-offset-1 col-sm-5">
          <label for="sexe">Admin:</label><br>
          <label class="radio-inline"><input type="radio" value="oui" name="admin">oui</label>
          <label class="radio-inline"><input type="radio" value="non" name="admin" checked>non</label>
        </div>


           <!--input pour entrer l'image' de infermier -->
        <div class="form-group col-sm-offset-1 col-sm-5">
          <label for="image">Image:</label><br>
          <input type="file" name="image">
        </div>
        <div class="col-sm-12"><br></div>

            <!--valider les informations-->
        <div class="col-sm-offset-4 col-sm-4 col-xs-offset-0">
          <button type="sumbit" class="btn btn-primary">Enregistrer</button>
        </div>





        <div class="col-sm-12"><br></div>

      </form>
       



@endsection