@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12" style="text-align: center;">
	<h1>Rendez-vous</h1>
</div>

<div class="col-xs-12"><hr></div>

<div class="col-xs-12">
  <div class="col-sm-3 col-xs-1"></div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 search-bar">
    <div class="input-group">
               
        <span class="input-group-btn">
          <input id="myInput" type="text" placeholder="Search.." class="form-control">
          <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i> </button>
        </span>
     </div><!-- /input-group -->
   </div>
</div>

<div class="col-xs-12"><hr></div>

<div class="col-xs-6">
<div class="col-xs-12"><h3><u>Rendes-vous des examens</u></h3></div>
<div class="col-xs-12"><hr></div>
	<table>
		<thead>
			<tr>
				<th class="col-sm-3 col-xs-4">Nom</th>
				<th class="col-sm-3 col-xs-4"> Date</th>
				<th class="col-sm-3 col-xs-4"></th>
			</tr>
		</thead>
		<body id="myTable">
			@if($examens)
			   @foreach($examens as $examen)
			<tr>
				<td class="col-sm-3 col-xs-6">
				   <a href="{{url('Patient/'.$examen->exId)}}" target="_blank">{{$examen->name}} {{$examen->prenom}}</a>
				</td>
				<td class="col-sm-3 col-xs-12"> {{$examen->rendez_vous}}</td>
				<td class="col-sm-8 col-xs-12">

				  <form class="col-xs-4 " role="form" enctype="multipart/form-data" method="POST" action="{{url('Examen/Valide/'.$examen->id)}}">

             {{ csrf_field() }}
					  <button class="col-sm-10 col-xs-12 btn btn-success" type="sumbit"><span class="glyphicon glyphicon-ok"></span></button>
					</form>

					<div class="col-xs-4">
             <button class="col-sm-10 col-xs-12 btn btn-warning" data-toggle="modal" data-target="#myModalMd{{$examen->id}}" ><span class="glyphicon glyphicon-pencil"></span></button>     
          </div>  

          <div class="col-xs-4">
             <button class="col-sm-10 col-xs-12 btn btn-danger" data-toggle="modal" data-target="#myModal{{$examen->id}}" ><span class="  glyphicon glyphicon-remove"></span></button>    
          </div> 

					<!-- Modal pour modifier un redez-vous -->
                <div class="modal fade" id="myModalMd{{$examen->id}}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modifier le rendez-vous</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                         <form action="{{url('Examen/Rendez-vous/'.$examen->id.'/edit')}}" method="POST">
                           {{csrf_field()}}

                           <div class="col-xs-12">
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Date de rendez-vous:</label>
                                <input class="col-sm-6 col-xs-12" type="date" name="date" min="{{$date}}" value="{{$examen->rendez_vous}}" required autofocus><p><br></p>
                             </div>
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Nom d'examen:</label>
                                {{$examen->nom}}
                             </div>
                           </div>
                            <div class="col-xs-6"><br>
                              <button type="sumbit" class="btn btn-warning">Oui</button>
                            </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                        </div>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

					

					<!-- Modal de suppression -->
                <div class="modal fade" id="myModal{{$examen->id}}" role="dialog">
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
                         <form action="{{url('Examen/Rendez-vous/'.$examen->id.'/delete')}}" method="POST">
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
			<tr><th><br></th></tr>
			   @endforeach
			@endif
		</body>
	</table>
</div>

       <!--Rendes-vous des hospitalisations-->

