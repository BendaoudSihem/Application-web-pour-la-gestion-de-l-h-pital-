@extends('layouts.app')

@section('content')

<!--Start Search Bar-->
<div class="container">
    <div class="row search-bar">
        <div class="col-md-10 col-md-offset-2">
            <div class="input-group col-xs-9">             
              <form role="form" method="POST" action="{{url('Recherche/Generale')}}">           
                <span class="input-group-btn ">
                  <input type="search" name="rechercher" class="form-control" placeholder="Rechercher" autocomplete="on" id="searchBar" required>
                  <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i> </button>
                </span>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>
            </div><!-- /input-group -->
        </div>
    </div>
</div>
<!--End Search Bar-->

     @yield('home')

<!--Start Services-->
<div class="container text-center lead">
    <div class="services">
        <h2 class="h1"><br>SERVICES</h2>
        <div class="row">
           
            <div class="col-md-4">
                <div class="service urgence">
                    <div class="service-icon center-block"> 
                        <i class="fa fa-ambulance fa-3x"></i>
                    </div>
                     <a href="{{url('Urgences')}}"> <h3>Urgences</h3></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service contact">
                    <div class="service-icon center-block">
                        <i class="fa fa-envelope fa-3x"></i>
                    </div>
                    <a href="{{url('Contact')}}"> <h3>Contact</h3></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service aide">
                    <div class="service-icon center-block">
                        <i class="fa fa-question-circle fa-3x"></i>
                    </div>
                     <a href="{{url('Aide')}}"><h3>Aide</h3></a>
                </div>
            </div>
        <div class="col-xs-12"><br></div>
        </div>
    </div>
</div>
<!--End Services-->

@endsection
