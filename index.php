<?php

include '__inc/templates/img_homepage.php';

include '__inc/connexionBDD.php';

$sql = $pdo->query("SELECT count(DISTINCT marque) FROM `cdt_cars_entraxes_2022`") -> fetchall();

foreach ($sql[0] as $result ) {
    $nbMarque = $result;

}

$sq2 = $pdo->query("SELECT count(DISTINCT modele) FROM `cdt_cars_entraxes_2022`") -> fetchall();

foreach ($sq2[0] as $resultm ) {
    $nbModele = $resultm;

}

?>
<div class="container">
  <div class="text-center mt-3">

      <h1>Bienvenue sur Entraxe Jante Alu !</h1>

      <p>Vous désirez acquérir de nouvelles jantes alu pour votre auto, mais vous ne connaissez pas ses caractéristiques ?</p>
      <p>Sur <b>Entraxe Jante Alu</b>, vous retrouverez <b>l'entraxe</b>, <b>le déport</b>, ainsi que <b>l'alésage central</b> correspondant à votre véhicule.</p>
      <p>Actuellement, notre site répertorie <a href="marque"><?=$nbMarque?> marques</a> de voitures et <a href="marque"><?=$nbModele?> modèles</a> de voitures.</p>

      <h5>Nous vous souhaitons une bonne visite !</h5>

  </div>

  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-sm" style="text-align: center;">
        <a href="/tuto-entraxe">
        <figure class="figure">
          <img src="assets/img/Tuto_Entraxe.jpg" class="figure-img img-fluid rounded" alt="Comment mesurer votre entraxe.">
          <figcaption class="figure-caption rounded" style="background-color : #343a40; padding-top : 12px; padding-bottom : 1px;"><h2 style="font-size: 18px;">Qu'est-ce que l'entraxe ?</h2></a></figcaption>
        </figure>
      </div>
      <div class="col-sm" style="text-align: center;">
        <a href="tuto-deport">
        <figure class="figure">
          <img src="assets/img/deport.jpg" class="figure-img img-fluid rounded" alt="Comment mesurer votre entraxe.">
          <figcaption class="figure-caption rounded" style="background-color : #343a40; padding-top : 12px; padding-bottom : 1px;"><h2 style="font-size: 18px;">Qu'est-ce que le déport et l'ET ?</h2></a></figcaption>
        </figure>
      </div>
      <div class="col-sm" style="text-align: center;">
        <a href="tuto-alesage">
        <figure class="figure">
          <img src="assets/img/alesage_home.jpg" class="figure-img img-fluid rounded" alt="Comment mesurer votre entraxe.">
          <figcaption class="figure-caption rounded" style="background-color : #343a40; padding-top : 12px; padding-bottom : 1px;"><h2 style="font-size: 18px;">Qu'est-ce que l'alésage ?</h2></a></figcaption>
        </figure>
      </div>
    </div><hr>

    <div class="row" style="margin-top: 30px;">

      <div class="col-sm-1"></div>
      <div class="col-sm-4" style="text-align: center;">
        <a href="marque">
        <figure class="figure">
          <img src="assets/img/Search_brands.jpg" class="figure-img img-fluid rounded" alt="Recherche par marque de voiture.">
          <figcaption class="figure-caption rounded" style="background-color : #343a40; padding-top : 12px; padding-bottom : 1px;"><h2 style="font-size: 18px;">Recherche par Marque</h2></a></figcaption>
        </figure>
      </div>

      <div class="col-sm-2"></div>

      <div class="col-sm-4" style="text-align: center;">
        <a href="entraxe">
        <figure class="figure">
          <img src="assets/img/entraxe.jpg" class="figure-img img-fluid rounded" alt="Comment mesurer votre entraxe.">
          <figcaption class="figure-caption rounded" style="background-color : #343a40; padding-top : 12px; padding-bottom : 1px;"><h2 style="font-size: 18px;">Recherche par Entraxe</h2></a></figcaption>
        </figure>
      </div>

      <div class="col-sm-1"></div>
    </div>
  </div>

  <div class="text-center mt-5">

      <p>Pour toutes questions supplémentaires, n'hésitez pas à consulter notre rubrique "<a href="faq">F.A.Q</a>", ou à nous contacter directement <a href="contact">ici</a> !</p>

  </div>
</div>
