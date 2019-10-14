@extends('secretaires.index')

@section('secretaire')

    
         <!--afficher la resulta de recherche-->
      <div class="col-xs-12" ><hr><br></div>
      
      <div class="col-xs-12" ><h1>Resultat de recherche : >> <small> {{$motCle}}</small></h1><hr></div>

                    <!--afficher les 15 premiers secretaires trouver-->
              
              @if($secretaires)
              <table class="col-xs-12">
                 @foreach($secretaires as $secretaire)
                 <tr></tr>
                  <tr>
                       <!--afficher la tof et le nom d'un secretaire-->
                   <td class="col-sm-8 col-xs-6">
                    <div class="media">
                     <div class="media-left">
                        <a href="{{url('Secretaire/'.$secretaire->id)}}" target="_blank">
                        <img src="{{url('img/secretaires/'.$secretaire->image)}}" class="media-object" style="width:80px">
                        </a>
                      </div>
                     <div class="media-body">
                       <h4 class="media-heading">{{$secretaire->nom}} {{$secretaire->prenom}}</h4>
                       <p><b>N°tlf</b>{{$secretaire->tlf}}  
                       <b>  Email:</b>{{$secretaire->email}}</p>
                      </div>
                   </div>
                   </td>

                       @if(Auth::user()->admin == "oui")
                           <!--button pour modefier un secretaire-->
                   <td class="col-sm-1 col-xs-3">
                      <a class="btn btn-warning" href="{{url('Secretaire/'.$secretaire->id.'/edit')}}">Modefier</a>
                   </td>
                           <!--button pour supprimer un secretaire-->
                   <td class="col-sm-1 col-xs-3">
                     <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$secretaire->id}}">Supprimer</button>

                 <!-- Modal -->
                <div class="modal fade" id="myModal{{$secretaire->id}}" role="dialog">
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
                         <form action="{{url('Secretaire/'.$secretaire->id)}}" method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}

                           <button type="sumbit" class="btn btn-danger">Oui</button>
                         </form>
                        </div>
                        <div class="col-xs-6">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>
                
                   </td>
                      @endif
                 </tr>

                 @endforeach
              </table>
                   <!-- fin l'afficharge des secretaires-->

      <div class="col-xs-12"><br></div>

                 <!--pagination-->
      <div class="col-sm-offset-4 col-xs-12">

            @if($cmp>1)
            @for($i=0; $i<=$cmp;$i++)
        <a href="{{url('Rechercher/Secretaire/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
            @endif
      </div>
      <div class="col-xs-12"><br></div>
        @endif
      


@endsection