@extends('patients.index')

@section('patient')
    
         <!--ajouter medcin-->
  
      <div class="col-xs-12"><hr><br></div>
     
       <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id.'/edit')}}">

          {{csrf_field()}}

           <!--input pour modefier le nom de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="nom">Nom:</label>
          <input type="text" class="form-control" name="nom" value="{{$patient->nom}}" id="nom"  required>

                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier le prenom de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="prenom">Prénom:</label>
          <input type="text" class="form-control" name="prenom" value="{{$patient->prenom}}" id="prenom" required>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier le numero de telephone de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="tlf">N°telf:</label>
          <input type="text" class="form-control" name="tlf" value="0{{$patient->tlf}}" id="tlf"  required>

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier l'adresse de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="adresse">Adresse:</label>
          <input type="text" class="form-control" name="adresse" value="{{$patient->adresse}}" id="adresse" placeholder="Enter adresse" required>

                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour entrer l'adresse mail de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" value="{{$patient->email}}" id="email" accept="[^@]+@yahoo.fr,@gmail.com,@yahoo.com,@gmail.fr" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modifier le numero de securite national  de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="specialite">Numéro de Securité National:</label>
          <input type="text" class="form-control" name="NumSecurite" value="{{$patient->NumSecurite}}" id="NumSecurite" required>

                                @if ($errors->has('NumSecurite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('NumSecurite') }}</strong>
                                    </span>
                                @endif
        </div>
        
           <!--input pour modifier la taille de patient -->
        <div class="form-group{{ $errors->has('taille') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="taille">Taille: (m)</label>
          <input type="text" class="form-control" name="taille" id="taille" value="{{$patient->taille}}" required autofocus> 

                                @if ($errors->has('taille'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('taille') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--groupe sanguin de patient -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="groupesanguin">Groupe sanguin:</label>
          <select class="form-control" name="groupeSanguin" id="groupesanguin">
          @if($patient->song=="A+")
            <option value="A+" disabled>A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($patient->song=="B+")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+" disabled>B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($patient->song=="O+")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+" disabled>O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($patient->song=="AB+")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+" disabled>AB+</option>
          @elseif($patient->song=="A-")
            <option value="A+">A+</option>
            <option value="A-" disabled>A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($patient->song=="B-")
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B-" disabled>B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
          @elseif($patient->song=="O-")
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
        
           <!--input pour entrer la poid de patient -->
        <div class="form-group{{ $errors->has('poid') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="poid">Poid:(kg)</label>
          <input type="text" class="form-control" name="poid" id="poid" value="{{$patient->poid}}" required autofocus> 

                                @if ($errors->has('poid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poid') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier la date de naissance du medcin -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="dateNai">Date de naissance:</label>
          <input type="date" class="form-control" name="dateNai" id="dateNai" min="1930-12-31" value="{{$patient->datNai}}">
        </div>
        
           <!--input pour modifier le mot de passe de patient -->
        <div class="form-group{{ $errors->has('psw') ? ' has-error' : '' }} col-sm-offset-1 col-sm-4">
          <label for="grade">Modifier mot de passe:</label>
          <input type="password" class="form-control" name="psw" id="grade" placeholder="Mot de passe" >

                                @if ($errors->has('psw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('psw') }}</strong>
                                    </span>
                                @endif
        </div>

           <!--input pour modefier le sex de medcin -->
        <div class="form-group col-sm-offset-1 col-sm-4">
          <label for="sexe">Sexe:</label><br>
          @if($patient->sexe=="Homme")
          <label class="radio-inline"><input type="radio" value="Femme" name="sexe">Femme</label>
          <label class="radio-inline"><input type="radio" value="Homme" name="sexe" checked>Homme</label>
          <label class="radio-inline"><input type="radio" value="Enfant" name="sexe">Enfant</label>
          @elseif($patient->sexe=="Femme")
          <label class="radio-inline"><input type="radio" value="Femme" name="sexe" checked>Femme</label>
          <label class="radio-inline"><input type="radio" value="Homme" name="sexe" >Homme</label>
          <label class="radio-inline"><input type="radio" value="Enfant" name="sexe">Enfant</label>
          @else
          <label class="radio-inline"><input type="radio" value="Femme" name="sexe" >Femme</label>
          <label class="radio-inline"><input type="radio" value="Homme" name="sexe" >Homme</label>
          <label class="radio-inline"><input type="radio" value="Enfant" name="sexe" checked>Enfant</label>
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