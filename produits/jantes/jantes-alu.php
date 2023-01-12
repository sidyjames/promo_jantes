<?php

$title = 'Entraxe Jante Alu - Recherche Jantes alu';
$descriptionSite = "Chez Entraxe Jante Alu, retrouvez les caractéristiques techniques de votre véhicule comme l'entraxe, l'alésage, le déport, afin de l'équiper au mieux !";
if (isset($_GET['p']) and !empty($_GET['p'])){
        $page=$_GET['p'];
}
else{
        $page=0;  
}
if(isset($_GET['marqueSelected']) && !empty($_GET['marqueSelected'])){
?>
<?php
}
?>
<script type='text/javascript'>

        function change(){  
                // document.forms["FormJantesAlu"].submit();
                //console.log(location.protocol + '//' + location.host+currentUrl)
                // window.location+=currentUrl
                // window.location.href = url;
                var baseUrl=location.protocol + '//' + location.host+'/cdt/entraxe-jantes-alu-v2/web/';
                url="";
                var marqueVeh=document.getElementById('marqueVeh').value;
                var modeleVeh=document.getElementById('modeleVeh').value;
                var anneeVeh=document.getElementById('anneeVeh').value;
                var diametre=document.getElementById('diametre').value;
                var marqueJ=document.getElementById('marqueJ').value;
                var couleurJ=document.getElementById('couleurJ').value;
                var styleJ=document.getElementById('styleJ').value;

                if(marqueVeh !="" && modeleVeh =="" && anneeVeh ==""){
                        var url="jantes-alu-pour-"+marqueVeh;
                        window.location.href =baseUrl+url
                }
                else if(marqueVeh !="" && modeleVeh !="" && anneeVeh ==""){
                        var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh;
                        window.location.href =baseUrl+url
                }
                else if(marqueVeh !="" && modeleVeh !="" && anneeVeh !=""){
                                // var entraxe=document.getElementById('entraxe').value;
                                // var alesage=document.getElementById('alesage').value;
                                // var montage=document.getElementById('montage').value;
                        var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-"+anneeVeh;
                        if(window.location.href =baseUrl+url){
                                //var idveh=document.getElementById('idVeh').value;
                                if(diametre !=""){
                                        var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-en-"+diametre+"-pouces-"+anneeVeh;
                                        window.location.href =baseUrl+url
                                }
                                if(marqueJ !=""){
                                        var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-en-"+diametre+"-pouces-"+marqueJ+"-"+anneeVeh;
                                        window.location.href =baseUrl+url
                                }
                                if(couleurJ !=""){
                                        var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-en-"+diametre+"-pouces-"+marqueJ+"-"+couleurJ+"-"+anneeVeh;
                                        window.location.href =baseUrl+url
                                }
                                if(styleJ !=""){
                                        var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-en-"+diametre+"-pouces-"+marqueJ+"-"+couleurJ+"-"+styleJ+"-"+anneeVeh;
                                        window.location.href =baseUrl+url
                                }
                        }

                        // console.log(baseUrl+url)
                        //var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-en-"+diametre+"-pouces-"+anneeVeh+"-"+entraxe+"-"+alesage+"-"+montage;

                }
                //var url="jantes-alu-pour-"+marqueVeh+"-"+modeleVeh+"-en-"+diametre+"-pouces-"+anneeVeh+"-([0-9]+.*[0-9])-([0-9]+.[0-9]+)-([a-zA-Z]+.*)-"+marqueJ+"-"+couleurJ+"-"+styleJ
        }


