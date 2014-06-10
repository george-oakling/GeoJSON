<?php

namespace GeoJSON;

use Nette\Utils\Json;
use Nette\Object;

class FeatureCollection extends Object {
	public $type = "FeatureCollection";
	public $features = array();
	
	public function addFeature(Feature $node) {
		$this->features[] = $node;
	}
	
	public function __toString() {
		return Json::encode($this, Json::PRETTY);
	}
}