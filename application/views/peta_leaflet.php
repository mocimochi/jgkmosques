<!-- <div class="content-wrapper"> -->


<!-- <aside class="control-sidebar control-sidebar-dark">
    </aside> -->
<div class="container-fluid page-header-map py-5">
    <div id="map" style="width: 100%; height: 530px; color:black;"></div>
</div>

<!-- <div class="content">
                <div id="map" style="width: 100%; height: 530px; color:black;"></div>
            </div>
             -->
<script>
    var masjid = new L.LayerGroup();
    var jagakarsa = new L.LayerGroup();

    var map = L.map('map', {
        center: [-1.7912604466772375, 116.42311966554416],
        zoom: 5,
        zoomControl: false,
        layers: []

    });

    var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 22,
        attribution: 'Latihan Web GIS'
    }).addTo(map);


    var OpenStreetMap_Mapnik = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 16,
        attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
    });

    var GoogleMaps = new L.TileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        opacity: 1.0,
        attribution: 'Latihan Web GIS'
    });

    var GoogleRoads = new L.TileLayer('https://mt1.google.com/vt/lyrs=h&x={x}&y={y}&z={z}', {
        opacity: 1.0,
        attribution: 'Latihan Web GIS'
    });

    var baseLayers = {
        'Google Satellite Hybrid': GoogleSatelliteHybrid,
        'OpenStreet Map': OpenStreetMap_Mapnik,
        'GoogleMaps': GoogleMaps,
        'GoogleRoads': GoogleRoads,
    };

    var groupedOverlays = {
        "Peta Dasar": {
            'Jagakarsa': jagakarsa,
            'Masjid Jagakarsa': masjid,
        },
    };



    var overlayLayers = {}

    console.log("lewat0")

    L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map);

    console.log("lewat")

    var
        osmUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
    var osmAttrib = 'Map data &copy; OpenStreetMap contributors';
    var osm2 = new L.TileLayer(osmUrl, {
        minZoom: 0,
        maxZoom: 13,
        attribution: osmAttrib
    });
    var rect1 = {
        color: "#ff1100",
        weight: 3
    };
    var rect2 = {
        color: "#0000AA",
        weight: 1,
        opacity: 0,
        fillOpacity: 0
    };
    var miniMap = new L.Control.MiniMap(osm2, {
        toggleDisplay: true,
        position: "bottomright",
        aimingRectOptions: rect1,
        shadowRectOptions: rect2
    }).addTo(map);
    L.Control.geocoder({
        position: "topleft",
        collapsed: true
    }).addTo(map);

    /* GPS enabled geolocation control set to follow the user's location */
    var locateControl = L.control.locate({
        position: "topleft",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: true,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8
        },
        circleStyle: {
            weight: 1,
            clickable: false
        },
        icon: "fa fa-location-arrow",
        metric: false,
        strings: {
            title: "My location",
            popup: "You are within {distance} {unit} from this point",
            outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
        },
        locateOptions: {
            maxZoom: 18,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000
        }
    }).addTo(map);
    var zoom_bar = new L.Control.ZoomBar({
        position: 'topleft'
    }).addTo(map);
    L.control.coordinates({

        position: "bottomleft",
        decimals: 2,
        decimalSeperator: ",",
        labelTemplateLat: "Latitude: {y}",
        labelTemplateLng: "Longitude: {x}"
    }).addTo(map);
    /* scala */
    L.control.scale({
        metric: true,
        position: "bottomleft"
    }).addTo(map);
    var north = L.control({
        position: "bottomleft"
    });
    north.onAdd = function(map) {
        var div = L.DomUtil.create("div", "info legend");
        div.innerHTML = '<img src="<?= base_url() ?>assets/images/arahmataangin.png"style=width:200px;>';
        return div;
    }
    north.addTo(map);
    $.getJSON("<?= base_url() ?>assets/msjdjg.geojson", function(data) {
        var ratIcon = L.icon({
            iconUrl: '<?= base_url() ?>assets/Marker-1.png',
            iconSize: [12, 10]
        });
        L.geoJson(data, {
            pointToLayer: function(feature, latlng) {
                var marker = L.marker(latlng, {
                    icon: ratIcon
                });
                marker.bindPopup('<h4>'+feature.properties.NamaMasjid+'</h4><p class="mb-0">Jam Buka:</p><p class="mt-0"> '+feature.properties.Start+'-'+feature.properties.End+'</p><p class="mb-0">alamat lengkap:</p><p class="mt-0"> '+feature.properties.Keterangan+'</p>');
                return marker;
            }
        }).addTo(masjid);
    });

    $.getJSON("<?= base_url() ?>assets/bg-jagakarsa.geojson", function(data) {
        L.geoJson(data, {
            pointToLayer: function(feature, latlng) {
                var marker = L.marker(latlng, {
                    style: 'color: "#999", weight: 1, fillColor: fillColor, fillOpacity: .6',
                });
                marker.bindPopup(feature);
                return marker;
            }
        }).addTo(jagakarsa);
    });
</script>