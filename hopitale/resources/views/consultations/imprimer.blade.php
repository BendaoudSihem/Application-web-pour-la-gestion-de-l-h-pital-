<!DOCTYPE html>
<html>
<head>
  <title>Imprimer</title>

    <meta charset="utf-8">

    <!-- Styles -->
     <link href="{{ asset('css/bootstrap.css') }}"  type="text/css" rel="stylesheet"/>

</head>
<body >
    
  <div class="container-fluid" >
      <div class="col-sm-offset-1 col-sm-10 col-offset-xs-0 col-xs-12">

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
            <tr><th>Age : </th><td> <?php $age = (int)(date($date)-date($consultation->datNai));echo $age; ?></td></tr>
          </table></h4>
        </div>

        <div class="col-xs-12"><hr></div>
        <div class="col-xs-12">
          <div class="page-header" align="center">
             <h3><u><b>{{$MotCle}}</b></u></h3>
          </div>
          <textarea class="col-sm-10 col-xs-12"  cols="100"  rows="20" disabled >{{$imprimer->desc}}
          </textarea>
        </div>

        <div class="col-xs-12"><hr></div>

        <div class="col-sm-offset-6 col-xs-offset-0 col-xs-12"><b>{{$imprimer->created_at}}</b><br></div>

        <div class="col-xs-12"><hr></div>

      </div> 

<script type="text/javascript">JavaScript:print()</script>
</body>
</html>