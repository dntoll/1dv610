<?php


//File FileTreeView.php
class FileTreeView implements FilePathVisitor {
	public function __construct(Folder $toBeVisualized) {
		$this->folder = $toBeVisualized;
	}

	public function toHTML() {
		$this->visitFolder($this->folder);
	}

	public function visitFile(File $file) {
		echo $file->getName();
	}

	public function visitFolder(Folder $folder) {
		echo $folder->getName();

		$pathsInFolder = $folder->getFiles();
		echo "<ul>";
		foreach ($pathsInFolder as $path) {
			echo "<li>";
			$path->accept($this);
			echo "</li>";
		}

		echo "</ul></li>";
	}
}