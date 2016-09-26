<?php

class OtherFile extends FilePathElement {



	public function accept(FilePathVisitor $l) {
		$l->visitOther($this);
	}
}