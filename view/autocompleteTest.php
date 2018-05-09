
<head>
   <link rel="stylesheet" type="text/css" href="mapsStyle.css">
</head>

<body>
<input id="pac-input" class="controls" type="text" placeholder="Enter a location">
<div id="type-selector" class="controls">
    <input type="radio" name="type" id="changetype-all" checked="checked">
    <label for="changetype-all">All</label>

    <input type="radio" name="type" id="changetype-establishment">
    <label for="changetype-establishment">Establishments</label>

    <input type="radio" name="type" id="changetype-address">
    <label for="changetype-address">Addresses</label>

    <input type="radio" name="type" id="changetype-geocode">
    <label for="changetype-geocode">Geocodes</label>
</div>
<div id="map"></div>

<script>

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY-l7QLzikVgEmkS67AMHR1cI0c9tKgIQ&libraries=places&callback=initAutocomplete"
        async defer></script>