</script>
<div class="container">

        <div class="text-left">
            <?php                                
                if(isset($_GET['marqueSelected'])&& !empty($_GET['marqueSelected']) && isset($_GET['modeleSelected'])&& !empty($_GET['modeleSelected'])&& isset($_GET['vehiculeSelected'])&&!empty($_GET['vehiculeSelected'])){
                        if(isset($_GET['DiametreSelected'])&& !empty($_GET['DiametreSelected'])){
                                $paramLink="jantes-alu-pour-".$_GET['marqueSelected']."-".$_GET['modeleSelected']."-en-".$_GET['DiametreSelected']."-pouces-".$_GET['vehiculeSelected'];
                                echo "<p><a href='index'>Accueil</a> / <a href='$paramLink'>Jantes Alu Pour ".$_GET['marqueSelected']." ".$_GET['modeleSelected']." en ".$_GET['DiametreSelected']." pouces</a></p>";
                        }else{
                                $paramLink="jantes-alu-pour-".$_GET['marqueSelected']."-".$_GET['modeleSelected']."-".$_GET['vehiculeSelected'];
                                echo "<p><a href='index'>Accueil</a> / <a href='$paramLink'>Jantes Alu Pour ".$_GET['marqueSelected']." ".$_GET['modeleSelected']."</a></p>";
                        }
                }
                else{
                        echo '<p><a href="index">Accueil</a> / <a href="jantes-alu">Jantes alu</a></p>';
                }
            ?>
        </div>
        <div class="row">
                <div style="width:100%;">
                        <?php
                                if(isset($_GET['marqueSelected'])&& !empty($_GET['marqueSelected']) && isset($_GET['modeleSelected'])&& !empty($_GET['modeleSelected'])  ){
                                        if(isset($_GET['DiametreSelected'])&& !empty($_GET['DiametreSelected'])){
                                                echo"<h1>Jantes Alu Pour ".$_GET['marqueSelected']." ".$_GET['modeleSelected']." en ".$_GET['DiametreSelected']." pouces</h1>";

                                        }else{                                
                                                echo"<h1>Jantes Alu Pour ".$_GET['marqueSelected']." ".$_GET['modeleSelected']."</h1>";
                                        }
                                }else{echo"<h1>Jantes Alu</h1>";}
                        ?>
                </div>
                <?php
                        if(isset($_GET['marqueSelected'])&& !empty($_GET['marqueSelected']) && isset($_GET['modeleSelected'])&& !empty($_GET['modeleSelected']) && isset($_GET['vehiculeSelected'])&& !empty($_GET['vehiculeSelected'])){
                                $sql="SELECT DISTINCT alesage,entraxe,montage FROM cdt_cars_entraxes_2022 where id=:id";
                                $param=array(':id'=>$_GET['vehiculeSelected']);
                                $infosVeh=fetch(prepare($sql,$param));
                                echo"<ul>
                                        <p>Informations sur le véhicule sélectionné</p>
                                        <li>Alésage :".$infosVeh['alesage']."</li>
                                        <li>Entraxe  :".$infosVeh['entraxe']."</li>
                                        <li>Boulonnerie  :".$infosVeh['montage']."</li>
                                </ul>";
                        }
                ?>

                <div class="col-12">
                        <form method="get" class="bg-secondary"  id="FormJantesAlu">
                                <fieldset class="form-group border p-1">
                                        <legend class="w-auto px-2">Véhicule</legend>
                                        <div class="form-row">
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="marqueVeh">Marque</label>
                                                        <select id="marqueVeh" name="marqueSelected" class="form-control" onChange="change();" required>

                                                                <?php
                                                                if(isset($_GET['marqueSelected']) and !empty($_GET['marqueSelected'])){  
                                                                        echo "<option value='".$_GET['marqueSelected']."' selected hidden>".$_GET['marqueSelected']."</option>"; 
                                                                }
                                                                else{
                                                                        echo '<option value="" selected disabled hidden>Marque</option>';
                                                                }
                                                                $sql="SELECT DISTINCT marque FROM cdt_cars_entraxes_2022 GROUP BY marque asc";
                                                                $MarquesVeh=$bdd->getAll($sql);
                                                                foreach($MarquesVeh as $MarqueVeh){
                                                                        if($MarqueVeh['marque']=='Rolls-Royce'){
                                                                                $MarqueVeh['marque']='Rolls Royce';
                                                                        }
                                                                        elseif($MarqueVeh['marque']=='Mercedes-Maybach'){
                                                                                $MarqueVeh['marque']='Mercedes Maybach';
                                                                        }
                                                                        echo '<option value="'.$MarqueVeh['marque'].'" >'.$MarqueVeh['marque'].'</option>';
                                                                }
                                                                ?>

                                                        </select>
                                                </div>
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="modeleVeh">Modele</label>
                                                        <select id="modeleVeh" name="modeleSelected" class="form-control" onChange="change();" required>                                             
                                                                <?php
                                                                        if(isset($_GET['modeleSelected'])and !empty($_GET['modeleSelected'])){  
                                                                                echo "<option value='".$_GET['modeleSelected']."' selected hidden>".$_GET['modeleSelected']."</option>"; 
                                                                        }
                                                                        else{
                                                                                echo '<option value="" selected disabled hidden>Modele</option> ';
                                                                        }
                                                                        if(isset($_GET['marqueSelected'])){
                                                                                if($_GET['marqueSelected']=='Rolls Royce'){
                                                                                        $MarqueVeh='Rolls-Royce';
                                                                                }
                                                                                elseif($_GET['marqueSelected']=='Mercedes Maybach'){
                                                                                        $MarqueVeh='Mercedes-Maybach';
                                                                                }
                                                                                else{
                                                                                        $MarqueVeh=$_GET['marqueSelected'];
                                                                                }
                                                                                $sql="SELECT DISTINCT modele FROM cdt_cars_entraxes_2022 where marque='".$MarqueVeh."' GROUP BY modele asc";
                                                                                $ModelesVeh=$bdd->getAll($sql);
                                                                                foreach($ModelesVeh as $ModeleVeh){
                                                                                        echo '<option value="'.$ModeleVeh['modele'].'">'.$ModeleVeh['modele'].'</option>';
                                                                                }
                                                                        }
                                                                ?>
                                                        </select>
                                                </div>
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="anneeVeh">Année</label>
                                                        <select id="anneeVeh" name="vehiculeSelected" class="form-control" onChange="change();" required>    
                                                                <?php
                                                                        if(isset($_GET['vehiculeSelected'])and !empty($_GET['vehiculeSelected'])){  
                                                                                $sql="SELECT DISTINCT annee FROM cdt_cars_entraxes_2022 where id=:id";
                                                                                $anneesVeh=fetch(prepare($sql,array(':id'=>$_GET['vehiculeSelected'])));
                                                                                echo "<option value='".$_GET['vehiculeSelected']."' selected hidden>".$anneesVeh['annee']."</option>"; 
                                                                        }
                                                                        else{
                                                                                echo '<option value="" selected disabled hidden>Année</option>';
                                                                        }
                                                                        if(isset($_GET['marqueSelected'])){
                                                                                if($_GET['marqueSelected']=='Rolls Royce'){
                                                                                        $MarqueVeh='Rolls-Royce';
                                                                                }
                                                                                elseif($_GET['marqueSelected']=='Mercedes Maybach'){
                                                                                        $MarqueVeh='Mercedes-Maybach';
                                                                                }
                                                                                else{
                                                                                        $MarqueVeh=$_GET['marqueSelected'];
                                                                                }
                                                                                $sql="SELECT DISTINCT id,annee FROM cdt_cars_entraxes_2022 where marque=:marque and modele=:modele";
                                                                                $anneesVeh=fetch_assoc(prepare($sql,array(':marque'=>$MarqueVeh,':modele'=>$_GET['modeleSelected'])));
                                                                                var_dump($anneesVeh);
                                                                                foreach($anneesVeh as $anneeVeh){
                                                                                        echo '<option value="'.$anneeVeh['id'].'">'.$anneeVeh['annee'].'</option>';
                                                                                }
                                                                        }
                                                                ?>
                                                        </select>
                                                </div>
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="diametre">Diamètre</label>
                                                        <select id="diametre" name="DiametreSelected" class="form-control" onChange="change();" required>
                                                                
                                                        
                                                                <?php
                                                                        if(isset($_GET['DiametreSelected'])and !empty($_GET['DiametreSelected'])){  
                                                                                echo "<option value='".$_GET['DiametreSelected']."' selected hidden>".$_GET['DiametreSelected']."</option>"; 
                                                                        }
                                                                        else{
                                                                                echo '<option value="" selected disabled hidden>Diamètre</option>';
                                                                        }
                                                                        for($i=10;$i<=26;$i++){
                                                                                echo"<option value='$i'>$i</option>";
                                                                        }
                                                                ?>
                                                        </select>
                                                </div>
                                        </div>        
                                </fieldset>
                                <fieldset class="form-group border p-1">
                                        <legend class="w-auto px-2">Jante</legend>
                                        <div class="form-row">
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="marqueJ">Marque de jantes</label>
                                                        <select id="marqueJ" class="form-control" name="marqueJante" onChange="change();">
                                                                <option value="" selected>Toutes</option>
                                                                <?php
                                                                        if(isset($_GET['marqueJante']) && !empty($_GET['marqueJante'])){  
                                                                                echo "<option value='".$_GET['marqueJante']."' selected hidden>".$_GET['marqueJante']."</option>"; 
                                                                        }
                                                                        $sql="SELECT distinct nom FROM cdt_jante_marque";
                                                                        $marquesJante=$bdd->getAll($sql);
                                                                        foreach($marquesJante as $marqueJante){
                                                                                echo '<option value="'.$marqueJante['nom'].'">'.$marqueJante['nom'].'</option>';
                                                                        }
                                                                        
                                                                ?>
                                                        </select>
                                                </div>
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="couleurJ">Couleur jantes</label>
                                                        <select id="couleurJ" class="form-control" name="couleurJante" onChange="change();">
                                                                <?php 
                                                                        if(isset($_GET['couleurJante']) && !empty($_GET['couleurJante'])){  
                                                                                echo "<option value='".$_GET['couleurJante']."' selected hidden>".$_GET['couleurJante']."</option>"; 
                                                                        }else{
                                                                                echo'<option value="" selected="" hidden>Toutes</option>';
                                                                        }
                                                                ?>        
                                                                <option value="">Toutes</option>
                                                                <option value="argent">Argent (silver, alu)</option>
                                                                <option value="noir">Noir (Black)</option>
                                                                <option value="BP">Noir poli (Black Polish)</option>
                                                                <option value="blanche">Blanche (White)</option>
                                                                <option value="chrome">Chrome</option>
                                                                <option value="ant">Anthracite / Titane / Hypersilver / gris</option>
                                                                <option value="AP">Anthracite Poli</option>
                                                                <option value="gold">Gold / Bronze</option>
                                                                <option value="rouge">Rouge</option>
                                                                <option value="jaune">Jaune</option>
                                                                <option value="vert">Vert</option>
                                                                <option value="bleu">Bleu</option>
                                                                <option value="orange">Orange</option>
                                                                <option value="ls">Liseret rouge</option>
                                                        </select>
                                                </div>
                                                <div class="form-group col-6 col-md-2">
                                                        <label for="styleJ">Style de jantes</label>
                                                        <select id="styleJ" class="form-control" name="styleJante" onChange="change();">
                                                                <?php 
                                                                        if(isset($_GET['styleJante']) && !empty($_GET['styleJante'])){  
                                                                                $nom="";
                                                                                switch ($_GET['styleJante']) {
                                                                                        case '5b':
                                                                                                $nom="5 branches";
                                                                                                break;
                                                                                        case '5db':
                                                                                                $nom="5 doubles branches";
                                                                                                break;
                                                                                        case 'mrbf':
                                                                                                $nom="Multi rayon baton fin";
                                                                                                break;
                                                                                        case 'mrbl':
                                                                                                $nom="Multi rayon baton large";
                                                                                                break;
                                                                                        case 'cab':
                                                                                                $nom="Avec bord";
                                                                                                break;
                                                                                        case 'naab':
                                                                                                $nom="Nid d'abeille avec bord";
                                                                                                break;
                                                                                        case 'naysb':
                                                                                                $nom="Nid d'abeille Y sans bord";
                                                                                                break;
                                                                                        case 'origine':
                                                                                                $nom="Style origine";
                                                                                                break;
                                                                                        case 'concave':
                                                                                                $nom="Concave";
                                                                                                break;
                                                                                        default:
                                                                                                $nom="Toutes";
                                                                                                break;
                                                                                }
                                                                                echo "<option value='".$styleJante."' selected hidden>".$nom."</option>"; 
                                                                        }else{
                                                                                echo'<option value="" selected="" hidden>Toutes</option>';
                                                                        }
                                                                ?>   
                                                                <option value="">Toutes</option>
                                                                <option value="5b">5 branches</option>
                                                                <option value="5db">5 doubles branches</option>
                                                                <option value="mrbf">Multi rayon baton fin</option>
                                                                <option value="mrbl">Multi rayon baton large</option>
                                                                <option value="cab">Avec bord</option>
                                                                <option value="naab">Nid d'abeille avec bord</option>
                                                                <option value="naysb">Nid d'abeille Y sans bord</option>
                                                                <option value="origine">Style origine</option>
                                                                <option value="concave">Concave</option>
                                                        </select>
                                                </div>
                                                <?php
                                                        if(isset($_GET['marqueSelected']) && !empty($_GET['marqueSelected']) && isset($_GET['modeleSelected'])&& !empty($_GET['modeleSelected']) && isset($_GET['vehiculeSelected'])&& !empty($_GET['vehiculeSelected'])){
                                                                echo '<input type="hidden" id="idVeh" name="id" value="'.$_GET['vehiculeSelected'].'">';
                                                        }
                                                ?>
                                        </div>
                                </fieldset>                                
                        </form>
                </div>
        </div>
