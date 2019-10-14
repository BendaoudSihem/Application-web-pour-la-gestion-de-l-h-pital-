@extends('archives.index')

@section('archive')

  <div class="col-xs-12"><hr></div>
  <div class="container">
    <div class="row">

          <!--URL pour ajouter nouvelle consultation-->

      <div class="col-xs-12"><br></div>

      <div class="col-xs-12">
      <div class="container-fluid" style="border: 1px solid black;background-color: #CEF6F5;">

      <div class="col-sm-offset-1 col-sm-10 col-offset-xs-0 col-xs-12">

        <div class="col-xs-12"><br>
           <div class="col-sm-offset-1 col-xs-offset-1 col-sm-8 col-xs-6"><br>
             <h4><u><b>CENTRE HOSPITALISATION ET UNIVERSITAIRE </b></u></h4>
             <h4><u><b> @if(Auth::user()->utilisateur == "Medecin")
                  DR. {{Auth::user()->name}} 
                        @elseif(Auth::user()->utilisateur == "Infermier")
                  INF. {{Auth::user()->name}} 
                        @endif
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
            <tr><th>Age : </th><td> <?php $age = (int)(date($date)-date($consultation->datNai));echo $age; ?></td></tr>
          </table></h4>
        </div>
          
          @if($ordonnance)

        <div class="col-xs-12"><hr></div>
               <!-- afficher l'ordonnace s'il existe-->
        <div class="col-xs-12">
          <div class="page-header" align="center">
             <h3><u><b>ORDONNANCE</b></u></h3>
          </div>
           <b>{{$ordonnance->created_at}}</b><br>
                                   <!-- readonly-->
          <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" disabled >{{$ordonnance->desc}}
          </textarea>

          <div class="col-sm-2 col-xs-12">
               <!--boutton pour imprimer l'ordonnance-->
            <div class="col-sm-12 col-xs-6"><br>
              <a class="btn btn-info" href="{{url('Consultation/Ordonnance/Imprimer/'.$consultation->id)}}" target="_blank">Imprimer</a>
            </div>

          </div>

        </div>

          @endif
 


      @if(Auth::user()->utilisateur != "Patient")
    
           @if($rapport)

        <div class="col-xs-12"><hr></div>

               <!-- afficher le rapport s'il existe-->
        <div class="col-xs-12">
          
          <div class="page-header" align="center">
             <h3><u><b>RAPPORT MEDICAL</b></u></h3>
          </div> 
           <b>{{$rapport->created_at}}</b><br>
          <textarea class="col-sm-10 col-xs-12" cols="100" rows="20" disabled>
             {{$rapport->desc}}
          </textarea>

          

          <div class="col-sm-2 col-xs-12">
               <!--boutton pour imprimer le rapport-->
            <div class="col-sm-12 col-xs-6"><br>
              <a class="btn btn-info" href="{{url('Consultation/Rapport/Imprimer/'.$consultation->id)}}" target="_blank">Imprimer</a>
            </div>

          </div>

        </div>

          @endif

    @endif


           @if($lettre)

        <div class="col-xs-12"><hr></div>

               <!-- afficher la lettre d'orientation s'il existe-->
        <div class="col-xs-12">
          <div class="page-header" align="center">
             <h3><u><b>LETTRE D'ORIENTATION</b></u></h3>
          </div>
           <b>{{$lettre->created_at}}</b><br>
          <textarea class="col-sm-10 col-xs-12" cols="100" rows="20" disabled>
            {{$lettre->desc}}
          </textarea>

          

          <div class="col-sm-2 col-xs-12">
               <!--boutton pour imprimer l'ordonnance-->
            <div class="col-sm-12 col-xs-6"><br>
              <a class="btn btn-info" href="{{url('Consultation/LettreDOrientation/Imprimer/'.$consultation->id)}}" target="_blank">Imprimer</a>
            </div>

          </div>

        </div>
        @endif

        <div class="col-xs-12"><hr></div>

      </div>
       
       </div>
     </div>

    </div>
  </div>

@endsection