<div class="col-xs-6">
<div class="col-xs-12"><h3><u>Rendes-vous des hospitalisations</u></h3></div>
<div class="col-xs-12"><hr></div>
	<table>
		<thead>
			<tr>
				<th class="col-sm-3 col-xs-4">Non</th>
				<th class="col-sm-3 col-xs-4"> Date</th>
			</tr>
		</thead>
		<body id="myTable">
			@if($hospitalisations)
			   @foreach($hospitalisations as $examen)
			<tr>
				<td class="col-sm-3 col-xs-6">
				   <a href="{{url('Patient/'.$examen->hospId)}}" target="_blank">{{$examen->name}} {{$examen->prenom}}</a>
				</td>
				<td class="col-sm-3 col-xs-6"> {{$examen->rendez_vous}}</td>
				<td class="col-sm-8 col-xs-12">

				  <form class="col-xs-4" role="form" enctype="multipart/form-data" method="POST" action="{{url('Hospitalisation/Valide/'.$examen->id)}}">

             {{ csrf_field() }}
					  <button class="col-sm-10 col-xs-12 btn btn-success" type="sumbit"><span class="glyphicon glyphicon-ok"></span></button>
					</form>

          <div class="col-xs-4">
             <button class="col-sm-10 col-xs-12 btn btn-warning" data-toggle="modal" data-target="#myModalMd{{$examen->id}}" ><span class="glyphicon glyphicon-pencil"></span></button>    
          </div>   

					<!-- Modal pour modifier un redez-vous -->
                <div class="modal fade" id="myModalMd{{$examen->id}}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modifier le rendez-vous</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                         <form action="{{url('Hospitalisation/Rendez-vous/'.$examen->id.'/edit')}}" method="POST">
                           {{csrf_field()}}

                           <div class="col-xs-12">
                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Date de rendez-vous(Debut):</label>
                                <input class="col-sm-6 col-xs-12" type="date" name="debut" min="{{$date}}" value="{{$examen->rendez_vous}}" required autofocus><p><br></p>
                             </div>

                             <div class="col-xs-12">
                               <label class="col-sm-6 col-xs-12">Date de Fin:</label>
                                <input class="col-sm-6 col-xs-12" type="date" name="fin" min="{{$date}}" value="{{$examen->fin}}" required autofocus><p><br></p>
                             </div>

                           <div class="col-xs-12">
                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>Service :</label>
                           	 	<select name="service">
                           	 		@if($services)
                           	 		   @foreach($services as $service)
                           	 		   @if($service->service == $examen->service)
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
                           	 	<label>Chambre:</label>
                           	 	<select name="numCh">
                           	 		@if($chambres)
                           	 		   @foreach($chambres as $chambre)
                           	 		    @if($chambre->numChambre == $examen->chambre_num)
                           	 		  <option value="{{$chambre->numChambre}}" selected>
                           	 		    {{$chambre->numChambre}}
                           	 		  </option>
                           	 		    @else
                           	 		  <option value="{{$chambre->numChambre}}">
                           	 		    {{$chambre->numChambre}}
                           	 		  </option>
                           	 		    @endif
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>

                           	 <div class="col-sm-4 col-xs-12"><br>
                           	 	<label>Lit :</label>
                           	 	<select name="lit">
                           	 		@if($lits)
                           	 		   @foreach($lits as $lit)
                           	 		    @if($lit->numLit == $examen->lit_num)
                           	 		  <option value="{{$lit->numLit}}" selected>
                           	 		    {{$lit->numLit}}
                           	 		  </option>
                           	 		  @else
                           	 		  <option value="{{$lit->numLit}}">
                           	 		    {{$lit->numLit}}
                           	 		  </option>
                           	 		    @endif
                           	 		   @endforeach
                           	 		@endif
                           	 	</select>
                           	 </div>
                           </div>

                           </div>
                            <div class="col-xs-6"><br>
                              <button type="sumbit" class="btn btn-warning">Oui</button>
                            </div>
                         </form>
                        <div class="col-xs-6"><br>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                        </div>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>

          <div class="col-xs-4">
             <button class="col-sm-10 col-xs-12 btn btn-danger" data-toggle="modal" data-target="#myModal{{$examen->id}}" ><span class="  glyphicon glyphicon-remove"></span></button>
          </div> 

					<!-- Modal de suppression -->
                <div class="modal fade" id="myModal{{$examen->id}}" role="dialog">
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
                         <form action="{{url('Hospitalisation/Rendez-vous/'.$examen->id.'/delete')}}" method="POST">
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
			<tr><th><br></th></tr>
			   @endforeach
			@endif
		</body>
	</table>
</div>


	</div>
</div>

@endsection