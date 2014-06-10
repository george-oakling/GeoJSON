<?php

namespace GeoJSON;

class Point extends Feature {
	
	public function setCoordinates($lat, $lng) {
		$this->geometry["coordinates"] = array();
		$this->geometry["coordinates"][] = (float) $lat;
		$this->geometry["coordinates"][] = (float) $lng;
	}
	
}

class MultiPoint extends Feature {
	public function addCoordinates($lat, $lng) {
		$this->geometry["coordinates"][] = array(
			(float) $lat,
			(float) $lng
		);
	}
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