</div>        
</br>
<div class="container">
        <div class="row justify-content-center">
                <?php
                if(isset($_GET['marqueSelected']) && !empty($_GET['marqueSelected']) && isset($_GET['modeleSelected'])&& !empty($_GET['modeleSelected']) && isset($_GET['vehiculeSelected'])&& !empty($_GET['vehiculeSelected'])&& isset($_GET['vehiculeSelected']) && !empty($_GET['vehiculeSelected'])){
                        $sql="SELECT DISTINCT alesage,entraxe,montage FROM cdt_cars_entraxes_2022 where id=:id";
                        $param=array(':id'=>$_GET['vehiculeSelected']);
                        $infosVeh=fetch(prepare($sql,$param));
                        $marqueJante="";
                        $styleJante="";
                        $couleurJante="";
                        if(isset($_GET['marqueJante']) && !empty($_GET['marqueJante'])){
                                $marqueJante=$_GET['marqueJante'];
                        }
                        if(isset($_GET['styleJante'])&& !empty($_GET['styleJante'])){
                                $marqueJante=$_GET['marqueJante'];
                        }
                        if(isset($_GET['couleurJante']) && !empty($_GET['couleurJante'])){
                                $couleurJante=$_GET['couleurJante'];
                        }
                        $entraxe2=explode("x" ,$infosVeh['entraxe']);
                        if(isset($_GET['DiametreSelected']) && !empty($_GET['DiametreSelected'])){
                                $sqlSearchJantes="SELECT pp.id,pp.nom_fr,pp.prix,pp.image1,ps.stock FROM peel_produits AS pp LEFT JOIN peel_stocks AS ps ON pp.id = ps.produit_id WHERE etat !=0 AND prix > 50 AND ( ((reference LIKE '%%' OR reference LIKE '%%') AND reference NOT LIKE 'eur_j_T%') AND ( image4 LIKE '%".$infosVeh['entraxe']."%' OR image4 LIKE '%-%$entraxe2[0]%x%$entraxe2[1]%-%' ) AND nom_fr LIKE '%".$marqueJante."%' AND nom_fr LIKE '%[%".$_GET['DiametreSelected']."%]%' AND pp.image9 LIKE '%".$couleurJante."%' AND pp.image10 LIKE '%".$styleJante."%'AND ps.stock>0 ) LIMIT $page,24";
                                $nbRes="SELECT count(pp.id) as nb FROM peel_produits AS pp LEFT JOIN peel_stocks AS ps ON pp.id = ps.produit_id WHERE etat !=0 AND prix > 50 AND ( ((reference LIKE '%%' OR reference LIKE '%%') AND reference NOT LIKE 'eur_j_T%') AND ( image4 LIKE '%".$infosVeh['entraxe']."%' OR image4 LIKE '%-%$entraxe2[0]%x%$entraxe2[1]%-%' ) AND nom_fr LIKE '%".$marqueJante."%' AND nom_fr LIKE '%[%".$_GET['DiametreSelected']."%]%' AND pp.image9 LIKE '%".$couleurJante."%' AND pp.image10 LIKE '%".$styleJante."%'AND ps.stock>0 ) ";        
                        }else{
                                $sqlSearchJantes="SELECT pp.id,pp.nom_fr,pp.prix,pp.image1,ps.stock FROM peel_produits AS pp LEFT JOIN peel_stocks AS ps ON pp.id = ps.produit_id WHERE etat !=0 AND prix > 50 AND ( ((reference LIKE '%%' OR reference LIKE '%%') AND reference NOT LIKE 'eur_j_T%') AND ( image4 LIKE '%".$infosVeh['entraxe']."%' OR image4 LIKE '%-%$entraxe2[0]%x%$entraxe2[1]%-%' ) AND nom_fr LIKE '%".$marqueJante."%' AND pp.image9 LIKE '%".$couleurJante."%' AND pp.image10 LIKE '%".$styleJante."%'AND ps.stock>0 ) LIMIT $page,24";
                                $nbRes="SELECT count(pp.id) as nb FROM peel_produits AS pp LEFT JOIN peel_stocks AS ps ON pp.id = ps.produit_id WHERE etat !=0 AND prix > 50 AND ( ((reference LIKE '%%' OR reference LIKE '%%') AND reference NOT LIKE 'eur_j_T%') AND ( image4 LIKE '%".$infosVeh['entraxe']."%' OR image4 LIKE '%-%$entraxe2[0]%x%$entraxe2[1]%-%' ) AND nom_fr LIKE '%".$marqueJante."%' AND  pp.image9 LIKE '%".$couleurJante."%' AND pp.image10 LIKE '%".$styleJante."%'AND ps.stock>0 ) ";        
                        }
                        $nbRes=getOne($nbRes);
                        $datas=getAll($sqlSearchJantes);
                        foreach($datas as $data)
                        {
                ?>      
                                <a href="jante-alu<?php echo str_replace('jantes-alu','',$paramLink);?>-<?php echo $data['id']?>" style="tex-decoration:none; color:black; margin:15px; padding:0;">
                                        <div class="card bg-light" style="margin:auto;width:240px;height:100%; padding:0px;">
                                                <div style="width:max-content; margin:auto">
                                                        <img src="<?php 
                                                                // if(strpos($data['image1'],'http')!==false){
                                                                //         echo $data['image1'];
                                                                // }
                                                                // else{ 
                                                                //         echo "https://www.comptoirdutuning.fr/upload/".$data['image1'];
                                                                // }
                                                                imgCheck($data['image1']);
                                                        ?>" class="img-responsive" width="230" height="200">
                                                </div>
                                                <h6><?php echo str_replace('Jantes alu', '', $data['nom_fr']);?></h6>
                                                <div class="row">
                                                        <div class="about-product text-center bg-light bg-gradient col-6">
                                                                <div style="clip-path: polygon(1% 29%, 100% 30%, 100% 78%, 2% 73%, 0% 70%, 0 21%) ">
                                                                        
                                                                        <?php
                                                                                if(intval($data['stock'])>=4){
                                                                                echo '<p class="mt-0 text-black-50 bg-success bg-gradient">En stock</p>';     
                                                                                }
                                                                                else{
                                                                                        echo '<p class="mt-0 text-black-50 bg-warning" >Stock:'.$data['stock'].'</p>';     
                                                                                }
                                                                                
                                                                        ?>
                                                                </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between total font-weight-bold align-text-bottom bg-light col-6">
                                                                <span>Prix</span><span><?php echo number_format($data['prix'],2,',','');?> €</span>
                                                        </div>

                                                </div>
       
                                        </div>
                                </a>
                <?php
                        }
                }
                ?>
        </div>
