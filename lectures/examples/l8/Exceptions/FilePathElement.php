<?php

//File FilePathElement.php

//https://en.wikipedia.org/wiki/Visitor_pattern
interface FilePathVisitor {
	function visitFile(File $file);
	function visitFolder(Folder $folder);
	function visitOther(OtherFile $other);
}

abstract class FilePathElement {
	private $relativePath;

	public function __construct(string $relativePath) {
		assert(file_exists($relativePath), "File not exists $relativePath");

		$this->relativePath = $relativePath;
	}

	public function getName() : string {
		return basename($this->relativePath);
	}

	public function getRelativePath() : string {
		return $this->relativePath;
	}

	abstract public function accept(FilePathVisitor $listener);
}