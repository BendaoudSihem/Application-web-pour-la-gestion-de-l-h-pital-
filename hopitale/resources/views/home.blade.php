@extends('index')

@section('home')


<!--Start Carousel-->
<div class="container">
    <div class="slide">
        <div>
            <div id="myslide" class="carousel" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myslide" data-slide-to="0" class="active"></li>
                    <li data-target="#myslide" data-slide-to="1"></li>
                    <li data-target="#myslide" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{url('img/av.jpg')}}" alt="Image 1" class="center-block">
                    </div>
                    <div class="item">
                        <img src="{{url('img/s.png')}}" alt="Image 2" class="center-block">
                    </div>
                    <div class="item">
                        <img src="{{url('img/medical-563427_1280.jpg')}}" alt="Image 3" class="center-block" >
                    </div>
        
                </div>

            </div>
        </div>
      </div>
    </div>  
        <div class="col-xs-12"><br><br></div>
    <div class="container">
    <div class="services">
        <div class="row  text-center ">

           <h2 class="h1"><br>GESTION MEDICAL<br><br></h2>

            <a href="{{url('Patients/0')}}">
                <div class="col-lg-4 col-md-6 col-xs-12 categorie">
                    <img src="{{url('img/pac.png')}}">
                    <h3>Gestion Patient</h3>
                    
                </div>
            </a>
            <a href="{{url('Medecins/0')}}">
                <div class="col-lg-4 col-md-6 col-xs-12 categorie">
                    <img src="{{url('img/abc.png')}}">
                    <h3>Gestion Medecin</h3>
                   
                </div>
            </a>
            <a href="{{url('Infermiers/0')}}">
                <div class="col-lg-4 col-md-6 col-xs-12 ">
                    <img src="{{url('img/infer.png')}}">
                    <h3>Gestion Infermier</h3>
                  
                </div>
            </a>
        <div class="col-xs-12"><br></div>
        </div>
    </div>
</div>
<!--End Carousel-->


@endsection
