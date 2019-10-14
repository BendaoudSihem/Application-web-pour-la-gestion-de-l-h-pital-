@extends('index')

@section('home')

<div class="container"> 

  <div class="col-xs-12" ><hr><br></div>
    
  <div class="col-xs-12" ><h1>Resultat de recherche : >> <small> {{$motCle}}</small></h1><hr><br></div>

  <div class="panel-group" id="accordion">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            Medecin ({{$cmpMd}})
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
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
          <div class="col-xs-12"><hr></div>

        </div>
      </div>

               @endforeach
                   <!-- fin l'afficharge des medecins-->

      <div class="col-xs-12"><br></div>

               @if(($cmpMd/6)>1)      
            @for($i=0; $i<=($cmpMd/6);$i++)
        <a href="{{url('Recherche/Generale/Medecin/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
               @endif
            @endif
        </div>
      </div>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            Infermier ({{$cmpIn}})
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
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
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModall{{$infermier->id}}">Supprimer</button>
          </div>
             @endif

                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModall{{$infermier->id}}" role="dialog">
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
          <div class="col-xs-12"><hr></div>

        </div>
      </div>

               @endforeach
                   <!-- fin l'afficharge des medecins-->

      <div class="col-xs-12"><br></div>

               @if(($cmpIn/6)>1)      
            @for($i=0; $i<=($cmpIn/6);$i++)
        <a href="{{url('Recherche/Generale/Infermier/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
               @endif
            @endif
        </div>
      </div>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
            Secrétaire ({{$cmpSe}})
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
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

      <div class="col-xs-12"><br></div>

               @if(($cmpSe/6)>1)      
            @for($i=0; $i<=($cmpSe/6);$i++)
        <a href="{{url('Recherche/Generale/Secretaire/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
               @endif
          @endif
        </div>
      </div>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
            Parient ({{$cmpPa}})
          </a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          
          @if($patients)
            <table class="col-xs-12">
                 @foreach($patients as $patient)
                 <tr></tr>
                  <tr>
                       <!--afficher la tof et le nom d'un patient-->
                   <td class="col-sm-8 col-xs-6">
                    <div class="media">
                     <div class="media-left">
                        <a href="{{url('Patient/'.$patient->id)}}" target="_blank">
                          <img src="{{url('img/patients/'.$patient->image)}}" class="media-object" style="width:80px">
                        </a>
                      </div>
                     <div class="media-body">
                       <h4 class="media-heading">{{$patient->nom}} {{$patient->prenom}}</h4>
                       <p><b>SG°</b>{{$patient->song}} // <b>Taille:</b>{{$patient->taille}}m // <b>Poid:</b>{{$patient->poid}}kg // <b>DN°</b>{{$patient->datNai}} <br> <b>NS°</b>{{$patient->NumSecurite}} // <b>NT°</b>0{{$patient->tlf}} // <b>Email°</b>{{$patient->email}} // <b>AD°</b>{{$patient->adresse}}</p>
                      </div>
                   </div>
                   </td>
                           <!--button pour modefier un patient-->
                   <td class="col-sm-1 col-xs-3">
                      <a class="btn btn-warning" href="{{url('Patient/'.$patient->id.'/edit')}}">Modefier</a>
                   </td>
                           <!--button pour supprimer un patient-->
                   <td class="col-sm-1 col-xs-3">
                     <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$patient->id}}">Supprimer</button>

                 <!-- Modal -->
                <div class="modal fade" id="myModal{{$patient->id}}" role="dialog">
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
                         <form action="{{url('Patient/'.$patient->id)}}" method="POST">
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
                 </tr>

                 @endforeach

                 </table>

      <div class="col-xs-12"><br></div>

               @if(($cmpPa/6)>1)      
            @for($i=0; $i<=($cmpPa/6);$i++)
        <a href="{{url('Recherche/Generale/Patient/'.$motCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
               @endif
          @endif
        </div>
      </div>
    </div>
  </div> 
</div>

@endsection
