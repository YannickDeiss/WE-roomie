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
                    <input type="text" required name="title" value="<?php echo TemplateView::noHTML($listing->getTitle()) ?>"/>
                    <label>Title</label>
                </div>

                <!--TODO:-->
                <div class="form-group">
                    <input id="autocomplete" placeholder="" type="text" required name="location"/>
                    <label>Address</label>
                </div>
                <div class="form-group">
                    <input type="number" step="0.5" required name="rooms" value="<?php echo TemplateView::noHTML($listing->getNumberofrooms()) ?>"/>
                    <label>Rooms</label>
                </div>
                <div class="form-group">
                    <input type="number" step="0.5" required name="rent" value="<?php echo TemplateView::noHTML($listing->getPrice()) ?>"/>
                    <label>Rent</label>
                </div>
                <div class="form-group">
                    <input type="number" step="0.01" required name="squareMeters" value="<?php echo TemplateView::noHTML($listing->getSquaremeters()) ?>"/>
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
                <div class="form-group">
                    <input type="file" name="image1"/>
                    <label class="label-top">Image 1</label>
                </div>
                <div class="form-group">
                    <input type="file" name="image2"/>
                    <label class="label-top">Image 2</label>
                </div>
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

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')), {
                componentRestrictions: {country: 'CH'}
            });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY-l7QLzikVgEmkS67AMHR1cI0c9tKgIQ&libraries=places&callback=initAutocomplete"
        async defer></script>
