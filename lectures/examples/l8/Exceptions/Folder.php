<?php

require_once("OtherFile.php");

//File Folder.php
class Folder extends FilePathElement {

	private $pathsInFolder = array();

	public function __construct(string $path) {
		parent::__construct($path); 

		if (is_dir($path) == false) {
			throw new Exception("The path $path is not a Folder");
		}
		
		$this->addAllPathsInFolder();
	}

	public function getFiles() : array {
		return $this->filesInFolder;
	}

	public function accept(FilePathVisitor $l) {
		$l->visitFolder($this);
	}

	private function addAllPathsInFolder() {
		$pathNamesInFolder = scandir($this->getRelativePath());
		$this->addPaths($pathNamesInFolder);
	}

	private function isSubPath(string $path) : bool {
		if ($path === "." || $path === "..")
			return false;
		return true;
	}

	private function addPaths(array $pathNamesInFolder) {
		foreach ($pathNamesInFolder as $filename) {
			if ($this->isSubPath($filename)) {
				$this->addPath($filename);
			}
		}
	}

	private function addPath(string $filename) {
		$fullFilePath = $this->getRelativePath() . "/" . $filename;

		if (is_dir($fullFilePath)) {
			$this->filesInFolder[] = new Folder($fullFilePath);
		} else if (is_file($fullFilePath)) {
			$this->filesInFolder[] = new File($fullFilePath);
		} else {
			$this->filesInFolder[] = new OtherFile($fullFilePath);
		}
	}
}