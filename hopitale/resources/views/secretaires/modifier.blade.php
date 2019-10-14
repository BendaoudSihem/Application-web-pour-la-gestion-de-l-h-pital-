@extends('secretaires.index')

@section('secretaire')
    
         <!--modifier secretaire-->
      <div class="col-xs-12"><hr><br></div>
     
       <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Secretaire/'.$secretaire->id)}}">

           {{csrf_field()}}

           <!--input pour modefier le nom de secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="nom">Nom:</label>
          <input type="text" class="form-control" name="nom" value="{{$secretaire->nom}}" id="nom" required>

                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier le prenom de secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="prenom">Prénom:</label>
          <input type="text" class="form-control" name="prenom" value="{{$secretaire->prenom}}" id="prenom"  required>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier le numero de telephone de secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="tlf">N°telf:</label>
          <input type="text" class="form-control" name="tlf" value="0{{$secretaire->tlf}}" id="tlf" required>

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier l'adresse de secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="adresse">Adresse:</label>
          <input type="text" class="form-control" name="adresse" value="{{$secretaire->adresse}}" id="adresse" required>

                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer l'adresse mail de secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" value="{{$secretaire->email}}" id="email" accept="[^@]+@yahoo.fr,@gmail.com,@yahoo.com,@gmail.fr" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--groupe sanguin d'un secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="groupesanguin">Groupe sanguin:</label>
          <select class="form-control" name="groupeSanguin" id="groupesanguin">
          @if($secretaire->song=="A+")
            <option value="A+" disabled>A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($secretaire->song=="B+")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+" disabled>B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($secretaire->song=="O+")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+" disabled>O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($secretaire->song=="AB+")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+" disabled>AB+</option>
          @elseif($secretaire->song=="A-")
            <option value="A+">A+</option>
            <option value="A-" disabled>A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($secretaire->song=="B-")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-" disabled>B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($secretaire->song=="O-")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-" disabled>O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @else
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-" disabled>AB-</option>
            <option value="AB+">AB+</option>
          @endif
          </select>
        </div>

           <!--input pour modefier la date de naissance du secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="dateNai">Date de naissance:</label>
          <input type="date" class="form-control" name="dateNai" value="{{$secretaire->datNai}}" id="dateNai"  max="1998-12-31" min="1950-12-31" >
        </div>
        
           <!--input pour modifier le mot de passe de secretaire -->
        <div class="form-group{{ $errors->has('psw') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="grade">Modifier mot de passe:</label>
          <input type="password" class="form-control" name="psw" id="grade" placeholder="Mot de passe" >

                                @if ($errors->has('psw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('psw') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier le sex de secretaire -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="sexe">Sexe:</label><br>
          @if($secretaire->sexe=="Homme")
          <label class="radio-inline"><input type="radio" value="Femme" name="sexe">Femme</label>
          <label class="radio-inline"><input type="radio" value="Homme" name="sexe" checked>Homme</label>
          @else
          <label class="radio-inline"><input type="radio" value="Femme" name="sexe" checked>Femme</label>
          <label class="radio-inline"><input type="radio" value="Homme" name="sexe" >Homme</label>
          @endif
        </div>
        <div class="col-sm-6 col-xs-0"><br></div>

           <!--input pour modefier l'image de medcin -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="image">Image:</label><br>
          <input type="file" name="image">
        </div>
        <div class="col-sm-12"><br></div>

            <!--valider les informations modefié-->
        <div class="col-sm-offset-4 col-sm-4 col-xs-offset-0">
          <button type="sumbit" class="btn btn-primary">Enregistrer</button>
        </div>

        <div class="col-sm-12"><br></div>

       </form>
       


@endsection