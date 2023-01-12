<?php

$title = 'Entraxe Jante Alu - Recherche par entraxe';
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";


include '__inc/connexionBDD.php';

$data = $pdo->query("SELECT DISTINCT entraxe FROM `cdt_cars_entraxes_2022` WHERE entraxe NOT LIKE 'null' AND entraxe NOT LIKE '' ORDER BY entraxe ASC")->fetchAll();
?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="index">Accueil</a> / <a href="entraxe">Entraxe De Roue</a></p>
        </div>

        <h1>Tous les entraxes pour votre véhicule</h1>

        <table class="table table-hover mt-5">
            <thead>
            <tr>
                <th scope="col">Entraxe</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $row) { ?>
                <tr>
                    <th>
                        <a href='searchEntraxe?entraxe=<?= $row['entraxe'] ?>'
                        class="entraxeTaille"><?= $row['entraxe'] ?></a>
                    </th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
