@extends('archives.index')

@section('archive')



    
         <!--afficher -->
      <div class="col-xs-12" ><hr><br></div>

                    <!--afficher les 15 premiers -->
              @if($archives)
                 @foreach($archives as $archive)
      <div class="col-sm-4 col-xs-6" style="text-align: center;">
        <div class="thumbnail">

          <a href="{{url('Archive/'.$MotCle.'/profile/'.$archive->id)}}" target="_blank">

            <img src="{{url('img/'.$MotCle.'/'.$archive->image)}}" style="width:100%">
            <div class="caption">
              <b>{{$archive->nom}} {{$archive->prenom}}</b><br>
              <b>Grade:</b>{{$archive->grade}} <b> Specialité:</b>{{$archive->specialite}}
            </div>

          </a>

          @if(Auth::user()->admin == "oui" )

                      <!--button pour restaurer -->
          <div class="col-xs-6 caption">
            <button class="btn btn-def" data-toggle="modal" data-target="#myModal{{$archive->id}}">Restaurer</button>
          </div>

                      <!--button pour supprimer -->
          <div class="col-xs-6 caption">
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModall{{$archive->id}}">Supprimer</button>
          </div>

          @endif

                       <!-- Modal de restaure -->
          <div class="modal fade" id="myModal{{$archive->id}}" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Creé le un compte </h4>
                  </div>
                </div>
                <div class="modal-body ">
                   <form action="{{url('Archive/'.$MotCle.'/'.$archive->id)}}" method="POST">
                     {{csrf_field()}}
                  <div class="col-xs-12">
                      <label>Login :   </label>  {{$archive->email}}<br>
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

                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModall{{$archive->id}}" role="dialog">
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
                   <form action="{{url('Archive/'.$MotCle.'/'.$archive->id)}}" method="POST">
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

                 <!--pagination-->
      <div class="col-sm-offset-4 col-xs-12">
          @if($cmp>1)
            @for($i=0; $i<=$cmp;$i++)
        <a href="{{url('Archive/'.$MotCle.'/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
            @endfor
          @endif
      </div>
      <div class="col-xs-12"><br></div>
        @endif
      

@endsection