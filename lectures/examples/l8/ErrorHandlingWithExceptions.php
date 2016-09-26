<?php

require_once("Exceptions/FilePathElement.php");
require_once("Exceptions/File.php");
require_once("Exceptions/Folder.php");
require_once("Exceptions/FileTreeView.php");



//File application.php

$badPath = "/dev";
$okPath = "/vagrant";
// "input from user selects a path"
$path = $okPath; 

try {
	$f = new Folder($path);
	$ftv = new FileTreeView($f);
	$ftv->toHTML();

} catch (Exception $e) { //this happens in view or at the one who calls the view
	echo "An error [" . $e->getMessage() . "]occurred when searching path $path, showing $okPath instead.<br/>";
	//recover from error... or throw it somewere else to be handled
}

//... view
	