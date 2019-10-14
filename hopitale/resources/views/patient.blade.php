@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
        
    <!--formulaire de profile d'un patient-->
  <div class="col-xs-12" style="background-color:#F2FBEF;">
  <div class="col-sm-12 col-xs-0"></div>

    <div class="col-xs-12">
      <br>
      <img src="{{url('img/patients/'.$patient->image)}}" class="img img-rounded" style="width: 30%;">
    </div>

    <div class="col-xs-12">
      <h1>Patient <small>{{$patient->nom}} {{$patient->prenom}}</small></h1>
      <br><hr>
    </div>

    <div class="col-xs-12" style="background-color:#fff">
      <table class="table table-striped table-hover col-xs-12">
        <tr></tr>
        <tr></tr>
        <tr><th class="col-sm-3">Nom: </th><td class="col-sm-6">{{$patient->nom}}</td></tr>
        <tr><th>Prénom: </th><td>{{$patient->prenom}}</td></tr>
        <tr><th>Date de naissance: </th><td>{{$patient->datNai}}</td></tr>
        <tr><th>Taille(m): </th><td>{{$patient->taille}}</td></tr>
        <tr><th>Poid(kg): </th><td>{{$patient->poid}}</td></tr>
        <tr><th>Telf: </th><td>{{$patient->tlf}}</td></tr>
        <tr><th>Numero de sécurite : </th><td>{{$patient->NumSecurite}}</td></tr>
        <tr><th>Adresse: </th><td>{{$patient->adresse}}</td></tr>
        <tr><th>Email: </th><td>{{$patient->email}}</td></tr>
      </table>

      @if(Auth::user()->utilisateur == "Patient")

                <div class="col-xs-12"><h4>Modifier Mot de passe</h4>
                  <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home/edit')}}">

                            {{ csrf_field() }}
                    <label>Mot de passe :</label>
                    <input type="password" name="psw" required><br>
                    <label>Mot de passe :</label>
                    <input type="password" name="nv" required> 
                    <button class="btn btn-def" type="sumbit">Enregistrer</button>
                  </form>
                </div>

                  @endif
    </div>

    <div class="col-xs-12"><br></div>
    
  </div>


       <!--consultation-->
<div class="col-sm-12 col-xs-0"><br><br></div>

  <div class="col-xs-12" style="background-color:#F2FBEF">
    <br>
      <button class="btn btn-info" data-toggle="modal" data-target="#myModaleRec">Recherché consultation par N° ou date</button>

      <!-- Modal pour cherché une consultation -->
                <div class="modal fade" id="myModaleRec" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Rechercher consultation</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                          <input id="myInput" type="text" placeholder="Search..">
                          <br><br>

                          <table class="col-xs-12">
                          <thead>
                            <tr class="col-xs-12">
                             <th class="col-xs-6">N° de consultation</th>
                              <th class="col-xs-6">Date</th>
                            </tr>
                          </thead>
                            <tbody id="myTable">
                            @if($consults)
                              @foreach($consults as $consult)
                              <tr class="col-xs-12">
                                <td class="col-xs-6">
                               @if($consult->id < 10)
                                   <a href="{{url('Home/Consultation/'.$consult->id)}}"  target="_blank"> N°0000{{$consult->id}}</a>
                               @elseif($consult->id < 100)
                                   <a href="{{url('Home/Consultation/'.$consult->id)}}"  target="_blank"> N°000{{$consult->id}}</a>
                               @elseif($consult->id < 1000)
                                   <a href="{{url('Home/Consultation/'.$consult->id)}}"  target="_blank"> N°00{{$consult->id}}</a>
                               @elseif($consult->id < 10000)
                                   <a href="{{url('Home/Consultation/'.$consult->id)}}"  target="_blank"> N°0{{$consult->id}}</a>
                               @else
                                   <a href="{{url('Home/Consultation/'.$consult->id)}}"  target="_blank"> N°{{$consult->id}}</a>
                               @endif
                                </td>
                                <td class="col-xs-6">{{$consult->created_at}}</td>
                              </tr>
                              @endforeach
                            @endif
                            </tbody>
                          </table>

                        </div>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>
    <h1 class="text-center">La liste des consultations </h1>
    <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">
      <div class="col-sm-12 col-xs-0"><br><br></div>
      <table class="table table-striped table-hover col-xs-12">
        <tr></tr>
        <tr>
           <th class="col-sm-4 col-xs-6">N°Consultation:</th>
           <th class="col-sm-4 col-xs-6">Date du consultation:</th>
          <th class="col-sm-4 col-xs-8"></th>
        </tr>

          <!--afficher les consultations-->
          @if($consultations)
             @foreach($consultations as $consultation)
        <tr>
           <td class="col-sm-4 col-xs-6">
          @if($consultation->id < 10)
              N°0000{{$consultation->id}}
          @elseif($consultation->id < 100)
              N°000{{$consultation->id}}
          @elseif($consultation->id < 1000)
              N°00{{$consultation->id}}
          @elseif($consultation->id < 10000)
              N°0{{$consultation->id}}
          @else
              N°{{$consultation->id}}
          @endif
            </td>
            <td class="col-sm-5 col-xs-6"> {{$consultation->created_at}}</td>

                  <!--button pour afficher une consultation--> 
            <td class="col-sm-3 col-xs-offset-2 col-xs-8">
               <a href="{{url('home/Consultation/'.$consultation->id)}}" class="btn btn-info" target="_blank">Afficher</a>
            </td>
           
        </tr>
             @endforeach
          @endif

       </table>
       <div class="col-xs-12">
        <br>
          <div class="col-sm-offset-4 col-sm-2 col-xs-offset-1 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home')}}">
           {{ csrf_field() }}
              @if($prev>=0)
               <button type="sumbit" name="prev" value="{{$prev}}"><</button>
               @else
               <button type="sumbit" name="prev" value="{{$prev}}" disabled><</button>
               @endif
            </form>
          </div>

          <div class="col-sm-2 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home')}}">
           {{ csrf_field() }}
              @if($cntCon>$next)
               <button type="sumbit" name="next" value="{{$next}}">></button>
               @else
               <button type="sumbit" name="next" value="{{$next}}" disabled>></button>
               @endif
          </div>
       </div>
    </div>

    <div class="col-xs-12"><br></div>

  </div>
