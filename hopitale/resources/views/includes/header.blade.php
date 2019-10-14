<div class="wrapper-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 login-popup">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-o fa-stack-2x"></i>
                <i class="fa fa-close fa-stack-1x white"></i>
            </span>
                
                </div>
               
            </div>
        </div>
    </div>


<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <div class="row">
            <a class="navbar-brand hvr-buzz-out" href="#"><span>MediCal</span>
                <div class="slogon">'Bienvenue'</div></a>
        </div>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="ournavbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="{{url('home')}}">Accueil <span class="sr-only">(current)</span></a></li>
                  @if(Auth::user()->utilisateur != "Patient")
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Archives <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('Archive/medecins/0')}}">Medecin Archivé</a></li>
                        <li><a href="{{url('Archive/infermiers/0')}}">Infirmier Archivé</a></li>
                        <li><a href="{{url('Archive/secretaires/0')}}">Secrétaire Archivée</a></li>
                        <li><a href="{{url('Archive/patients/0')}}">Patient Archivé</a></li>
                        <li><a href="{{url('Archive/Rendez-vous')}}">Rendez-vous Archivé</a></li>
                    </ul>
                </li>
                @if(Auth::user()->admin == "oui")


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestions<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('Examens')}}">Gestion des examens</a></li>
                        <li><a href="{{url('Chambres')}}">Gestion des chambres</a></li>
                    </ul>
                </li>

                @endif
                <li><a href="{{url('Rendez-vous')}}">Rendez-vous</a></li>
                <li><a href="{{url('Medecins/0')}}">Gestion Medecins</a></li>
                <li><a href="{{url('Infermiers/0')}}">Gestion Infirmiers</a></li>
                <li><a href="{{url('Secretaires/0')}}">Gestion Secrétaires</a></li>
                <li><a href="{{url('Patients/0')}}">Gestion Patients</a></li>
                  @else
                <li><a href="{{url('Agenda')}}">Agenda</a></li>
                  @endif
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} {{Auth::user()->prenom}}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('Contact')}}">Contact</a></li>
                  @if(Auth::user()->utilisateur != "Patient")
                  <li><a href="{{url('Profile')}}">Profile</a></li>
                  @endif
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  Se déconnecter
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                  </form>
                  </li>
                </ul>
              </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        <!-- Collect the nav links, forms, and other content for toggling -->


    </div><!-- /.container-fluid -->
</nav>
<!--End Navbar-->