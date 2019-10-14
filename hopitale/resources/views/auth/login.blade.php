<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
     <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>

  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('js/js/myScript.js') }}"></link>


  <script src="{{ asset('js/js/modernizr.js') }}"></script>


  <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>





  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>




  
  <!-- ====================================================
  header section -->
  <header class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-3 header-logo">
          <br>
          <a href="index.html"><img src="img/logo.png" alt="" class="img-responsive logo"></a>
        </div>

        <div class="col-sm-9">
          <nav class="navbar navbar-default">
            <div class="container-fluid nav-bar">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav navbar-right">
                  <li><a class="menu active" href="#home">Accueil</a></li>
                  <li><a class="menu" href="#about">à propos </a></li>
                  <li><a class="menu" href="#service">services </a></li>
                  <li><a class="menu" href="#team">Notre équipe</a></li>
                  <li><a class="menu" href="#contact"> contact </a></li>
                  <li><a class="menu" href="#connecter"> Se connecter </a></li>
                </ul>
              </div><!-- /navbar-collapse -->
            </div><!-- / .container-fluid -->
          </nav>
        </div>
      </div>
    </div>
  </header> <!-- end of header area -->

  <section class="slider" id="home">
    <div class="container-fluid">
      <div class="row">
          <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="header-backup"></div>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="img/slide-one.jpg" alt="">
                      <div class="carousel-caption">
                        <h1>Hopital </h1>
                        <p>service de haute qualité pour les hommes &amp; femmes</p>
                        <button>learn more</button>
                      </div>
                  </div>
                  <div class="item">
                    <img src="img/slide-two.jpg" alt="">
                      <div class="carousel-caption">
                        <h1>providing</h1>
                        <p>highquality service for men &amp; women</p>
                        <button>learn more</button>
                      </div>
                  </div>
                  <div class="item">
                    <img src="img/slide-three.jpg" alt="">
                      <div class="carousel-caption">
                        <h1>providing</h1>
                        <p>highquality service for men &amp; women</p>
                        <button>learn more</button>
                      </div>
                  </div>
                  <div class="item">
                    <img src="img/slide-four.jpg" alt="">
                      <div class="carousel-caption">
                        <h1>providing</h1>
                        <p>highquality service for men &amp; women</p>
                        <button>learn more</button>
                      </div>
                  </div>
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
    </div>
  </section><!-- end of slider section -->

  <!-- about section -->
  <section class="about text-center" id="about">
    <div class="container">
      <div class="row">
        <h2>à propos</h2>
        <h4>Les horaires de visite sont réglementés par instruction ministérielle.En règle générale, les visites sont autorisées de 13h30 à 15h00 et de 18h00 à 19h00.</h4>
        <div class="col-md-4 col-sm-6">
          <div class="single-about-detail clearfix">
            <div class="about-img">
              <img class="img-responsive" src="img/item6.png" alt="">
            </div>
            <div class="about-details">
              <div class="pentagon-text">
                <h1>B</h1>
              </div>
              <h3>Bienvenue</h3>
              <p>Bienvenue sur le site du Centre Hospitalo-Universitaire de Tlemcen. Vous y trouverez l'ensemble des informations utiles relatives ... </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="single-about-detail">
            <div class="about-img">
              <img class="img-responsive" src="img/item4.jpg" alt="">
            </div>
            <div class="about-details">
              <div class="pentagon-text">
                <h1>P</h1>
              </div>

              <h3>Présentation</h3>
              <p>L’établissement occupe une superficie de 13 hectares.
                               Le Centre Hospitalo-universitaire Dr Tidjani Damerdji de Tlemcen est d’architecture pavillonnaire.
                                Il est actuellement constitué de 44 services et laboratoires spécialisés.
                               </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="single-about-detail">
            <div class="about-img">
              <img class="img-responsive" src="img/item3.jpg" alt="">
            </div>
            <div class="about-details">
              <div class="pentagon-text">
                <h1>O</h1>
              </div>
              <h3>Organigramme</h3>
              <p>Le conseil scientifique regroupe les chefs de services, son président est élu parmi les chefs de services pour une durée de 3 ans.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- end of about section -->


  <!-- service section starts here -->
  <section class="service text-center" id="service">
    <div class="services">
    <div class="container text-center lead">
        <h2 style=" font-size: 90px;color: #42b3e5;margin-top: 50px;">SERVICES</h2>
        <div class="row">
           
            <div class="col-md-4">
                <div class="service urgence">
                    <div class="service-icon center-block"> 
                        <i class="fa fa-ambulance fa-3x"></i>
                    </div>
                     <a href="#"> <h3 style=" font-size: 40px;color: #42b3e5;margin-top: 50px;">Urgences</h3></a>
                    <p>Le CHU dispose de services d'urgences générales pour les adultes et pour les enfants. 
                    Elle dispose également de services... </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service contacte">
                    <div class="service-icon center-block">
                        <i class="fa fa-envelope fa-3x"></i>
                    </div>
                    <a href="#"> <h3 style=" font-size: 40px;color: #42b3e5;margin-top: 50px;">Contact</h3></a>
                    <p>Centre Hospitalo-Universitaire Dr Tidjani Damerdji 05, Bd Mohammed V - Tlemcen.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service aide">
                    <div class="service-icon center-block">
                        <i class="fa fa-question-circle fa-3x"></i>
                    </div>
                     <a href="#"><h3 style=" font-size: 40px;color: #42b3e5;margin-top: 50px;">Aide</h3></a>
                    <p>Les travailleurs sociaux sont à votre disposition pour vous aider à résoudre les différents problèmes liés à votre hospitalisation.</p>
                </div>
            </div>
        </div>
    </div>
