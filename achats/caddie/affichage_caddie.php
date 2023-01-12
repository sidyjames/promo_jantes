<br>
<?php
    include_once 'ajout_caddie.php';
?>
<script>
    function quantite(){
        document.getElementById("quantiteChange").submit(); 
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        window.location = window.location.href;  
    }
</script>
<?php
modifyQuantite();
if(isset($_GET['delete']) && !empty($_GET['delete'])){
    @DeleteInPanier($_GET['delete']);
}
if((isset($_SESSION['caddie']) && !empty($_SESSION['caddie']['articles']['id'][0])) ){
    if(isset($_POST['produit'])){
        DeleteInPanier($_POST['produit']);
    }
?>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Panier </span></p>
        <div class="card mb-4">
          <div class="card-body ">
            <div class="col align-self-center text-right text-muted">
                <?php 
                    echo count($_SESSION['caddie']['articles']['id']); 
                    if(count($_SESSION['caddie']['articles']['id'])-1==0){
                        echo " Produit";
                    }else{
                        echo " Produits"; 
                    }
                ?>
            </div>
            <table class="table">
              <thead>
                  <tr>
                  <th style="text-align:center">Produit</th>
                  <th style="text-align:center">Quantité</th>
                  <th style="text-align:center">Prix</th>
                  <th style="text-align:center"style="text-align:center">Total</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                    for($i=0;$i<=count($_SESSION['caddie']['articles']['id'])-1;$i++){
                        $sql="SELECT pp.id,pp.nom_fr,pp.prix,pp.image1,ps.stock FROM peel_produits pp,peel_stocks ps where pp.id=ps.produit_id and pp.id='".$_SESSION['caddie']['articles']['id'][$i]."' and pp.reference like '%_j_%' and ps.stock>=1";
                        $produit=$bdd->getOne($sql);
                        if(search_in_caddie($_SESSION['caddie']['articles']['id'][$i])){
                            $stock=intval($_SESSION['caddie']['articles']['stock'][search_in_caddie($_SESSION['caddie']['articles']['id'][$i])]);
                        }else{
                            $stock=intval($produit['stock']);
                        }
                ?>
                  <tr>
                  <tr style="border-top:1px solid #dee2e6;">
                        <th colspan=4  style="border-width:0px !important; padding:0 !important;">
                            <a href="jante-alu-<?= $produit['id']?>">
                                <?php echo str_replace('Jantes alu','',$produit['nom_fr']);?>
                            </a>
                        </th>

                  </tr>
                    <td style="border-width:0px !important;">
                        <a href="jante-alu-<?= $produit['id']?>">
                            <div class="col">
                                <img class="panier_img" src="<?php imgCheck($produit['image1']);?>">
                            </div>
                        </a>
                    </td>
                    <td style="border-width:0px !important;" class="d-flex justify-content-center">
                    <div class="col-3">
                        <form method="post" id="quantiteChange">
                            <input type="number" class="form-control" name="cart_quantity" min=1 max="<?= $stock?>" id="cart_quantity" onclick="quantite()" value="<?php echo $_SESSION['caddie']['articles']['quantite'][$i];?>">
                            <input type="hidden" name="product" value="<?php echo $_SESSION['caddie']['articles']['id'][$i];?>">
                            <input type="hidden" name="qte" value="<?= $stock?>">
                        </form>
                    </div>                    
                    </td>
                    <td style="border-width:0px !important; text-align:center;"><?php echo moneyformat($_SESSION['caddie']['articles']['prix'][$i]);?></td>
                    <td style="border-width:0px !important; text-align:center;"><?php echo moneyformat($_SESSION['caddie']['articles']['total_prix'][$i]);?></td>
                    <th style="border-width:0px !important; padding:0 !important; text-align:center;">
                            <a href="panier-del<?php echo $produit['id']; ?>">X</a><?php ?>
                        </th>
                  </tr>
                <?php
                    }
                ?>
              </tbody>
              </table>

          </div>
        </div>

        <div class="card mb-5">
          <div class="card-body p-2">
                    
            <div class="d-flex flex-column">
                    <p  class='ml-auto'>Total: <?php echo moneyformat($_SESSION['caddie']['total_prix_caddie_ht']);?></p>
                    <p  class='ml-auto'>TVA : <?php echo moneyformat($_SESSION['caddie']['total_tva']);?></p>
                    <p class='ml-auto'>Total TTC: <?php echo moneyformat($_SESSION['caddie']['total_prix_caddie']);?></p>
            </div>

          </div>
        </div>

        <div class="d-flex mb-2">
            <a class="Vide-panier" href="?Vide-panier"><button type="button" class="btn btn-outline-danger btn-lg me-2">Vider le panier</button></a>
        </div>
        
            <?php
                if(isset($_SESSION['session_utilisateur']['code_client'])){

                    echo'<div class="d-flex justify-content-end"><a class="finaliser_cmd" href="infos_livraison"><button type="button" class="btn btn-primary btn-lg me-2">Finaliser votre commande</button></a></div>';
                }else{
                    echo '
                            <div class="d-flex justify-content-end">
                                <a href="inscription"><button type="button" class="btn btn-primary btn-lg me-2">Finaliser votre commande</button></a>
                            </div>
                            <p style="color:red;">* Vous devez être connecté pour passer à la prochaine étape, cliquez sur "Finaliser votre commande" pour vous inscrire</p>
                            ';
                }
            ?>
      </div>
    </div>
  </div>    
<?php
}
else{
    echo "<div class='container' style='height:15vh'><h4>Votre panier est vide.</h4></div>";
}
?>



<style>
.card{
    margin: auto;
    width: 100%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
}
.panier{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .panier{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.resumes{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}
@media(max-width:767px){
    .resumes{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.resumes .col-2{
    padding: 0;
}
.resumes .col-10
{
    padding: 0;
}.row{
    margin: 0;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
a.finaliser_cmd{
    padding: 0 1vh;
}
.close{
    margin-left: auto;
    font-size: 0.7rem;
}
.panier_img{
    width: 60px;
}
.panierLinks{
    color: black; 
}
.panierLinks:hover{
    color: black;
    text-decoration: none;
}
 #code{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}

</style>