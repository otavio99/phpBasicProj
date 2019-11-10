<?php

function updateview($POST=null, string $action="none"){

	//codigo abaixo carrega o layout da pagina
	$title= array(
		"title" => 'Joke Update'
	);
	$pageLayout= fileExists(__DIR__ . '/../templates/layout.tpl');
	$page= setContent($title, $pageLayout);
	

	//faz update se for o caso
	$action= isset($_GET["action"])? $_GET["action"]:"none";
	if($action != "none" & $POST != null){
		try{
			$action(["id" => $POST["id"], "joketext"  => $POST["joketext"]], 
					sqlUpdate("joke")
			);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	//carrega a piada na area de texto
	if($POST != null){

		$form= fileExists(__DIR__ . '/../templates/update.tpl');
		$form= setContent(["text" => $POST["joketext"]], $form);
		$form= setContent(["id" => $POST["id"]], $form);
		echo setContent(["output" => $form], $page);
	}

}