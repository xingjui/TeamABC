<?php

try{
	$db = new PDO('mysql:host=localhost;dbname=teamabc;charset=utf8', 'root', 'toor');
	// $db = new PDO('mysql:host=localhost;dbname=koding_hackathon;charset=utf8', 'root', '');
	$stmt = $db->prepare('SELECT DISTINCT supplier_name FROM content');
	$stmt->execute();
	$result = $stmt->fetchAll();
	echo json_encode($result);
}
catch(PDOException $e)
{
	echo $e;
	die();
}
?>