@extends('medcins.index')

@section('medecin')

    
         <!--afficher la resulta de recherche-->
      <div class="col-xs-12" ><hr><br></div>
      
      <div class="col-xs-12" ><h1>Resultat de recherche : >> <small> {{$motCle}}</small></h1><hr></div>

                    <!--afficher les 15 premiers medecins trouver-->
              @if($medecins)
                 @foreach($medecins as $medecin)
      <div class="col-sm-4 col-xs-6" style="text-align: center;">
        <div class="thumbnail">

          <a href="{{url('Medecin/'.$medecin->id)}}" target="_blank">

            <img src="{{url('img/medecins/'.$medecin->image)}}" style="width:100%">
            <div class="caption">
              <b>{{$medecin->nom}} {{$medecin->prenom}}</b><br>
              <b>Grade:</b>{{$medecin->grade}} <b> Specialité:</b>{{$medecin->specialite}}
            </div>

          </a>

             @if(Auth::user()->admin == "oui")
                      <!--button pour modefier un medecin-->
          <div class="col-xs-6 caption">
            <a class="btn btn-warning" href="{{url('Medecin/'.$medecin->id.'/edit')}}">Modefier</a>
          </div>

                      <!--button pour supprimer un medecin-->
          <div class="col-xs-6 caption">
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$medecin->id}}">Supprimer</button>
          </div>
             @endif

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

          <div class="col-xs-12"><br></div>

        </div>
      </div>
                 @endforeach
                   <!-- fin l'afficharge des medecins-->

      <div class="col-xs-12"><br></div>

                 <!--pagination-->
      <div class="col-sm-offset-4 col-xs-12">

            @if($cmp>1)
            @for($i=0; $i<=$cmp;$i++)
        <a href="{{url('Rechercher/Medecin/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
            @endif
      </div>
      <div class="col-xs-12"><br></div>
        @endif
      


@endsection