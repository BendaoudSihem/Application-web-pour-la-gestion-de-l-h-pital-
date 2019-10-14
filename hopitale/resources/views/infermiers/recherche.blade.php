@extends('infermiers.index')

@section('infermier')

    
         <!--afficher la resulta de recherche-->
      <div class="col-xs-12" ><hr><br></div>
      
      <div class="col-xs-12" ><h1>Resultat de recherche : >> <small> {{$motCle}}</small></h1><hr></div>

                    <!--afficher les 15 premiers infermiers trouver-->
              @if($infermiers)
                 @foreach($infermiers as $infermier)
      <div class="col-sm-4 col-xs-6" style="text-align: center;">
        <div class="thumbnail">

          <a href="{{url('Infermier/'.$infermier->id)}}" target="_blank">

            <img src="{{url('img/infermiers/'.$infermier->image)}}" style="width:100%">
            <div class="caption">
              <b>{{$infermier->nom}} {{$infermier->prenom}}</b><br>
              <b>Grade:</b>{{$infermier->grade}} <b> Specialité:</b>{{$infermier->specialite}}
            </div>

          </a>

                 
          @if(Auth::user()->admin == "oui")

                      <!--button pour modefier un infermier-->
          <div class="col-xs-6 caption">
            <a class="btn btn-warning" href="{{url('Infermier/'.$infermier->id.'/edit')}}">Modefier</a>
          </div>

                      <!--button pour supprimer un infermier-->
          <div class="col-xs-6 caption">
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$infermier->id}}">Supprimer</button>
          </div>

          @endif

                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModal{{$infermier->id}}" role="dialog">
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
                   <form action="{{url('Infermier/'.$infermier->id)}}" method="POST">
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
          <div class="col-xs-12"><br></div>

        </div>
      </div>
                 @endforeach
                   <!-- fin l'afficharge des infermiers-->

      <div class="col-xs-12"><br></div>

                 <!--pagination-->
      <div class="col-sm-offset-4 col-xs-12">

            @if($cmp>1)
            @for($i=0; $i<=$cmp;$i++)
        <a href="{{url('Rechercher/Infermier/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
            @endif
      </div>
      <div class="col-xs-12"><br></div>
        @endif
      


@endsection