</div>

<style>
        .card.p-3.bg-light{
                padding: 0!important;
                margin:auto!important;
        }
</style>
<br>
<?php
if(isset($nbRes['nb'])){


        $pagination=intval($nbRes['nb']);

        if(($pagination/24)>1){
                $pagination=$pagination/24;
?>
                <ul class="list-group list-group-horizontal-md justify-content-center">
                <?php
                        // for ($i=1; $i < $pagination+1; $i++) { 
                        //         if($i==1){
                        //                 $value=0;  
                        //         }else{
                        //                 $value+=24;
                        //         }
                        //         if(strpos($_SERVER['QUERY_STRING'],'&p=')!==false){
                        //                 $currentlink=substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],'&p='));
                        //         } else{
                        //                 $currentlink=$_SERVER['QUERY_STRING'];
                        //         }
                        //         echo"<a href='?$currentlink&p=$value'><li class='list-group-item'>$i</li></a>";
                        // }
                        if(strpos($_SERVER['QUERY_STRING'],'&p=')!==false){
                                $currentlink=substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],'&p='));
                        } else{
                                $currentlink=$_SERVER['QUERY_STRING'];
                        }
                        
                        if(((($pagination-8)*24)+$page)<=(($pagination)*24)){
  
                                for($i=1; $i < $pagination+1; $i++){
                                        if($i==1){
                                                $value=0;  
                                                echo"<a href='?$currentlink&p=$value'><li class='list-group-item'>".$i."</li></a>";
                                        }else{
                                                $value+=24;
                                                if(($i-1)!=1){
                                                        if(intval(($page/24))+1==$i){
                                                                echo"<li class='list-group-item'>".($i-1)."</li>";
                                                        }
                                                        else{
                                                                echo"<a href='?$currentlink&p=$value'><li class='list-group-item'>".($i-1)."</li></a>";
                                                        }
                                                }
                                        }

                                        if($i==10){
                                                $i=$pagination+1;   
                                        }
                                }
                        }else{
                                for ($i=5; $i>0 ; $i--) { 
                                        $value=(($page/24)-$i)*24;
                                        echo"<a href='?$currentlink&p=$value'><li class='list-group-item'>".(($page/24)-$i)."</li></a>";
                                }
                                echo"<li class='list-group-item'>".(($page/24))."</li>";
                                for ($i=1; $i <6 ; $i++) { 
                                        $value=(($page/24)+$i)*24;
                                        echo"<a href='?$currentlink&p=$value'><li class='list-group-item'>".(($page/24)+$i)."</li></a>";
                                }

                        }
                ?>
                </ul>
<?php
        }
        // else{
        //         echo"<a href='?$currentlink&p=0'><li class='list-group-item'>1</li></a>";
        // }
}
?>