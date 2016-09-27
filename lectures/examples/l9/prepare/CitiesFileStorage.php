<?php


class CitiesFileStorage extends CityDAL {

	private static $FOLDER = "/vagrant/l9/data/CitiesFileStorage/";

	public function install() {
		if (file_exists(self::$FOLDER) === FALSE) {
			mkdir(self::$FOLDER);
		}
	}

	public function remove() {
		$files = scandir(self::$FOLDER);

		foreach($files as $fileName) {
			if ($fileName !== "." && $fileName !== "..") {
				unlink($this->getFileRelativePath($fileName));
			}
		}
	}

	public function save(City $toBeSaved) {
		$fileName = urlencode($toBeSaved->name.$toBeSaved->district);
		if (file_put_contents($this->getFileRelativePath($fileName), serialize($toBeSaved)) === FALSE) {
			throw new \Exception("Unable to save File");
		}
	}

	public function getAllCities() : Cities {

		$files = scandir(self::$FOLDER);
		$ret = new Cities();

		foreach($files as $fileName) {
			if ($fileName !== "." && $fileName !== "..") {
				$fileName = file_get_contents($this->getFileRelativePath($fileName));
				$city = unserialize($fileName);
				$ret->add($city);
			}

		}
		return $ret;
	}
	public function getCitiesFromDistrict(string $district) : Cities {
		$cities = $this->getAllCities();


		$ret = new Cities();

		foreach($cities as $city) {
			if ($city->district === $district) {
				$ret->add($city);
			}

		}

		return $ret;
	}

	private function getFileRelativePath(string $fileName) {
		return self::$FOLDER . $fileName;
	}
}