<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2>Post your apartment</h2>
        </div>
        <div class="form-layout">
            <form class="entry-form" method="post" action="">
                <h1>Create Your listing</h1>
                <div class="form-group">
                    <input type="text" required/>
                    <label>Title</label>
                </div>
                <div class="form-group">
                    <input id="autocomplete" placeholder="" onfocus="geolocate()" type="text" required/>
                    <label>Location</label>
                </div>
                <div class="form-group">
                    <input type="text" required/>
                    <label>Rooms</label>
                </div>
                <div class="form-group">
                    <input type="text" required/>
                    <label>Rent</label>
                </div>
                <div class="form-group">
                    <input type="text" required/>
                    <label>Square Meters</label>
                </div>
                <div class="form-group">
                    <input type="date" required/>
                    <label class="label-top">Available From</label>
                </div>
                <div class="form-group">
                    <textarea name="description" cols="40" rows="5" required></textarea>
                    <label class="label-top">Description</label>
                </div>
                <div class="form-group">
                    <input type="file" required/>
                    <label class="label-top">Image 1</label>
                </div>
                <div class="form-group">
                    <input type="file" required/>
                    <label class="label-top">Image 2</label>
                </div>
                <div class="form-group">
                    <input type="file" required/>
                    <label class="label-top">Image 3</label>
                </div>
                <input type="button" class="green" value="Post"/>
                <input type="button" value="Cancel"/>
            </form>
        </div>
    </div>
</main>


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
