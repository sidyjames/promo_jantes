<?php

$title = 'Entraxe Jante Alu - Foire aux questions';
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";

include '__inc/header.php';

?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="index">Accueil</a> / <a href="faq">F.A.Q</a></p>
        </div>

        <h1>Foire aux questions</h1>

        <button class="collapsible mt-5 text-center">Qu'est-ce que l'entraxe ?</button>
        <div class="content">
            <h2>Définition</h2>
            <p>
                On appelle l’entraxe d’une jante la distance qu’il y a entre les centres de deux points (trous)
                diamétralement opposés et qui sont destinés à recevoir les écrous afin de garantir la fixation de la jante
                sur le moyeu du véhicule.
                L’entraxe est un facteur qui joue un rôle primordial dans les dimensions de la jante.
                Il se distingue par le nombre de trous. Les dimensions de l’entraxe se représentent en millimètres ou
                pouces.
            </p>
            <hr>
            <h2>Comment calculer l'entraxe d'une jante alu ?</h2>
            <img src="assets/img/calcul_entraxe.webp" alt="calcul_entraxe" class="entraxeImg">
            <p>
                Pour calculer l'entraxe de votre jante alu avec 4 Trous : Prendre la mesure du centre d'un trou à un autre
                en passant par le centre (voir schéma).
                Ce calcul est valable pour 4, 6, ou 8 trous.
            </p>
            <p>Pour calculer l'entraxe de votre jante alu avec 5 trous : Prendre la mesure du centre d'un trou au bord d'un
                autre trou, en passant par le centre. (voir schéma).</p>
        </div>
        <button class="collapsible text-center">Equivalence de dimension d'entraxe</button>
        <div class="content">
            <p>Vous pouvez trouver ici les équivalences de dimension d'entraxe en pouce et en millimètre</p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Pouce</th>
                    <th scope="col">Millimètre</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">4x3.93</th>
                    <td>4x100</td>
                </tr>
                <tr>
                    <th scope="row">4x4.25</th>
                    <td>4x107.95</td>
                </tr>
                <tr>
                    <th scope="row">4x4.33</th>
                    <td>4x100</td>
                </tr>
                <tr>
                    <th scope="row">4x4.50</th>
                    <td>4x114.3</td>
                </tr>
                <tr>
                    <th scope="row">4x5.12</th>
                    <td>4x130</td>
                </tr>
                <tr>
                    <th scope="row">4x5.51</th>
                    <td>4x140</td>
                </tr>
                <tr>
                    <th scope="row">5x4.00</th>
                    <td>5x100</td>
                </tr>
                <tr>
                    <th scope="row">5x4.25</th>
                    <td>5x107.95</td>
                </tr>
                <tr>
                    <th scope="row">5x4.50</th>
                    <td>5x114.3</td>
                </tr>
                <tr>
                    <th scope="row">5x4.53</th>
                    <td>5x115</td>
                </tr>
                <tr>
                    <th scope="row">5x4.72</th>
                    <td>5x120</td>
                </tr>
                <tr>
                    <th scope="row">5x4.75</th>
                    <td>5x120.65</td>
                </tr>
                <tr>
                    <th scope="row">5x5.12</th>
                    <td>5x130</td>
                </tr>
                </tbody>
            </table>
        </div>
        <button class="collapsible text-center">Qu'est-ce que le déport ?</button>
        <div class="content">
            <h2>Définition</h2>
            <p>Le déport que l'on appelle aussi offset ou encore ET correspond à la distance séparant l'axe d'une jante (le
                milieu de la jante) au moyeu de roue (la surface d'appui).
                Plus on augmente le déport et plus la jante rentre vers l'intérieur de la roue.
                Il convient donc de ne pas choisir un déport trop élevé ou au contraire trop bas, auquel cas la jante
                toucherait la carroserie. La jante sort vers l'extérieur.
            </p>
            <img src="assets/img/deport.webp" alt="deport" class="deportImg">
        </div>
        <button class="collapsible text-center">Qu'est-ce que l'alésage central ?</button>
        <div class="content">
            <h2>Définition</h2>
            <p>L'alésage central d'une roue correspond à la taille en millimètres du trou au milieu de la jante.</p>
            <img src="assets/img/alesage.png" alt="alesage" class="alesageImg" width="50%">
        </div>
    </div>
</div>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>

<?php
include '__inc/footer.php';
?>
