<?php
function addjokeview($POST=[],string $action="none"):string{
	if($action != "none"){
		try{
			//a ação a ser executada salva piadas, caso de certo a pagina será redirecionada para a pagina de lista de piadas
			$action(["joketext" => $POST["joketext"]], sqlInsert("joke"));
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	$values= array(
		"title" => 'Add a new joke',
		"output" => fileExists(__DIR__ . '/../templates/addjoke.tpl'),
	);
	$pageLayout= fileExists(__DIR__ . '/../templates/layout.tpl');

	return setContent($values, $pageLayout);
}