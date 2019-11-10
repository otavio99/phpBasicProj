<?php

function deleteview($POST=null, string $action="none"):string{
	if($action != "none" & $POST != null){
		try{
			//a ação a ser executada deleta piadas, caso de certo a pagina será redirecionada para a pagina de lista de piadas
			$action(["id" => $POST["id"]], sqlDelete("joke"));
		}catch(PDOException $e){
			echo "------Exception------";
			echo $e->getMessage();
		}
	}
}