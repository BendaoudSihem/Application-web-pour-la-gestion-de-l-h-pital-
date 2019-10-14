@extends('patients.index')

@section('patient')

  <div class="col-xs-12"><hr></div>
  <div class="container">
    <div class="row">
        
      <div class="col-xs-12">
          <!--URL pour ajouter nouvelle consultation-->
        <div class="col-xs-6">
           <a href="{{url('Consultaion/0/'.$consultation->patient_id)}}" class="btn btn-default" target="_blank">Nouvelle Consultation</a>
         </div>
             

          <!--button pour supprimer consultation-->
         <div class="col-xs-6">
           <button class="btn btn-danger" data-toggle="modal" data-target="#myModall{{$consultation->id}}">Supprimer</button>
         </div>



                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModall{{$consultation->id}}" role="dialog">
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

      </div>

      <div class="col-xs-12"><hr></div>

      <div class="col-xs-12">
      <div class="container-fluid" style="border: 1px solid black;background-color: #CEF6F5;">

        <div class="col-xs-12"><br>
           <div class="col-sm-offset-1 col-xs-offset-1 col-sm-8 col-xs-6"><br>
             <h4><u><b>CENTRE HOSPITALISATION ET UNIVERSITAIRE </b></u></h4>
             <h4><u><b> @if(Auth::user()->utilisateur == "Medecin")
                  DR.
                        @else
                  INF.
                        @endif
                {{Auth::user()->name}} 
             </b></u></h4>
             <h4><u><b>Tél:043210700 </b></u></h4>
           </div>
           <div class="col-sm-3 col-xs-5">
             <div class="col-xs-12">
               <img src="{{url('img/inf.png')}}">
             </div>
             <div class="col-xs-12">
                <h4><u><b>Tlemcen , le {{$consultation->created_at}} </b></u></h4>
             </div>
           </div>
        </div>

        <div class="col-xs-12"><hr></div>

        <div class="col-xs-12">
          <h4><table>
            <tr><th>Nom : </th><td> {{$consultation->nom}}</td></tr>
            <tr><th>Prenom : </th><td> {{$consultation->prenom}}</td></tr>
            <tr><th>Date de naissance : </th><td> {{$consultation->datNai}}</td></tr>
            <tr><th>Age : </th><td> <?php $age = (int)(date("Y-m-d")-date($consultation->datNai));echo $age; ?></td></tr>
          </table></h4>
        </div>

        <div class="col-xs-12"><hr></div>
                 
             <!--ajouter une oradonnance-->
        <div class="col-xs-12">
          <h2>Ajouter une ordonnance </h2>
          <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Consultation/Ordonnance/'.$consultation->id)}}">

           {{ csrf_field() }}
            <div class="form-group{{ $errors->has('Ordonnance') ? ' has-error' : '' }}">
              <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" name="Ordonnance" placeholder="Ajouter une ordonnance ..." value="{{ old('Ordonnance') }}" required autofocus></textarea>

              <div class="col-sm-2 col-xs-12">
                <div class="col-xs-offset-2 col-xs-10">
                  <button class="btn btn-info">Ajouter l'ordonnace</button>
                </div>
              </div>

                                @if ($errors->has('Ordonnance'))
                              <div class="col-xs-12">
                                <span class="help-block">
                                        <strong>{{ $errors->first('Ordonnance') }}</strong>
                                    </span>
                              </div>
                                @endif

            </div>

          </form>

        </div>

        <div class="col-xs-12"><hr></div>
                 
             <!--ajouter un orapport-->
        <div class="col-xs-12">
          <h2>Ajouter un rapport </h2>
          <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Consultation/Rapport/'.$consultation->id)}}">

           {{ csrf_field() }}
            <div class="form-group{{ $errors->has('Rapport') ? ' has-error' : '' }}">
              <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" name="Rapport" placeholder="Ajouter un rapport ..." value="{{ old('Rapport') }}" required autofocus></textarea>

              <div class="col-sm-2 col-xs-12">
                <div class="col-xs-offset-2 col-xs-10">
                  <button class="btn btn-info">Ajouter le rapport</button>
                </div>
              </div>

                                @if ($errors->has('Rapport'))
                              <div class="col-xs-12">
                                <span class="help-block">
                                        <strong>{{ $errors->first('Rapport') }}</strong>
                                    </span>
                              </div>
                                @endif

            </div>

          </form>

        </div>

        <div class="col-xs-12"><hr></div>
                 
             <!--ajouter une lettre d'orientation-->
        <div class="col-xs-12">
          <h2>Ajouter une lettre d'orientation </h2>
          <form role="form" enctype="multipart/form-data" method="POST" action="{{url('Consultation/LettreDOrientation/'.$consultation->id)}}">

           {{ csrf_field() }}
            <div class="form-group{{ $errors->has('LettreDOrientation') ? ' has-error' : '' }}">
              <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" name="LettreDOrientation" placeholder="Ajouter une lettre d'orientation ..." value="{{ old('LettreDOrientation') }}" required autofocus></textarea>

              <div class="col-sm-2 col-xs-12">
                <div class="col-xs-offset-2 col-xs-10">
                  <button class="btn btn-info">Ajouter la lettre</button>
                </div>
              </div>

                                @if ($errors->has('LettreDOrientation'))
                              <div class="col-xs-12">
                                <span class="help-block">
                                        <strong>{{ $errors->first('LettreDOrientation') }}</strong>
                                    </span>
                              </div>
                                @endif

            </div>

          </form>

        </div>

        <div class="col-xs-12"><hr></div>

      </div>
       
       
    </div>

    </div>
  </div>

@endsection