<!--Examens-->
  <div class="col-sm-12 col-xs-0"><br><br></div>
  <div class="col-xs-12" style="background-color:#F2FBEF">
    <br>
      <button class="btn btn-info" data-toggle="modal" data-target="#myModaleRec1">Recherché esamen par Nom ou Date</button>

      <!-- Modal pour cherché une esamen -->
                <div class="modal fade" id="myModaleRec1" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Recherché Examen</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                          <input id="myInput1" type="text" placeholder="Search..">
                          <br><br>

                          <table class="col-xs-12">
                          <thead>
                            <tr class="col-xs-12">
                             <th class="col-sm-8 col-xs-6">Nom d'examen</th>
                              <th class="col-xs-6">Date</th>
                            </tr>
                          </thead>
                            <tbody id="myTable1">
                            @if($exams)
                              @foreach($exams as $exam)
                              <tr class="col-xs-12">
        
                                  @if($exam->rendez_vous)
                                <td class="col-sm-4 col-xs-6">{{$exam->nom}}</td>
                                <td class="col-sm-4 col-xs-6">{{$exam->rendez_vous}}</td>
                                  @else
                                <td class="col-sm-4 col-xs-6"><button class="btn btn-link" data-toggle="modal" data-target="#myModalaf{{$exam->id}}">{{$exam->nom}}</button></td>
                                <td class="col-sm-4 col-xs-6">{{$exam->created_at}}</td>
                                  @endif                      
                              </tr>
                              </tr>
                              @endforeach
                            @endif
                            </tbody>
                          </table>

                        </div>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

    <h1 class="text-center">La liste Des Examens </h1>
    <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">
      <div class="col-sm-12 col-xs-0"><br><br></div>
      <table class="table table-striped table-hover col-xs-12">
        <tr></tr>
        <tr><th class="col-sm-3 col-xs-6">Examen:</th><th class="col-sm-3 col-xs-6">Date de l'examen:</th><th class="col-sm-3 col-xs-6"></th><th class="col-sm-3 col-xs-6"></th></tr>

          @if($examens)
             @foreach($examens as $examen)
        <tr>

            @if($examen->rendez_vous)
            @else
          <td class="col-sm-4 col-xs-6">
            <button class="btn btn-link" data-toggle="modal" data-target="#myModalaf{{$examen->id}}">{{$examen->nom}}</button>



            <!-- Modal pour afficher un exament -->
                <div class="modal fade" id="myModalaf{{$examen->id}}" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Afficher l'examen</h4>
                        </div>
                      </div>
                      <div class="modal-body ">

                           <div class="col-sm-6 col-xs-12">
                               <label>Date d'examen :</label>
                                {{$examen->created_at}}
                             </div>

                            <div class="col-sm-6 col-xs-12">
                               <label >Nom d'examen:</label>
                                {{$examen->nom}}
                             </div>
                             <div class="col-xs-12"><br></div>
                            
                             <div class="form-group">
                               <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" name="examen" disabled >{{$examen->desc}}</textarea>
                             </div>

                             <div class="col-xs-12">
                               <label>Modifier le fichier :</label>
                               <input type="file" name="fichier">
                             </div>

                          <div class="col-xs-6"><br>
                            <button type="sumbit" class="btn btn-info">Modifier</button>
                          </div>

                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

          </td>
          <td class="col-sm-4 col-xs-6">{{$examen->created_at}}</td>
            @endif
          <td class="col-sm-4 col-xs-12"></td>
          <td class="col-sm-4 col-xs-12"></td>
        </tr>
             @endforeach
          @endif
      </table>

       <div class="col-xs-12">
        <br>
          <div class="col-sm-offset-4 col-sm-2 col-xs-offset-1 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home')}}">
           {{ csrf_field() }}
              @if($pr>=0)
               <button type="sumbit" name="pr" value="{{$pr}}"><</button>
               @else
               <button type="sumbit" name="pr" value="{{$pr}}" disabled><</button>
               @endif
            </form>
          </div>

          <div class="col-sm-2 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home')}}">
           {{ csrf_field() }}
              @if($cntEx>$nxt)
               <button type="sumbit" name="nxt" value="{{$nxt}}">></button>
               @else
               <button type="sumbit" name="nxt" value="{{$nxt}}" disabled>></button>
               @endif
          </div>
       </div>

    </div>

    <div class="col-xs-12"><br></div>
  </div>


