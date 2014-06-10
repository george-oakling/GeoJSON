<?php

namespace GeoJSON;

use Nette\Utils\Json;
use Nette\Object;

abstract class Feature extends Object {

	public $type = "Feature";
	public $geometry;
	public $properties;
	
	public function __construct() {
		$this->geometry = array(
			"type" => $this->getClassName(),
		);
	}

	public function addProperty($key, $value) {
		$this->properties[$key] = $value;
	}
	
	function getClassName() {
		$classname = get_class($this);
		if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
			$classname = $matches[1];
		}
		return $classname;
	}
}