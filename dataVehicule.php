<?php

$marqueTemp = $_GET['marque'];
$marque = str_replace('_', ' ', $marqueTemp);

$modeleTemp = $_GET['modele'];
$modele = str_replace('_', ' ', $modeleTemp);

$anneeTemp = $_GET['annee'];
$annee = str_replace('_', ' ', $anneeTemp);

$title = 'Entraxe Jante Alu - Entraxe pour ' . $marque . ' ' . $modele . ' ' . $annee;
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";


// include '__inc/header.php';

include '__inc/connexionBDD.php';

$data = $pdo->query("SELECT * FROM cdt_cars_entraxes_2022 WHERE marque = '$marque' AND modele = '$modele' AND annee = '$annee'")->fetchAll();
?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="index.php">Accueil</a> / <a href="marque.php">Marque</a> / <a href="entraxe.php">Entraxe De Roue</a> / <a href="searchVehicule.php?marque=<?=$marque?>"><?=$marque?></a> / <a href="dataVehicule.php?marque=<?=$marqueTemp?>&modele=<?=$modeleTemp?>&annee=<?=$anneeTemp?>"><?=$modele?> <?=$annee?></a></p>
        </div>


        <h1>Votre recherche par entraxe pour <?= $marque ?> <?= $modele ?></h1>
        <table class="table table-hover ml-auto mr-auto w-75">
            <tbody>
            <?php
            foreach ($data as $row) {
                $pneuDatas = str_replace(' ', '-', $row['pneu']);

                if (!empty($row['pneu'])) {
                    if (strpos($row['pneu'], 'ZR') == true) {
                        $firstdata = substr($row['pneu'], 0, 10);
                    }
                    else {
                        $firstdata = substr($row['pneu'], 0, 9);
                    }
                } else {
                    $firstdata = "205/55R16";
                }
                $taillePneu = str_replace('/', '-', $firstdata);
                $taillePneu = str_replace('R', '-', $taillePneu);

                if(!empty($row['pneu'])) {
                    if (strpos($row['pneu'], 'ZR') == true) {
                        $firstweight = substr($row['pneu'], 8, 2);
                    }
                    else {
                        $firstweight = substr($row['pneu'], 7, 2);
                    }
                }else{
                    $firstweight =17;
                }

                ?>

                <tr>
                    <th class="dataVehicule">Marque</th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['marque'] ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="dataVehicule">Modèle</th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['modele'] ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="dataVehicule">Année</th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['annee'] ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="dataVehicule">Entraxe pour <?=$marque?> <?=$modele?></th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['entraxe'] ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="dataVehicule">Alésage</th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['alesage'] ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="dataVehicule">Déport (ET)</th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['deport'] ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="dataVehicule">Montage</th>
                    <th class="dataVehicule">
                        <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><?= $row['montage'] ?></a>
                    </th>
                </tr>

            <?php
                $tabDiametre=array();
                if (!empty($pneuDatas)) {
                    if (strpos($pneuDatas, "\n") == true) {
                        $parseDatas = explode("\n", $pneuDatas);
                        foreach($parseDatas as $parse) {
                            $pneus = str_replace('/', '-', $parse);
                            $pneus = str_replace('R', '-', $pneus);
                            $pneusUrl = str_replace('Z', '', $pneus);
                            $pneuLargeur = substr($pneusUrl, 0, 3);
                            $pneuHauteur = substr($pneusUrl, 4, 2);
                            $pneuDiametre = substr($pneusUrl, 7, 2);
                            if(!in_array($pneuDiametre,$tabDiametre)  ){
                                if($marque=="Rolls-Royce"){
                                    $marqueVeh="RollsRoyce";
                                }
                                elseif($marque=="Mercedes-Maybach"){
                                    $marqueVeh="MercedesMaybach";
                                }
                                else{
                                    $marqueVeh=$marque;
                                }
                                ?>
                                    <tr>
                                        <th class="dataVehicule" colspan=2>
                                            <a class="dataVehicule" href="jantes-alu-pour-<?=$marque?>-<?= $modele?>-en-<?= $pneuDiametre?>-pouces-<?=$row['id']?>">Jante Alu pour <?= $marque ?> <?= $modele ?> en <?=$pneuDiametre?> pouces / <?=$parse?></a>
                                        </th>
                                    </tr>
                                <?php
                            }
                            array_push($tabDiametre,$pneuDiametre);
                        }
                    }
                }else{
                    for ($i=15; $i <= 20; $i++) { 
                    ?>
                        <tr>
                            <th class="dataVehicule" colspan=2>
                                <a class="dataVehicule" href="jantes-alu-pour-<?=$marque?>-<?= $modele?>-en-<?= $i?>-pouces-<?=$row['id']?>">Jante Alu pour <?= $marque ?> <?= $modele ?> en <?=$i?> pouces</a>
                            </th>
                        </tr>
                    <?php
                    }
                }
            }
            ?>
            </tbody>
        </table>


        <div>
            <?php include '__inc/templates/img_styles.php'; ?>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <b>Se rendre chez notre partenaire</b><br>
                <a href="jantes-alu?marqueSelected=<?= $row['marque'] ?>&modeleSelected=<?= $row['modele'] ?>&AnneeSelected=<?= $row['annee'] ?>&DiametreSelected=&marqueJante=&couleurJante=&styleJante=&alesage=<?= $row['alesage'] ?>&entraxe=<?= $row['entraxe'] ?>&montage=<?= $row['montage'] ?>"><img
                        src="assets/img/cdt.png"></a>
            </div>

            <div class="col-md-6">
                <b>Se rendre chez notre partenaire</b><br>
                <a href="https://www.pneu-pas-cher-online.fr" target="_blank"><img src="assets/img/ppco.png"></a>
            </div>
        </div>

        <div class="container mt-5">
            <h2 style="font-size: 15px; text-align: justify;">Retrouvez sur notre site tous les entraxes adaptés à votre <?= $marque ?>  <?= $modele ?></h2>
            
            <p style="text-align: justify;">Ainsi que les côtes techniques par entraxe de roue pour <?= $marque ?> <?= $modele ?> (retrouvez notre <a href="tuto-entraxe">page d'explication sur ce qu'est l'entraxe de roue</a>) et comment calculer l'entraxe pour <?= $marque ?> <?= $modele ?>.</p>
            
            <p style="text-align: justify;">Le spécialiste de la base de donnée par entraxe pour ainsi retrouver vos jantes alu qui correspondent à votre <?= $marque ?>  <?= $modele ?> et à vos goûts, des roues en destockage, pas chère.</p>
            
            <p style="text-align: justify;">Avec l'alésage de votre centreur de roue pour <?= $marque ?> <?= $modele ?> vous pourrez ainsi vérifier si votre centreur de roue correspond bien à votre <?= $marque ?> <?= $modele ?> et que celle-ci ne nécessite pas de bague de centrage de roue sur vos jantes alu (retrouvez notre <a href="tuto-alesage">page d'explication sur ce qu'est l'alésage</a>).</p>
            
            <h2 class="mt-5" style="font-size: 15px; text-align: justify;">Votre recherche d'entraxe pour <?= $marque ?> <?= $modele ?> ne suffit pas ?</h2>

            <p style="text-align: justify;">Il faudra aussi que l'ET, c'est-à-dire le positionnement de la jante par rapport au passage de roue intérieur et extérieur du passage de roue pour <?= $marque ?> <?= $modele ?> soit conforme aux tolérances de montage de votre auto .Si ce positionnement est erroné, les jantes peuvent trop sortir ou trop rentrer dans votre passage de roue (retrouvez notre <a href="tuto-deport">page d'explication sur ce qu'est l'ET Offset</a>).</p>
            
            <p class="mt-5">Si vous avez un doute, contactez un professionnel ou nos partenaires.</p>
        </div>

    </div>
</div>
<?php
// include '__inc/footer.php';
?>
