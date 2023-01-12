<?php

$entraxe = $_GET['entraxe'];

$title = 'Entraxe Jante Alu - Recherche entraxe ' . $entraxe;
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";

// include '__inc/header.php';

include '__inc/connexionBDD.php';

$data = $pdo->query("SELECT * FROM `cdt_cars_entraxes_2022` WHERE entraxe = '$entraxe' ORDER BY marque, modele, annee, alesage ASC")->fetchAll();

?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="../accueil.php">Accueil</a> / <a href="entraxe.php">Entraxe De Roue</a> / <a href="searchEntraxe.php?entraxe=<?=$entraxe?>"><?=$entraxe?></a></p>
        </div>

        <h1>Tous les véhicules avec entraxe de <?=$entraxe?></h1>

        <table class="table table-hover mt-5">
            <thead>
            <tr>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Année</th>
                <th scope="col">Alesage</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $row) { ?>
                <tr>
                    <th>
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['marque'] ?></a>
                    </th>
                    <th>
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['modele'] ?></a>
                    </th>
                    <th>
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['annee'] ?></a>
                    </th>
                    <th>
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['alesage'] ?></a>
                    </th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
//include '__inc/footer.php';
?>
