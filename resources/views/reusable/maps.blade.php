
<style>

    #map {

        width:481px;height:344px


    }

    .pac-container {
        background-color: #FFF;
        z-index: 2000;
        position: fixed;
        display: inline-block;
        float: left;
    }
</style>

<div class='form-group'>
    <label for='searchmap'>Ubicación: </label>
    <input type="text" id='searchmap' style="height: 27px; width: 90%;">
    <div id="map"></div>

</div>
<div class="form-group">
    <input type="hidden" class='form-control input-sm' name='latitud_servicio' value="{!!$latitud_servicio!!}" id='latitud_servicio'/>
</div>
<div class="form-group">
    <input type="hidden" class='form-control input-sm' name='longitud_servicio' value="{!!$longitud_servicio!!}" id='longitud_servicio'/>
</div>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDor7F0iN5YavbFiLRA7pY7L8-Rgl89GT8&signed_in=true&libraries=places&callback=initMap" async defer></script>


<script>

    var map;
    var infowindow;
    var latitud = {!!$latitud_servicio!!}
    var longitud = {!!$longitud_servicio!!}
    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: latitud,
                lng: longitud

            },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {
                lat: latitud,
                lng: longitud
            },
            map: map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);

        });
        google.maps.event.addListener(marker, 'position_changed', function () {

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng;
            $('#latitud_servicio').val(lat);
            $('#longitud_servicio').val(lng);
        })
    }


</script>

</head>





{!!HTML::script('public/js/jquery_.js') !!}
{!! HTML::script('public/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('public/js/jsModal/basic.js') !!}






