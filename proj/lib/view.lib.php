<?php

//return html content from file
function getHtmlContent($file):string{
	return file_get_contents($file);
}

//verify if file exists, if yes return the content, no return empty string
function fileExists($file):string{
	if (!file_exists($file)){
		return " ";
	}
	else{
		return getHtmlContent($file);
	}
}

//take out the first element of array and return the array
function takeFirstElement($arr=[]){
	array_shift($arr);
	return $arr;
}

//set value in content by making use of array with "key" => "values";
//Ex1: $values= array("word" => "World!!!", "phrase" => "How are you?");
//Ex2: $values= array("title" => "<h1>Hello World!!!</h1>");
function setContent($arr, $page=" "):string{
    if($arr)
        return setContent(takeFirstElement($arr), str_replace("[@".key($arr)."]", current($arr), $page));
    return $page;
}

//falta explicar
function setList($arr,string $html,int $qtd,string $list=" "):string{
	$qtd= $qtd-1;
    if($arr & $qtd!=-1){
        return $list.= setList(takeFirstElement($arr), $html, $qtd, setContent(current($arr),$html));
    }
    return $list;
}