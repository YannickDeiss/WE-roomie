<head>
    <link src="mapsStyle.css"
</head>

<header class="header">
    <div class="header-content unselectable">
        <h1>Find your new home today</h1>
    </div>
</header>

<search class="search">
    <div class="search-indicator" onclick="pageJump()">
        <p class="unselectable">Search</p>
        <i class="fas fa-angle-double-down"></i>
    </div>
    <div class="search-form" id="searchArea">
        <div class="search-form-wrapper">
                    <span class="input input--isao">
                        <input class="input__field input__field--isao" id="autocomplete" placeholder="" type="text"/>
                        <label class="input__label input__label--isao" data-content="Location">
                            <span class="input__label-content input__label-content--isao">Location</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text"/>
                        <label class="input__label input__label--isao" data-content="Min Rooms">
                            <span class="input__label-content input__label-content--isao">Min Rooms</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text"/>
                        <label class="input__label input__label--isao" data-content="Max Rooms">
                            <span class="input__label-content input__label-content--isao">Max Rooms</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text"/>
                        <label class="input__label input__label--isao" data-content="Min Rent">
                            <span class="input__label-content input__label-content--isao">Min Rent</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text"/>
                        <label class="input__label input__label--isao" data-content="Max Rent">
                            <span class="input__label-content input__label-content--isao">Max Rent</span>
                        </label>
                    </span>
            <div class="search-button-wrapper">
                <button class="search-button">
                    <span class="unselectable">Search</span>
                </button>
            </div>
        </div>
    </div>
</search>
<main class="content">
    <div class="latest-available">
        <h2>Latest Available Rooms</h2>
    </div>

    <div class="listing-card">
        <div class="make-3D-space">
            <div class="product-card">
                <div class="product-front">
                    <div class="shadow"></div>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt=""/>
                    <div class="image_overlay"></div>
                    <div class="view_details">View details</div>
                    <div class="stats">
                        <div class="stats-container">
                            <span class="product_price">CHF 1500</span>
                            <span class="product_name">3 room apartment in Basel</span>
                            <p>Available from 01.06.2018</p>

                            <div class="product-options">
                                <strong>Rooms</strong>
                                <span>3</span>
                                <strong><a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/'></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-back">
                    <div class="shadow"></div>
                    <div class="carousel">
                        <ul class="unselectable">
                            <li>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt=""/>
                            </li>
                            <li>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png"
                                     alt=""/>
                            </li>
                            <li>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png"
                                     alt=""/>
                            </li>
                        </ul>
                        <div class="arrows-perspective">
                            <div class="carouselPrev">
                                <div class="y"></div>
                                <div class="x"></div>
                            </div>
                            <div class="carouselNext">
                                <div class="y"></div>
                                <div class="x"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-back">
                        <div class="cy"></div>
                        <div class="cx"></div>
                    </div>
                </div>
            </div>
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
        //https://stackoverflow.com/questions/42135049/google-maps-autocomplete-to-restrict-places-shown-in-a-specific-country
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['(cities)'], componentRestrictions: {country: 'CH'}});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function pageJump() {
        document.getElementById("searchArea").scrollIntoView({behavior: "smooth"});;
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY-l7QLzikVgEmkS67AMHR1cI0c9tKgIQ&libraries=places&callback=initAutocomplete"
        async defer></script>

