<?php
include('../db.class.php');
$bdd = new db();
 
if($_POST) {
	$mediaId = $_POST['mediaId'];
	$rate = $_POST['rate'];
	
	$expire = 24*3600; // 1 day
	setcookie('tcRatingSystem2'.$mediaId, 'rated', time() + $expire, '/'); // Place a cookie
	
	$query = $bdd->execute('INSERT INTO notation (media, rate) VALUES ('.$mediaId.', "'.$rate.'")'); // We insert the new rate
	
	$result = $bdd->getOne('SELECT round(avg(rate), 2) AS average, count(rate) AS nbrRate FROM notation WHERE media='.$mediaId.'');
		
	$dataBack = array('avg' => $result['average'], 'nbrRate' => $result['nbrRate']);
	$dataBack = json_encode($dataBack);
	
	echo $dataBack;
}
?>