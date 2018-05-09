<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 07.01.2018
 * Time: 01:08
 */

namespace controller;


use domain\Listing;
use service\ListingServiceImpl;
use validator\ListingValidator;
use view\LayoutRendering;
use view\TemplateView;

class ListingController
{
    public static function create() {
        $contentView = new TemplateView("view/user_listing_edit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll() {
        $contentView = new TemplateView("assets/adSection/adSection.php");
        $contentView->listings = (new ListingServiceImpl())->findAllListings();
        $contentView->showTools = true;
        LayoutRendering::basicLayout($contentView);
    }

    public static function readTopThree() {
        $contentView = new TemplateView("assets/adSection/adSection.php");
        $contentView->listings = (new ListingServiceImpl())->findTopThree();
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit() {
        $id = $_GET["id"];
        $contentView = new TemplateView("assets/createAd/createAd.php");
        $contentView->listing = (new ListingServiceImpl())->readListing($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update() {
        $listing = new Listing();
        $listing->setId("");
        if (isset($_POST["id"])) {
            $listing->setId($_POST["id"]);
        }
        $listing->setUserID($_POST["userID"]);
        $listing->setStreet($_POST["street"]);
        $listing->setPlz($_POST["plz"]);
        $listing->setCity($_POST["city"]);
        $listing->setCanton($_POST["canton"]);
        $listing->setNumberofrooms($_POST["rooms"]);
        $listing->setPrice($_POST["price"]);
        $listing->setSquaremeters($_POST["squareMeters"]);
        $listing->setDescription($_POST["description"]);

        $moveInDay = ($_POST["moveInDay"]);
        $moveInMonth = ($_POST["moveInMonth"]);
        $moveInYear = ($_POST["moveInYear"]);
        $listing->setMoveindate($moveInYear . "-" . $moveInMonth . "-" . $moveInDay);

        $moveOutDay = ($_POST["moveOutDay"]);
        $moveOutMonth = ($_POST["moveOutMonth"]);
        $moveOutYear = ($_POST["moveOutYear"]);

        if(!($moveOutDay == "-" || $moveOutMonth == "-" || $moveOutYear == "-")){
            $listing->setMoveoutdate($moveOutYear . "-" . $moveOutMonth . "-" . $moveOutDay);
        }

        $listingValidator = new ListingValidator($listing);
        if ($listingValidator->isValid()) {
            if ($listing->getId() === "") {
                (new ListingServiceImpl())->createListing($listing);
            } else {
                (new ListingServiceImpl())->updateListing($listing);
            }
        } else {
            $contentView = new TemplateView("assets/createAd/createAd.php");
            $contentView->listing = $listing;
            $contentView->listingValidator = $listingValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function delete() {
        $id = $_GET["id"];
        (new ListingServiceImpl())->deleteListing($id);
    }

    public static function editView()
    {
    }
}