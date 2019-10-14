@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
        
    <div class="col-xs-12">
      <div class="col-sm-4 col-xs-1"></div>
      <div class="col-sm-4 col-xs-8"><h1>Agenda</h1></div>
      <div class="col-sm-4 col-xs-1"></div>
    </div>

    <div class="col-xs-12">
      <h4>Aujourd'huit le: <small><?php echo " ".date('Y-m-d'); $date=date('Y-m-d'); ?></small></h4>
    </div>

    <div class="col-xs-12"><hr></div>
    
    <div class="col-xs-12">
   @for($m=0,$mois=-2;$m<8;$m++,$mois++)

      <div class="col-sm-6  col-xs-12" >
        <div class="col-xs-12">
          <h2>
            <b>
              <?php $p=date("d"); 
                    $d=strtotime("+".$mois." Months"); 
                    $M=date('m',$d); 
                    if(($M-date('m'))<0){
                      $y=strtotime("+1 Years");
                      $Y=date('Y',$y);
                    }else $Y=date('Y');
                    echo " ".date('M',$d)." (".$M.")"; ?> 
            </b>
          </h2>
        </div>
        <div class="col-xs-12">
               @for($i=0,$cmpt=1;$i<6;$i++)
          <div class="col-xs-12">

                @for($j=0,$test=0,$premier=0;$j<6;$j++,$test=0,$premier=0,$cmpt++,$p--)

                @if($M == "01" || $M == "03" || $M == "05" || $M == "09" || $M == "10" || $M == "12")  

                @if($cmpt<32)    
               <?php  $r=date($Y."-".$M."-".$cmpt);?>      

                         @if($hospitalisations)

                           @foreach($hospitalisations as $hosp)
                             @if($hosp->rendez_vous)

                             @if($hosp->rendez_vous == $r) 
                             @if($date > $r && $test == 0)  
                   <div class="palette-box palette red">
                            @elseif($date > $r)  
                   <div class="palette-box palette red_green">
                            @elseif($date < $r && $test == 0) 
                    <div class="palette-box palette orange">
                            @else 
                    <div class="palette-box palette orange_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             @else

                             @if($hosp->created_at == $r) 
                             @if($test == 0)  
                   <div class="palette-box palette green">
                            @else 
                    <div class="palette-box palette red_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             @endif
                           @endforeach

                         @elseif($examens)

                           @foreach($examnes as $examen)
                             @if($examen->rendez_vous)

                             @if($examen->rendez_vous == $r) 
                             @if($date > $r && $test == 0)  
                   <div class="palette-box palette red">
                            @elseif($date > $r)  
                   <div class="palette-box palette red_green">
                            @elseif($date < $r && $test == 0) 
                    <div class="palette-box palette orange">
                            @else 
                    <div class="palette-box palette orange_green">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif
            </div>  <?php  $test = 1;?>
                             @endif

                             @else

                             @if($hosp->created_at == $r) 
                             @if($test == 0)  
                   <div class="palette-box palette green">
                            @else 
                    <div class="palette-box palette red_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             

                             @endif
                           @endforeach

                         
                         @endif

                         @if($test==0)
            <div class="palette-box palette " style="background-color: #fff">
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d);?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif
            </div>
                        @endif
                   
                   @if($premier == 1)
                        <!-- Modal  -->
          <div class="modal fade" id="myModal{{$M}}{{$cmpt}}" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content col-xs-12">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Afficher </h4>
                  </div>
                </div>
                <div class="modal-body ">
                  <div class="col-xs-12">

                     @if($examens)
                    @foreach($examens as $examen)
                    <div class="col-xs-12">
                      @if($examen->nom)
                      <div class="col-sm-6 col-xs-12">
                        <b>Nom d'examen :</b> {{$examen->nom}}
                      </div>
                      @endif
                      @if($examen->rendez_vous)
                      <div class="col-sm-6 col-xs-12">
                        <b>Date de rendez-vous :</b> {{$examen->rendez_vous}}
                      </div>
                      @else
                      <div class="col-sm-6 col-xs-12">
                        <b>Date d'examen :</b> {{$examen->created_at}}
                      </div>
                      @endif
                    </div>
                    <div class="col-xs-12"><hr></div>
                    @endforeach
                     @endif

                     @if($hospitalisations)
                    @foreach($hospitalisations as $hosp)
                    <div class="col-xs-12">
                       @if($hosp->lit_num)
                      <div class="col-xs-12">
                        <b>{{$hosp->service}} {{$hosp->chambre_num}}-{{$hosp->lit_num}}</b> 
                      </div>
                      @else
                      <div class="col-xs-12">
                        <b><center>Pas encors validé le lit</center></b>
                      </div>
                      @endif
                      @if($hosp->rendez_vous)
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de rendez-vous :</b> {{$hosp->rendez_vous}}
                      </div>
                      @else
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de debut :</b> {{$hosp->debut}}
                      </div>
                      @endif
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de fin :</b> {{$hosp->fin}}
                      </div>
                    </div>
                    <div class="col-xs-12"><hr></div>
                    @endforeach
                     @endif

                  </div>
                  <div class="col-xs-6"></div>
                  <div class="col-xs-6">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>

                @endif
            
                @endif

                @elseif($M == "02") 

                @if($cmpt<30)       <?php  $r=date($Y."-".$M."-".$cmpt);?>      

                         @if($hospitalisations)

                           @foreach($hospitalisations as $hosp)
                             @if($hosp->rendez_vous)

                             @if($hosp->rendez_vous == $r) 
                             @if($date > $r && $test == 0)  
                   <div class="palette-box palette red">
                            @elseif($date > $r)  
                   <div class="palette-box palette red_green">
                            @elseif($date < $r && $test == 0) 
                    <div class="palette-box palette orange">
                            @else 
                    <div class="palette-box palette orange_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             @else

                             @if($hosp->created_at == $r) 
                             @if($test == 0)  
                   <div class="palette-box palette green">
                            @else 
                    <div class="palette-box palette red_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             @endif
                           @endforeach

                         @elseif($examens)

                           @foreach($examnes as $examen)
                             @if($examen->rendez_vous)

                             @if($examen->rendez_vous == $r) 
                             @if($date > $r && $test == 0)  
                   <div class="palette-box palette red">
                            @elseif($date > $r)  
                   <div class="palette-box palette red_green">
                            @elseif($date < $r && $test == 0) 
                    <div class="palette-box palette orange">
                            @else 
                    <div class="palette-box palette orange_green">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif
            </div>  <?php  $test = 1;?>
                             @endif

                             @else

                             @if($hosp->created_at == $r) 
                             @if($test == 0)  
                   <div class="palette-box palette green">
                            @else 
                    <div class="palette-box palette red_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             

                             @endif
                           @endforeach

                         
                         @endif

                         @if($test==0)
            <div class="palette-box palette " style="background-color: #fff">
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d);?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif
            </div>
                        @endif
                   
                   @if($premier == 1)
                        <!-- Modal  -->
          <div class="modal fade" id="myModal{{$M}}{{$cmpt}}" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content col-xs-12">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Afficher </h4>
                  </div>
                </div>
                <div class="modal-body ">
                  <div class="col-xs-12">

                     @if($examens)
                    @foreach($examens as $examen)
                    <div class="col-xs-12">
                      @if($examen->nom)
                      <div class="col-sm-6 col-xs-12">
                        <b>Nom d'examen :</b> {{$examen->nom}}
                      </div>
                      @endif
                      @if($examen->rendez_vous)
                      <div class="col-sm-6 col-xs-12">
                        <b>Date de rendez-vous :</b> {{$examen->rendez_vous}}
                      </div>
                      @else
                      <div class="col-sm-6 col-xs-12">
                        <b>Date d'examen :</b> {{$examen->created_at}}
                      </div>
                      @endif
                    </div>
                    <div class="col-xs-12"><hr></div>
                    @endforeach
                     @endif

                     @if($hospitalisations)
                    @foreach($hospitalisations as $hosp)
                    <div class="col-xs-12">
                      @if($ehosp->lit_num)
                      <div class="col-xs-12">
                        <b>{{$hosp->service}} {{$hosp->chambre_num}}-{{$hosp->lit_num}}</b> 
                      </div>
                      @else
                      <div class="col-xs-12">
                        <b><center>Pas encors validé le lit</center></b>
                      </div>
                      @endif
                      @if($hosp->rendez_vous)
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de rendez-vous :</b> {{$hosp->rendez_vous}}
                      </div>
                      @else
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de debut :</b> {{$hosp->debut}}
                      </div>
                      @endif
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de fin :</b> {{$hosp->fin}}
                      </div>
                    </div>
                    <div class="col-xs-12"><hr></div>
                    @endforeach
                     @endif

                  </div>
                  <div class="col-xs-6"></div>
                  <div class="col-xs-6">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>

                @endif

                @endif

                @else 

                @if($cmpt<31)   <?php  $r=date($Y."-".$M."-".$cmpt);?>      

                         @if($hospitalisations)

                           @foreach($hospitalisations as $hosp)
                             @if($hosp->rendez_vous)

                             @if($hosp->rendez_vous == $r) 
                             @if($date > $r && $test == 0)  
                   <div class="palette-box palette red">
                            @elseif($date > $r)  
                   <div class="palette-box palette red_green">
                            @elseif($date < $r && $test == 0) 
                    <div class="palette-box palette orange">
                            @else 
                    <div class="palette-box palette orange_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             @else

                             @if($hosp->created_at == $r) 
                             @if($test == 0)  
                   <div class="palette-box palette green">
                            @else 
                    <div class="palette-box palette red_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             @endif
                           @endforeach

                         @elseif($examens)

                           @foreach($examnes as $examen)
                             @if($examen->rendez_vous)

                             @if($examen->rendez_vous == $r) 
                             @if($date > $r && $test == 0)  
                   <div class="palette-box palette red">
                            @elseif($date > $r)  
                   <div class="palette-box palette red_green">
                            @elseif($date < $r && $test == 0) 
                    <div class="palette-box palette orange">
                            @else 
                    <div class="palette-box palette orange_green">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif
            </div>  <?php  $test = 1;?>
                             @endif

                             @else

                             @if($hosp->created_at == $r) 
                             @if($test == 0)  
                   <div class="palette-box palette green">
                            @else 
                    <div class="palette-box palette red_green">
                             @endif

                             @if($premier == 0)
                      <button class="btn btn-link" data-toggle="modal" data-target="#myModal{{$M}}{{$cmpt}}" style="text-align: left;padding-left: 0px;color: black">
                             @endif
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d); ?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif

                         @if($premier == 0)
                      <?php  $premier = 1;?> </button>
                             @endif

            </div>  <?php  $test = 1;?>
                             @endif

                             

                             @endif
                           @endforeach

                         
                         @endif

                         @if($test==0)
            <div class="palette-box palette " style="background-color: #fff">
               <?php  $d=strtotime("-".$p." Days"); echo " ".date('l',$d);?>
               <br> 
                         @if($cmpt<10)
                           0{{$cmpt}}
                         @else
                           {{$cmpt}}
                         @endif
            </div>
                        @endif
                   
                   @if($premier == 1)
                        <!-- Modal  -->
          <div class="modal fade" id="myModal{{$M}}{{$cmpt}}" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content col-xs-12">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Afficher </h4>
                  </div>
                </div>
                <div class="modal-body ">
                  <div class="col-xs-12">

                     @if($examens)
                    @foreach($examens as $examen)
                    <div class="col-xs-12">
                      @if($examen->nom)
                      <div class="col-sm-6 col-xs-12">
                        <b>Nom d'examen :</b> {{$examen->nom}}
                      </div>
                      @endif
                      @if($examen->rendez_vous)
                      <div class="col-sm-6 col-xs-12">
                        <b>Date de rendez-vous :</b> {{$examen->rendez_vous}}
                      </div>
                      @else
                      <div class="col-sm-6 col-xs-12">
                        <b>Date d'examen :</b> {{$examen->created_at}}
                      </div>
                      @endif
                    </div>
                    <div class="col-xs-12"><hr></div>
                    @endforeach
                     @endif

                     @if($hospitalisations)
                    @foreach($hospitalisations as $hosp)
                    <div class="col-xs-12">
                      @if($ehosp->lit_num)
                      <div class="col-xs-12">
                        <b>{{$hosp->service}} {{$hosp->chambre_num}}-{{$hosp->lit_num}}</b> 
                      </div>
                      @else
                      <div class="col-xs-12">
                        <b><center>Pas encors validé le lit</center></b>
                      </div>
                      @endif
                      @if($hosp->rendez_vous)
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de rendez-vous :</b> {{$hosp->rendez_vous}}
                      </div>
                      @else
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de debut :</b> {{$hosp->debut}}
                      </div>
                      @endif
                      <div class="col-xs-6 col-xs-12">
                        <b>Date de fin :</b> {{$hosp->fin}}
                      </div>
                    </div>
                    <div class="col-xs-12"><hr></div>
                    @endforeach
                     @endif

                  </div>
                  <div class="col-xs-6"></div>
                  <div class="col-xs-6">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>

                @endif
                @else <br>
                @endif

                @endif

                @endfor
          </div>
                @endfor
        </div>
      </div>

  @endfor
    </div>

    <div class="col-xs-12"></div>

  </div>
</div>

@endsection
