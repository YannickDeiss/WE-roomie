<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/22/2018
 * Time: 5:04 PM
 */

namespace controller;
use domain\Listing;
use service\ListingServiceImpl;
use view\TemplateView;
use view\LayoutRendering;
class SearchController
{
    public static function show()
    {
        $contentView = new TemplateView("view/assets/search_page/search.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll(){
        $listing = new Listing();
        $listing->setStreet($_POST["street"]);
        $listing->setStreetnumber($_POST["streetNumber"]);
        $listing->setPlz($_POST["plz"]);
        $listing->setCity($_POST["city"]);
        $listing->setCanton($_POST["canton"]);
        $listing->setNumberofrooms($_POST["rooms"]);
        $listing->setPrice($_POST["price"]);
        $listing->setSquaremeters($_POST["squareMeters"]);
        $contentView = new TemplateView("view/search_result.php");
        $contentView->listings = (new ListingServiceImpl())->filterListings($listing);
        $contentView->result = true;
        LayoutRendering::basicLayout($contentView );
    }
    public static function getListingById($id)
    {
        $contentView = new TemplateView("view/listing_detail.php");
        $contentView->listing = (new ListingServiceImpl())->findListingById($id);
        LayoutRendering::basicLayout($contentView );
    }
}