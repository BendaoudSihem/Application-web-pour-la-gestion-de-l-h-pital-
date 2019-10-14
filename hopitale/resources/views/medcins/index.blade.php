@extends('layouts.app')

@section('content')

<div class="gestions">
  <div class="container">

    <h1 class="text-center">Gestion Medecin</h1>

    <div class="row">
      <div class="col-lg-12 "></div>
      <div class="col-lg-12 "></div>
      <div class="col-lg-12 "></div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
      <div class="div-square" style="text-align: center;">
        @if(Auth::user()->admin == "oui")
        <a href="{{url('Medecin/create')}}" >
          <i style="color:green;" class=" fa fa-user-plus  fa-5x"></i>
          <h4><b> Ajouter medecin</b></h4>
        </a>
         @endif
      </div>
    </div>

                  <!--Start Search Bar-->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 search-bar">
      <div class="input-group">
        <form role="form" method="POST" action="{{url('Rechercher/Medecin')}}">
               
          <span class="input-group-btn">
            <input type="search" name="rechercher" class="form-control" placeholder="Rechercher" autocomplete="on" id="searchBar" required>
            <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i> </button>
          </span>

           <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      </div><!-- /input-group -->
    </div>

     <div class="medecin"> @yield('medecin') </div>
    
       
    </div>


  </div>

</div>

@endsection