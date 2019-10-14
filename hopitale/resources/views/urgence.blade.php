@extends('layouts.app')

@section('content')

<div class="blog-header">
      <div class="container">
        <h1 style="color:#00bfff" class="blog-title">Urgences</h1>
        <?php $date=date("Y-m-d"); ?>
        <p class="lead blog-description">Mis à jour le {{$date}}. </p>
      </div>
    </div>

    <div class="container">

      <div class="row">

        
      <div class="col-sm-12 blog-main">
      <div class="img-rounded">
         <img src="{{url('img/img.jpeg')}}" style="max-width: 80%;" ></div>
          <div class="blog-post">
            <h3><b style="color:#00bfff">EN CAS D’URGENCE MÉDICALE, APPELEZ LE 15</b></h3>
            
            
            <p>La personne qui répond au téléphone vous demandera notamment :</p>
            <hr>
           <li>qui vous êtes : victime, témoin, proche, parent</li>
            
             <li>où vous êtes : adresse exacte où les secours doivent intervenir</li>
            <li> pourquoi vous appelez : combien de personnes à prendre en charge, gravité de leur état</li>
            <li>un numéro de téléphone où vous contacter rapidement</li>
            <br>

            <p>Ne raccrochez pas sans y être invité.<br>
              Essayez de vous exprimer clairement et précisément, puis écoutez attentivement les conseils donnés sur la conduite à tenir avant   l'arrivée des secours. <b>Cela peut sauver une vie.</b></p>
              <br>
              <h3><b style="color:#00bfff">EN CAS D’EMPOISONNEMENT</b></h3>
              <p>ou d’ingestion possible d’un produit toxique, ne faites rien avaler à la personne et téléphonez au centre anti-poison (01 40 05 48 48 ouvert 24h/24) ou appelez le 15.</p>
            
            <br>
            <h3><b style="color:#00bfff">SERVICES D'ACCUEIL DES URGENCES DE CHU</b></h3>
              <p>Le CHU dispose de services d'urgences générales pour les adultes et pour les enfants.
              	<br>
              	Elle dispose également de services d'urgence spécialisées, comme par exemple les urgences maternité et gynécologiques, les urgences mains, les urgences ORL, les urgences ophtalmologiques. Pour en savoir plus
                Pour les professionnels, des urgences spécialisées, qui nécessitent d'être adressées par un médecin.
              </p>
          </div><!-- /.blog-post -->

          

        </div><!-- /.blog-main -->

        

      </div><!-- /.row -->

    </div><!-- /.container -->


@endsection