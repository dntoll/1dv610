<?php


class ImplicitToExplicit {

	private $theList;
	public function getThem() : array {
		$ret = array();
		foreach($this->theList as $x) {
			if ($x[0] == 4) {
				$ret[] = $x;
			}
		}
		return $ret;
	}


	const STATUS_VALUE = 1;
	const FLAGGED = 2;
	public function getFlaggedCells() : array {
		$flaggedCells = array();
		foreach($this->gameBoard as $cell) {
			if ($cell[STATUS_VALUE] == FLAGGED) {
				$flaggedCells[] = $cell;
			}
		}
		return $flaggedCells;
	}


	public function getFlaggedCells() : CellArray {
		$flaggedCells = new CellArray();
		foreach($this->gameBoard as $cell) {
			if ($cell->isFlagged()) {
				$flaggedCells->add($cell);
			}
		}
		return $flaggedCells;
	}
}

