<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Medical') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bootstrap.css') }}"  type="text/css" rel="stylesheet"/>
     <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/styleAide.css') }}" rel="stylesheet"/>


     <!--Mes css js-->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('js/myScript.js') }}"></link>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
  <br>
 <div class="row margin-top-bottom">
           
             <div class="col-md-offset-3 col-sm-offset-2 col-md-6 col-sm-8">   
                 
               <div class="row">
                 <div class="contact-us-detail">Aide</div>
                  <form class="contact-us pattern-bg">
                    
            <div class="col-sm-12">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Medecin">
             </div>
                        </div>
                        <div class="col-sm-12">
            <div class="form-group">
              <input type="text" id="service" class="form-control" placeholder="service">
             </div>
                        </div>
                
                       
                        
                        
                          
                    
                
                         <div class="col-sm-12">
              <select id="subject" class="form-group form-control">
              <option value="" selected disabled>Hopital</option>
              <option>CHU Tlemcen</option>
              <option>Hopital Remchi</option>
              <option>Polyclinique Kifen</option>
               <option>Polyclinique Bouhhanek</option>
                            
               </select>
                          </div>

                
                   
                                <div class="form-group">
                                    
                                    <div class="col-md-offset-3 col-sm-offset-2 col-md-6 col-sm-8 input-group">
                                        <input type="text" placeholder="recherche" name="s" class="form-control left-rounded">
                                        <div class="input-group-btn">
                                            <button type="submit" style="background-color:#00bfff;color: #fff;" class="btn btn-inverse right-rounded">Chercher</button>
                                        </div>
                                    </div>
                                </div>

                            
                   
                   
                    
                       
                  </form>
                  
                
                </div>
        </div>
        
        
        
            </div>
           
        
        </div>
</body>
</html>
