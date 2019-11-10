<?php

function jokelistview(){
	$values= array(
		"title" => 'Joke list'
	);
	$pageLayout= fileExists(__DIR__ . '/../templates/layout.tpl');
	$page= setContent($values, $pageLayout);

	//a ação a ser executada lista piadas, caso de certo a pagina será carregada com as piadas salvas
	$action= isset($_GET["action"])? $_GET["action"]:"none";
	if($action !="none"){
		$sth= $action("joke");
		$result= $sth->fetchAll(PDO::FETCH_BOTH);

		$htmlList= fileExists(__DIR__ . '/../templates/jokeitem.tpl');
		$list= setList($result, $htmlList,7);
		echo setContent(["output" => $list], $page);
	}
	else{
		echo $page;
	}
}