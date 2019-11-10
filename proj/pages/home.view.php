<?php

function homeview():string{
	$values= array(
		"title" => 'Internet Joke Database',
		"output" => fileExists(__DIR__ . '/../templates/home.tpl'),
	);

	$pageLayout= fileExists(__DIR__ . '/../templates/layout.tpl');

	return setContent($values, $pageLayout);
}

