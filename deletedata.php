<?php
$id = $_POST['id'];

try{
	$db = new PDO('mysql:host=localhost;dbname=teamabc;charset=utf8', 'root', 'toor');
	// $db = new PDO('mysql:host=localhost;dbname=koding_hackathon;charset=utf8', 'root', '');
	$stmt = $db->prepare('DELETE FROM content WHERE id = :id');
	$arr = array(':id' => $id);
	if($stmt->execute($arr))
		echo 1;
}
catch(PDOException $e)
{
	echo $e;
	die();
}