<?php
$supplier_name = $_POST['supplier_name'];
$name = $_POST['name'];
$briefy = $_POST['briefy'];
$category = $_POST['category'];
$explanation = $_POST['explanation'];

try{
	$db = new PDO('mysql:host=localhost;dbname=teamabc;charset=utf8', 'root', 'toor');
	//$db = new PDO('mysql:host=localhost;dbname=koding_hackathon;charset=utf8', 'root', '');
	$stmt = $db->prepare('INSERT INTO content values (0, :supplier_name, :name, :briefy, :category, :explanation)');
	$arr= array(':supplier_name' => $supplier_name, ':name' => $name, ':briefy' => $briefy, ':category' => $category, ':explanation' => $explanation);
	if($stmt->execute($arr)){
		echo 1;	
	}
	else{
		echo 0;
	}
}
catch(PDOException $e)
{
	echo $e;
	die();
}
?>