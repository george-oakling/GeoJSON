<?php

namespace GeoJSON;

use Nette\Utils\Json;
use Nette\Object;

class FeatureCollection extends Object {
	public $type = "FeatureCollection";
	public $bbox;
	public $features = array();
	
	public function addFeature(Feature $node) {
		$this->features[] = $node;
	}
	
	public function setBoundingBox($a, $b, $c, $d) {
		$this->bbox = array();
		$this->bbox[] = (float) $b;
		$this->bbox[] = (float) $a;
		$this->bbox[] = (float) $d;
		$this->bbox[] = (float) $c;
	}
	
	public function __toString() {
		return Json::encode($this, Json::PRETTY);
	}
}