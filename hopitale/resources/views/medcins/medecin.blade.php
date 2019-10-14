@extends('medcins.index')

@section('medecin')

  <div class="col-xs-12"><br></div>
      <!--formulaire de profile d'un medecin-->
  <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12" style="border:solid;background-color:#8cb8e2;">
  <div class="col-sm-12 col-xs-0"><br><br></div>

	  <div class="col-xs-12">
	  	<img src="{{url('img/medecins/'.$medecin->image)}}" class="img img-circle" style="width: 50%;">
	  </div>

	  <div class="col-xs-12">
	    <h1>{{$medecin->grade}} <small> {{$medecin->nom}} {{$medecin->prenom}}</small></h1>
	    <br><hr>
	  </div>

	  <div class="col-xs-12" style="background-color:#fff">
	  	<table class="table table-striped table-hover col-xs-12">
	  	  <tr></tr>
	  		<tr><th class="col-xs-2">Nom: </th><td class="col-xs-6">{{$medecin->nom}}</td></tr>
	  		<tr><th>Prénom: </th><td>{{$medecin->prenom}}</td></tr>
	  		<tr><th>Grade: </th><td>{{$medecin->grade}}</td></tr>
	  		<tr><th>Spécialité: </th><td>{{$medecin->specialite}}</td></tr>
	  		<tr><th>Date de naissance: </th><td>{{$medecin->datNai}}</td></tr>
	  		<tr><th>Telf: </th><td>0{{$medecin->tlf}}</td></tr>
        <tr><th>Groupe sanguine: </th><td>{{$medecin->song}}</td></tr>
	  		<tr><th>Adresse: </th><td>{{$medecin->adresse}}</td></tr>
	  		<tr><th>Email: </th><td>{{$medecin->email}}</td></tr>
	  		<tr><th>Sexe: </th><td>{{$medecin->sexe}}</td></tr>
	  	</table>
	  </div>

       @if(Auth::user()->admin == "oui")
	  <div class="col-xs-12">
	        <!--button pour modefier un medecin-->
  	  <div class="col-sm-offset-2 col-sm-4 col-xs-0 col-xs-12 caption">
        <br><a class="btn btn-warning" href="{{url('Medecin/'.$medecin->id.'/edit')}}">Modifier</a>
      </div>
	        <!--button pour supprimer un medecin-->
		  <div class="col-sm-4 col-xs-12 caption">
        <br><button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$medecin->id}}">Supprimer</button>
      </div>

                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModal{{$medecin->id}}" role="dialog">
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
                   <form action="{{url('Medecin/'.$medecin->id)}}" method="POST">
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


@endsection