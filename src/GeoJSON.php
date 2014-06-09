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

class Point extends Feature {
	
	public function setCoordinates($lat, $lng) {
		$this->geometry["coordinates"][] = (float) $lat;
		$this->geometry["coordinates"][] = (float) $lng;
	}
}

class MultiPoint extends Feature {
	// todo
}

class LineString extends Feature {
	// todo
}

class MultiLineString extends Feature {
	// todo
}

class Polygon extends Feature {
	// todo
}

class MultiPolygon extends Feature {
	// todo
}

class GeometryCollection extends Feature {
	// todo
	// does this support Google Maps?
}

class FeatureCollection {
	public $type = "FeatureCollection";
	public $features = array();
	
	public function addFeature(Feature $node) {
		$this->features[] = $node;
	}
	
	public function __toString() {
		return Json::encode($this);
	}
}


?>

<xmp>

<?php

$geojson = new FeatureCollection();

for($i=0; $i<5; $i++) {
	$feat = new Point();
	$feat->setCoordinates(12.4, 102.6);
	$feat->addProperty("prop0", "value0");
	$geojson->addFeature($feat);
}

echo $geojson;
