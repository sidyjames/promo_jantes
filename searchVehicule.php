<?php

$marque = $_GET['marque'];

$title = 'Entraxe Jante Alu - Entraxe pour ' . $marque;
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";

include '__inc/connexionBDD.php';

$data = $pdo->query("SELECT marque, modele, annee FROM cdt_cars_entraxes_2022 WHERE marque LIKE '$marque' ORDER BY modele, annee ASC")->fetchAll();

?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="index">Accueil</a> / <a href="marque">Marque</a> / <a href="searchVehicule?marque=<?=$marque?>"><?=$marque?></a> </p>
        </div>


        <h1>Entraxe pour les véhicules <?=$marque?></h1>

        <table class="table table-hover mt-5">
            <thead>
            <tr>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Année</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $row) {
                $marque = str_replace(' ', '_', $row['marque']);
                $modele = str_replace(' ', '_', $row['modele']);
                $annee = str_replace(' ', '_', $row['annee']);
                ?>
                <tr>
                    <th>
                        <a href="dataVehicule?marque=<?=$marque?>&modele=<?=$modele?>&annee=<?=$annee?>"><?= $row['marque'] ?></a>
                    </th>
                    <th>
                        <a href="dataVehicule?marque=<?=$marque?>&modele=<?=$modele?>&annee=<?=$annee?>"><?= $row['modele'] ?></a>
                    </th>
                    <th>
                        <a href="dataVehicule?marque=<?=$marque?>&modele=<?=$modele?>&annee=<?=$annee?>"><?= $row['annee'] ?></a>
                    </th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>