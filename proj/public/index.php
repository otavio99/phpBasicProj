<?php
include __DIR__ . '/../lib/view.lib.php';
include __DIR__ . '/../db/db.lib.php';
include __DIR__ . '/../pages/home.view.php';
include __DIR__ . '/../pages/jokeadd.view.php';
include __DIR__ . '/../pages/jokedelete.view.php';
include __DIR__ . '/../pages/jokelist.view.php';
include __DIR__ . '/../pages/jokeupdate.view.php';


if(!empty($_POST)){

	$action= isset($_GET["action"])? $_GET["action"]:"none";
	$page= isset($_GET["page"])? $_GET["page"]:"home";
	$page.= "view";
	echo $page($_POST,$action);
}
else{
	$page= isset($_GET["page"])? $_GET["page"]:"home";
	$page.= "view";
	echo $page();
}

?>