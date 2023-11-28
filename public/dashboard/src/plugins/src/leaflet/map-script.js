
        var map = L.map('map').setView([-1.1478241,120.2331073], 5);

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
            this._div.innerHTML = '<h4>INFO DISINI</h4>' + (props ?
                '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>' : 'Layangkan cursor pada kawasan');
        };

        info.addTo(map);


        // get color depending on population density value
        function getColor(d) {
            return d > 1000 ? '#800026' :
                d > 500 ? '#BD0026' :
                d > 200 ? '#E31A1C' :
                d > 100 ? '#FC4E2A' :
                d > 50 ? '#FD8D3C' :
                d > 20 ? '#FEB24C' :
                d > 10 ? '#FED976' : '#FFEDA0';
        }

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: getColor(feature.properties.density)
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
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
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        /* global statesData */
        geojson = L.geoJson(statesData, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        L.control.scale({
            position: 'bottomright'
        }).addTo(map);

        map.attributionControl.addAttribution('Data &copy; <a href="http://brg.gov.id/">BRGM Republik Indonesia</a>');


        var baseLayers = {
            "Default": lyrOSM,
            "Topography": lyrOpenTopoMap,
            "Satellite": lyrWorldImagery

        };

        var overlays = {
            "Data":geojson,
        };

        var layerControl = L.control.layers(baseLayers, overlays, {
            position: 'bottomleft'
        }).addTo(map);