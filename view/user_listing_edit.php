<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 07.01.2018
 * Time: 01:08
 */

use domain\Listing;
use service\AuthServiceImpl;
use view\TemplateView;
use validator\ListingValidator;

isset($this->listing) ? $listing = $this->listing : $listing = new Listing();
isset($this->listingValidator) ? $listingValidator = $this->listingValidator : $listingValidator = new ListingValidator();
$street = $listing->getStreet();
$streetNumber = $listing->getStreetnumber();
?>

<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2><?php echo isset($this->listing) ? "EDIT YOUR LISTING" : "POST YOUR LISTING"; ?></h2>
        </div>
        <div class="form-layout">
            <form class="entry-form" method="POST" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/listing/edit" enctype="multipart/form-data">
                <h1><?php echo isset($this->listing) ? "EDIT YOUR LISTING" : "POST YOUR LISTING"; ?></h1>

                <?php
                if (!empty($listing->getId())) {
                    echo '<input class="form-control" type="hidden" readonly="" name="id" value="' ?><?php echo $listing->getId();
                    echo '">';
                } ?>

                <input class="form-control" type="hidden" readonly="" name="userID"
                       value="<?php echo AuthServiceImpl::getInstance()->getCurrentUserId(); ?>">

                <div class="form-group">
                    <input type="text" required name="title"
                           value="<?php echo TemplateView::noHTML($listing->getTitle()) ?>"/>
                    <label>Title</label>
                </div>

                <!--TODO:-->
                <div class="form-group">
                    <input id="autocomplete" placeholder="" type="text" required name="location" value="<?php echo TemplateView::noHTML($listing->getStreet() . " " . $listing->getStreetNumber() . (isset($street, $streetNumber) ? ", " . $listing->getCity(): $listing->getCity()))?>"/>
                    <label>Location</label>
                </div>
                <input hidden id="street" placeholder="" type="text" value="<?php echo TemplateView::noHTML($listing->getStreet()) ?>" required name="street"/>
                <input hidden id="streetNumber" placeholder="" type="number" step="1" value="<?php echo TemplateView::noHTML($listing->getStreetnumber()) ?>" required name="streetNumber"/>
                <input hidden id="plz" placeholder="" type="text" value="<?php echo TemplateView::noHTML($listing->getPlz()) ?>" required name="plz"/>
                <input hidden id="city" placeholder="" type="text" value="<?php echo TemplateView::noHTML($listing->getCity()) ?>" required name="city"/>
                <input hidden id="canton" placeholder="" type="text" value="<?php echo TemplateView::noHTML($listing->getCanton()) ?>" required name="canton"/>

                <div class="form-group">
                    <input type="number" step="0.5" required name="rooms" value="<?php echo TemplateView::noHTML($listing->getNumberofrooms()) ?>"/>
                    <label>Rooms</label>
                </div>
                <div class="form-group">
                    <input type="number" step="0.5" required name="rent" value="<?php echo TemplateView::noHTML($listing->getPrice()) ?>"/>
                    <label>Rent</label>
                </div>
                <div class="form-group">
                    <input type="number" step="1" required name="squareMeters" value="<?php echo TemplateView::noHTML($listing->getSquaremeters()) ?>"/>
                    <label>Square Meters</label>
                </div>
                <div class="form-group">
                    <input type="date" required name="availableFrom" value="<?php echo TemplateView::noHTML($listing->getMoveindate()) ?>"/>
                    <label class="label-top">Available From</label>
                </div>
                <div class="form-group">
                    <textarea name="description" cols="40" rows="5" required><?php echo TemplateView::noHTML($listing->getDescription()) ?></textarea>
                    <label class="label-top">Description</label>
                </div>

                <?php
                $link = $listing->getImage1();
                echo isset($link) ? "<img width='150px' src=$link>" : "" ?>


                <div class="form-group">
                    <input type="file" name="image1" />
                    <label class="label-top">Image 1</label>
                </div>

                <?php
                $link = $listing->getImage2();
                echo isset($link) ? "<img width='150px' src=$link>" : "" ?>

                <div class="form-group">
                    <input type="file" name="image2"/>
                    <label class="label-top">Image 2</label>
                </div>

                <?php
                $link = $listing->getImage3();
                echo isset($link) ? "<img width='150px' src=$link>" : "" ?>

                <div class="form-group">
                    <input type="file" name="image3"/>
                    <label class="label-top">Image 3</label>
                </div>
                <!--                <input type="button" class="green" onclick="submitForm()" value="Submit"/>-->
                <!--                <input id="submit_handle" type="submit" style="display: none">-->
                <input type="button" class="green" onclick="form.submit()" value="Submit"/>
                <input type="button" value="Cancel"
                       onclick="window.location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/user'"/>
            </form>
        </div>
    </div>
</main>


<script>

    function submitForm() {
        // $('#submit_handle').click();
        $('#entry-form').submit();
    }

    function initialize() {
        var input = document.getElementById('autocomplete');
        var options = {
            types: ['address'],
            componentRestrictions: {
                country: 'CH'
            }
        };
        autocomplete = new google.maps.places.Autocomplete(input, options);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            for (var i = 0; i < place.address_components.length; i++) {
                for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "route") {
                        console.log(place.address_components);
                        document.getElementById('street').value = place.address_components[i].long_name;
                    }
                    if (place.address_components[i].types[j] == "street_number") {

                        document.getElementById('streetNumber').value = place.address_components[i].long_name;
                    }
                    if (place.address_components[i].types[j] == "postal_code") {

                        document.getElementById('plz').value = place.address_components[i].long_name;
                    }
                    if (place.address_components[i].types[j] == "locality") {

                        document.getElementById('city').value = place.address_components[i].long_name;
                    }
                    if (place.address_components[i].types[j] == "administrative_area_level_1") {

                        document.getElementById('canton').value = place.address_components[i].long_name;

                    }else if (place.address_components[i].types[j] == "administrative_area_level_2"){

                        document.getElementById('canton').value = place.address_components[i].long_name;
                    }
                }
            }
        })
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY-l7QLzikVgEmkS67AMHR1cI0c9tKgIQ&libraries=places&callback=initialize"
        async defer></script>
