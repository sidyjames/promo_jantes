<?php

$title = 'Entraxe Jante Alu - Recherche par marque';
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";

include '__inc/connexionBDD.php';

$data = $pdo->query("SELECT DISTINCT marque FROM `cdt_cars_entraxes_2022` ORDER BY marque ASC")->fetchAll();
?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="index">Accueil</a> / <a href="marque">Marque</a></p>
        </div>


        <h1>Toutes les marques de véhicules</h1>
        <div class="row">

        <?php
            foreach ($data as $row) {
                $marque = strtolower($row['marque']);
                ?>
            
                <div class="col-md-3 col-6 col-sm-6 mt-5">
                    <a href='searchVehicule?marque=<?= $row['marque'] ?>' class="marqueTaille">
                        <img src="assets/img/marques/<?=$marque?>.png" alt="<?=$row['marque']?>" width="150" height="125">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
