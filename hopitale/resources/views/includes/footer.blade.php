
<!--Start Footer-->
<div class="footer">
    <div class="panel-footer">
        <div class="container">
           
            <div class="row">
                <div class="col-md-6">
                    <h3>Nous suivre sur les réseaux sociaux</h3>
                    <a href=""><i class="fa fa-facebook-square fa-3x"></i></a>
                    <a href=""><i class="fa fa-twitter-square fa-3x"></i></a>
                    <a href=""><i class="fa fa-google-plus-square fa-3x"></i></a>
                    <a href=""><i class="fa fa-instagram fa-3x"></i></a>
                </div>
                <div class="col-md-6">
                    <div class="newsletter">
                        <h3>Inscription à la newsletter</h3>
                        <form role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="emailNewsletter" palceholder="Entrez-votre e-mail">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn-primary" value="S'abonner">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Ou nous trouver ?</h3>
                    <div id="map">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Coordonnées</h3>
                    <ul class="list-unstyled">
                        <li><b>Adresse : </b> Belle Horizon Tlemcen  Algerie</li>
                        <li><b>Tél :</b> 043 2148236</li>
                        <li><b>email :</b> HopitalTlemcen@gmail.com</li>
                        <li><b>Skype :</b> HoptalTlemcen</li>
                        <p><b>Ouvert</b>  du samedi au vendredi de 24h/24h</p>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright text-center">
            <i class="fa fa-copyright"></i> All COPYRIGHT RESERVED 2017
        </div>
    </div>
</div>

<!--Start-->


<!--End -->

<!--End Footer-->
<div id="goToSearch" class="text-center">
    <i class="fa fa-search fa-2x"></i>
</div>
<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/myScript.js')}}"></script>
<script>
    function initMap() {
        var uluru =  {lat: -34.875331, lng:-1327094 };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