<!--les lits et chambre-->

  <div class="col-sm-12 col-xs-0"><br><br></div>
  <div class="col-xs-12" style="background-color:#F2FBEF">

    <br>
      <button class="btn btn-info" data-toggle="modal" data-target="#myModaleRec2">Recherché Hospitalisation</button>

      <!-- Modal pour cherché une consultation -->
                <div class="modal fade" id="myModaleRec2" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Recherche une hospitalisation</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                          <input id="myInput" type="text" placeholder="Search..">
                          <br><br>

                          <table class="col-xs-12">
                          <thead>
                            <tr class="col-xs-12">
                             <th class="col-xs-3">Service</th>
                             <th class="col-xs-3">Code</th>
                             <th class="col-xs-3">Debut</th>
                             <th class="col-xs-3">Fin</th>
                            </tr>
                          </thead>
                            <tbody id="myTablem">
                            @if($hospits)
                              @foreach($hospits as $hospit)
                              @if($hospit->rendez_vous)
                              @else
                              <tr class="col-xs-12">
                                <td class="col-xs-3">{{$hospit->service}}</td>
                                <td class="col-xs-3">
                                  N°{{$hospit->chambre_num}}-{{$hospit->lit_num}}
                                </td>
                                <td class="col-xs-3">{{$hospit->debut}}</td>
                                <td class="col-xs-3">{{$hospit->fin}}</td>
                              </tr>
                              @endif
                              @endforeach
                            @endif
                            </tbody>
                          </table>

                        </div>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

    <h1 class="text-center">L'hospitalisation </h1>
    <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">
      <div class="col-sm-12 col-xs-0"><br><br></div>
      <table class="table table-striped table-hover col-xs-12">
        <tr></tr>

            @if($hospitalisations)
               @foreach($hospitalisations as $hospt)
        <tr>
          <th class="col-xs-3">Service:</th><td class="col-xs-3">{{$hospt->service}}</td>
          <th class="col-xs-3">N°Chambre-Lit:</th>
          <td class="col-xs-3">N°{{$hospt->chambre_num}}-{{$hospt->lit_num}}</td>
         </tr>
         <tr>
          <th class="col-xs-3">Date de debut:</th>
          <td class="col-xs-3">{{$hospt->debut}}</td>
          <th class="col-xs-3">Date du sortie:</th>
          <td class="col-xs-3">{{$hospt->fin}}</td>
         </tr>
         <tr><th colspan="4" style="background-color:blue"></tr>
               @endforeach
            @endif

        </table>

       <div class="col-xs-12">
        <br>
          <div class="col-sm-offset-4 col-sm-2 col-xs-offset-1 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home')}}">
           {{ csrf_field() }}
              @if($prec>=0)
               <button type="sumbit" name="prec" value="{{$prec}}"><</button>
               @else
               <button type="sumbit" name="prec" value="{{$prec}}" disabled><</button>
               @endif
            </form>
          </div>

          <div class="col-sm-2 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('home')}}">
           {{ csrf_field() }}
              @if($cntHos>$suiv)
               <button type="sumbit" name="suiv" value="{{$suiv}}">></button>
               @else
               <button type="sumbit" name="suiv" value="{{$suiv}}" disabled>></button>
               @endif
          </div>
       </div>

    </div>
    <div class="col-xs-12">

    <div class="col-xs-12"><br></div>

 </div>

      </div>   

  </div>
</div>

@endsection
