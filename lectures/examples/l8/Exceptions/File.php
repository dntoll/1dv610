<?php

//File File.php
class File extends FilePathElement {

	public function __construct(string $path) {
		parent::__construct($path); 

		if (is_file($path) == false) {
			throw new Exception("The path $path is not a File!");
		}
		
	}

	public function accept(FilePathVisitor $l) {
		$l->visitFile($this);
	}
}