@extends('patients.index')

@section('patient')



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

    <div class="col-xs-12 " style="text-align: right;"><br>
      <button class="btn btn-info" data-toggle="modal" data-target="#myModalre">Ajouter un rendez-vous</button>
    </div>

    <!-- Modal de rendez-vous -->
                <div class="modal fade" id="myModalre" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Ajouter un rendez-vous</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                         <form action="{{url('Patient/Rendez-vous/'.$patient->id)}}" method="POST">
                           {{csrf_field()}}

                           <div class="col-xs-12">
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Type de rendez-vous:</label>
                               <select class="col-sm-6 col-xs-12" name="rendez">
                                 <option value="examens">Examen</option>
                                 <option value="hospitalisations">Hospitalisation</option>
                               </select><p><br></p>
                             </div>
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Date de rendez-vous:</label>
                                <input class="col-sm-6 col-xs-12" type="date" name="date" min="{{$date}}" value="{{$date}}" required autofocus><p><br></p>
                             </div>
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Nom d'examen:</label>
                                <input class="col-sm-6 col-xs-12" id="car" type="text" list="colors" name="nom" />
                                <datalist id="colors">

                                  @if($listexamens)
                                    @foreach($listexamens as $examen)
                                       <option value="{{$examen->nom}}">
                                    @endforeach
                                  @endif
                                </datalist>
                                <p style="color: red">Le cas d'examen remplier le nom d'examen</p>
                             </div>
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Date de fin:</label>
                                <input class="col-sm-6 col-xs-12" type="date" name="fin" min="{{$date}}" value="{{$date}}">
                                <p style="color: red">Le cas d'hospitalisatient emplier date de fin</p>
                             </div>
                           </div>
                            <div class="col-xs-6"><br>
                              <button type="sumbit" class="btn btn-info">Oui</button>
                            </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                        </div>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

    <div class="col-xs-12"><br></div>

	  <div class="col-xs-12" style="background-color:#fff">
	  	<table class="table table-striped table-hover col-xs-12">
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
	  </div>

	  <div class="col-xs-12">
	        <!--button pour modefier un medecin-->
  	  <div class="col-sm-offset-2 col-sm-4 col-xs-0 col-xs-12 caption">
        <br><a class="btn btn-warning" href="{{url('Patient/'.$patient->id.'/edit')}}">Modefier</a>
      </div>
	        <!--button pour supprimer un medecin-->
		  <div class="col-sm-4 col-xs-12 caption">
        <br><button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$patient->id}}">Supprimer</button>
      </div>

                       <!-- Modal de suppression -->
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

	  </div>

	  <div class="col-xs-12"><br></div>
    
  </div>

  @if(Auth::user()->utilisateur != "Secretaire" )


       <!--consultation-->
  <div class="col-sm-12 col-xs-0"><br><br></div>

  <div class="col-xs-12">

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
                                  <a href="{{url('Consultation/'.$consult->id)}}" class="btn btn-link" target="_blank">N°0000{{$consult->id}}</a>
                               @elseif($consult->id < 100)
                                   <a href="{{url('Consultation/'.$consult->id)}}" class="btn btn-link" target="_blank">N°000{{$consult->id}}</a>
                               @elseif($consult->id < 1000)
                                  <a href="{{url('Consultation/'.$consult->id)}}" class="btn btn-link" target="_blank">N°00{{$consult->id}}</a>
                               @elseif($consult->id < 10000)
                                   <a href="{{url('Consultation/'.$consult->id)}}" class="btn btn-link" target="_blank">N°0{{$consult->id}}</a>
                               @else
                                   <a href="{{url('Consultation/'.$consult->id)}}" class="btn btn-link" target="_blank">N°{{$consult->id}}</a>
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
	  		  <th class="col-sm-4 col-xs-6"></th>
          <th class="col-sm-4 col-xs-6"></th>
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
	  		    <td class="col-sm-3 col-xs-6">
	  		       <a href="{{url('Consultation/'.$consultation->id)}}" class="btn btn-info" target="_blank">Afficher</a>
	  		    </td>
                
                  <!--button pour supprimer une consultation--> 
            <td class="col-sm-3 col-xs-6">
               <button class="btn btn-danger" data-toggle="modal" data-target="#myModalc{{$consultation->id}}">Supprimer</button>



                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModalc{{$consultation->id}}" role="dialog">
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
                   <form action="{{url('Archive/consultations/'.$consultation->id)}}" method="POST">
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
	  		     @endforeach
	  		  @endif

	  	 </table>
	  	 <div class="col-xs-12">
	  	  <br>
	  	 	  <div class="col-sm-offset-4 col-sm-2 col-xs-offset-1 col-xs-5">
	  	      <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id)}}">
           {{ csrf_field() }}
              @if($prev>=0)
	  	 	  	   <button type="sumbit" name="prev" value="{{$prev}}"><</button>
               @else
               <button type="sumbit" name="prev" value="{{$prev}}" disabled><</button>
               @endif
	  	 	    </form>
	  	 	  </div>

	  	 	  <div class="col-sm-2 col-xs-5">
	  	      <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id)}}">
           {{ csrf_field() }}
              @if($cntCon>$next)
               <button type="sumbit" name="next" value="{{$next}}">></button>
               @else
               <button type="sumbit" name="next" value="{{$next}}" disabled>></button>
               @endif
	  	 	    </form>
	  	 	  </div>
	  	 </div>
	  </div>
	  <div class="col-xs-12">
	  	 <!--button pour ajouter une consultation--> 
	  	<div class="col-sm-offset-2 col-sm-4 col-xs-offset-1 col-xs-12 caption">
        <br>
        <a href="{{url('Consultation/0/'.$patient->id)}}" class="btn btn-default" target="_blank">Ajouter</a>
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
                             <th class="col-xs-6">Nom d'examen</th>
                              <th class="col-xs-6">Date</th>
                            </tr>
                          </thead>
                            <tbody id="myTable1">
                            @if($exams)
                              @foreach($exams as $exam)
                              <tr class="col-xs-12">
                                <td class="col-xs-6">
                                  <button class="btn btn-link" data-toggle="modal" data-target="#myModalaf{{$exam->id}}">{{$exam->nom}}</button>
                                </td>
                                  @if($exam->rendez_vous)
                                <td class="col-xs-6">{{$exam->rendez_vous}}</td>
                                  @else
                                <td class="col-xs-6">{{$exam->created_at}}</td>
                                  @endif
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
                            
                             <div class="form-group col-xs-12">
                               <textarea class="col-sm-8 col-xs-12"  cols="30"  rows="12" name="examen" disabled >{{$examen->desc}}</textarea>

                               @if($examen->fichier)
                               <div class="col-sm-4 col-xs-12">
                                 <img src="{{url('img/examens/'.$examen->fichier)}}">
                               </div>
                               @endif
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
            @if($examen->rendez_vous)
          <td class="col-sm-4 col-xs-6">{{$examen->rendez_vous}}</td>
            @else
          <td class="col-sm-4 col-xs-6">{{$examen->created_at}}</td>
            @endif
          <td class="col-sm-4 col-xs-12">
            <button class="btn btn-warning" data-toggle="modal" data-target="#myModale{{$examen->id}}">Modifier</button>

            <!-- Modal pour modifier un exament -->
                <div class="modal fade" id="myModale{{$examen->id}}" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modifier un examen</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <form enctype="multipart/form-data" action="{{url('Examen/'.$examen->id.'/edit')}}" method="POST">
                           {{csrf_field()}}

                           @if($examen->rendez_vous)
                           <div class="col-sm-6 col-xs-12">
                               <label>Modifier Rendez-vous :</label>
                                <input type="date" name="rendez" value="{{$examen->rendez_vous}}" min="{{$date}}">
                             </div>

                           @endif

                            <div class="col-sm-6 col-xs-12">
                               <label >Nom d'examen:</label>
                                <input id="car" type="text" list="colors" name="nom" value="{{$examen->nom}}" required />
                                <datalist id="colors">

                                  @if($listexamens)
                                    @foreach($listexamens as $exam)
                                       <option value="{{$exam->nom}}">
                                    @endforeach
                                  @endif
                                </datalist>
                             </div>
                             <div class="col-xs-12"><br></div>
                            
                             <div class="form-group col-xs-12">
                               <textarea class="col-sm-8 col-xs-12"  cols="30"  rows="12" name="examen" autofocus >{{$examen->desc}}</textarea>

                               @if($examen->fichier)
                               <div class="col-sm-4 col-xs-12">
                                 <img src="{{url('img/examens/'.$examen->fichier)}}">

                                   <div class="col-xs-12"><br>
                                     <label>Modifier l'image :</label>
                                     <input type="file" name="image">
                                  </div>
                               </div>
                               @else

                                   <div class="col-xs-12">
                                     <label>Ajouter une image :</label>
                                     <input type="file" name="image">
                                  </div>
                               @endif
                             </div>

                             <div class="col-xs-12"><br></div>

                          <div class="col-xs-6"><br>
                            <button type="sumbit" class="btn btn-warning">Modifier</button>
                          </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>
          </td>
          <td class="col-sm-4 col-xs-12">
             @if($examen->rendez_vous)
              @endif
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModalex{{$examen->id}}">Annuler</button>

              <!-- Modal pour annuler un examen -->
                <div class="modal fade" id="myModalex{{$examen->id}}" role="dialog">
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
                        
                         <form action="{{url('Examen/'.$examen->id)}}" method="POST">
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
          </td>
        </tr>
             @endforeach
          @endif
	  	</table>

       <div class="col-xs-12">
        <br>
          <div class="col-sm-offset-4 col-sm-2 col-xs-offset-1 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id)}}">
           {{ csrf_field() }}
              @if($pr>=0)
               <button type="sumbit" name="pr" value="{{$pr}}"><</button>
               @else
               <button type="sumbit" name="pr" value="{{$pr}}" disabled><</button>
               @endif
            </form>
          </div>

          <div class="col-sm-2 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id)}}">
           {{ csrf_field() }}
              @if($cntEx>$nxt)
               <button type="sumbit" name="nxt" value="{{$nxt}}">></button>
               @else
               <button type="sumbit" name="nxt" value="{{$nxt}}" disabled>></button>
               @endif
            </form>
          </div>
       </div>
	  </div>

          
	  <div class="col-xs-12">
	  	 <!--button pour ajouter un examen--> 
	  	<div class="col-sm-offset-2 col-sm-4 col-xs-offset-1 col-xs-12 caption">
        <br><button class="btn btn-default" data-toggle="modal" data-target="#myModalex">Ajouter</button>

        <!-- Modal pour ajouter un exament -->
                <div class="modal fade" id="myModalex" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Ajouter un examen</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <form enctype="multipart/form-data" action="{{url('Examen/'.$patient->id.'/create')}}" method="POST">
                           {{csrf_field()}}

                            <div class="col-sm-6 col-xs-12">
                               <label >Nom d'examen:</label>
                                <input  type="text" name="nom" required autofocus>
                             </div>
                             <div class="col-xs-12"><br></div>
                            
                          <div class="form-group{{ $errors->has('examen') ? ' has-error' : '' }}">
              <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" name="examen" placeholder="Ajouter une examen ..." required autofocus></textarea>

                        </div>

                             <div class="col-xs-12">
                               <label>Ajouter une image d'examen :</label>
                               <input type="file" name="image">
                             </div>

                          <div class="col-xs-6"><br>
                            <button type="sumbit" class="btn btn-info">Ajouter</button>
                          </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
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
                  <div class="modal-dialog modal-lg">
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
                             <th class=" col-xs-3">Service</th>
                             <th class="col-xs-3">N°chambre-N°lit</th>
                             <th class="col-xs-3">Date debut</th>
                             <th class="col-xs-3">Date fin</th>
                            </tr>
                          </thead>
                            <tbody id="myTablem">
                            @if($hospits)
                              @foreach($hospits as $hospit)
                              <tr class="col-xs-12">
                                <td class="col-xs-3">{{$hospit->service}}</td>
                                <td class="col-xs-3">
                                  N°{{$hospit->chambre_num}}-{{$hospit->lit_num}}
                                </td>
                                <td class="col-xs-3">{{$hospit->debut}}</td>
                                <td class="col-xs-3">{{$hospit->fin}}</td>
                                <td class="col-xs-3">                     

          <?php $dat = $hospit->fin;
             $fin = ((strtotime($dat) - time()) / 3600 / 24 / 365); ?> 

                                    @if($fin > 0 || $hospit->rendez_vous)
                                  <button class="btn btn-warning" data-toggle="modal" data-target="#myModalh{{$hospit->id}}">Modifier</button>
                                       @endif
                                </td>
                                <td class="col-xs-3">
                                      @if(($fin > 0 || $hospit->rendez_vous) )
                                  <button class="btn btn-danger" data-toggle="modal" data-target="#myModalhd{{$hospit->id}}">Annuler</button>
                                       @endif
                                </td>
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
         <tr>
         	<td class="col-sm-3col-xs-0"></td>
         	<td class="col-sm-3col-xs-0"></td>
	        <!--button pour modefier une hospitalisation-->
	        <?php $dat = $hospt->fin;
             $fin = ((strtotime($dat) - time()) / 3600 / 24 / 365); ?>
         	<td class="col-sm-3 col-xs-5">
         	    @if($fin > 0 || $hospt->rendez_vous)
	  		    <button class="btn btn-warning" data-toggle="modal" data-target="#myModalh{{$hospt->id}}">Modifier</button>
                 @endif

                       <!-- Modal pour modifier une hospitalisation -->
                <div class="modal fade" id="myModalh{{$hospt->id}}" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modifier une hospitalisation</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <form action="{{url('Hospitalisation/'.$hospt->id.'/edit')}}" method="POST">
                           {{csrf_field()}}
                            
                           <div class="col-xs-12">
                           	 <div class="col-sm-6 col-xs-12">
                           	 	 <label>Date de début :</label>
                           	 	    @if($hospt->rendez_vous)
                                <input type="date" name="debut" value="{{$hospt->debut}}" min="{{$date}}">
                           	 	    @else
                                <input type="text" name="debut" value="{{$hospt->debut}}" readonly>
                           	 	   @endif
                           	 </div>

                           	 <div class="col-sm-6 col-xs-12">
                           	 	 <label>Date de fin :</label>
                           	 	  <input type="date" name="fin" value="{{$hospt->fin}}" min="{{$date}}">
                           	 </div>
                           </div>

                           <div class="col-xs-12">
                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>Service :</label>
                           	 	<select name="service" id="myInputt" >
                           	 		@if($services)
                           	 		   @foreach($services as $service)
                           	 		   @if($service->service == $hospt->service)
                           	 		  <option value="{{$service->service}}" selected>
                           	 		    {{$service->service}}
                           	 		  </option>
                           	 		   @else
                           	 		  <option value="{{$service->service}}">
                           	 		    {{$service->service}}
                           	 		  </option>
                           	 		   @endif
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>

                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>N°chambre :</label>
                           	 	<select name="numCh" id="myTablee">
                           	 		@if($chambres)
                           	 		   @foreach($chambres as $chambre)

                                @if($services)
                                   @foreach($services as $service)
                                     @if($chambre->id == $service->id)
                                     <option value="{{$service->service}}" disabled>
                                    <b>{{$service->service}}<b>
                                  </option>
                                     @endif
                                   @endforeach
                                @endif
                           	 		    @if($chambre->numChambre == $hospt->chambre_num)
                           	 		       <option value="{{$chambre->id}}" selected>
                           	 		    {{$chambre->numChambre}}
                           	 		       </option>
                           	 		    @else
                           	 		       <option value="{{$chambre->id}}">
                           	 		          {{$chambre->numChambre}} 
                           	 		       </option>
                           	 		    @endif
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>

                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>N°lit :</label>
                           	 	<select name="lit">

                                  <option value="{{$hospt->lit_num}}" selected>
                                    {{$hospt->lit_num}}
                                  </option>
                           	 		@if($lits)
                           	 		   @foreach($lits as $lit)


                                @if($chambres)
                                   @foreach($chambres as $chambre)
                                     @if($chambre->id == $lit->chambre_id)
                                     <option value="{{$lit->chambre_id}}" disabled>
                                    <b>{{$chambre->numChambre}}<b>
                                  </option>
                                     @endif
                                   @endforeach
                                @endif


                           	 		  <option value="{{$lit->id}}">
                           	 		    {{$lit->numLit}}
                           	 		  </option>
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>
                           </div>

                          <div class="col-xs-6"><br>
                            <button type="sumbit" class="btn btn-warning">Modifier</button>
                          </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>
         	</td>
	        <!--button pour annuler une hospitalisation-->
         	<td class="col-sm-3 col-xs-5">
         	      @if(($fin > 0 || $hospt->rendez_vous) )
	  		    <button class="btn btn-danger" data-toggle="modal" data-target="#myModalhd{{$hospt->id}}">Annuler</button>
	  		         @endif

                 <!-- Modal pour annuler une hospitalisation -->
                <div class="modal fade" id="myModalhd{{$hospt->id}}" role="dialog">
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
                        
                         <form action="{{url('Hospitalisation/'.$hospt->id)}}" method="POST">
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
         	</td>
         </tr>
               @endforeach
            @endif

	  	  </table>

       <div class="col-xs-12">
        <br>
          <div class="col-sm-offset-4 col-sm-2 col-xs-offset-1 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id)}}">
           {{ csrf_field() }}
              @if($prec>=0)
               <button type="sumbit" name="prec" value="{{$prec}}"><</button>
               @else
               <button type="sumbit" name="prec" value="{{$prec}}" disabled><</button>
               @endif
            </form>
          </div>

          <div class="col-sm-2 col-xs-5">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Patient/'.$patient->id)}}">
           {{ csrf_field() }}
              @if($cntHos>$suiv)
               <button type="sumbit" name="suiv" value="{{$suiv}}">></button>
               @else
               <button type="sumbit" name="suiv" value="{{$suiv}}" disabled>></button>
               @endif
            </form>
          </div>
       </div>

	  </div>
	  <div class="col-xs-12">

	  	 <!--button pour ajouter une hospitalisation--> 
		  <div class="col-sm-offset-2 col-sm-4 col-xs-offset-1 col-xs-12 caption">
        <br><button class="btn btn-default" data-toggle="modal" data-target="#myModalh">Ajouter</button>
      </div>

                       <!-- Modal pour ajouter une hospitalisation -->
                <div class="modal fade" id="myModalh" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Ajouter une hospitalisation</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <form action="{{url('Hospitalisation/'.$patient->id)}}" method="POST">
                           {{csrf_field()}}
                            
                           <div class="col-xs-12">
                           	 <div class="col-sm-6 col-xs-12">
                           	 	 <label>Date de début :</label>
                           	 	  <input type="date" name="debut" value="{{$date}}" min="{{$date}}">
                           	 </div>

                           	 <div class="col-sm-6 col-xs-12">
                           	 	 <label>Date de fin :</label>
                           	 	  <input type="date" name="fin" value="{{$date}}" min="{{$date}}">
                           	 </div>
                           </div>

                           <div class="col-xs-12">
                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>Service :</label>
                           	 	<select name="service">
                           	 		@if($services)
                           	 		   @foreach($services as $service)
                           	 		  <option value="{{$service->service}}">
                           	 		    {{$service->service}}
                           	 		  </option>
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>

                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>N°chambre :</label>
                           	 	<select name="numCh">
                           	 		@if($chambres)
                           	 		   @foreach($chambres as $chambre)

                                @if($services)
                                   @foreach($services as $service)
                                     @if($chambre->id == $service->id)
                                     <option value="{{$service->service}}" disabled>
                                    <b>{{$service->service}}<b>
                                  </option>
                                     @endif
                                   @endforeach
                                @endif
                           	 		  <option value="{{$chambre->numChambre}}">
                           	 		    {{$chambre->numChambre}}
                           	 		  </option>
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>

                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>N°lit :</label>
                           	 	<select name="lit">
                           	 		@if($lits)
                           	 		   @foreach($lits as $lit)

                                @if($chambres)
                                   @foreach($chambres as $chambre)
                                     @if($chambre->id == $lit->chambre_id)
                                     <option value="{{$lit->chambre_id}}" disabled>
                                    <b>{{$chambre->numChambre}}<b>
                                  </option>
                                     @endif
                                   @endforeach
                                @endif

                           	 		  <option value="{{$lit->numLit}}">
                           	 		    {{$lit->numLit}}
                           	 		  </option>
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>
                           </div>

                          <div class="col-xs-6"><br>
                            <button type="sumbit" class="btn btn-info">Ajouter</button>
                          </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

	  <div class="col-xs-12"><br></div>

 </div>

      </div>

   @endif
@endsection