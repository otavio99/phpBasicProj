<?php
function getConection(){
	return new PDO('mysql:host=127.0.0.1;dbname=teste', "teste", "");
}

function exceptionMessage(PDOException $e):string{
	return 'An error has occurred. ' . $e->getMessage() . ' in ' .
	$e->getFile() . ' : ' . $e->getLine();
}


function sqlInsert($table):string{
	if($table == "joke"){
		return "INSERT INTO joke (joketext) VALUES (:joketext)";
	}
}
function sqlUpdate($table):string{
	if($table=="joke"){
		return "UPDATE joke
				SET joketext = :joketext
				WHERE id = :id"; 
	}
}


function sqlDelete($table):string{
	if($table == "joke"){
		return "DELETE FROM joke WHERE id = (:id)";
	}
}


function select(string $table= "", $POST=[]){
	$pdo= getConection();
	return $pdo->query("SELECT * FROM " . $table);
}


function save($arr=[], $sql){
	if (!empty($arr) & empty($arr["id"])){
		$pdo = getConection();
		$stmt = $pdo->prepare($sql);
		if($stmt->execute($arr)){
			header('location: index.php?page=jokelist&action=select'); 
		}else{
			throw new Exception("Error when inserting");
		}
	}
	else if (!empty($arr) & !empty($arr["id"])){
		$pdo = getConection();
		$stmt = $pdo->prepare($sql);
		if($stmt->execute($arr)){
			header('location: index.php?page=jokelist&action=select'); 
		}else{
			throw new Exception("Error when inserting");
		}
	}
}


function update($arr=[], $sql){
	if (!empty($arr)){
		$pdo = getConection();
		$stmt = $pdo->prepare($sql);
		if($stmt->execute($arr)){
			header('location: index.php?page=jokelist&action=select'); 
		}else{
			throw new Exception("Error when updating");
		}
	}
}

function delete($arr=[], $sql){
	if (!empty($arr)){
		$pdo = getConection();
		$stmt = $pdo->prepare($sql);
		if($stmt->execute($arr)){
			header('location: index.php?page=jokelist&action=select'); 
		}else{
			throw new Exception("Error when deleting");
		}
	}
}