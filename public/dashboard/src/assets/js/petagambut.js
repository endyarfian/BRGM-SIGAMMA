// var data = <?= json_encode($kodeprov) ?>;
        var map = L.map('map').setView([-1.1478241, 120.2331073], 5);

        var lyrOSM = L.tileLayer.provider('OpenStreetMap.Mapnik');
        var lyrOpenTopoMap = L.tileLayer.provider('OpenTopoMap');
        var lyrWorldImagery = L.tileLayer.provider('Esri.WorldImagery');
        map.addLayer(lyrOSM);

        // control that shows state info on hover
        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function(props) {
            this._div.innerHTML = '<h4><b>Data Provinsi</b></h4>' +
                (props ?
                    'Kode Provinsi : <b>' + props.KODE +
                    '<br> </b> Nama Provinsi : <b>' + props.PROVINSI :
                    '</b><br> Layangkan cursor pada kawasan');
        };

        info.addTo(map);

        function style(feature) {
            return {
                weight: 1,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.2,
                fillColor: 'black'
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 3,
                color: '#5E9338',
                dashArray: '',
                fillOpacity: 0.3,

            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }

        var geojson;

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on('click', function(ev) {
                window.open("/maps/detail/" + feature.properties.id)
            });
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,

            });
        }
        geojson = L.geoJson(data, {
            onEachFeature: onEachFeature,
            style: style,
        }).addTo(map);

        L.control.scale({
            position: 'bottomright'
        }).addTo(map);

        var coordinatesControl = L.Control.extend({
            options: {
                position: 'bottomright' // Menempatkan control di pojok kanan bawah
            },

            onAdd: function(map) {
                var container = L.DomUtil.create('div', 'leaflet-control-coordinates');
                container.style.background = 'white';
                container.style.padding = '5px';
                container.style.borderRadius = '5px';
                map.on('mousemove', function(e) {
                    var lat = e.latlng.lat;
                    var lng = e.latlng.lng;
                    container.innerHTML = 'Lat: ' + lat.toFixed(5) + ', Lng: ' + lng.toFixed(5);
                });
                return container;
            }
        });

        map.attributionControl.addAttribution('Data &copy; <a href="http://brg.gov.id/">BRGM Republik Indonesia</a>');


        var baseLayers = {
            "Default": lyrOSM,
            "Topography": lyrOpenTopoMap,
            "Satellite": lyrWorldImagery

        };

        var overlays = {
            // "Data": geojson,
        };

        map.addControl(new coordinatesControl());
        var layerControl = L.control.layers(baseLayers, overlays, {
            position: 'bottomleft'
        }).addTo(map);