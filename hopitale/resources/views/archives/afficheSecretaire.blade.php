@extends('archives.index')

@section('archive')

    
         <!--afficher les secretaires-->
      <div class="col-xs-12" ><hr><br></div>

                    <!--afficher les 15 premiers secretaires-->
              @if($secretaires)
              <table class="col-xs-12">
                 @foreach($secretaires as $secretaire)
                 <tr></tr>
                  <tr>
                       <!--afficher la tof et le nom d'un secretaire-->
                   <td class="col-sm-8 col-xs-6">
                    <div class="media">
                     <div class="media-left">
                        <a href="{{url('Archive/secretaires/profile/'.$secretaire->id)}}" target="_blank">
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
                      <!--button pour restaurer -->
                  <td class="col-sm-1 col-xs-3">
                    <button class="btn btn-def" data-toggle="modal" data-target="#myModal{{$secretaire->id}}">Restaurer</button>                      <!-- Modal de restaure -->
          <div class="modal fade" id="myModal{{$secretaire->id}}" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Creé le un compte </h4>
                  </div>
                </div>
                <div class="modal-body ">
                   <form action="{{url('Archive/'.$MotCle.'/'.$secretaire->id)}}" method="POST">
                     {{csrf_field()}}
                  <div class="col-xs-12">
                      <label>Login :   </label>  {{$secretaire->email}}<br>
                      <label>Mode de passe : </label><input type="password" name="pws">
                  </div>

                  <div class="col-xs-6"><br>
                     <button type="sumbit" class="btn btn-def">Envoyer</button>
                  </div>
                   </form>
                  <div class="col-xs-6"><br>
                  <button type="button" class="btn btn-def" data-dismiss="modal">Annuler</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>
                  </td>

                      <!--button pour supprimer -->
                  <td class="col-sm-1 col-xs-3">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModall{{$secretaire->id}}">Supprimer</button>
                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModall{{$secretaire->id}}" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content col-xs-12">
                <div class="panel panel-danger">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmer supprission</h4>
                  </div>
                </div>
                <div class="modal-body ">
                  <div class="col-xs-6">
                   <form action="{{url('Archive/'.$MotCle.'/'.$secretaire->id)}}" method="POST">
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
                  </td>
              </tr>
               @endif


                 @endforeach
              </table>
                   <!-- fin l'afficharge des medecins-->

      <div class="col-xs-12"><br></div>

                 <!--pagination-->
      <div class="col-sm-offset-4 col-xs-12">

         @if($cmp>1)
            @for($i=0; $i<=$cmp;$i++)
        <a href="{{url('Secretaires/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
         @endif
      </div>
      <div class="col-xs-12"><br></div>
        @endif
      


@endsection