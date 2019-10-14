@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

		<div class="col-xs-12" style="text-align: center;"><h1>Chambres</h1></div>
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

    <div class="col-xs-12">
       <br>
    	<form action="{{url('Chambres/creat')}}" method="POST">
                           {{csrf_field()}}
    		<label><h3>Ajouter une chambre</h3></label><br>
    		<label>Code de chambre :</label>
    		<input type="text" name="code" required>
    		<label>Service :</label>
    		<input type="text" name="service" required>
        <button class="btn btn-sucess" type="sumbit">+</button>
    	</form>
    </div>

    <div class="col-xs-12"><hr></div>

    <div class="col-xs-12">
    	<table class="col-xs-12">
		    <thead>
			    <tr class="col-sm-6 col-xs-12">
				    <th class="col-sm-3 col-xs-4">CodeChambre </th>
				    <th class="col-sm-3 col-xs-4">Service</th>
				    <th class="col-sm-5 col-xs-4">NbrChambre</th>
				    <th class="col-xs-4"></th>
				    <th class="col-xs-4"></th>
			    </tr>
			    <tr class="col-sm-6 col-xs-12">
				    <th class="col-sm-3 col-xs-4">CodeChambre </th>
				    <th class="col-sm-3 col-xs-4">Service</th>
				    <th class="col-sm-5 col-xs-4">NbrChambre</th>
				    <th class="col-xs-4"></th>
				    <th class="col-xs-4"></th>
			    </tr>
		    </thead>
		    <body class="col-xs-12" id="myTable">
		      @if($chambres)
		        @foreach($chambres as $chambre)
		         <tr class="col-sm-6 col-xs-12">
               <td class="col-sm-5 col-xs-4"><b>{{$chambre->numChambre}}</b></td>
               <td class="col-sm-4 col-xs-4"><b>{{$chambre->service}}</b></td>
               <td class="col-sm-4 col-xs-4"><b>{{$chambre->num}}</b></td>
               <td class="col-xs-4">
                  <button class="col-sm-10 col-xs-12 btn btn-warning" data-toggle="modal" data-target="#myModalMd{{$chambre->id}}" ><span class="glyphicon glyphicon-pencil"></span></button> 

					<!-- Modal pour modifier une chambre -->
                <div class="modal fade" id="myModalMd{{$chambre->id}}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modifier la chambre</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                         <form action="{{url('Chambres/'.$chambre->id)}}" method="POST">
                           {{csrf_field()}}

                           <div class="col-xs-12">
                              <label class="col-sm-6 col-xs-12">Code de chambre :</label>
                               <input class="col-sm-6 col-xs-12" type="text" name="code" value="{{$chambre->numChambre}}" required><p><br></p>
                              <label class="col-sm-6 col-xs-12">Service :</label>
                               <input class="col-sm-6 col-xs-12" type="text" name="service" value="{{$chambre->service}}" required><p><br></p>
                              <label class="col-sm-6 col-xs-12">Ajouter lit :</label>
                               <input class="col-sm-6 col-xs-12" type="text" name="ajou"><p><br></p>
                              <label class="col-sm-6 col-xs-12">Supprimer lit :</label>
                               <select name="supp">
                               	  <option value="0" selected>0</option>
                               	@if($lits)
                               	  @foreach($lits as $lit)
                               	    @if($lit->chambre_id == $chambre->id)
                               	  <option value="{{$lit->id}}">{{$lit->numLit}}</option>
                               	    @endif
                               	  @endforeach
                               	@endif
                               </select>
                               <br></p>

                              <label class="col-sm-6 col-xs-12">Modifier lit :</label>
                               	@if($lits)
                               	    <div class="col-sm-6 col-xs-12">
                               	    	<table>
                               	    		<tr><th>Code de lit :</th></tr>
                               	  @foreach($lits as $lit)
                               	    @if($lit->chambre_id == $chambre->id)
                               	        <tr><td>
                               	        	<input type="text" name= "{{$lit->id}}" value="{{$lit->numLit}}">
                               	        </td></tr>
                               	    @endif
                               	  @endforeach
                               	    	</table>
                               	    </div>
                               	@endif
                               <br></p>
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

					
               </td>
               <td class="col-xs-4">
                  <button class="col-sm-10 col-xs-12 btn btn-danger" data-toggle="modal" data-target="#myModal{{$chambre->id}}" ><span class="  glyphicon glyphicon-remove"></span></button> 
					

					<!-- Modal de suppression -->
                <div class="modal fade" id="myModal{{$chambre->id}}" role="dialog">
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
                         <form action="{{url('Chambres/'.$chambre->id)}}" method="POST">
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
               <td class="col-xs-12"><hr></td>
              </tr>
		        @endforeach
		      @endif
		    </body>
    	</table>
    </div>


	</div>
</div>

@endsection