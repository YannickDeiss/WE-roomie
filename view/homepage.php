<?php
use view\TemplateView;
?>

<head>
    <link src="mapsStyle.css"
</head>

<header class="header">
    <div class="header-content unselectable">
        <h1>Find your new home today</h1>
    </div>
</header>

<search class="search">
    <div class="wobble search-indicator" onclick="pageJump()">
        <p class="unselectable">Search</p>
        <i class="fas fa-angle-double-down"></i>
    </div>
    <form class="search-tag" type="submit" method="POST" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/search">
    <div class="search-form" id="searchArea">
        <div class="search-form-wrapper">
                    <span class="input input--isao">
                        <input class="input__field input__field--isao" id="autocomplete" placeholder="" name="city" type="text"/>
                        <label class="input__label input__label--isao" data-content="Location">
                            <span class="input__label-content input__label-content--isao">Location</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" name="minRooms" type="text"/>
                        <label class="input__label input__label--isao" data-content="Min Rooms">
                            <span class="input__label-content input__label-content--isao">Min Rooms</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" name="maxRooms" type="text"/>
                        <label class="input__label input__label--isao" data-content="Max Rooms">
                            <span class="input__label-content input__label-content--isao">Max Rooms</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" name="minRent" type="text"/>
                        <label class="input__label input__label--isao" data-content="Min Rent">
                            <span class="input__label-content input__label-content--isao">Min Rent</span>
                        </label>
                    </span>
            <span class="input input--isao">
                        <input class="input__field input__field--isao" name="maxRent" type="text"/>
                        <label class="input__label input__label--isao" data-content="Max Rent">
                            <span class="input__label-content input__label-content--isao">Max Rent</span>
                        </label>
                    </span>
            <div class="search-button-wrapper">
                <button class="search-button" value="submit">
                    <span class="unselectable">Search</span>
                </button>
            </div>
        </div>
    </div>
    </form>
</search>
<main class="content">
    <div class="latest-available">
        <h2>Latest Available Rooms</h2>
    </div>
    <?php
    foreach ($this->listings as $listing): ?>
    <div class="listing-card">
        <div class="make-3D-space">
            <div class="product-card">
                <div class="product-front">
                    <div class="shadow"></div>
                    <?php if (!empty($listing->getImage1())){
                        echo '
                                <img src="'?>
                        <?php echo TemplateView::noHTML($listing->getImage1()); ?> <?php echo '"
                                     alt=""/>';
                    }else{
                        echo '
                                <img src="dist/images/not-available.jpg" alt=""/>';
                    }?>
                    <div class="image_overlay"></div>
                    <div class="view_details">View images</div>
                    <div class="stats">
                        <div class="stats-container">
                            <span class="product_price">CHF <?php echo TemplateView::noHTML($listing->getPrice()); ?></span>
                            <span class="product_name"><?php echo TemplateView::noHTML($listing->getTitle()); ?></span>
                            <p>Available from <?php echo TemplateView::noHTML($listing->getMoveindate()); ?></p>

                            <div class="product-options">
                                <strong>Rooms</strong>
                                <span><?php echo TemplateView::noHTML($listing->getNumberofrooms()); ?></span>
                                <strong><a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/search/<?php echo $listing->getId(); ?>'>
                                        View Details
                                    </a></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-back">
                    <div class="shadow"></div>
                    <div class="carousel">
                        <ul class="unselectable">
                            <?php if (!empty($listing->getImage1())){
                                echo '
                                <li>
                                <img src="'?>
                                <?php echo TemplateView::noHTML($listing->getImage1()); ?> <?php echo '"
                                     alt=""/>
                                </li>';
                            }else{
                                echo '
                                <li>
                                <img src="dist/images/not-available.jpg" alt=""/>
                                </li>';
                            }?>

                            <?php if (!empty($listing->getImage2())){
                                echo '
                                <li>
                                <img src="'?>
                                <?php echo TemplateView::noHTML($listing->getImage2()); ?> <?php echo '"
                                     alt=""/>
                                </li>';
                            }?>

                            <?php if (!empty($listing->getImage3())){
                                echo '
                                <li>
                                <img src="'?>
                                <?php echo TemplateView::noHTML($listing->getImage3()); ?> <?php echo '"
                                     alt=""/>
                                </li>';
                            }?>
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

    <?php endforeach; ?>
</main>

 <script>

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['(regions)'], componentRestrictions: {country: 'CH'}});
    }

    function pageJump() {
        document.getElementById("searchArea").scrollIntoView({behavior: "smooth"});
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY-l7QLzikVgEmkS67AMHR1cI0c9tKgIQ&libraries=places&callback=initAutocomplete"
        async defer></script>

