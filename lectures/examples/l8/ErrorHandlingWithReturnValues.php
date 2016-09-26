<?php


/**
 * WARNING! constructed as an example on how not to do things!
 */

$errors = "";
function logg($error) {
	global $errors;
	$errors .= "Error: $error";
}

function viewTree(string $folderPath) : bool {
	if (is_dir($folderPath)) {
		echo basename($folderPath);

		//Returns an array of filenames on success, or FALSE on failure.
		$allFiles = scandir($folderPath);

		if ($allFiles !== FALSE) {
			echo "<ul>";
			foreach ($allFiles as $index => $filename) {
				$fullFilePath = $folderPath . "/" . $filename;
				
				if (is_dir($fullFilePath)) {
					if ($filename === "." || $filename === "..") {
						continue;
					}
					echo "<li>";
					$ok = viewTree($fullFilePath);
					if ($ok == FALSE) {
						logg("could not view subtree $filename");	
						return false;
					}
					echo "</li>";

					 
				} else if (is_file($fullFilePath)) {
					echo "<li>";
					echo $filename;
					echo "</li>";
				} else {
					logg("The path $fullFilePath is not a directory and not a file");	
					return false;		
				}
			}
			echo "</ul>";
			return true;
		} else {
			logg("The path given is not a directory or could not be scanned $folderPath");	
			return false;
		}

	} else {
		logg("The path given is not a directory $folderPath ");
		return false;
	}
}

//File application.php

$badPath = "/dev";
$okPath = "/vagrant";


// "input from user selects a path"
$path = $badPath;


if (viewTree($path) == false) {
	echo "An error [$errors] occurred when searching path $path";
}