<?php

require("../vendor/autoload.php");

use GeoJSON\FeatureCollection;
use GeoJSON\Feature;
use GeoJSON\Point;
use GeoJSON\MultiPoint;

?>
<xmp>
<?php

$collection = new FeatureCollection();

$point = new Point();
$point->setCoordinates(14.5, 50.5);
$point->addProperty("Tetrev hlusec", "Hluchavka");

$multipoint = new MultiPoint();
$multipoint->addCoordinates(14.5, 50.5);
$multipoint->addCoordinates(14.5, 50.5);

$collection->addFeature($point);
$collection->addFeature($multipoint);


echo($collection);
