

<?php
require('../../comptoirDB.php');
	if(!empty($_POST["search_nav"]))
	{	
		$reqt="SELECT pp.id,pp.nom_fr,pp.image1,pp.prix,ps.stock FROM peel_produits pp,peel_stocks ps where pp.id=ps.produit_id and ps.stock>=1 and (pp.reference like :reference OR pp.nom_fr like :nom OR pp.description_fr like :description) LIMIT 5";
		$param=array('reference'=>'%'.$_POST["search_nav"].'%','nom'=>'%'.$_POST["search_nav"].'%','description'=>'%'.$_POST["search_nav"].'%');
		$res=prepare($reqt,$param);
		//var_dump($res);
		foreach($res as $value){
?>
		<a href="jante-alu?id=<?php echo $value['id']?>" style="text-decoration:none; color:black; margin:5px; padding:0;">
			<div class="container">
				<div class="row search">
					<div class="col-12 search_res">
						<span><?php echo str_replace('Jantes alu', '', $value['nom_fr']);?></span>
					</div>
					<div class="col-4 search_res">
						<img src="https://www.comptoirdutuning.fr/upload/<?php echo $value['image1'];?>" alt="" width="50px"/>
					</div>
					<div class="col-4 search_res">
						<span><?php echo $value['stock'];?> stock</span>
					</div>
					<div class="col-4 search_res">
						<span><?php echo $value['prix'];?> €</span>
					</div>
				</div>
			</div>
		</a>
<?php
		}
	}
?>
<style>
div.search_res{
	margin:auto;
}
.row.search{
	border-top:1px solid gray;
}
</style>