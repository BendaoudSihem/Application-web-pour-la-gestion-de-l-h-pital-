@extends('layouts.app')

@section('content')

<div class="container animated fadeIn">

  <div class="row">
    <h1 class="header-title" align="center"> Contactez nous ... </h1>
    <hr>
    <div class="col-sm-12" id="parent">
      <div class="col-sm-6">
      <iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJaY32Qm3KWTkRuOnKfoIVZws&key=AIzaSyAf64FepFyUGZd3WFWhZzisswVx2K37RFY" allowfullscreen></iframe>
      </div>

      <div class="col-sm-6">
        <form action="form.php" class="contact-form" method="post">
  
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="nm" placeholder="Name" required="" autofocus="">
            </div>
        
        
            <div class="form-group form_left">
              <input type="email" class="form-control" id="email" name="em" placeholder="Email" required="">
            </div>
        
          <div class="form-group">
               <input type="text" class="form-control" id="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No." required="">
          </div>
          <div class="form-group">
          <textarea class="form-control textarea-contact" rows="5" id="comment" name="FB" placeholder="Type Your Message/Feedback here..." required=""></textarea>
          <br>
            <button class="btn btn-default btn-send" style="background-color:#00bfff;color: #fff"> <span class="glyphicon glyphicon-send"></span> Send </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection