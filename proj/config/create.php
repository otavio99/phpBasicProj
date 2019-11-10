<?php
try{
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=teste', "teste", "");

	if($pdo->exec(file_get_contents(__DIR__."\script.sql"))){
		header('location: index.php?page=jokelist&action=select'); 
	}else{
		throw new Exception("Error when creating");
	}
}catch(Exception $e){
}