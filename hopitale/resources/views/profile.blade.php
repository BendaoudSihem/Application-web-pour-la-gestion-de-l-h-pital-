@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
  <div class="col-xs-12"><br></div>
      <!--formulaire de profile d'un medecin-->
  <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12" style="border:solid;background-color:#8cb8e2;">
  <div class="col-sm-12 col-xs-0"><br><br></div>

	  <div class="col-xs-12">
       @if(Auth::user()->utilisateur == "Infermier")
      <img src="{{url('img/infermiers/'.$personne->image)}}" class="img img-circle" style="width: 50%;">
       @elseif(Auth::user()->utilisateur == "Medecin")
      <img src="{{url('img/medecins/'.$personne->image)}}" class="img img-circle" style="width: 50%;">
       @else
      <img src="{{url('img/secretaires/'.$personne->image)}}" class="img img-circle" style="width: 50%;">
       @endif
	  </div>

	  <div class="col-xs-12">
       @if(Auth::user()->utilisateur == "Infermier" || Auth::user()->utilisateur == "Medecin")
      <h1>{{$personne->grade}}<small> {{$personne->nom}} {{$personne->prenom}}</small></h1>
       @else
      <h1> {{$personne->nom}} {{$personne->prenom}}</small></h1>
       @endif
	    <br><hr>
	  </div>

	  <div class="col-xs-12" style="background-color:#fff">
	  	<table class="table table-striped table-hover col-xs-12">
	  	  <tr></tr>
	  		<tr><th class="col-xs-2">Nom: </th><td class="col-xs-6">{{$personne->nom}}</td></tr>
	  		<tr><th>Prénom: </th><td>{{$personne->prenom}}</td></tr>
       @if(Auth::user()->utilisateur == "Infermier" || Auth::user()->utilisateur == "Medecin")
        <tr><th>Grade: </th><td>{{$personne->grade}}</td></tr>
        <tr><th>Spécialité: </th><td>{{$personne->specialite}}</td></tr>
       @endif
	  		<tr><th>Date de naissance: </th><td>{{$personne->datNai}}</td></tr>
	  		<tr><th>Telf: </th><td>0{{$personne->tlf}}</td></tr>
        <tr><th>Groupe sanguine: </th><td>{{$personne->song}}</td></tr>
	  		<tr><th>Adresse: </th><td>{{$personne->adresse}}</td></tr>
	  		<tr><th>Email: </th><td>{{$personne->email}}</td></tr>
	  		<tr><th>Sexe: </th><td>{{$personne->sexe}}</td></tr>
	  	</table>
      
      <div class="col-xs-12"><h4>Modifier Mot de passe</h4>
         <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Profile/edit')}}">

            {{ csrf_field() }}
          <label>Mot de passe :</label>
          <input type="password" name="psw" required><br>
          <label>Mot de passe :</label>
          <input type="password" name="nv" required> 
          <button class="btn btn-def" type="sumbit">Enregistrer</button>
        </form>
      </div>

	  </div>

       @if(Auth::user()->admin == "oui")
	  <div class="col-xs-12">

	        <!--button pour modefier un medecin-->
  	  <div class="col-sm-offset-2 col-sm-4 col-xs-0 col-xs-12 caption">
        <br><a class="btn btn-warning" href="{{url(Auth::user()->utilisateur.'/'.$personne->id.'/edit')}}">Modifier</a>
      </div>
	        <!--button pour supprimer un medecin-->
		  <div class="col-sm-4 col-xs-12 caption">
        <br><button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$personne->id}}">Supprimer</button>
      </div>

                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModal{{$personne->id}}" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content col-xs-12">
                <div class="panel panel-danger">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmer la supprission</h4>
                  </div>
                </div>
                <div class="modal-body ">
                  <div class="col-xs-6">
                   <form action="{{url(Auth::user()->utilisateur.'/'.$personne->id)}}" method="POST">
                     {{csrf_field()}}
                     {{method_field('DELETE')}}

                     <button type="sumbit" class="btn btn-danger">Oui</button>
                   </form>
                  </div>
                  <div class="col-xs-6">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Non</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>


	  </div>
       @endif
       
	  <div class="col-xs-12"><br></div>
    
  </div>


 </div>
</div>
@endsection