<?php
function AjouterPanier($produit,$quantite,$stock,$prix,$tva){
    //     // setlocale(LC_MONETARY, 'en_US.UTF-8');
    // echo" les variables: ".'</br>';
    // echo 'prod: '.$produit.'</br>';
    // echo 'quantite: '.$quantite.'</br>';
    // echo 'poids: '.$poids.'</br>';
    // echo 'stock: '.$stock.'</br>';
    // echo 'prix: '.$prix.'</br>';
    // echo 'prix_promo: '.$prix_promo.'</br>';
    // echo 'tva: '.$tva.'</br>';


    $prix_ht=floatval($prix)/floatval("1.$tva");
    $quantite=intval($quantite);
    $stock=intval($stock);
    $prix=floatval($prix);
    $tva=floatval($tva);
    if (!isset($_SESSION['caddie'])){
            $_SESSION['caddie']=array();
            $_SESSION['caddie']['articles']['id'] = array($produit);
            $_SESSION['caddie']['articles']['quantite'] = array($quantite);
            $_SESSION['caddie']['articles']['stock'] = array($stock-$quantite);
            $_SESSION['caddie']['articles']['prix'] = array($prix);
            $_SESSION['caddie']['articles']['total_prix']=array(floatval($prix*$quantite));
            $_SESSION['caddie']['articles']['prix_ht']=array($prix_ht);
            $_SESSION['caddie']['articles']['total_prix_ht']=array($prix_ht*$quantite);
            $_SESSION['caddie']['articles']['tva_percent'] =array($tva);
            $_SESSION['caddie']['articles']['tva_article'] =array(floatval($prix)-floatval($prix_ht)); 
            $_SESSION['caddie']['articles']['total_tva_articles'] =array((floatval($prix)-floatval($prix_ht))*$quantite);
            }else{
                $inCaddie=false;
                $stockZero=false;
                for($i=0;$i<=count($_SESSION['caddie']['articles']['id'])-1;$i++){
                    if($_SESSION['caddie']['articles']['id'][$i]==$produit){
                        $_SESSION['caddie']['articles']['quantite'][$i]+=$quantite;
                        $_SESSION['caddie']['articles']['stock'][$i]=$stock-$_SESSION['caddie']['articles']['quantite'][$i];
                        $_SESSION['caddie']['articles']['total_prix'][$i]=floatval($_SESSION['caddie']['articles']['prix'][$i]*$_SESSION['caddie']['articles']['quantite'][$i]);
                        $_SESSION['caddie']['articles']['total_prix_ht'][$i]=floatval($prix_ht*$_SESSION['caddie']['articles']['quantite'][$i]);
                        $_SESSION['caddie']['articles']['tva_article'][$i]=floatval($_SESSION['caddie']['articles']['prix'][$i])-floatval($_SESSION['caddie']['articles']['prix_ht'][$i]);
                        $_SESSION['caddie']['articles']['total_tva_articles'][$i]=(floatval($_SESSION['caddie']['articles']['tva_article'][$i]))*$_SESSION['caddie']['articles']['quantite'][$i];
                        $inCaddie=true;     
                    }
                }
                if($inCaddie==false){
                    array_push($_SESSION['caddie']['articles']['id'],$produit);
                    array_push($_SESSION['caddie']['articles']['quantite'],$quantite);
                    array_push($_SESSION['caddie']['articles']['stock'],$stock-$quantite);
                    array_push($_SESSION['caddie']['articles']['prix'],$prix);
                    array_push($_SESSION['caddie']['articles']['prix_ht'],$prix_ht);
                    array_push($_SESSION['caddie']['articles']['total_prix'],$prix*$quantite);
                    array_push($_SESSION['caddie']['articles']['total_prix_ht'],$prix_ht*$quantite);
                    array_push($_SESSION['caddie']['articles']['tva_percent'],$tva);
                    array_push($_SESSION['caddie']['articles']['tva_article'],floatval($prix)-floatval($prix_ht));
                    array_push($_SESSION['caddie']['articles']['total_tva_articles'],(floatval($prix)-floatval($prix_ht))*$quantite);
                    $_SESSION['caddie']['total_articles']=floatval($_SESSION['caddie']['total_articles'])+$quantite;
                    $_SESSION['caddie']['total_prix_caddie']+=$prix;
                }
            }
    

    getInfosCadie();
    
}  
function getInfosCadie(){
    $_SESSION['caddie']['total_articles']=floatval(0);
    $_SESSION['caddie']['total_prix_caddie']=floatval(0);
    $_SESSION['caddie']['total_tva']=floatval(0);
    $_SESSION['caddie']['total_prix_caddie_ht']=floatval(0);

    for($i=0;$i<=count($_SESSION['caddie']['articles']['id'])-1;$i++){
        $_SESSION['caddie']['total_tva']+=$_SESSION['caddie']['articles']['total_tva_articles'][$i];
        $_SESSION['caddie']['total_prix_caddie_ht']+=$_SESSION['caddie']['articles']['total_prix_ht'][$i];

        $_SESSION['caddie']['total_prix_caddie']+=$_SESSION['caddie']['articles']['total_prix'][$i];
        $_SESSION['caddie']['total_articles']+=$_SESSION['caddie']['articles']['quantite'][$i];
    }
}
function DeleteInPanier($id){

    if(array_search($id,$_SESSION['caddie']['articles']['id'])!==false){
        $indice=array_search($id,$_SESSION['caddie']['articles']['id']);
        foreach($_SESSION['caddie']['articles']['id'] as $key=>$value){
            $_SESSION['caddie']['articles']['total_tva_articles'][$key]-=(floatval($_SESSION['caddie']['articles']['prix_ht'][$key])/floatval("1.".$_SESSION['caddie']['articles']['tva_percent'][$key]))*$_SESSION['caddie']['articles']['quantite'][$key];
            if($value==$id){
                foreach(array_reverse($_SESSION['caddie']['articles']) as $keyArticles=>$valueArticles){
                        if($keyArticles!="total_poids"){
                            unset($_SESSION['caddie']['articles'][$keyArticles][$key]);
                        }
                }
            }
        }
    }
    getInfosCadie();
}
function DeleteAllInPanier(){
    if(isset($_GET['Vide-panier'])){
        unset($_SESSION['caddie']);
    }
}
function addProduct(){
    if(isset($_POST['product']) && isset($_POST['cart_quantity'])){
        $quantite=$_POST['cart_quantity'];
        $sql="SELECT pp.id,ps.stock,pp.prix,pp.tva FROM peel_produits pp ,peel_stocks ps where pp.id=ps.produit_id and pp.id='".$_POST['product']."'";
        $produit=getOne($sql);
        if(!isset($_SESSION['caddie']['articles']['id']) || empty($_SESSION['caddie']['articles']['id'])){
            AjouterPanier($produit['id'],$quantite,$produit['stock'],$produit['prix'],$produit['tva']);
        }
        else{
            $indice=array_search($_POST['product'],$_SESSION['caddie']['articles']['id']);
            if($_SESSION['caddie']['articles']['stock'][$indice]>0){
                AjouterPanier($produit['id'],$quantite,$produit['stock'],$produit['prix'],$produit['tva']);
            }
        }
    }
}
function modifyQuantite(){
    if(isset($_POST['product']) && isset($_POST['cart_quantity']) && isset($_POST['qte'])){
        $produit=$_POST['product'];
        $quantite=intval($_POST['cart_quantity']);
            for($i=0;$i<=count($_SESSION['caddie']['articles']['id'])-1;$i++){
                if($_SESSION['caddie']['articles']['id'][$i]==$produit){
                    $stock=intval($_POST['qte']);
                    if($stock-$quantite>=1){
                        $_SESSION['caddie']['articles']['quantite'][$i]=$quantite;
                        $_SESSION['caddie']['articles']['stock'][$i]=$stock-$quantite;
                        $_SESSION['caddie']['articles']['total_prix'][$i]=floatval($_SESSION['caddie']['articles']['prix'][$i])*$quantite;
                        $_SESSION['caddie']['articles']['total_prix_ht'][$i]=floatval($_SESSION['caddie']['articles']['prix_ht'])*intval($_SESSION['caddie']['articles']['quantite'][$i]);
                        $_SESSION['caddie']['articles']['tva_article'][$i]=floatval($_SESSION['caddie']['articles']['prix'][$i])-floatval($_SESSION['caddie']['articles']['prix_ht'][$i]);
                        $_SESSION['caddie']['articles']['total_tva_articles'][$i]=floatval($_SESSION['caddie']['articles']['tva_article'][$i])*$_SESSION['caddie']['articles']['quantite'][$i]; 
                    }
                }
            }
            getInfosCadie();
    }

}
function search_in_caddie($id){
    if(isset($_SESSION['caddie']['articles']['id'])){
        for($i=0;$i<=count($_SESSION['caddie']['articles']['id'])-1;$i++){
            if($_SESSION['caddie']['articles']['id'][$i]==$id){
                return $i;
            }else{
                return false;
            }
        }
    }
}
DeleteAllInPanier();


?>