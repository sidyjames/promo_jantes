<?php

$title = 'Entraxe Jante Alu - Jantes alu';
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";
?>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql="SELECT * FROM peel_produits pp,peel_stocks ps where pp.id=ps.produit_id and pp.id='".$_GET['id']."' and pp.reference like '%_j_%' and ps.stock>=1";
    $janteSeleted=$bdd->getOne($sql);
    if(!$janteSeleted){
        die();
    }
    require('../achats/caddie/ajout_caddie.php');

        if(search_in_caddie($_GET['id'])){
            $stock=intval($_SESSION['caddie']['articles']['stock'][search_in_caddie($_GET['id'])]);
        }else{
            $stock=intval($janteSeleted['stock']);
        }
?>
    <div class="container">
        <div class="text-left">
            <?php                                
                if(isset($_GET['marqueSelected'])&& !empty($_GET['marqueSelected']) && isset($_GET['modeleSelected'])&& !empty($_GET['modeleSelected'])  ){
                        if(isset($_GET['DiametreSelected'])&& !empty($_GET['DiametreSelected'])){
                                $paramLink="-pour-".$_GET['marqueSelected']."-".$_GET['modeleSelected']."-en-".$_GET['DiametreSelected']."-pouces-".$_GET['vehiculeSelected'];
                                $ariane="<p><a href='index'>Accueil</a> / <a href='jantes-alu$paramLink'>Jantes Alu Pour ".$_GET['marqueSelected']." ".$_GET['modeleSelected']." en ".$_GET['DiametreSelected']." pouces</a>";
                        }else{
                                $paramLink="-pour-".$_GET['marqueSelected']."-".$_GET['modeleSelected']."-".$_GET['vehiculeSelected'];
                                $ariane="<p><a href='index'>Accueil</a> / <a href='jantes-alu$paramLink'>Jantes Alu Pour ".$_GET['marqueSelected']." ".$_GET['modeleSelected']."</a>";
                        }
                }
                else{
                    $ariane='<p><a href="index">Accueil</a>';
                }
                echo $ariane." / <a href='#'>".str_replace('Jantes alu', '', $janteSeleted['nom_fr'])."</a></p>";
            ?>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                <div class="main-img">
                    <img class="img-fluid" src="<?php imgCheck($janteSeleted['image1']);?>" alt="Produit">
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <h1 class="product-title text-bold">
                        <?php echo str_replace('Jantes alu', '', $janteSeleted['nom_fr']);?>
                    </h1>
                        <p><i>Référence : <?php echo $janteSeleted['reference'] ?></i></p>
                        <?php if($stock<4) echo "<button class='btn btn-warning' disabled>Stock: $stock</button>";?>

                    </div>
                    <div class="product-details my-2">
                        <p class="details-title text-color mb-1">Description</p>
                        <p class="description"><?php echo $janteSeleted['description_fr'] ?>"</p>
                    </div>
                    <div class="price-area">
                        <p class="prix" style="color:red;font-size 24px; font-weight:bold;">Prix : <?php echo number_format($janteSeleted['prix'],2,',','') ?>€</p>
                    </div>
                    <div class="buttons d-flex">
                        <form method="post">
                            <div class="row">
                                <div class="block quantity">
                                    <input type="hidden" class="form-control" id="product" value="<?php echo $janteSeleted['id']?>" name="product">
                                    <input type="number" class="form-control" id="cart_quantity" value="1" min="1" max="<?= $stock?>" name="cart_quantity">
                                </div>
                                <div class="block">
                                    <input type="submit"  class="shadow btn custom-btn btn-secondary" value="Ajouter au panier" >
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
addProduct();

?>