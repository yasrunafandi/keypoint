<!DOCTYPE html>
<html>
<head>
<title>MENAMPILKAN PETA PEMELIHARAAN</title>
<script type="text/javascript" src="assets/openlayers-2.12_ms4w/ms4w/apps/openlayers-2.12/OpenLayers.js"></script>
<script type="text/javascript">
 window.onload = function() {
  // layer OSM
  var osm = new OpenLayers.Layer.OSM('Map OSM');

  var map = new OpenLayers.Map({
   // div element
   'div': 'map',

   // set center Longitude dan Langitude
   'center': new OpenLayers.LonLat( 0, 0),

   // set zoom peta
   'zoom': 2,

   // set layer
   'layers': [osm]
  });
 }
</script>
</head>
<body>
<div id="map" style="width: 1350px; height: 600px;"></div>
</body>
</html>
