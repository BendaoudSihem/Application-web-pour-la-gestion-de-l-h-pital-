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
    <!-- <link href="{{ asset('css/styleAide.css') }}" rel="stylesheet"/>-->


     <!--Mes css js-->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('js/myScript.js') }}"></link>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#myInputt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablee option").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>
<style type="text/css">
 
.palette {
    border:2px solid #777;
    height:50px;
    width:70px;
}
.palette-box {
    float:left;
}
.red{
    background-color:red;
}
.red_green{
    border-color:green;
    background-color:red;
}
.green{
    background-color:green;
}
.orange{
    background-color:orange;
}
.orange_green{
    border-color:green;
    background-color:orange;
}
</style>
</head>
<body>
    <div id="app">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
