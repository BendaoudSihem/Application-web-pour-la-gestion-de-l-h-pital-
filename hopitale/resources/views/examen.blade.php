@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

		<div class="col-xs-12" style="text-align: center;"><h1>Examens</h1></div>
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
    	<form action="{{url('Examens/creat')}}" method="POST">
                           {{csrf_field()}}
    		<label>Ajouter un examen</label>
    		<input id="car" type="text" list="colors" name="examen" required />
        <datalist id="colors">

		      @if($examens)
		        @foreach($examens as $examen)
               <option value="{{$examen->nom}}">
		        @endforeach
		      @endif
        </datalist>
        <button class="btn btn-sucess" type="sumbit">+</button>
    	</form>
    </div>

    <div class="col-xs-12"><hr></div>

    <div class="col-xs-12">
    	<table class="col-xs-12">
		    <body class="col-xs-12" id="myTable">
		      @if($examens)
		        @foreach($examens as $examen)
		         <tr class="col-sm-6 col-xs-12">
               <td class="col-sm-10 col-xs-4"><b>{{$examen->nom}}</b></td>
               <td class="col-xs-4">
                  <button class="col-sm-10 col-xs-12 btn btn-warning" data-toggle="modal" data-target="#myModalMd{{$examen->id}}" ><span class="glyphicon glyphicon-pencil"></span></button> 

					<!-- Modal pour modifier un redez-vous -->
                <div class="modal fade" id="myModalMd{{$examen->id}}" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modifier l'examen</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-12">
                         <form action="{{url('Examens/'.$examen->id.'/edit')}}" method="POST">
                           {{csrf_field()}}

                           <div class="col-xs-12">
                              <label class="col-sm-6 col-xs-12">Nom d'examen :</label>
                               <input class="col-sm-6 col-xs-12" type="text" name="examen" value="{{$examen->nom}}" required><p><br></p>
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
                  <button class="col-sm-10 col-xs-12 btn btn-danger" data-toggle="modal" data-target="#myModal{{$examen->id}}" ><span class="  glyphicon glyphicon-remove"></span></button> 
					

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
                         <form action="{{url('Examens/'.$examen->id)}}" method="POST">
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