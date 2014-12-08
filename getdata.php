<?php
$appname = $_POST['appname'];

try{
	//$db = new PDO('mysql:host=localhost;dbname=teamabc;charset=utf8', 'root', 'toor');
	$db = new PDO('mysql:host=localhost;dbname=koding_hackathon;charset=utf8', 'root', '');
	$stmt = $db->prepare('SELECT * FROM content WHERE supplier_name = :supplier_name');
	$arr= array(':supplier_name' => $appname);
	$stmt->execute($arr);
	$result = $stmt->fetchAll();
	echo json_encode($result);
}
catch(PDOException $e)
{
	echo $e;
	die();
}
?>