</div>


  </section><!-- end of service section -->


  <!-- team section -->
  <section class="team" id="team">
    <div class="container">
      <div class="row">
        <div class="team-heading text-center">
          <h2>Notre équipe</h2>
          <h4>La Haute Autorité de Santé lance PACTE, Programme d’Amélioration Continue du Travail en Equipe.</h4>
        </div>
        <div class="col-md-2 single-member col-sm-4">
          <div class="person">
            <img class="img-responsive" src="img/member1.jpg" alt="member-1">
          </div>
          <div class="person-detail">
            <div class="arrow-bottom"></div>
            <h3>Dr. M. Weiner, M.D.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
          </div>
        </div>
        <div class="col-md-2 single-member col-sm-4">
          <div class="person-detail">
            <div class="arrow-top"></div>
            <h3>Dr. Danielle, M.D.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
          </div>
          <div class="person">
            <img class="img-responsive" src="img/member2.jpg" alt="member-2">
          </div>
        </div>
        <div class="col-md-2 single-member col-sm-4">
          <div class="person">
            <img class="img-responsive" src="img/member3.jpg" alt="member-3">
          </div>
          <div class="person-detail">
            <div class="arrow-bottom"></div>
            <h3>Dr. Caitlin, M.D.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
          </div>
        </div>
        <div class="col-md-2 single-member col-sm-4">
          <div class="person-detail">
            <div class="arrow-top"></div>
            <h3>Dr. Joseph, M.D.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
          </div>
          <div class="person">
            <img class="img-responsive" src="img/member4.jpg" alt="member-4">
          </div>
        </div>
        <div class="col-md-2 single-member col-sm-4">
          <div class="person">
            <img class="img-responsive" src="img/member5.jpg" alt="member-5">
          </div>
          <div class="person-detail">
            <div class="arrow-bottom"></div>
            <h3>Dr. Michael, M.D.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
          </div>
        </div>
        <div class="col-md-2 single-member col-sm-4">
          <div class="person-detail">
            <div class="arrow-top"></div>
            <h3>Dr. Hasina, M.D.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
          </div>
          <div class="person">
            <img class="img-responsive" src="img/member6.jpg" alt="member-5">
          </div>
        </div>
      </div>
    </div>
  </section><!-- end of team section -->



  <!-- service section starts here -->
  <section id="connecter">

    <div class="container">
      <div class="row">
        <div class="contact-caption clearfix">
          <div class="contact-heading text-center">
            <h2>Se connecter</h2>
          </div>

          <div class="col-md-6 col-md-offset-2 col-xs-12 contact-form">
    
    
      <div class="col-xs-12">
          <!--form start-->
        <form class="form-conatiner " method="POST" action="{{ route('login') }}">
          <br>

              {{ csrf_field() }}

              <!--inpout pour login -->

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Email:</label>
            <input type="email" name="email" class=" email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>

              <!--inpout pour mot de passe-->
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="exampleInputPassword1">Mot de passe:</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>


              <!-- button pour envoyer les donnees -->
          <button type="submit" class="btn btn-primary">Submit</button>

              <!-- lien pour recuperie le mot de passe-->
          <a class="btn btn-link" style="color: #fff" href="{{ route('password.request') }}">Mot de passe oublier? </a>
          <div class="col-xs-12"><br></div>

        </form>

<!--form end-->

</div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- end of service section -->

  <!-- map section -->
  <div class="api-map" id="contact">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 map" id="map"></div>
      </div>
    </div>
  </div><!-- end of map section -->


  <!-- contact section starts here -->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="contact-caption clearfix">
          <div class="contact-heading text-center">
            <h2>contact us</h2>
          </div>
          <div class="col-md-5 contact-info text-left">
            <h3>contact information</h3>
            <div class="info-detail">
              <ul><li><i class="fa fa-calendar"></i><span>Saturday - Friday:</span> 24h/24h</li></ul>
              <ul><li><i class="fa fa-map-marker"></i><span>Address:</span> 123 Belle Horisan , Tlemcen, Algeria, CP 12357</li></ul>
              <ul><li><i class="fa fa-phone"></i><span>Phone:</span>  043712345</li></ul>
              <ul><li><i class="fa fa-fax"></i><span>Fax:</span> 04391234</li></ul>
              <ul><li><i class="fa fa-envelope"></i><span>Email:</span> hopital@gmail.com</li></ul>
            </div>
          </div>
          <div class="col-md-6 col-md-offset-1 contact-form">
            <h3>leave us a message</h3>

            <form class="form">
              <input class="name" type="text" placeholder="Name">
              <input class="email" type="email" placeholder="Email">
              <input class="phone" type="text" placeholder="Phone No:">
              <textarea class="message" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
              <input class="submit-btn" type="submit" value="SUBMIT">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- end of contact section -->

  <!-- footer starts here -->
  <footer class="footer clearfix">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 footer-para">
          <p>&copy;Mostafizur All right reserved</p>
        </div>
        <div class="col-xs-6 text-right">
          <a href=""><i class="fa fa-facebook"></i></a>
          <a href=""><i class="fa fa-twitter"></i></a>
          <a href=""><i class="fa fa-skype"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- script tags
  ============================================================= -->
  <script src="{{ asset('js/js/jquery-2.1.1.js') }}"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="{{ asset('js/js/gmaps.js') }}"></script>
  <script src="{{ asset('js/js/smoothscroll.js') }}"></script>
  <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/js/custom.js') }}"></script>

</body>
</html>
